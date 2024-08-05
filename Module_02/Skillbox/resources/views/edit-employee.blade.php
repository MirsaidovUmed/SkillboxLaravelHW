@extends('layouts.default')

@section('content')
    <h1>Edit Employee</h1>

    <form name="edit-employee-form" id="edit-employee-form" action="{{ route('updateForm', $employee->id) }}" method="POST">
        {{ csrf_field() }}
        
        <div style="display: flex; flex-direction: column; gap: 10px; justify-content: space-between; width: 250px;">
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ $employee->surname }}" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ $employee->position }}" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $employee->address }}" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="workData">Work Data</label>
                <textarea name="workData" class="form-control" required="true">{{ $employee->workData }}</textarea>
            </div>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
