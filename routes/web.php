<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AmbulanceServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChamberController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FrontSliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ShippingMethodController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\WebsiteParameterController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Frontend\FrontendController;

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\WishlistController;
// use App\Http\Controllers\Frontend\FrontendController;
// use Illuminate\Support\Facades\Artisan;
// use Illuminate\Support\Facades\File;

Route::middleware(['web', 'auth'])->group(function() {
    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
   
});


Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');
    Route::put('user/{user}/toggle-approval', [UserController::class, 'toggleApproval'])->name('admin.user.toggle-approval');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    // Route::resource('categories',CategoryController::class);
    // Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('services',ServiceController::class);
    Route::get('get/division',[ServiceController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[ServiceController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[ServiceController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[ServiceController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[ServiceController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // blog category
    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');
    
    // Testimonials
    Route::resource('testimonials', AdminTestimonialController::class);
    
    Route::post('/categories/active',[CategoriesController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
    Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   
   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');

       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');

    // Unit Routes
    Route::get('units/all', [UnitController::class, 'unitsAll'])->name('admin.unitsAll');
    Route::get('unit/create', [UnitController::class, 'unitCreate'])->name('admin.unitCreate');
    Route::post('unit/store', [UnitController::class, 'unitStore'])->name('admin.unitStore');
    Route::get('unit/edit/{unit}', [UnitController::class, 'unitEdit'])->name('admin.unitEdit');
    Route::post('unit/update/{unit}', [UnitController::class, 'unitUpdate'])->name('admin.unitUpdate');
    Route::post('unit/delete/{unit}', [UnitController::class, 'unitDelete'])->name('admin.unitDelete');
    Route::get('unit/status/{unit}', [UnitController::class, 'unitStatus'])->name('admin.unitStatus');
    Route::get('unit/search/type/{type}', [UnitController::class, 'unitSearch'])->name('admin.unitSearch');

   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/image/delete/{media}', [ProductController::class, 'deleteImage'])->name('admin.product.image.delete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::put('product/{product}/toggle-approval', [ProductController::class, 'toggleApproval'])->name('admin.product.toggle-approval');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/assign-driver/{order}', [ProductController::class, 'assignDriver'])->name('admin.assignDriver');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');

    // Contacts
    Route::get('contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    // Product Stock Request Admin Routes
    Route::resource('stock-requests', \App\Http\Controllers\Admin\ProductStockRequestController::class)->names('admin.stock_requests');

    // Vehicle Admin Routes
    Route::resource('vehicles', \App\Http\Controllers\Admin\VehicleController::class)->names('admin.vehicles');

    // Driver Admin Routes
    Route::resource('drivers', \App\Http\Controllers\Admin\DriverController::class)->names('admin.drivers');

    // Vehicle Assignment Admin Routes
    Route::resource('vehicle-assignments', \App\Http\Controllers\Admin\VehicleAssignmentController::class)->names('admin.vehicle_assignments');

    Route::resource('page_contents', PageContentController::class)->names([
        'index' => 'admin.page_contents.index',
        'create' => 'admin.page_contents.create',
        'store' => 'admin.page_contents.store',
        'show' => 'admin.page_contents.show',
        'edit' => 'admin.page_contents.edit',
        'update' => 'admin.page_contents.update',
        'destroy' => 'admin.page_contents.destroy',
    ]);
});


Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'mypanel'], function () {
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('user.dashboard');
    Route::get('edit/my/information',[AuthController::class,'editMyInformation'])->name('user.editMyInformation');
    Route::get('idcard',[AuthController::class,'idcard'])->name('user.idcard');
    Route::get('idcard/pdf', [AuthController::class, 'idcardPdf'])->name('user.idcard.pdf');
    Route::post('change/my/information',[AuthController::class,'changeMyInformation'])->name('user.changeMyInformation');
    Route::post('profile-image/upload',[AuthController::class,'uploadProfileImage'])->name('user.uploadProfileImage');
    Route::get('orders/type/{type}',[AuthController::class,'orders'])->name('user.orders');
    
    Route::get('checkout',[FrontendController::class, 'checkout'])->name('checkout');
    // Route::get('new/checkout',[FrontendController::class, 'new_checkout'])->name('new.checkout');
    // Route::post('cod/order/store',[FrontendController::class, 'codOrderStore'])->name('codOrderStore');
    Route::post('delivery/location/save',[FrontendController::class, 'storeDeliveryLocation'])->name('storeDeliveryLocation');

    Route::post('reviews/store',[FrontendController::class, 'reviewsStore'])->name('reviewsStore');
    Route::get('invoice/print/{order}', [FrontendController::class, 'orderPrint'])->name('user.orderPrint');

    Route::get('chalan/print/{order}', [FrontendController::class, 'orderChalan'])->name('user.orderChalan');

    Route::get('feature-products', [AuthController::class, 'featureProducts'])->name('user.feature_products');

    // Product Stock Requests
    Route::get('stock-requests', [\App\Http\Controllers\AuthController::class, 'stockRequests'])->name('user.stock_requests.index');
    Route::get('stock-requests/create', [\App\Http\Controllers\AuthController::class, 'createStockRequestForm'])->name('user.stock_requests.create');
    Route::post('stock-requests', [\App\Http\Controllers\ProductStockRequestController::class, 'store'])->name('user.stock_requests.store');
});

Route::middleware(['auth', 'retailer'])->prefix('retailer')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Retailer\RetailerController::class, 'index'])->name('retailer.dashboard');
});
