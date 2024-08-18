@extends('layouts.default')

@section('content')
    <form name="product-form" id="product-form" action="{{ route('createProduct')}}" method="POST">
        {{ csrf_field() }}

        <div style="display: flex; flex-direction: column;gap: 10px; justify-content: space-between; width: 250px;">
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required="true">
            </div>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <label for="sku">Sku</label>
                <input type="text" name="sku" id="sku" class="form-control" required="true">
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
