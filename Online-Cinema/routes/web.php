<?php

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


Route::get('/dashboard', function () {
    if (Auth::check()) {
        return view('dashboard');
    } else{
        return view('home');
    }
});

Route::get('/movie-search', function () {
    return view('movie-search');
});

Route::get('/search', function(Request $request) {
    $query = $request->input('query');
    $movies = Movie::where('title', 'like', '%'.$query.'%')->get();

    return response()->json($movies);
});


//Route::get('/', function () {
//    if (Auth::check()) {
//        return redirect()->route('dashboard');
//    }
//
//    return Inertia::render('home', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
//});








