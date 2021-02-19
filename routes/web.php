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


Auth::routes(['verify'=>true]);


Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


//AUth protected routes
Route::middleware(['web', 'auth'])->group(function () {
    //Home
    Route::get('/home/', 'HomeController@index')->name('home.index');
    
    
    //Profile
     Route::get('/profile/update', 'ProfileController@update')->name('profile.update');
     Route::post('/profile/update', 'ProfileController@write')->name('profile.write');
     Route::post('/profile/verify/mobile', 'ProfileController@sendOtp')->name('profile.verify.mobile');
    
    
    //Property
     Route::get('/property/new', 'PropertyController@create')->name('property.new');
     Route::get('/property/edit/{PropertyID}/', 'PropertyController@edit')->name('property.edit');
     Route::post('/property/create', 'PropertyController@write')->name('property.write');
     Route::post('/property/list', 'PropertyController@list')->name('property.list');
     Route::post('/property/delete', 'PropertyController@delete')->name('property.delete');
     Route::post('/property/publish', 'PropertyController@publish')->name('property.publish');
     
     
   

    //posts/{post}/comments/{comment}
    
    
    
    
    
    
});

//No Auth required
Route::get('/', 'HomeController@landing')->name('welcome');
Route::get('/listing', 'PropertyController@listing')->name('property.listing');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{blogUri}/', 'BlogController@read')->name('blog.read'); 
Route::get('/blog/bnv/1', 'BlogController@write')->name('blog.write');
Route::post('/blog/list', 'BlogController@list')->name('blog.list');
Route::post('/property/search', 'PropertyController@search')->name('property.search');
Route::get('/property/view/{propertyUri}/', 'PropertyController@view')->name('property.view');
Route::post('/property/view/kaziyetu/', 'PropertyController@kaziyetu')->name('property.kazi');
Route::get('/property/view/agent/{agentUri}/', 'PropertyController@agent')->name('property.agent');
Route::post('/newsletter/subscribe', 'HomeController@newsletter')->name('home.newsleter');



Route::get('/privacy/', 'PrivacyController@index')->name('privacy.index');
Route::get('/privacy/data', 'PrivacyController@data')->name('privacy.data');