<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\Admin\SecondController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAge;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Create;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;

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
##############################################################################
Route::get('/', function () {
    // $data=['age'=> 28, 'name'=>'majd'];
    // $data=[];
    // $data=['age'] = 28;
    // $data=['name'] = 'majd';
    return view('welcome');
});
##############################################################################
##############################################################################
// Route::get('test',function(){
//     return view('test');
// });
##############################################################################
// Route::get('/landing', function () {
//     return view('landing');
// });
##############################################################################
Route :: group(['namespace' => 'Admin'], function(){
    Route :: get('second0', 'SecondController@showString0');
    Route :: get('second1', 'SecondController@showString1');
    Route :: get('second2', 'SecondController@showString2');
    Route :: get('second3', 'SecondController@showString3');
    Route :: get('second4', 'SecondController@showString4');
});
##############################################################################
// Route :: get('login',function(){
//         return 'must be login to access this route';
//     }) -> name('login');
##############################################################################
// Route::get('index','Admin\SecondController@getIndex');
##############################################################################
// Auth::routes();
Auth::routes(['verify'=> true]);
##############################################################################
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
##############################################################################
// Route::get('/home','HomeController@index')->name('home') -> middleware('verified');
Route::get('/home','HomeController@index')->name('home') -> middleware('auth');
##############################################################################
// Route :: group(['prefix' => 'offers'], function(){
//     Route :: get('create', 'CrudController@create')-> name('offers.create') ;
//     Route :: post('store', 'CrudController@store') -> name('offers.store') ;
//         Route :: get('second2', 'CrudController@showString2');
//         Route :: get('second3', 'CrudController@showString3') ;
//         Route :: get('second4', 'CrudController@showString4');
//     });
##############################################################################
// Route :: group(['prefix' => LaravelLocalization::setLocale(),
//     'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
// ],function(){
//     Route :: group(['prefix' => 'offers'], function(){
//         Route::get('create', 'CrudController@Create')->name('offers.create');
//         Route::post('store', 'CrudController@store')->name('offers.store');
//         Route::get('edit/{id} ', 'CrudController@edit')->name('offers.edit');
//         Route::post('update/{offer_id}', 'CrudController@update')->name('offers.update');
//         Route::get('all','CrudController@getalloffers')->name('offers.all');
//     });
// Route:: get('youtube' , 'YoutubeController@getVideo') -> name('getVideo');
// });    
##############################################################################
########################## BEGIN Ajax Routes #################################
Route :: group(['prefix' => 'ajax-offers'], function(){
    Route::get('create' , 'OfferController@create')-> name('ajaxoffers.create');
    Route::post('store' , 'OfferController@store')-> name('ajaxoffers.store');
});
########################## END Ajax Routes ###################################
########################## Athentication middleware and Guards ##############################
Route :: group(['middleware' =>['auth','CheckAge'], 'namespace' => 'Auth'], function(){
    Route::get('adults','CustomAuthController@adult') -> name('adult');
});
// Route::group(['middleware' => 'auth','namespace' => 'Auth'], function () {
    //     Route::get('adults', 'CustomAuthController@adualt')-> name('adult');
    // });
########################## End Athentication middleware and Guards ##########################
route::get('notadult',function(){
    return 'you must be older than 18';
})->name('not.adult');
##############################################################################
Route::group(['namespace' => 'Auth'], function(){
    Route::get('site'  , 'CustomAuthController@site')-> middleware('auth:web') -> name('site');
    Route::get('admin' , 'CustomAuthController@admin')-> middleware('auth:admin') -> name('admin');
    Route::get('admin/login' , 'CustomAuthController@adminLogin')-> name('admin.login');
    Route::post('saveAdmin/login' , 'CustomAuthController@checkAdminLogin')-> name('save.admin.login');
});
##############################################################################