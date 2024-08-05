@extends('layouts.default')

@section('content')
    <h1>Welcome to Home Page</h1>
    <p>Name: {{ $name }}</p>
    @if( $age > 18 )
        <p>{{ $age }}</p>
    @else
        <p>Пользователь слишком молод</p>
    @endif
    <p>Position: {{ $position }}</p>
    <p>Address: {{ $address }}</p>
@endsection
