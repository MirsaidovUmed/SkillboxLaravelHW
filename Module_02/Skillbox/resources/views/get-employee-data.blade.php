@extends('layouts.default')

@section('content')
    <h1>Employee Data</h1>

    @if($employees->isEmpty())
        <p>No employee data available.</p>
    @else
        <table class="employee-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Address</th>
                    <th>Work Data</th>
                    <th>EDIT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->surname }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->workData }}</td>
                        <td>
                            <a href="{{ route('editForm', $employee->id) }}" class="edit-link button">EDIT</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .employee-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .employee-table thead {
        background-color: #f4f4f4;
    }

    .employee-table th, .employee-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .employee-table th {
        background-color: #f7f7f7;
        color: #333;
    }

    .employee-table tr:hover {
        background-color: #f1f1f1;
    }

    .employee-table tr:nth-child(even) {
        background-color: #fafafa;
    }

    .employee-table a.edit-link {
        display: inline-block;
        padding: 8px 16px;
        margin: 4px 0;
        font-size: 14px;
        color: #fff;
        background-color: #3490dc;
        border: none;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .employee-table a.edit-link:hover {
        background-color: #2779bd;
    }
</style>
