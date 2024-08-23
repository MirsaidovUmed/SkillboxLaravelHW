@extends('layouts.default')

@section('content')
    <form name="employee-form" id="employee-form" action="{{ route('sendEmail')}}" method="POST">
        @csrf
        <div style="display: flex; flex-direction: column;gap: 10px; justify-content: space-between; width: 250px;">
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required="true">
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
