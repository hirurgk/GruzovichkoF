<?php
//Главная страница
Route::get('/', 'AddressController@index');

//Запрос адресов
Route::get('/get-address', 'AddressController@getAddress');


//Описание проекта
Route::get('/about', function() {
	return view('address.about');
});