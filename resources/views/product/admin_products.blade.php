@extends('main')


@section('content')
    <div class="row">
        <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
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
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Casa Pineiro</th>
                                    <th>Tendejón Evelyn</th>
                                    <th>Imagen</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td><strong>${{ $product->cp_price }}</strong> ({{$product->cp_qty}} disponibles)</td>
                                        <td><strong>${{ $product->te_price }}</strong> ({{$product->te_qty}} disponibles)</td>
                                        <td><img src="{{ URL::to($product->getPicture1()) }}" alt="" width="50px"></td>
                                        <td>
                                        <a class="btn btn-success" href="/products/{{$product->id}}/edit"><i class="far fa-edit"></i></a>
                                            <a class="btn btn-success"><i class="fas fa-cart-plus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection
