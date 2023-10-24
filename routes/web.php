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

// client side ..
Route::prefix('client')->middleware('client')->group(function(){
    Route::get('/hello',function(){
        return "Welcome Client";
    });
});

// for admin ..
Route::prefix('admin')->middleware('auth')->group(function(){
    // Dashboard ..
    Route::get('/dashboard','pagesController@dashboard')->name('admin.dashboard');
    Route::prefix('customer')->group(function(){
        // create customer ..
        Route::get('/create','pagesController@create_customer')->name('admin.createcustomer');
        // for save customer ..
        Route::post('/save','pagesController@save')->name('save.customer');
        // all customers ..
        Route::get('/all','pagesController@customers')->name('admin.customers');
        // end for end ..
        Route::get('/delete/{id}','pagesController@salman')->name('delete.customer');
        Route::get('/edit/{id}','pagesController@edit_salman')->name('edit.customer');
        Route::get('/update/{id}','pagesController@update_salman')->name('update.customer');
        Route::get('/applicatoins/{id}','pagesController@customer')->name('customer.applications');
    });
    Route::prefix('application')->group(function(){
        Route::get('/','pagesController@applications')->name('admin.applications');
        Route::get('/create','pagesController@create_application')->name('create.applications');
        Route::post('/submissoin','pagesController@submit_applicaiton')->name('submit.application');
    });
    // settings
    Route::get('/settings','pagesController@settings')->name('admin.settings');
});
Route::get('/logout',function(){
    Auth::logout();
    return redirect(route('main.page'));
})->name('logout');
Auth::routes();
