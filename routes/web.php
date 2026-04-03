<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    CartController,
    HomeController,
    AdminController,
    OrderController,
    AdController,
    AdViewUserController,
    CouponController,
    PayPalController,
    MessageController,
    FrontendController,
    ReferralController,
    WishlistController,
    Auth\LoginController,
    MembershipController,
    PostCommentController,
    NotificationController,
    ProductReviewController,
    Auth\ResetPasswordController,
    Auth\ForgotPasswordController
};

// CACHE CLEAR ROUTE
Route::get('cache-clear', function () {
    Artisan::call('optimize:clear');
    request()->session()->flash('success', 'Successfully cache cleared.');
    return redirect()->back();
})->name('cache.clear');

// STORAGE LINKED ROUTE
Route::get('storage-link', [AdminController::class, 'storageLink'])->name('storage.link');

// Auth routes
Auth::routes(['register' => false]);

Route::get('user/login', [FrontendController::class, 'login'])->name('login.form');
Route::post('user/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout');

Route::get('user/register', [FrontendController::class, 'register'])->name('register.form');
Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit');

// Password Reset
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Socialite
Route::get('login/{provider}', [LoginController::class, 'redirect'])->name('login.redirect');
Route::get('login/{provider}/callback', [LoginController::class, 'callback'])->name('login.callback');

// Home
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/home', [FrontendController::class, 'index']);

// Frontend Pages
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/message', [MessageController::class, 'store'])->name('contact.store');
Route::get('product-detail/{slug}', [FrontendController::class, 'productDetail'])->name('product-detail');
Route::post('/product/search', [FrontendController::class, 'productSearch'])->name('product.search');
Route::get('/product-cat/{slug}', [FrontendController::class, 'productCat'])->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', [FrontendController::class, 'productSubCat'])->name('product-sub-cat');
Route::get('/product-brand/{slug}', [FrontendController::class, 'productBrand'])->name('product-brand');

// Terms & Conditions Pages
Route::get('/terms-condition', [FrontendController::class, 'termsCondition'])->name('terms-condition');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy'])->name('refund-policy');
Route::get('/shipping-policy', [FrontendController::class, 'shippingPolicy'])->name('shipping-policy');

// Cart
Route::middleware('user')->group(function () {
    Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
});
Route::get('/cart', fn() => view('frontend.pages.cart'))->name('cart');
Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');

// Wishlist
Route::get('/wishlist', fn() => view('frontend.pages.wishlist'))->name('wishlist');
Route::middleware('user')->get('/wishlist/{slug}', [WishlistController::class, 'wishlist'])->name('add-to-wishlist');
Route::get('wishlist-delete/{id}', [WishlistController::class, 'wishlistDelete'])->name('wishlist-delete');

// Orders
Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');
Route::get('/congratulation', [OrderController::class, 'congratulation'])->name('congratulation');
Route::get('order/pdf/{id}', [OrderController::class, 'pdf'])->name('order.pdf');
Route::get('/income', [OrderController::class, 'incomeChart'])->name('product.order.income');

// Product lists
Route::get('/product-grids', [FrontendController::class, 'productGrids'])->name('product-grids');
Route::get('/product-lists', [FrontendController::class, 'productLists'])->name('product-lists');
Route::match(['get', 'post'], '/filter', [FrontendController::class, 'productFilter'])->name('shop.filter');

// Order Tracking
Route::get('/product/track', [OrderController::class, 'orderTrack'])->name('order.track');
Route::post('product/track/order', [OrderController::class, 'productTrackOrder'])->name('product.track.order');

// Blog
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/search', [FrontendController::class, 'blogSearch'])->name('blog.search');
Route::post('/blog/filter', [FrontendController::class, 'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}', [FrontendController::class, 'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}', [FrontendController::class, 'blogByTag'])->name('blog.tag');

// Newsletter
Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');

// Product Review
Route::resource('/review', ProductReviewController::class);
Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');

// Post Comment
Route::resource('/comment', PostCommentController::class);
Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');

// Coupon
Route::post('/coupon-store', [CouponController::class, 'couponStore'])->name('coupon-store');

// Payment
Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');

// Referral
Route::get('/ref', [ReferralController::class, 'processReferral']);

// Admin Section
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/file-manager', fn() => view('backend.layouts.file-manager'))->name('file-manager');
    Route::resources([
        'users' => 'UsersController',
        'banner' => 'BannerController',
        'advertisement' => 'AdvertisementController',
        'subscription' => 'SubscriptionController',
        'brand' => 'BrandController',
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'post-category' => 'PostCategoryController',
        'post-tag' => 'PostTagController',
        'post' => 'PostController',
        'message' => 'MessageController',
        'order' => 'OrderController',
        'shipping' => 'ShippingController',
        'coupon' => 'CouponController',
        'ads' => AdController::class
    ]);
    Route::get('/messages/five', [MessageController::class, 'five'])->name('messages.five');
    Route::post('/category/{id}/child', 'CategoryController@getChildByParent');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
    Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');
    Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('admin.notification');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('all.notification');
    Route::delete('/notification/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
    Route::get('change-password', [AdminController::class, 'changePassword'])->name('change.password.form');
    Route::post('change-password', [AdminController::class, 'changPasswordStore'])->name('change.password');
    Route::post('/ad-view', [AdViewUserController::class, 'trackAdView']);
    Route::get('/memberships', [MembershipController::class, 'index']);
    Route::post('/memberships/subscribe/{id}', [MembershipController::class, 'subscribe']);
    Route::post('/memberships/cancel', [MembershipController::class, 'cancel']);
    Route::post('/referrals/generate-code', [ReferralController::class, 'generateCode']);
});

// User Section
Route::prefix('user')->middleware(['user'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('user');
    Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
    Route::get('/order', [HomeController::class, 'orderIndex'])->name('user.order.index');
    Route::get('/order/show/{id}', [HomeController::class, 'orderShow'])->name('user.order.show');
    Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');
    Route::get('/user-review', [HomeController::class, 'productReviewIndex'])->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}', [HomeController::class, 'productReviewDelete'])->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}', [HomeController::class, 'productReviewEdit'])->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}', [HomeController::class, 'productReviewUpdate'])->name('user.productreview.update');
    Route::get('user-post/comment', [HomeController::class, 'userComment'])->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}', [HomeController::class, 'userCommentDelete'])->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}', [HomeController::class, 'userCommentEdit'])->name('user.post-comment.edit');
    Route::patch('user-post/comment/update/{id}', [HomeController::class, 'userCommentUpdate'])->name('user.post-comment.update');
    Route::get('change-password', [HomeController::class, 'changePassword'])->name('user.change.password.form');
    Route::post('change-password', [HomeController::class, 'changPasswordStore'])->name('change.password');
    Route::get('coin-balance', [HomeController::class, 'coinBalance'])->name('user.coin.balance');
    Route::post('/ads/{id}/view', [AdViewUserController::class, 'viewAd']);

    // Authenticated ads routes
    Route::middleware('auth')->group(function () {
        Route::get('/ads', [AdViewUserController::class, 'availableAds'])->name('ads.list');
        Route::post('/ads/view/{ad}', [AdViewUserController::class, 'view'])->name('ads.view');
        Route::post('/ads/view-ad/{id}', [AdViewUserController::class, 'viewAd'])->name('ads.viewAd');
    });

    // Subscription purchase and list for user
    Route::get('/subscriptions', [MembershipController::class, 'userSubscriptions'])->name('user.subscriptions');
    Route::get('/subscriptions/buy', [MembershipController::class, 'showBuyForm'])->name('user.subscriptions.buy');
    Route::post('/subscriptions/buy', [MembershipController::class, 'buy'])->name('user.subscriptions.buy.submit');
});