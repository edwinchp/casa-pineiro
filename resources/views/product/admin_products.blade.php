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
                                        <td>${{ $product->cp_price }}</td>
                                        <td>${{ $product->te_price }}</td>
                                        <td><img src="{{ $product->picture_1 }}" alt="" width="50px"></td>
                                        <td>
                                            <button class="btn btn-success"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-success"><i class="fas fa-cart-plus"></i></button>
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
