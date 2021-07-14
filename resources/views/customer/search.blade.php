@extends('main')


@section('content')
<div class="row">
    <div class="col-md-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                <div class="input-group">
                    <input type="text" id="search-products" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
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

                        <tbody id="product-rows">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</div>

@endsection