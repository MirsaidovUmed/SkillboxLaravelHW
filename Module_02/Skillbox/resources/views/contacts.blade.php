@extends('layouts.default')

@section('content')
    <h1>Contact Us</h1>
    @if( $email = ' ' )
        <p>Адрес электронной почты не указан</p>
    @else
        <p>{{ $email }}</p>
    @endif
    <p>Post Code: {{ $post_code }}</p>
    <p>Email: {{ $email }}</p>
    <p>Phone: {{ $phone }}</p>
@stop
