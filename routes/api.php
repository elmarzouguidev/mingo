<?php

use App\Http\Controllers\API\Banner\BannerController;
use App\Http\Controllers\API\Brand\BrandController;
use App\Http\Controllers\API\Category\CategoryController;
use App\Http\Controllers\API\Checkout\CheckoutController;
use App\Http\Controllers\API\Contact\ContactUsController;
use App\Http\Controllers\API\Customer\AdresseController;
use App\Http\Controllers\API\Customer\ForgetPasswordController;
use App\Http\Controllers\API\Customer\LoginController;
use App\Http\Controllers\API\Customer\LogoutController;
use App\Http\Controllers\API\Customer\RegisterController;
use App\Http\Controllers\API\Customer\UpdateController;
use App\Http\Controllers\API\Customer\WishListController;
use App\Http\Controllers\API\Order\OrderController;
use App\Http\Controllers\API\Page\PageController;
use App\Http\Controllers\API\Product\ProductController;
use App\Http\Controllers\API\Review\ReviewController;
use App\Http\Controllers\API\Search\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
});
//Route::get('/fr/products-collections', [ProductController::class, 'getProductsCollections'])->name('api.products.collections.fr');

Route::group(['middleware' => 'verifyApiAccess'], function () {

    Route::group(['prefix' => 'fr'], function () {
        Route::post('/contact-us', [ContactUsController::class, 'contactUs'])->name('api.contact.fr');
    });

    Route::group(['prefix' => 'ar'], function () {
        Route::post('/contact-us', [ContactUsController::class, 'contactUs'])->name('api.contact.ar');
    });

    Route::group(['prefix' => 'fr'], function () {
        Route::post('/search', [SearchController::class, 'search'])->name('api.search.fr');
    });

    Route::group(['prefix' => 'ar'], function () {
        Route::post('/search', [SearchController::class, 'search'])->name('api.search.ar');
    });

    Route::group(['prefix' => 'fr'], function () {

        Route::get('/pages', [PageController::class, 'index'])->name('api.pages.index.fr');
        Route::get('/pages/{page}', [PageController::class, 'getPage'])->name('api.pages.single.fr');
    });

    Route::group(['prefix' => 'ar'], function () {

        Route::get('/pages', [PageController::class, 'index'])->name('api.pages.index.ar');
        Route::get('/pages/{page}', [PageController::class, 'getPage'])->name('api.pages.single.ar');
    });

    /********************************** Products API  **********************************************/

    Route::group(['prefix' => 'fr'], function () {

        Route::get('/products', [ProductController::class, 'index'])->name('api.products.fr');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show.fr');

        Route::get('/products-latest', [ProductController::class, 'latest'])->name('api.products.latest.fr');
        Route::get('/products-deals', [ProductController::class, 'latest'])->name('api.products.deals.fr');

        Route::get('/products-collections', [ProductController::class, 'getProductsCollections'])->name('api.products.collections.fr');

        /*****Add review route */
        Route::get('/products-reviews', [ReviewController::class, 'index'])->name('api.products.reviews.index.fr');
        Route::post('/products-reviews/add', [ReviewController::class, 'store'])->name('api.products.reviews.store.fr');
    });

    Route::group(['prefix' => 'ar'], function () {

        Route::get('/products', [ProductController::class, 'index'])->name('api.products.ar');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show.ar');

        Route::get('/products-latest', [ProductController::class, 'latest'])->name('api.products.deals.ar');
        Route::get('/products-deals', [ProductController::class, 'latest'])->name('api.products.deals.ar');
        Route::get('/products-collections', [ProductController::class, 'getProductsCollections'])->name('api.products.collections.ar');

        /*****Add review route */
        Route::get('/products-reviews', [ReviewController::class, 'index'])->name('api.products.reviews.index.ar');
        Route::post('/products-reviews/add', [ReviewController::class, 'store'])->name('api.products.reviews.store.ar');
    });

    /********************************** END Products API  **********************************************/

    /********************************** Categories API  **********************************************/
    Route::group(['prefix' => 'fr'], function () {

        Route::get('category', [CategoryController::class, 'index'])->name('api.categories.index.fr');
        Route::get('category/{id}', [CategoryController::class, 'show'])->name('api.categories.show.fr');
        Route::get('category/{id}/products', [CategoryController::class, 'getProductsOfCategory'])->name('api.categories.products.fr');
    });

    Route::group(['prefix' => 'ar'], function () {

        Route::get('category', [CategoryController::class, 'index'])->name('api.categories.index.ar');
        Route::get('category/{id}', [CategoryController::class, 'show'])->name('api.categories.show.ar');
        Route::get('category/{id}/products', [CategoryController::class, 'getProductsOfCategory'])->name('api.categories.products.ar');
    });

    /********************************** END Categories API  **********************************************/

    /******************************Banner Routes **************************************/

    Route::group(['prefix' => 'ar'], function () {

        Route::get('/banners', [BannerController::class, 'index'])->name('api.banners.index.ar');
    });

    Route::group(['prefix' => 'fr'], function () {

        Route::get('/banners', [BannerController::class, 'index'])->name('api.banners.index.fr');
    });

    /******************************Brand Routes **************************************/

    Route::group(['prefix' => 'ar'], function () {

        Route::get('/brands', [BrandController::class, 'index'])->name('api.brands.index.ar');
    });

    Route::group(['prefix' => 'fr'], function () {

        Route::get('/brands', [BrandController::class, 'index'])->name('api.brands.index.fr');
    });

    /***********************************************Customer Login API ********************************/

    Route::group(['prefix' => 'fr'], function () {

        Route::post('/login', [LoginController::class, 'login'])->name('api.customer.loginPost.fr');
    });

    Route::group(['prefix' => 'ar'], function () {

        Route::post('/login', [LoginController::class, 'login'])->name('api.customer.loginPost.ar');
    });

    Route::group(['prefix' => 'fr', 'middleware' => 'auth:sanctum'], function () {

        Route::post('/logout', [LogoutController::class, 'logout'])->name('api.customer.logout.fr');
    });

    Route::group(['prefix' => 'ar', 'middleware' => 'auth:sanctum'], function () {

        Route::post('/logout', [LogoutController::class, 'logout'])->name('api.customer.logout.ar');
    });

    Route::group(['prefix' => 'fr'], function () {

        Route::post('/register', [RegisterController::class, 'create'])->name('api.customer.create.fr');
    });

    Route::group(['prefix' => 'ar'], function () {

        Route::post('/register', [RegisterController::class, 'create'])->name('api.customer.create.ar');
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {

        Route::group(['prefix' => 'fr/account'], function () {

            Route::get('/orders', [OrderController::class, 'index'])->name('api.orders.index.fr');
            Route::get('/orders/{id}', [OrderController::class, 'show'])->name('api.orders.single.fr');

            Route::post('/orders/delete', [OrderController::class, 'delete'])->name('api.orders.delete.fr');
        });

        Route::group(['prefix' => 'ar/account'], function () {

            Route::get('/orders', [OrderController::class, 'index'])->name('api.orders.index.ar');
            Route::get('/orders/{id}', [OrderController::class, 'show'])->name('api.orders.single.ar');

            Route::post('/orders/delete', [OrderController::class, 'delete'])->name('api.orders.delete.ar');
        });

        /*********Profile */

        Route::group(['prefix' => 'fr/account'], function () {
            Route::post('/update', [UpdateController::class, 'update'])->name('api.account.update.fr');

            Route::post('/update/change-password', [UpdateController::class, 'updatePassword'])->name('api.account.update-pass.fr');

            Route::get('/addresses', [AdresseController::class, 'index'])->name('api.addresses.update.fr');
            Route::post('/addresses/create', [AdresseController::class, 'create'])->name('api.addresses.create.fr');
            Route::post('/addresses/delete', [AdresseController::class, 'delete'])->name('api.addresses.delete.fr');

            Route::get('/wishlist', [WishListController::class, 'index'])->name('api.account.wishlist-create.fr');
            Route::post('/wishlist/create', [WishListController::class, 'store'])->name('api.account.wishlist-create.fr');
            Route::post('/wishlist/delete', [WishListController::class, 'delete'])->name('api.account.wishlist-delete.fr');
        });

        Route::group(['prefix' => 'ar/account'], function () {

            Route::post('/update', [UpdateController::class, 'update'])->name('api.account.update.ar');

            Route::post('/update/change-password', [UpdateController::class, 'updatePassword'])->name('api.account.update-pass.ar');

            Route::get('/addresses', [AdresseController::class, 'index'])->name('api.addresses.update.ar');
            Route::post('/addresses/create', [AdresseController::class, 'create'])->name('api.addresses.create.ar');
            Route::post('/addresses/delete', [AdresseController::class, 'delete'])->name('api.addresses.delete.ar');

            Route::get('/wishlist', [WishListController::class, 'index'])->name('api.account.wishlist.ar');
            Route::post('/wishlist/create', [WishListController::class, 'store'])->name('api.account.wishlist.ar');
            Route::post('/wishlist/delete', [WishListController::class, 'delete'])->name('api.account.wishlist-delete.ar');
        });
    });

    Route::group(['prefix' => 'fr/account'], function () {

        Route::post('/password/email', [ForgetPasswordController::class, 'forget'])
            ->name('api.account.forget-password.fr');
    });

    Route::group(['prefix' => 'ar/account'], function () {

        Route::post('/password/email', [ForgetPasswordController::class, 'forget'])
            ->name('api.account.forget-password.ar');
    });

    Route::post('fr/checkout', [CheckoutController::class, 'store'])
        ->name('api.checkout-post.fr');

    Route::post('ar/checkout', [CheckoutController::class, 'store'])
        ->name('api.checkout-post.ar');
});
