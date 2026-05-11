<?php

// use App\Http\Controllers\Admin\AmbulanceServiceController;
// use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\ChamberController;
// use App\Http\Controllers\Admin\DepartmentController;
// use App\Http\Controllers\Admin\CategoriesController;
// use App\Http\Controllers\Admin\FrontSliderController;
// use App\Http\Controllers\Admin\GalleryController;
// use App\Http\Controllers\Admin\HomeController;
// use App\Http\Controllers\Admin\ServiceController;
// use App\Http\Controllers\Admin\MediaController;
// use App\Http\Controllers\Admin\PostController;
// use App\Http\Controllers\Admin\ProductController;
// use App\Http\Controllers\Admin\UnitController;
// use App\Http\Controllers\Admin\SearchController;
// use App\Http\Controllers\Admin\ShippingMethodController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\UserRoleController;
// use App\Http\Controllers\Admin\WebsiteParameterController;
// use App\Http\Controllers\Admin\AdminTestimonialController;
// use App\Http\Controllers\Admin\PageContentController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\FrontendController;

// Route::get('/',[AuthController::class,'index'])->name('login');

Route::get('image', function () {
    Artisan::call('storage:link');
    return back();
});

Route::get('/run-storage-link', function () {
    try {
        // Remove the existing storage link
        File::deleteDirectory(public_path('storage'));

        // Run the artisan command
        Artisan::call('storage:link');

        return "<pre>Storage link created successfully.\n" . Artisan::output() . "</pre>";
    } catch (\Exception $e) {
        return "<pre>Error: " . $e->getMessage() . "</pre>";
    }
});

Route::get('/clear', function () {
   Artisan::call('optimize:clear');
   return back();
})->name('clear_cache');

Route::get('/debug-sentry', function () {
    throw new \Exception('Sentry is working!');
});


// // SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

// Route::post('/success', [SslCommerzPaymentController::class, 'success']);
// Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
// Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


// Route::post('order/store', [SslCommerzPaymentController::class, 'orderStore']);
// Route::post('order/success', [SslCommerzPaymentController::class, 'orderSuccess']);
// Route::post('order/fail', [SslCommerzPaymentController::class, 'orderFail']);
// Route::post('order/cancel', [SslCommerzPaymentController::class, 'orderCancel']);

// Route::post('order/ipn', [SslCommerzPaymentController::class, 'orderIpn']);
// //SSLCOMMERZ END

Route::get('/testidcard', [FrontendController::class, 'testidcard'])->name('testidcard');

Route::get('/test-email', function () {
    try {
        Mail::raw('Test email content', function ($message) {
            $message->to('mehediarif.du@gmail.com')
                    ->subject('Test Email');
        });
        return 'Email sent successfully!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});



Route::get('/language/change', [FrontendController::class, 'languageChange'])->name('welcome.changeLanguage');
Route::get('page/{slug?}',[FrontendController::class, 'page'])->name('page');
Route::get('/website/compliance',[FrontendController::class, 'websiteCompliance'])->name('websiteCompliance');
Route::get('hospital-details/{id}',[FrontendController::class,'HospitalDetails'])->name('hospital-details');

// HUBLI  website 
Route::get('/',[FrontendController::class, 'index'])->name('home');
Route::get('/md-message',[FrontendController::class,'mdMessage'])->name('mdMessage');
Route::get('/testimonial',[FrontendController::class,'testimonial'])->name('testimonial');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/quick-view', [FrontendController::class, 'quickView'])->name('quick.view');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/service',[FrontendController::class,'service'])->name('service');
// Route::get('/product',[HomeController::class,'product'])->name('product');

Route::get('agent/dashboard',[FrontendController::class, 'memberDashboard'])->name('agent.dashboard');
Route::get('patient/dashboard',[FrontendController::class, 'patientDashboard'])->name('patient.dashboard');
Route::get('doctor/dashboard',[FrontendController::class, 'doctorDashboard'])->name('doctor.dashboard');

Route::get('category/{category}/posts',[FrontendController::class,'categoryPosts'])->name('categoryPosts');

Route::get('member/payment',[FrontendController::class, 'memberPayment'])->name('member.payment');

Route::get('change/profile',[FrontendController::class, 'profile'])->name('change.profile');
Route::post('agent/old-pwd',[FrontendController::class, 'oldPassword'])->name('member.old_password');
Route::post('agent/update-pwd',[FrontendController::class, 'updatePassword'])->name('member.update_password');
Route::post('agent/update-profile',[FrontendController::class, 'updateProfile'])->name('member.update_profile');

Route::get('/file/download/{id}',[FrontendController::class,'fileDownload'])->name('files.download');

Route::get('/search',[FrontendController::class,'search'])->name('search');

// Route::get('doctor/list',[FrontendController::class,'doctorList'])->name('doctorList');
Route::get('qurbani/occation',[FrontendController::class,'qurbaniOccation'])->name('qurbani.occation');
Route::get('qurbani/regular',[FrontendController::class,'qurbaniRegular'])->name('qurbani.regular');
Route::get('doctor/details/{id}',[FrontendController::class,'doctorDetails'])->name('doctorDetails');

Route::get('doctor/appointment',[FrontendController::class,'doctorAppointment'])->name('doctorAppointment');

Route::get('hospital/list',[FrontendController::class,'hospitalList'])->name('hospitalList');
Route::get('diagnostic',[FrontendController::class,'diagnostic'])->name('diagnostic');
Route::get('hopital/details/{id}',[FrontendController::class,'hospitalDetails'])->name('hospitalDetails');

Route::get('checkout',[FrontendController::class, 'new_checkout'])->name('new.checkout');
Route::post('cod/order/store',[FrontendController::class, 'codOrderStore'])->name('codOrderStore');
Route::post('order/store', [SslCommerzPaymentController::class, 'orderStore']);

Route::get('department/list',[FrontendController::class,'departmentList'])->name('departmentList');

Route::get('ambulance/provider/list',[FrontendController::class,'ambulanceProviderList'])->name('ambulanceProviderList');
Route::get('charity',[FrontendController::class,'charity'])->name('charity');

// Route::post('store/appointment',[FrontendController::class, 'storeAppointment'])->name('storeAppointment');

Route::get('/nb/products', [FrontendController::class, 'shasthoseba'])->name('shop.shasthoseba');
Route::get('product-category/{slug?}', [FrontendController::class, 'productCategory'])->name('productCategory');

Route::get('product/details/{slug}',[FrontendController::class, 'productDetails'])->name('productDetails');


Route::get('cart',[FrontendController::class, 'cart'])->name('cart');
Route::get('checkouts',[FrontendController::class, 'checkouts'])->name('frontend.checkout');
Route::post('add-to-cart',[FrontendController::class, 'addToCart'])->name('addToCart');
Route::get('/cart/quick-add', [FrontendController::class, 'quickAdd'])->name('cart.quick.add');

Route::get('/cart/remove/{id}', [FrontendController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [FrontendController::class, 'update'])->name('cart.update');
Route::post('/cart/update-quantity/{cartId}', [FrontendController::class, 'updateQuantity'])->name('cart.update.quantity');



// Route::post('add-to-cart/two',[FrontendController::class, 'addToCart2'])->name('addToCart2');

Route::post('cart/update/qty',[FrontendController::class, 'cartUpdateQty'])->name('cartUpdateQty');
Route::post('cart/remove/item/{cart}',[FrontendController::class, 'cartRemoveItem'])->name('cartRemoveItem');


Route::get('galleries/image',[FrontendController::class,'imageGalleries'])->name('image.galleries');
Route::get('galleries/video',[FrontendController::class,'videoGalleries'])->name('video.galleries');


//Authentication
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/registration',[AuthController::class,'registration'])->name('registration');
Route::get('/health-card',[AuthController::class,'healthCard'])->name('health.registration');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/main-register',[AuthController::class,'mainRegister'])->name('main.register');

// Password Reset Frontend Bridge
Route::get('/reset-password', function (Illuminate\Http\Request $request) {
    $token = $request->input('token');
    $email = $request->input('email');
    $frontendUrl = env('FRONTEND_URL');

    if (!$frontendUrl) {
        return "FRONTEND_URL is not configured in .env file. Please set it to your frontend application's base URL.";
    }

    return redirect()->to($frontendUrl . '/reset-password?token=' . $token . '&email=' . $email);
})->name('password.reset.web');



Route::get('/news', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@news',
    'as' => 'news'
]);

Route::get('/news/{id}', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@singleNews',
    'as' => 'singleNews'
]);

Route::get('/support-policy', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@supportpolicy',
    'as'   => 'supportpolicy',
]);

// Route::get('/privacy-policy', [
//     'uses' => 'App\Http\Controllers\Frontend\FrontendController@privacypolicy',
//     'as'   => 'privacypolicy',
// ]);

Route::get('/terms', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@terms',
    'as'   => 'terms',
]);

Route::get('/help/center', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@helpcenter',
    'as'   => 'helpcenter',
]);

Route::get('/aboutus', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@aboutus',
    'as'   => 'aboutus',
]);

Route::get('/contactus', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@contactus',
    'as'   => 'contactus',
]);

Route::get('/terms', function () {
    return view('frontend.home.terms');
})->name('terms');

Route::get('/return-policy', function () {
    return view('frontend.home.return_policy');
})->name('return-policy');

// Route::get('/privacy-policy', function () {
//     return view('frontend.home.privacy_policy');
// })->name('privacy-policy');

Route::get('/about-us', function () {
    return view('frontend.home.about');
})->name('about-us');


Route::get('/get-upazilas/{district_id}', function ($district_id) {
    $upazilas = App\Models\Upazila::where('district_id', $district_id)->get();
    return response()->json($upazilas);
});

Route::get('/get-shipping-methods/{upazila_id}', [FrontendController::class, 'getShippingMethods']);

// Sitemap
Route::get('/sitemap.xml', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@sitemap',
    'as'   => 'sitemap',
]);

// Route::middleware(['web'])->prefix('order')->group(function() {
//     Route::post('store', [SslCommerzPaymentController::class, 'orderStore']);
// });


Route::get('/logout',[AuthController::class,'logOut'])->name('logout');


