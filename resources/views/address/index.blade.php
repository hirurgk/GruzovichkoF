@extends('layouts.app')


@section('content')

<h1>Поиск адреса</h1>

<address-component minaddresslength="{{$minAddressLength}}"></address-component>

@endsection