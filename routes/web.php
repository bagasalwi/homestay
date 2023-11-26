<?php

Auth::routes(['verify' => true]);


Route::get('/', 'User\FrontController@index')->name('home');
Route::get('/tentang-kamar', 'User\FrontController@tentangkamar')->name('tentangkamar');

// lokasi front
Route::prefix('jenis-kamar')->group(function () {
    Route::get('/', 'User\FrontKamarController@pilihjenis')->name('jeniskamar');
    Route::get('/{id}', 'User\FrontKamarController@pilihkamar');
    Route::get('/detail/{lokasi}', 'User\FrontKamarController@kamar_detail');
});

// lokasi front
Route::prefix('lokasi')->group(function () {
    Route::get('/', 'User\FrontLokasiController@lokasi')->name('lokasi');
    Route::get('/{lokasi}', 'User\FrontLokasiController@lokasi_detail');
});


Route::get('/dashboard', 'DashboardController@index')->name('home');

/************* BACKEND **************/
Route::group(['middleware' => 'auth'], function() {

    // User Controller
    Route::prefix('user')->group(function () {
        // User/....
        Route::get('/', 'UserController@index');
        Route::get('show/{id}', 'UserController@show');
    });

    // Sidebar Controller
    Route::prefix('sidebar')->group(function () {
        // sidebar/....
        Route::get('/', 'SidebarController@index');
        Route::get('create', 'SidebarController@create');
        Route::get('update/{id}', 'SidebarController@update');
        Route::post('save', 'SidebarController@save');
        Route::get('delete/{id}', 'SidebarController@delete');
    });

    // JenisKamar Controller
    Route::prefix('jeniskamar')->group(function () {
        // jeniskamar/....
        Route::get('/', 'JenisKamarController@index');
        Route::get('create', 'JenisKamarController@create');
        Route::get('update/{id}', 'JenisKamarController@update');
        Route::post('save', 'JenisKamarController@save');
        Route::get('delete/{id}', 'JenisKamarController@delete');
    });

    // Location
    Route::prefix('location')->group(function () {
        // location/....
        Route::get('/', 'LocationController@index');
        Route::get('create', 'LocationController@create');
        Route::get('update/{id}', 'LocationController@update');
        Route::post('save', 'LocationController@save');
        Route::get('delete/{id}', 'LocationController@delete');
    });

    // Location Detail
    Route::prefix('location-detail')->group(function () {
        // location-detail/....
        Route::post('create', 'LocationDetailController@createDetail');
        Route::get('delete/{id}', 'LocationDetailController@deleteDetail');
    });

    // Kamar Controller
    Route::prefix('kamar')->group(function () {
        // kamar/....
        Route::get('/', 'KamarController@index');
        Route::get('create', 'KamarController@create');
        Route::get('update/{id}', 'KamarController@update');
        Route::post('save', 'KamarController@save');
        Route::get('delete/{id}', 'KamarController@delete');
    });

    // Kamar Detail
    Route::prefix('kamar-detail')->group(function () {
        // kamar-detail/....  
        Route::post('create', 'KamarDetailController@createDetail');
        Route::get('delete/{id}', 'KamarDetailController@deleteDetail');
    });

    

    // Pesanan
    Route::prefix('pesanan')->group(function () {
        // location/....
        Route::get('/', 'PesananController@index');
        Route::get('edit/{id}', 'PesananController@edit');
        Route::get('void/{id}', 'PesananController@create');
        Route::get('approve/{id}', 'PesananController@approve');
    });

    /*****************/
    /** TRANSACTION **/
    /*****************/
    
    // Myprofile
    Route::prefix('myprofile')->group(function () {
        // myprofile/....
        Route::get('/', 'User\ProfileController@index');
        Route::get('change-image', 'User\ProfileController@updateimage');
        Route::post('change-image', 'User\ProfileController@saveupdateimage');
        Route::get('update', 'User\ProfileController@update');
        Route::post('save', 'User\ProfileController@save');
    });
 
    // Transaction
    Route::get('/mydashboard', 'User\TransactionController@dashboard');
    Route::post('/pesankamar', 'User\TransactionController@PesanKamar');
    Route::post('/pesankamartanggal', 'User\TransactionController@TentukanTanggal');
    Route::post('/konfirmasipembayaran', 'User\TransactionController@KonfirmasiPembayaran');
    Route::get('/bayarkamar/{id}', 'User\TransactionController@BayarKamar')->middleware('CekTanggal');
    Route::get('/cancelkamar/{id}', 'User\TransactionController@CancelKamar');
    Route::get('/perpanjang/{id}', 'User\TransactionController@PerpanjangKamar');
    
    // Status Kamar
    Route::get('/statuskamar', 'User\TransactionController@StatusKamar');
    Route::get('/list-transaksi', 'User\TransactionController@TransaksiList');
    Route::get('/list-transaksi/{id}', 'User\TransactionController@TransaksiListDetail');
});
