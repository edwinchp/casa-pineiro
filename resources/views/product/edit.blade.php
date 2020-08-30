@extends('main')

@section('content')
    <form>

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
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="" cols="40" rows="5" class="form-control"></textarea>
          </div>
        </div>

        <hr>

        


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-3">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>



        <div class="checkbox-product col-md-2 d-flex align-self-center pt-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="show_product">
                <label for="show_product" class="custom-control-label">Mostrar producto</label>
            </div>
        </div>


        <div class="checkbox-product col-md-2 d-flex align-self-center pt-3 ">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="show_price" disabled>
                <label for="show_price" class="custom-control-label">Mostrar precio</label>
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
