<?php

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

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () { return 'not aduite';
})->name('Not.adult');

Route::get('/redirect/{service}','SocialController@redirect');
Route::get('/callback/{service}','SocialController@callback');


Route::get('fillable','CrudController@getOffer');
Route::group(['middleware'=>'auth'],function() {

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ], function () {
        Route::group(['prefix' => 'offers'], function () {

            Route::get('create', 'CrudController@create');
            Route::post('store', 'CrudController@store')->name('offers.store');

            Route::get('edit/{offer_id}', 'CrudController@editOffer');
            Route::post('update/{offer_id}', 'CrudController@updateOffer')->name('offers.update');
            Route::get('delete/{offer_id}', 'CrudController@delete')->name('offers.delete');

            Route::get('all', 'CrudController@getAlloffers')->name('offers.all');

        });

      
    });
    Route::get('youtube', 'CrudController@getVideo')->middleware('auth');

});

################## BEgin Ajax routes ######################

Route::group(['prefix'=>'ajax-offers'],function(){
Route::get('create','OfferController@create');
Route::post('store','OfferController@store')->name('ajax.offers.store');
Route::get('all','OfferController@all')->name('ajax.offers.all');
Route::post('delete','OfferController@delete')->name('ajax.offers.delete');
Route::get('edit/{offer_id}','OfferController@edit')->name('ajax.offers.edit');
Route::post('updata','OfferController@updata')->name('ajax.offers.updata');


});


################## end Ajax routes #######################


################## Authentiction &&  Guards######################
Route::group(['middleware'=>'checkAge','namespace'=>'Auth'],function(){

Route::get('adults','CustomAuthController@adualt')->name('adualt');
});

Route::get('site','Auth\CustomAuthController@site')->middleware('auth:web')->name('site');
Route::get('admin','Auth\CustomAuthController@admin')->middleware('auth:admin')->name('admin');

Route::get('admin/login','Auth\CustomAuthController@adminlogin')->name('admin.login');

Route::post('admin/login','Auth\CustomAuthController@checkadminlogin')->name('save.admin.login');


################## end Authentiction &&  Guards######################

 ###################### relations   one to one Route ###################
Route::get('has-one','Relation\RelationsController@hasoneRelation');
Route::get('has-one_reverse','Relation\RelationsController@hasoneRelationReverse');
Route::get('has-user-phone','Relation\RelationsController@getuserhasphone');
Route::get('has-not-phone','Relation\RelationsController@getusernothasphone');

 ######################end relations ###################


 
 ###################### relations   one to many Route ###################
Route::get('hospital-has-many','Relation\RelationsController@getHosptaiDoctor');
Route::get('hospitals','Relation\RelationsController@hospitals');
Route::get('doctors/{hostpitalid}','Relation\RelationsController@doctors')->name('hospital.doctors');
Route::get('hospitals/{hostpitalid}','Relation\RelationsController@deleteHospital')->name('hospital.delete');

Route::get('hospitals_has_doctors','Relation\RelationsController@hospitalsHasDoctor');

Route::get('hospitals_has-male','Relation\RelationsController@hospitalsHasMale');

Route::get('hospitals_not_has','Relation\RelationsController@hospitalsNotHasDoctor');

 ######################end relations ###################
