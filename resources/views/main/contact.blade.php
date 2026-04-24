@extends('layout')

@section('content')
    <h3>
        Contact
    </h3>
    <p class="flex color bg-red-50">
        {{$contact['name']}}
        {{$contact['adress']}}
        {{$contact['phone']}}
        {{$contact['email']}}
    </p>
@endsection
