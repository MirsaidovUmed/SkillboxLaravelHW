@extends('layouts.default')

@section('content')
<div class="start_page">
    <h1>Products Data</h1>
    <div>
        <a href="{{ route('showProductForm') }}" class="create-button">Create New Product</a>
    </div>
</div>

@if($products->isEmpty())
<p>No product data available.</p>
@else
<table class="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Sku</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sku }}</td>
            <td>
                <a href="{{ route('editProductForm', $product->id) }}" class="edit-link button">EDIT</a>
            </td>
            <td>
                <form action="{{route('deleteProduct', $product->id)}}" method="post" class="delete-button">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">DELETE</button>
                </form>
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

    .product-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-table thead {
        background-color: #f4f4f4;
    }

    .product-table th,
    .product-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .product-table th {
        background-color: #f7f7f7;
        color: #333;
    }

    .product-table tr:hover {
        background-color: #f1f1f1;
    }

    .product-table tr:nth-child(even) {
        background-color: #fafafa;
    }

    .product-table a.edit-link {
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

    .product-table a.edit-link:hover {
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