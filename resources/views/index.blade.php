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
                    <span class="text-c-blue f-w-600"><h4>Ventas (192)</h4></span>
                    <h4>$3500</h4>
                    <div class="pt-2">
                        <span class="f-left m-t-10 text-muted">
                            <a href="{{route('sales.index')}}" class="text-c-blue"><i class="text-c-blue f-16 icofont icofont-calendar m-r-10"></i>Esta
                                semana</a>
                        </span>
                        <div class="icon-btn plus-icon plus-icon-primary">
                            <a href="{{route('sales.basket')}}" class="btn btn-primary btn-outline-primary btn-icon"><i class="icofont icofont-plus "></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-4 location-style">
            <div class="card widget-card-1">
                <div class="card-block-small">
                <i class="icofont icofont-location-pin bg-danger card1-icon"></i>
                    <span class="text-danger f-w-600"><h4>Ubicación</h4></span>
                    <h4>$553</h4>
                    <div class="pt-2">
                        <span class="f-left m-t-10 text-muted">
                            <a href="location" class="text-danger"><i class="text-danger f-16 icofont icofont-external-link m-r-10"></i>Ver
                                más</a>
                        </span>
                        <div class="icon-btn plus-icon plus-icon-success">
                            <a href="location/create" class="btn btn-danger btn-outline-danger btn-icon"><i class="text-red icofont icofont-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-xl-4">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-food-basket bg-c-green card1-icon"></i>
                    <span class="text-c-green f-w-600"><h4>Productos</h4></span>
                    <h4>84,568</h4>
                    <div class="pt-2">
                        <span class="f-left m-t-10 text-muted">
                            <a href="{{route('products.index')}}" class="text-success"><i class="text-c-green f-16 icofont icofont-external-link m-r-10"></i>Ver
                                más</a>
                        </span>
                        <div class="icon-btn plus-icon plus-icon-success">
                            <a href="{{route('products.create')}}" class="btn btn-success btn-outline-success btn-icon"><i class=" icofont icofont-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<style scoped>
    
    
</style>

@endsection