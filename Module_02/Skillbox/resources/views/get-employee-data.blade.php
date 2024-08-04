@extends('layouts.default')

@section('content')
    <h1>Employee Data</h1>

    @if($employees->isEmpty())
        <p>No employee data available.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Address</th>
                    <th>Work Data</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
