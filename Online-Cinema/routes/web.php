<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::match(['get', 'post'],'/movie-search', [\App\Http\Controllers\ControllerMoviePage::class, 'searchPage'])->name('movie.search.page');

Route::get('/movie-page/{movieId}', [\App\Http\Controllers\ControllerMoviePage::class, 'page'])->name('movie.page.page');


Route::middleware(['auth'])->group(function () {

    /*
     * Movie
     */
    Route::get('/movie-favorite/{movieId}', [\App\Http\Controllers\ControllerMoviePage::class, 'addFavorite'])->name('movie.add.favorite');

    Route::get('/remove-favorite/{movieId}', [\App\Http\Controllers\ControllerMoviePage::class, 'removeFavorite'])->name('movie.remove.favorite');


    /*
     * Dashboard
     */
    Route::get('/dashboard', [\App\Http\Controllers\ControllerCustomerDashboard::class, 'dashboardPage'])->name('dashboard.page');

    Route::get('/dashboard-tickets', [\App\Http\Controllers\ControllerCustomerDashboard::class, 'dashboardTickets'])->name('dashboard.tickets.page');

    Route::get('/dashboard-coupons', [\App\Http\Controllers\ControllerCustomerDashboard::class, 'dashboardCoupons'])->name('dashboard.coupons.page');

    Route::get('/dashboard-info', [\App\Http\Controllers\ControllerCustomerDashboard::class, 'dashboardInfo'])->name('dashboard.info.page');

    Route::get('/dashboard-favorite', [\App\Http\Controllers\ControllerCustomerDashboard::class, 'dashboardFavoritePage'])->name('dashboard.favorite.page');

    Route::get('/user-deletion', [\App\Http\Controllers\ControllerCustomerDashboard::class, 'userDeletion'])->name('user.deletion');

    Route::get('/subscription-fee-payment', function (){
        return view('payment');
    })->name('subscription.fee.payment');

    Route::get('/subscription-fee', [\App\Http\Controllers\ControllerCustomerDashboard::class, 'subscriptionFee'])->name('subscription.fee');

    /*
     *
     */


    /*
     * Admin
     */
        // how to check the admin??
        Route::get('/admin-panel', [\App\Http\Controllers\ControllerAdmin::class, 'adminPanel'])->name('admin.panel');

        Route::get('/admin-movieList', [\App\Http\Controllers\ControllerAdmin::class, 'movieList'])->name('admin.movieList');

        Route::post('/admin-addMovie', [\App\Http\Controllers\ControllerAdmin::class, 'addMovie'])->name('admin.addMovie');

    Route::post('/admin-deleteMovie', [\App\Http\Controllers\ControllerAdmin::class, 'deleteMovie'])->name('admin.deleteMovie');

        Route::get('/admin-salesMon', [\App\Http\Controllers\ControllerAdmin::class, 'salesMon'])->name('admin.salesMon');
    /*
     *
     */

    Route::get('/ticket-page/{movieId}', [\App\Http\Controllers\ControllerTicket::class, 'schedulePage'])->name('ticket.selection.page');

    Route::match(['get', 'post'], '/checkout', [\App\Http\Controllers\ControllerCheckout::class, 'checkOutPage'])->name('checkout.page');

    Route::post('/coupon', [\App\Http\Controllers\ControllerCheckout::class, 'coupon'])->name('checkout.coupon');

    Route::get('/checkout-cancel', [\App\Http\Controllers\ControllerCheckout::class, 'cancel'])->name('checkout.cancel');

    Route::get('/checkout-payment', [\App\Http\Controllers\ControllerCheckout::class, 'payment'])->name('checkout.payment');

    Route::get('/ticket-success', [\App\Http\Controllers\ControllerTicket::class, 'ticketSuccess'])->name('ticket.success.page');

    Route::post('/ticket-cancellation', [\App\Http\Controllers\ControllerTicket::class, 'ticketCancellation'])->name('ticket.cancellation');

});











