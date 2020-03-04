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
// Route::get('/', function () {
//     return view('front.index');
// });

Route::get('/', 'User\FrontController@index');


Auth::routes(['verify' => true]);
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    // Sidebar Controller
    Route::get('/sidebar', 'SidebarController@index');
    Route::get('sidebar/create', 'SidebarController@create');
    Route::get('sidebar/update/{id}', 'SidebarController@update');
    Route::post('sidebar/save', 'SidebarController@save');
    Route::get('sidebar/delete/{id}', 'SidebarController@delete');
    
    // Kamar Controller
    Route::get('/kamar', 'KamarController@index');
    Route::get('kamar/create', 'KamarController@create');
    Route::get('kamar/update/{id}', 'KamarController@update');
    Route::post('kamar/save', 'KamarController@save');
    Route::get('kamar/delete/{id}', 'KamarController@delete');
    Route::get('kamar/approve/{id}', 'KamarController@approve');

    // Location Controller
    Route::get('/location', 'LocationController@index');
    Route::get('location/create', 'LocationController@create');
    Route::get('location/update/{id}', 'LocationController@update');
    Route::post('location/save', 'LocationController@save');
    Route::get('location/delete/{id}', 'LocationController@delete');
    Route::get('location/approve/{id}', 'LocationController@approve');
    
    // Location Detail
    Route::post('location-detail/create', 'LocationDetailController@createDetail');
    Route::get('location-detail/delete/{id}', 'LocationDetailController@deleteDetail');



    // Profile
    Route::get('/myprofile', 'User\ProfileController@index');
    Route::get('/myprofile/change-image', 'User\ProfileController@updateimage');
    Route::post('/myprofile/change-image', 'User\ProfileController@saveupdateimage');
    Route::get('/myprofile/update/', 'User\ProfileController@update');
    Route::post('/myprofile/save/', 'User\ProfileController@save');


    // Transaction
    Route::get('/mydashboard', 'User\TransactionController@dashboard');
    
    // Jenis Kamar
    Route::get('/jeniskamar', 'User\TransactionController@jeniskamar');
    Route::get('/jeniskamar/{id}', 'User\TransactionController@detailkamar');
    // Status Kamar
    Route::get('/statuskamar', 'User\TransactionController@StatusKamar');
});
