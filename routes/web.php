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

// if this was auth'd I'd use a route filter (or middleware) on the admin group 
Route::prefix('/admin')->group(function () {

	Route::get('/', function(Request $request) {
		return view('app/dashboard');
	})->name('dashboard');

	Route::prefix('/customers')->group(function () {
		/*
			This is HTML, not an API so we're not doing any fancy __METHOD PUT,PATCH,DELETE requests
			though it is possible to do and may help transition/compatibility with a future api implementation
		*/
		Route::get('/', 'CustomersController@getIndex')->name('customers');
		Route::get('/{id}', 'CustomersController@getView')->name('customers.view')->where('id', '[0-9]+');

		Route::get('/create', 'CustomersController@getCreate')->name('customers.create');
		Route::post('/create', 'CustomersController@postInsert')->name('customers.insert');

		Route::get('/edit', 'CustomersController@getEdit')->name('customers.edit');
		Route::post('/edit', 'CustomersController@postUpdate')->name('customers.update');

		Route::post('/{id}/delete', 'CustomersController@postDelete')->name('customers.delete')->where('id', '[0-9]+');

	});

});
