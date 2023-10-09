<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/welcome',function(){
    return view('welcome');
});

// landing page ..
Route::get('/',function(){
    return view('auth.login');
})->name('main.page');
// for admin ..
Route::prefix('admin')->middleware('auth')->group(function(){
    // Dashboard ..
    Route::get('/dashboard','pagesController@dashboard')->name('admin.dashboard');
    Route::prefix('customer')->group(function(){
        // create customer ..
        Route::get('/create','pagesController@create_customer')->name('admin.createcustomer');
        // all customers ..
        Route::get('/all','pagesController@customers')->name('admin.customers');
        // end for end ..
    });
    Route::prefix('application')->group(function(){
        Route::get('/','pagesController@applications')->name('admin.applications');
        Route::get('/create','pagesController@create_application')->name('create.applications');
    });
    // settings
    Route::get('/settings','pagesController@settings')->name('admin.settings');
});
Route::get('/logout',function(){
    Auth::logout();
    return redirect(route('main.page'));
})->name('logout');
Auth::routes();
