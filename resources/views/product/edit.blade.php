@extends('main')
<title>Editar Producto</title>
@section('content')

@if (count($errors) > 0)
<div class="card mb-4 py-1 border-left-danger">
    <div class="card-body">
        <h3>Errores</h3>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif



    <product-edit-form product_id="{{$product->id}}"></product-edit-form>

   

<!-- <style>
    @media screen and (max-width: 700px) {
        .checkbox-product {
            padding: 2em;
        }

    }
</style> -->





@endsection