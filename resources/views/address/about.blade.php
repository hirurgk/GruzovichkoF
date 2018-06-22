@extends('layouts.app')


@section('content')

<h1>О проекте</h1>

<h2>Сервер (Развёрнут с нуля на VDS)</h2>
<p>
	<b>ОС: </b> Ubuntu 18.04<br>
	<b>ПО:</b> Nginx 1.14.0 + PHP-FPM 7.2 + MySQL 5.7.22<br>
	<b>Фреймворк: </b> Laravel 5.6 + Vue 2.5.7 + WebPack
</p>

<h2>Архитектура</h2>
<p>
	<b>Миграции: </b> /database/migrations/<br>
	<b>Маршруты: </b> /routes/web.php<br>
	<b>Модель: </b> /app/Log.php<br>
	<b>Контроллер: </b> /app/Http/Controllers/AddressController.php<br>
	<b>Отображения: </b> /resources/views/<br>
	<b>Компонент Vue: </b> /resources/assets/js/components/AddressComponent.vue<br>
	<b>phpMyAdmin для удобства: </b> <a href="/pma/" target="_blank">/pma/</a><br>
	<b>Логирование записей: </b> Таблица logs
</p>

<h2>Масштабирование</h2>
<p>
	Необходимо кешировать запросы-ответы в Redis, например.<br>
	Чтобы не потерять данные, желательно их также записывать в другую базу на диске, которую выгружать в Redis при старте сервера.<br>
	Для клиентской стороны уже реализована задержка по времени на ввод с клавиатуры, чтобы запросы не уходили при быстром наборе с клавиатуры.<br>
	Разумеется, необходим грамотный подбор железа и настройка ПО.
</p>

@endsection