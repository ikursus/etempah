<?php

Route::get('/', function () {
    return view('welcome');
});
// Route untuk authentication (Login/Password Reset/Register)
Auth::routes();

Route::get('/dashboard', 'DashboardController@user')->middleware('auth');

// Authentication
Route::group(['middleware' => ['auth', 'role_admin']], function() {

  Route::get('/admin', 'DashboardController@admin');
  Route::get('/home', 'HomeController@index')->name('home');

  /*
   * Route untuk pengurusan Users
   */
  // Route memaparkan senarai users
  Route::get('/users', 'UsersController@index')->name('users.index');
  // Route memaparkan borang tambah user baru
  Route::get('/users/add', 'UsersController@create')->name('users.create');
  // Route untuk memproses borang tambah user baru
  Route::post('/users/add', 'UsersController@store')->name('users.store');
  // Route memaparkan borang edit user
  Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
  // Route memproses borang kemaskini user
  Route::patch('/users/{id}/edit', 'UsersController@update')->name('users.update');
  // Route menghapuskan maklumat user
  Route::delete('/users/{id}', 'UsersController@destroy')->name('users.destroy');

  /*
   * Route untuk pengurusan kenderaan
   */
  // Route memaparkan template senarai users
  Route::get('/kenderaan', 'KenderaanController@index')->name('kenderaan.index');
  // Route datatables senarai users
  Route::get('/kenderaan/datatables', 'KenderaanController@datatables')->name('kenderaan.datatables');
  // Route cari no plat
  // Route::get('/kenderaan/find', 'KenderaanController@show')->name('kenderaan.show');
  // Route export record kenderaan kepada file excel
  Route::get('/kenderaan/export', 'KenderaanController@export')->name('kenderaan.export');
  // Route memaparkan borang tambah user baru
  Route::get('/kenderaan/add', 'KenderaanController@create')->name('kenderaan.create');
  // Route untuk memproses borang tambah user baru
  Route::post('/kenderaan/add', 'KenderaanController@store')->name('kenderaan.store');
  // Route memaparkan borang edit user
  Route::get('/kenderaan/{id}/edit', 'KenderaanController@edit')->name('kenderaan.edit');
  // Route memproses borang kemaskini user
  Route::patch('/kenderaan/{id}/edit', 'KenderaanController@update')->name('kenderaan.update');
  // Route menghapuskan maklumat user
  Route::delete('/kenderaan/{id}', 'KenderaanController@destroy')->name('kenderaan.destroy');

  /*
   * Route untuk pengurusan kenderaan
   */
  // Route memaparkan template senarai permohonan
  Route::get('/permohonan', 'PermohonanController@index')->name('permohonan.index');
  // Route datatables senarai permohonan
  Route::get('/permohonan/datatables', 'PermohonanController@datatables')->name('permohonan.datatables');
  // Route cari no plat
  Route::get('/permohonan/find', 'PermohonanController@show')->name('permohonan.show');
  // Route memaparkan borang tambah permohonan baru
  Route::get('/permohonan/add', 'PermohonanController@create')->name('permohonan.create');
  // Route untuk memproses borang tambah permohonan baru
  Route::post('/permohonan/add', 'PermohonanController@store')->name('permohonan.store');
  // Route memaparkan borang edit permohonan
  Route::get('/permohonan/{id}/edit', 'PermohonanController@edit')->name('permohonan.edit');
  // Route memproses borang kemaskini permohonan
  Route::patch('/permohonan/{id}/edit', 'PermohonanController@update')->name('permohonan.update');
  // Route menghapuskan maklumat permohonan
  Route::delete('/permohonan/{id}', 'PermohonanController@destroy')->name('permohonan.destroy');

});
