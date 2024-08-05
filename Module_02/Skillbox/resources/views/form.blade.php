@extends('layouts.default')

@section('content')
    <form name="employee-form" id="employee-form" action="{{ route('storeForm')}}" method="POST">
        {{ csrf_field() }}

        <div style="display: flex; flex-direction: column;gap: 10px; justify-content: space-between; width: 250px;">
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="workData">WorkData</label>
                <textarea name="workData" class="form-control" required="true"></textarea>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
