@extends('main')

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-1">
            <div class="card-header  d-flex">
                <div class="p-2 bd-highlight">
                    <h6 class="m-3 font-weight-bold text-primary">Todos los productos</h6>
                </div>

                <div class="p-2 py-3">
                <div class="input-group">
                    <input type="text" id="search-products" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
                </div>

                <div class="ml-auto p-2 py-3 bd-highlight">
                    <a href="{{route('products.create')}}" class="btn btn-primary">
                        <span class="text">Nuevo</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Casa Pineiro</th>
                                <th>Tendejón Evelyn</th>
                                <th>Imagen</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td><strong>${{ $product->cp_price }}</strong> ({{$product->qty}} disponibles)</td>
                                <td><strong>${{ $product->te_price }}</strong> ({{$product->qty}} disponibles)</td>
                                <td><img src="{{ URL::to($product->getMainPicture()) }}" alt="" width="50px"></td>
                                <td>
                                    <a class="btn btn-success btn-circle" href="/products/{{$product->id}}/edit"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>



@endsection