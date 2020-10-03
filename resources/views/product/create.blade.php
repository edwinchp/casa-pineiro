@extends('main')

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

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <!--Name-->
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name">
        </div>
    </div>

    <!--Brand and prices-->
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="bar_code">Código de barras</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                </div>
                <input type="text" class="form-control" name="bar_code">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" name="brand">
        </div>
    </div>

    <!--Barcode and Quantity-->
    <div class="row">
        <div class="col-md-6">
            <h4>Casa Pineiro</h4>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" name="cp_price">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qty">Cantidad</label>
                        <input type="text" class="form-control" name="cp_qty">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="offer_price">Precio de oferta</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    $
                                </span>
                            </div>
                            <input type="text" class="form-control" name="cp_offer_price">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="offer_duration">Días en oferta</label>
                        <input type="text" class="form-control" name="cp_offer_duration">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h4>Tendejón Evelyn</h4>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" name="te_price">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qty">Cantidad</label>
                        <input type="text" class="form-control" name="te_qty">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="offer_price">Precio de oferta</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    $
                                </span>
                            </div>
                            <input type="text" class="form-control" name="te_offer_price">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="offer_duration">Días en oferta</label>
                        <input type="text" class="form-control" name="te_offer_duration">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Description-->
    <div class="form-row">
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="" cols="40" rows="5" class="form-control"></textarea>
        </div>
    </div>

    <hr>

    <!--Delivery options-->
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="location">Ubicación</label>
            <input type="text" class="form-control" name="location">
        </div>

        <div class="form-group col-md-4">
            <label for="delivery_option">Opción de envío</label>
            <select name="delivery_option" id="" class="form-control custom-select">
                <option value="0">Seleccionar...</option>
                <option value="1">Recoger en tienda</option>
                <option value="2">Entrega a domicilio</option>
                <option value="3">Sistema de apartado</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="delivey_cost">Costo de envío</label>
            <input type="text" class="form-control" name="delivery_cost">
        </div>

    </div>

    <hr>

    <!--Images-->
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span id="image1" class="input-group-text"><i class="far fa-image"></i></span>
                </div>
                <div class="custom-file">
                    <input type="file" class="form-control custom-file-input" id="picture_1" aria-describedby="image1" lang="es" name="picture_1">
                    <label for="picture_1" class="custom-file-label">Seleccionar imagen...</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-image"></i></span>
                </div>
                <div class="custom-file">
                    <input type="file" class="form-control custom-file-input" name="picture_2">
                    <label class="custom-file-label">Seleccionar imagen...</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-image"></i></span>
                </div>
                <div class="custom-file">
                    <input type="file" class="form-control custom-file-input" name="picture_3">
                    <label for="" class="form-control custom-file-label">Seleccionar imagen...</label>
                </div>
            </div>
        </div>
    </div>

    <!--Other options-->
    <div class="form-row">
        <div class="form-group">
            <div class="checkbox-product d-flex align-self-center pt-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="show_product" name="show_product">
                    <label for="show_product" class="custom-control-label">Mostrar producto al público</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <div class="checkbox-product d-flex align-self-center pt-3 ">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="show_price" name="show_price">
                    <label for="show_price" class="custom-control-label">Mostrar precio al público</label>
                </div>
            </div>
        </div>
    </div>

    <!--Buttons-->
    <div class="form-row pt-3">
        <div class="p-1">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <div class="p-1">
            <button type="submit" class="btn btn-secondary">Cancelar</button>
        </div>
    </div>
</form>

<style>
    @media screen and (max-width: 700px) {
        .checkbox-product {
            padding: 2em;
        }

    }
</style>


@endsection