<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Notifications;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PayPalController;
use App\Http\Controllers\Api\StripeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\MyFatoorahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//?start///
// ?todo group user to login & logout & register //
Route::group(['middleware' => ['api'], 'prefix' => 'users'], function () {
    Route::POST('/login', [UserController::class, 'login']);
    Route::POST('/register', [UserController::class, 'register']);

    //?start///
    Route::group(['middleware' => ['auth.guard:api', 'verified']], function () {
        Route::POST('/refresh', [UserController::class, 'refresh']);
        Route::POST('/logout', [UserController::class, 'logout']);
        Route::get('/edit/{user}', [UserController::class, 'edit']);
        Route::PUT('/update/{user}', [UserController::class, 'update']);
        Route::POST('/read-notification/{id}', [Notifications::class, 'readNotification']);
        Route::get('/notification', [Notifications::class, 'notification']);

        // ? product
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/show-product/{product}', [ProductController::class, 'show']);

        // ! PayPal Payment //
        Route::get('/payment/paypal', [PayPalController::class, 'paypal'])->name('payment.paypal');

        // // ! Hyperpay Payment //
        // Route::get('/payment/hyperpay/{price}', [HyperpayController::class, 'hyperpay'])->name('payment.hyperpay');
        // Route::post('/payment/hyperpay/cancel', [HyperpayController::class, 'cancel'])->name('payment.hyperpay.cancel');
        // Route::get('/payment/hyperpay/success', [HyperpayController::class, 'success'])->name('payment.hyperpay.success');


        // ! Fatoorah Payment //
        Route::POST('/myfatoorah/pay', [MyFatoorahController::class, 'pay'])->name('myfatoorah.index');
        Route::get('/myfatoorah/callback', [MyFatoorahController::class, 'callback'])->name('myfatoorah.callback');

        // ! Stripe Payment //
        Route::get('/payment/stripe/link', [StripeController::class, 'getPaymentLink'])->name('payment.stripe.link');
        Route::get('/payment/view', [StripeController::class, 'index'])->name('payment.stripe.index');
        Route::POST('/payment/stripe', [StripeController::class, 'stripe'])->name('payment.stripe');

    });

    Route::POST('/verify/{id}', [UserController::class, 'verify'])->name('verifyEmail');
    // ! PayPal Payment callback //
    Route::post('/payment/paypal/cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
    Route::get('/payment/paypal/success', [PayPalController::class, 'success'])->name('payment.success');

});

//?end//