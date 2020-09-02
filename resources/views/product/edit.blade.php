@extends('main')

@section('content')
    <form>
        <!--Name-->
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="name">Nombre</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="content">Contenido</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="unit_of_measure">Unidad de medida</label>
                <select name="" id="" class="form-control custom-select">
                    <option value="">Seleccionar...</option>
                    <option value="">LT</option>
                    <option value="">G</option>
                    <option value="">GM</option>
                    <option value="">ML</option>
                </select>
            </div>
        </div>

        <!--Brand and prices-->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="brand">Marca</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group col-md-2">
                <label for="price">Precio</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="offer_price">Precio de oferta</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            $
                        </span>
                    </div>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="offer_duration">Duración</label>
                <input type="text" class="form-control" disabled>
            </div>
        </div>

        <!--Barcode and Quantity-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="bar_code">Código de barras</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                    </div>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="form-group col-md-2">
                <label for="qty">Cantidad</label>
                <input type="text" class="form-control">
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
                <input type="text" class="form-control">
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
                <input type="text" class="form-control">
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
                        <input type="file" class="form-control custom-file-input" id="picture_1" aria-describedby="image1"
                            lang="es">
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
                        <input type="file" class="form-control custom-file-input">
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
                        <input type="file" class="form-control custom-file-input">
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
                        <input type="checkbox" class="custom-control-input" id="show_product">
                        <label for="show_product" class="custom-control-label">Mostrar producto al público</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <div class="checkbox-product d-flex align-self-center pt-3 ">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="show_price" disabled>
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
