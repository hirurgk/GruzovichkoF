<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
	Illuminate\Http\Response,
	App\Log;

class AddressController extends Controller
{
	//Ключ API Яндекс
	const API_GOOGLE_KEY = 'AIzaSyBAxX7szY6V0YJFY_E_5LkeXuTFvHB7qpA';

	//Сколько адресов отдавать в представление
	const COUNT_RESULTS = 6;

	//Количество символов в строке для отправки запроса
	const MIN_ADDRESS_LENGTH = 3;


    public function index()
	{
		return view('address.index', [
			'minAddressLength' => self::MIN_ADDRESS_LENGTH
		]);
	}
	

	public function getAddress(Request $request)
	{
		$address = $request->input('address');

		if (mb_strlen($address) < self::MIN_ADDRESS_LENGTH)
			return [];


		//Получим места из Гугла
		$arPlaces = file_get_contents('https://maps.googleapis.com/maps/api/place/autocomplete/json' .
			'?input=' . urlencode($address) .
			'&language=ru' .
			'&key=' . self::API_GOOGLE_KEY
		);
		$arPlaces = json_decode($arPlaces, true);


		//Соберём массив адресов из ответа Гугла
		$arAddress = [];
		$i = 0;
		foreach ($arPlaces['predictions'] as $arPlace) {
			if ($i >= self::COUNT_RESULTS)
				break;

			$arAddress[] = $arPlace['description'];

			$i++;
		}


		//Логируем в базу
		$log = new Log();
		$log->ip = $request->ip();
		$log->request = $address;
		$log->response = print_r($arAddress, true);
		$log->save();


		return $arAddress;
	}
}
