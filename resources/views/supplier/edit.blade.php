@extends('main')

<title>Editar Proveedor</title>
@section('content')

<supplier-edit :supplier_id="{{$supplier_id}}"></supplier-edit>

@endsection