@extends('layouts.default')

@section('content')
<div class="start_page">
    <h1>Users Data</h1>
    <div>
        <a href="{{ route('showUserForm') }}" class="create-button">Create New User</a>
    </div>
</div>

@if($users->isEmpty())
<p>No user data available.</p>
@else
<table class="user-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>PDF</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('getUsersPDF', $user->id) }}" class="pdf-button">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF" class="pdf-icon">
                </a>
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

    .start_page {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .create-button {
        display: inline-block;
        padding: 10px 20px;
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

    .create-button:hover {
        background-color: #2779bd;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .user-table thead {
        background-color: #f4f4f4;
    }

    .user-table th,
    .user-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .user-table th {
        background-color: #f7f7f7;
        color: #333;
    }

    .user-table tr:hover {
        background-color: #f1f1f1;
    }

    .user-table tr:nth-child(even) {
        background-color: #fafafa;
    }

    .pdf-button {
        display: inline-block;
        padding: 8px 16px;
        background-color: #ff5722;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .pdf-button:hover {
        background-color: #e64a19;
    }

    .pdf-icon {
        width: 20px;
        height: 20px;
        vertical-align: middle;
    }
</style>
