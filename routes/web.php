<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FacebookController;


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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify'=>true]);


Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


//AUth protected routes
Route::middleware(['web', 'auth'])->group(function () {
    //Home
    Route::get('/home', 'HomeController@index')->name('home');
    
    
    //Profile
     Route::get('/profile/update', 'ProfileController@update')->name('profile.update');
     Route::post('/profile/update', 'ProfileController@write')->name('profile.write');
     Route::post('/profile/verify/mobile', 'ProfileController@sendOtp')->name('profile.verify.mobile');
    
   

    //posts/{post}/comments/{comment}
    
    
    
    
    
    
});

//No Auth required
Route::get('/blog', 'BlogController@index')->name('blog.index');



Route::get('/privacy/', 'PrivacyController@index')->name('privacy.index');
Route::get('/privacy/data', 'PrivacyController@data')->name('privacy.data');