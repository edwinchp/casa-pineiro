@extends('main')

@section('content')

<div id="sales-index">
<div class="pcoded-main-container">
                <div class="pcoded-inner-content">

                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- Page-header start -->
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card pt-3">

                                            <div class="section-header">
                                                <div class="section-header-title">
                                                    <div class="card-header">
                                                        <h4>Productos en inventario</h4>
                                                    </div>
                                                </div>
                                                <div class="section-header-buttons">
                                                    <a href="product.create.html" class="btn btn-success btn-success-a"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        data-original-title="Nuevo producto">Nuevo</a>
                                                </div>
                                                <div class="col-xl-4 section-header-search">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="name"><i
                                                                class="icofont icofont-search"></i></span>
                                                        <input type="text" class="form-control" placeholder="Buscar...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-block table-border-style">
                                                <div class="table-responsive pr-4 pl-4">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Existentes</th>
                                                                <th>Nuevos</th>
                                                                <th>Precio de compra</th>
                                                                <th>Precio de venta</th>
                                                                <th>Imagen</th>
                                                                <th>Opciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="table-name">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            <a href="product.edit.html">
                                                                                Cheetos bolitas 30g
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="table-number">
                                                                    <div class="row">
                                                                        <div class="col-xl-11 existing-product">

                                                                            <div class="product-current-qty">
                                                                                105
                                                                            </div>
                                                                            <div class="add-existing">
                                                                                <div class="arrow">
                                                                                    <i class="ti-arrow-right"></i>
                                                                                </div>
                                                                                <div class="new-product-sum">
                                                                                    119
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="table-number">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            <input class="form-control" type="number"
                                                                                value="14">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="table-number">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            <input class="form-control" type="number"
                                                                                value="6">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="table-number">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            <input class="form-control" type="number"
                                                                                value="9">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <a href="assets/images/bolitas.jpg"><img
                                                                            src="assets/images/bolitas.jpg"
                                                                            target="_blank" class="img-40 rounded">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <div class="table-options">
                                                                        <a href="#" data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            data-original-title="Guardar cambios"><i
                                                                                class="ti-check"></i></a>
                                                                        <a href="#" data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            data-original-title="Cancelar"><i
                                                                                class="ti-close"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="table-name">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            <a href="product.edit.html">Ruffles
                                                                                queso 40g</a>
                                                                        </div>
                                                                    </div>

                                                                </td>

                                                                <td class="table-number">
                                                                    <div class="row">
                                                                        <div class="col-xl-11 existing-product">
                                                                            <div class="product-current-qty">
                                                                                4
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="table-new-product">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            <input class="form-control" type="text"
                                                                                value="" data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                data-original-title="Edite este producto para usar esta opción"
                                                                                disabled>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="table-number">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            $12
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="table-sell-product">
                                                                    <div class="row">
                                                                        <div class="col-xl-11">
                                                                            <strong>$14</strong>
                                                                        </div>
                                                                    </div>
                                                                </td>



                                                                <td>
                                                                    <a href="#!" data-toggle="modal"
                                                                        data-target="#myModal"><img
                                                                            src="assets/images/ruffles.jpg" alt=""
                                                                            class="img-40 rounded">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <div class="table-options">
                                                                        <a href="#" data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            data-original-title="Añadir al carrito"><i
                                                                                class="ti-shopping-cart"></i></a>
                                                                        <a href="#" data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            data-original-title="Editar"><i
                                                                                class="ti-pencil-alt"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                    <div class="p-4">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-end">
                                                                <li class="page-item disabled">
                                                                    <a class="page-link" href="#"
                                                                        tabindex="-1">Anterior</a>
                                                                </li>
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">3</a></li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#">Siguiente</a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection