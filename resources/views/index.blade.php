@extends('main')

@section('content')

@if ($accessToken)
<div style="display: none;">
    <?php echo "<script>document.write(localStorage.setItem('user_token', '" . $accessToken . "'))</script>"; ?>
</div>
@endif

<div class="page-body">
    <div class="row">
        <div class="col-md-4 col-xl-4 col-xl-offset-6">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-money icofont-4x bg-c-blue card1-icon"></i>
                    <span class="text-c-blue f-w-600">Ventas (192)</span>
                    <h4>$3500</h4>
                    <div class="pt-2">
                        <span class="f-left m-t-10 text-muted">
                            <a href="{{route('sales.index')}}" class="text-c-blue"><i class="text-c-blue f-16 icofont icofont-calendar m-r-10"></i>Esta
                                semana</a>
                        </span>
                        <div class="icon-btn plus-icon plus-icon-primary">
                            <a href="#" class="btn btn-primary btn-outline-primary btn-icon"><i class="icofont icofont-plus "></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-users-alt-5 bg-c-green card1-icon"></i>
                    <span class="text-c-green f-w-600">Clientes (129)</span>
                    <h4>$553</h4>
                    <div class="pt-2">
                        <span class="f-left m-t-10 text-muted">
                            <a href="{{route('customer.index')}}" class="text-c-green"><i class="text-c-green f-16 icofont icofont-external-link m-r-10"></i>Ver
                                más</a>
                        </span>
                        <div class="icon-btn plus-icon plus-icon-success">
                            <a href="{{route('customer.create')}}" class="btn btn-success btn-outline-success btn-icon"><i class="icofont icofont-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-xl-4">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-food-basket bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600">Productos</span>
                    <h4>84,568</h4>
                    <div class="pt-2">
                        <span class="f-left m-t-10 text-muted">
                            <a href="{{route('products.index')}}" class="text-c-yellow"><i class="text-c-yellow f-16 icofont icofont-external-link m-r-10"></i>Ver
                                más</a>
                        </span>
                        <div class="icon-btn plus-icon plus-icon-warning">
                            <a href="{{route('products.create')}}" class="btn btn-warning btn-outline-warning btn-icon"><i class="icofont icofont-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ventas</h5>
                    <div class="card-header-left ">
                    </div>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i>
                            </li>
                            <li><i class="icofont icofont-minus minimize-card"></i>
                            </li>
                            <li><i class="icofont icofont-refresh reload-card"></i>
                            </li>
                            <li><i class="icofont icofont-error close-card"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div id="line-example"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection