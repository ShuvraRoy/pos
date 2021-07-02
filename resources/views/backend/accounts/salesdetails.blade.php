@extends('backend.layouts.master')
@section('page_header','Cliente Ventas')
@section('page_links')
    <link rel="stylesheet" href="{{ asset('backend/assets/js/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/select2/select2.css') }}">
    <style>
        .page-body .select2-drop {z-index: 10052;}
        .select2-drop-mask {z-index: 10052;}
        .datepicker.datepicker-dropdown{
            z-index: 10052 !important;
        }
    </style>
@endsection
@section('page_breadcrumb')
    <ol class="breadcrumb bc-3" >
        <li>
            <a href="#"><i class="fa fa-home"></i>{{$main_menu}}</a>
        </li>
                <li class="active">
                    <strong>{{$sub_menu}}</strong>
                </li>
    </ol>
@endsection
@section('page_content')
    @include('backend.error.error_msg')
{{--    <div class="panel panel-primary" data-collapsed="0">--}}
{{--        <div class="panel-body">--}}
            {{--            <div class="form-group">--}}
            {{--                <button type="button" onclick="jQuery('#add_client_modal').modal('show')" class="btn btn-primary btn-icon icon-left"><i class="entypo-plus"></i>Add New Client</button>--}}
            {{--            </div>--}}


            <form class="bs-example form-horizontal" id="formaVenta" action="" method="post">
                <div class="row">
                    @csrf
                    <div class="col-md-4">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <i class="fa fa-user icon"></i> Seleccionar Cliente
                            </header>
                            <div class="panel-body">
                                @foreach ($client_info as $client)
                                <select class="form-control" name="cliente" id="cliente" style="width:100%;">
                                            <option value="{{ $client->idclientes }}">{{ $client->nombre }}</option>
                                </select>
                                    <br>
                                    <div class="row m-t">
                                        <div class="col-xs-12 col-md-4"><strong># </strong></div>
                                        <div class="col-xs-12 col-md-8">{{ $client->idclientes }}</div>
                                    </div><br>
                                    @if ((isset($client->nombre)))
                                        <div class="row m-t">
                                            <div class="col-xs-12 col-md-4"><strong>Nombre:</strong></div>
                                            <div class="col-xs-12 col-md-8">{{ $client->nombre }}</div>
                                        </div><br>
                                    @endif

                                    @if ((isset($client->domicilio)))
                                    <div class="row m-t">
                                        <div class="col-xs-12 col-md-4"><strong>Direcci&oacute;n:</strong></div>
                                        <div class="col-xs-12 col-md-8">{{ $client->domicilio }}</div>
                                    </div><br>
                                    @endif
                                    @if ((isset($client->telefono)))
                                        <div class="row m-t">
                                            <div class="col-xs-12 col-md-4"><strong>Tel&eacute;fono:</strong></div>
                                            <div class="col-xs-12 col-md-8">{{ $client->telefono }}</div>
                                        </div><br>
                                    @endif
                                    @if ((isset($client->celular)))
                                        <div class="row m-t">
                                            <div class="col-xs-12 col-md-4"><strong>Celular:</strong></div>
                                            <div class="col-xs-12 col-md-8">{{ $client->celular }}</div>
                                        </div><br>
                                    @endif

                                    @if ((isset($client->correo)))
                                        <div class="row m-t">
                                            <div class="col-xs-12 col-md-4"><strong>Correo:</strong></div>
                                            <div class="col-xs-12 col-md-8">{{ $client->correo }}</div>
                                        </div><br>
                                    @endif

                                @endforeach
                            </div>
                        </section>

                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <i class="fa fa-usd icon"></i> Informacion de Venta
                            </header>
                            <div class="panel-body">
                                @foreach ($sales_item as $items)
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="200">Subtotal: </th>
                                                <td class="text-right">
                                                    $ <span id="subtotal"> {{ $items->total }} </span> pesos
                                                    <input type="hidden" id="subtotalOculto" value=""/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="200">Descuento: (%) </th>
                                                <td class="text-right">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-md text-right descuento" id="descuento" name="descuento" value="" />
                                                    </div>
                                                <!--<span id="descuento"> </span> %-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="200">Total: </th>
                                                <td class="text-right"> $ <span id="total"> {{ $items->total }} </span> pesos</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <button type="submit" id="finalizar" class="btn btn-md btn-success btn-block"><i class="fa fa-check icon"></i> Modificar Venta</button>
                                <a href="admin.php?m=pventa" class="btn btn-sm btn-danger btn-block"><i class="fa fa-times icon"></i> Cancelar</a>
                                @endforeach
                            </div>
                        </section>
                    </div>
                    <div class="col-md-8">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <i class="fa fa-shopping-cart icon"></i> Agregar Articulo
                            </header>
                            <div class="panel-body">
                                <div class="row m-b">
                                    <div class="col-md-12" >
                                        <select class="form-control input-md" id="articulo" style="width:100%;">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="productos">
                                        <tr>
                                            <th>Articulo</th>
                                            <th width="120">Precio U.</th>
                                            <th width="100">Cantidad</th>
                                            <th class="text-right" width="120">Total</th>
                                            <th width="80"></th>
                                        </tr>
                                        @foreach( $article_info as $article )
                                            @foreach( $sales_item as $item )
                                            <tr>
                                                <td>{{$article->articulo}}</td>
                                                <td class="text-right v-middle">
                                                    <input type="text" name="precio[]" id="precio" value="{{$article->precio}}" class="form-control precioArticulo text-right">
                                                </td>
                                                <td class="text-right v-middle">
                                                    <input type="text" name="cantidad[]" id="cantidad" value="{{$item->cantidad}}" class="form-control cantidad text-right">
                                                </td>
                                                <td class="text-right" >$ {{$item->total}}</td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </section>


                        <section class="panel panel-default">
                            <header class="panel-heading bg-light">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-usd icon"></i> Listado de Pagos &nbsp;<b class="badge bg-info"></b></a></li>
                                    <li><a href="#credito" data-toggle="tab"><i class="fa fa-calendar icon"></i> Fechas de Credito &nbsp;<b class="badge bg-info"></b></a></li>
                                </ul>
                            </header>

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">
                                        <div class="row">
                                            <div class="col-md-12 m-b">
                                                <a href="#" class="agregarPago btn btn-sm btn-success"> <i class="fa fa-usd"></i> Agregar Pago</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th width="240">Fecha / hora</th>
                                                    <th width="140">Metodo de Pago</th>
                                                    <th width="140">Descripcion</th>
                                                    <th width="150">Cantidad</th>
                                                    <th width="80"></th>
                                                </tr>
                                                @foreach( $sales_payment as $payment )
                                                <tr>
                                                    <td>{{$payment->fetcha_hora}}</td>
                                                    <td class="text-center">{{$payment->metodo}}</td>
                                                    <td>{{$payment->comentario}}</td>
                                                    <td>{{$payment->cantidad}}</td>
                                                    <td class="text-right">
                                                        <a href="" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th class="text-left" colspan="3">Total: $  pesos</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="credito">
                                        <div class="row">
                                            <div class="col-md-12 m-b">
                                                <a href="#" class="agendarPago btn btn-sm btn-success"> <i class="fa fa-plus"></i> Agengar Pago</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th width="120">Fecha</th>
                                                    <th>Comentarios</th>
                                                    <th width="80"></th>
                                                </tr>
                                                @foreach( $sales_credit as $credit )
                                                <tr>
                                                    <td>{{$credit->fecha}}</td>
                                                    <td>{{$credit->comentarios}}</td>
                                                    <td class="text-right">
                                                        <a href="admin.php?m=pventaEditar&id=&delc=" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </form>
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script type="text/javascript">




    </script>
@endsection
