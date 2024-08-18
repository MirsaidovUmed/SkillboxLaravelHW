@extends('layouts.default')

@section('content')
    <h1>Edit Product</h1>

    <form name="edit-product-form" id="edit-product-form" action="{{ route('updateProduct', $product->id) }}" method="POST">
        {{ csrf_field() }}
        
        <div style="display: flex; flex-direction: column; gap: 10px; justify-content: space-between; width: 250px;">
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="sku">Sku</label>
                <input type="text" name="sku" id="sku" class="form-control" value="{{ $product->sku }}" required="true">
            </div>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
