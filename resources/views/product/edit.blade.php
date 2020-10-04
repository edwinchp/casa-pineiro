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

<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!--Name-->
    <div class="form-row">
        <div class="col-md-10">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">

            <div class="form-row pt-3">
                <div class="col-md-6">
                    <label for="bar_code">Código de barras</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" name="bar_code" value="{{ $product->bar_code }}" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="brand">Marca</label>
                    <input type="text" class="form-control" name="brand" value="{{ $product->brand }}"> </div>
            </div>
        </div>


        <div class="form-group col-md-2 pt-4">
            <img width="200px" src="{{ URL::to($product->getMainPicture()) }}" class="img-thumbnail" alt="...">
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
                            <input type="text" class="form-control" name="cp_price" value="{{ $product->cp_price }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qty">Cantidad</label>
                        <input type="text" class="form-control" name="cp_qty" value="{{ $product->cp_qty }}" autocomplete="off">
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
                            <input type="text" class="form-control" name="cp_offer_price" value="{{ $product->cp_offer_price }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="offer_duration">Días en oferta</label>
                        <input type="text" class="form-control" name="cp_offer_duration" value="{{ $product->cp_offer_duration }}" autocomplete="off">
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
                            <input type="text" class="form-control" name="te_price" value="{{ $product->te_price }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qty">Cantidad</label>
                        <input type="text" class="form-control" name="te_qty" value="{{ $product->te_qty }}" autocomplete="off">
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
                            <input type="text" class="form-control" name="te_offer_price" value="{{ $product->te_offer_price }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="offer_duration">Días en oferta</label>
                        <input type="text" class="form-control" name="te_offer_duration" value="{{ $product->te_offer_duration }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Description-->
    <div class="form-row">
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="" cols="40" rows="5" class="form-control">{{ $product->description }}</textarea>
        </div>
    </div>

    <hr>

    <!--Delivery options-->
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="location">Ubicación</label>
            <input type="text" class="form-control" name="location" autocomplete="off">
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
            <input type="text" class="form-control" name="delivery_cost" autocomplete="off">
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
                    <label for="picture_1" class="custom-file-label">{{$product->picture_1}}</label>
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

    <div class="form-row">
        <div class="col-md-4">
            <img src="{{ URL::to($product->getPicturePath('picture_1')) }}" alt="" style="width: 350px">
        </div>
        <div class="col-md-4">
            <img src="{{ URL::to($product->getPicturePath('picture_2')) }}" alt="" style="width: 350px">
        </div>
        <div class="col-md-4">
            <img src="{{ URL::to($product->getPicturePath('picture_3')) }}" alt="" style="width: 350px">
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
            <input type="submit" class="btn btn-success" value="Guardar">
        </div>

        <div class="p-1">
            <a href="{{route('products.index')}}" class="btn btn-secondary">Cancelar</a>
        </div>

        <div class="p-1">
            <a href="#" class="btn btn-danger" data-target="#confirmDeleteModal" data-toggle="modal">Eliminar</a>
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



<!-- Confirm delete Modal-->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">¿Seguro que desea eleminar el producto <strong>{{$product->name}}</strong>? <br> Esta opción no podrá deshacerse.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form action="{{route('products.destroy', $product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" href="#" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Eliminar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection