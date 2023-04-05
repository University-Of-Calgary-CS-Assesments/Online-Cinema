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
});


Route::get('/movie-search', function () {
    return view('movie-search');
})->name('movie.search.page');

Route::post('/movie-search', function (Request $request){
    $query = $request->input('query');
    $movies = \App\Models\Movie::where('title', 'like', '%'.$query.'%')->get();

    return view('movie-search', compact('movies'));
})->name('movies.search.action');

Route::get('/movie-page/{movieId}', [\App\Http\Controllers\ControllerMoviePage::class, 'page'])->name('movie.page.page');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard.page');

    Route::get('/ticket-page/{movieId}', [\App\Http\Controllers\ControllerTicket::class, 'schedulePage'])->name('ticket.selection.page');

//    Route::match(['get', 'post'], '/checkout', [\App\Http\Controllers\ControllerCheckout::class, 'checkOutPage'])->name('checkout.page');
    Route::get('/checkout', [\App\Http\Controllers\ControllerCheckout::class, 'showCheckoutPage'])->name('checkout.show');
    Route::post('/checkout', [\App\Http\Controllers\ControllerCheckout::class, 'checkOutPage'])->name('checkout.page');

    Route::post('/coupon', [\App\Http\Controllers\ControllerCheckout::class, 'coupon'])->name('checkout.coupon');

    Route::get('/checkout-cancel', [\App\Http\Controllers\ControllerCheckout::class, 'cancel'])->name('checkout.cancel');

    Route::get('/checkout-payment', [\App\Http\Controllers\ControllerCheckout::class, 'payment'])->name('checkout.payment');

    Route::get('/ticket-success', [\App\Http\Controllers\ControllerTicket::class, 'ticketSuccess'])->name('ticket.success.page');

});

//Route::get('/movie-page', [\App\Http\Controllers\ControllerMoviePage::class, 'page'])->name('movie.page.page');











