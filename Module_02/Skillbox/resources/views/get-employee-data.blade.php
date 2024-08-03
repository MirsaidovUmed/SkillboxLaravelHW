@extends('layouts.default')

@section('content')
    <h1>Get employee data</h1>
    <h1>Employee Data</h1>
    <p>ID: {{ $id }}</p>
    <p>Name: {{ $name }}</p>
    <p>Surname: {{ $surname }}</p>
    <p>Email: {{ $email }}</p>
    <p>Position: {{ $position }}</p>
    <p>Address: {{ $address }}</p>
    <p>Work Data: {{ $workData }}</p>
@endsection
