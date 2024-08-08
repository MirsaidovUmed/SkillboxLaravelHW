@extends('layouts.default')

@section('content')
<div class="start_page">
    <h1>Book Data</h1>
    <div>
        <a href="{{ route('showModule6') }}" class="create-button">Add New Book</a>
    </div>
</div>

@if($books->isEmpty())
<p>No book data available.</p>
@else
<table class="book-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->genre }}</td>
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
    .start_page
    {
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

    .book-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .book-table thead {
        background-color: #f4f4f4;
    }

    .book-table th,
    .book-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .book-table th {
        background-color: #f7f7f7;
        color: #333;
    }

    .book-table tr:hover {
        background-color: #f1f1f1;
    }

    .book-table tr:nth-child(even) {
        background-color: #fafafa;
    }

    .book-table a.edit-link {
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

    .book-table a.edit-link:hover {
        background-color: #2779bd;
    }

    .delete-button {
        display: inline-block;
        padding: 8px 16px;
        margin: 4px 0;
        font-size: 14px;
        background-color: #e3342f;
        border: none;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .delete-button button {
        background: none;
        border: none;
        color: #fff;
    }

    .delete-button:hover {
        background-color: #cc1f1a;
    }
</style>