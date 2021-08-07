@extends('backend.layouts.master')
@section('page_header','Cliente Ventas')
@section('page_links')
    <link rel="stylesheet" href="{{ asset('backend/assets/js/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/datetimepicker/build/jquery.datetimepicker.min.css') }}">
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

{{--    <form class="bs-example form-horizontal" id="formaVenta" action="" method="">--}}
        <div class="row">
            <div class="col-md-4">
                <section class="panel panel-default">
                    <header class="panel-heading">
                        <i class="fa fa-user icon"></i> Cliente
                    </header>
                    <div class="panel-body">
                        @foreach ($client_info as $client)
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
                        <i class="fa fa-archive icon"></i> Estado del pedido
                    </header>
                    <div class="panel-body">
                        @foreach ($sales_info as $sales)

                            <div class="col-md-12">
                                <form role="form" action="{{url('sales_history/edit_status')}}" class="form-horizontal" method="post">
                                    @csrf
{{--                                <form class="form-horizontal" action="{{url('sales_history/edit_status')}}" method="post">--}}
{{--                                    @csrf--}}
                                    <div class="form-group">
                                        <label> Nuevo estado:</label>
                                        <select required class="form-control" name="estado">
                                            <option>Pendiente</option>
                                            <option>En Proceso</option>
                                            <option>En Ruta</option>
                                            <option>Entregado</option>
                                            <option>No Entregado</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Comentarios:</label>
                                        <textarea name="comentarios" class="form-control"> </textarea>
                                    </div>
                                    @foreach( $sales_info as $sale )
                                        <input type="hidden" value="{{$sale->idventas}}" id="edit_sale_id" name="edit_sale_id">
                                    @endforeach
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="submitStatus"> <i class="fa fa-check"></i> <strong> Cambiar estado </strong></button>
                                    </div>
                                </form>
                            </div>
                             @endforeach
                    </div>
                </section>
                <section class="panel panel-default">
                    <header class="panel-heading">
                        <i class="fa fa-archive icon"></i> Datos de Entrega
                    </header>
                    <div class="panel-body">
                        @foreach ($delivery_info as $delivery)
                        <div class="row">
                            <div class="col-xs-12 col-md-4"><strong>Nombre:</strong></div>
                            <div class="col-xs-12 col-md-8">{{ $delivery->nombre }}</div>
                        </div>
                        <br>
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Dirección:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $delivery->direccion }}</div>
                            </div>
                            <br>
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Fecha / Hora Entrega:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $delivery->fetcha_hora }}</div>
                            </div>
                            <br>
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Referencia:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $delivery->referencia }}</div>
                            </div>
                            <br>
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Colonia:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $delivery->colonia }}</div>
                            </div>
                            <br>
                            <div class="row m-t m-b">
                                <div class="col-xs-12 col-md-4"><strong>Código Postal:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $delivery->codigopostal }}</div>
                            </div>
                            <br>
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Mensaje:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $delivery->mensaje }}</div>
                            </div>
                            <br>
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Comentarios: </strong></div>
                                <div class="col-xs-12 col-md-8">{{ $delivery->comen }}</div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="button" onclick="jQuery('#modal-datos').modal('show')" class="btn btn-md btn-default btn-block m-t"><i class="fa fa-pencil"></i> Editar datos </button>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-8">
                <section class="panel panel-default">
                    <header class="panel-heading">
                        <i class="fa fa-shopping-cart icon"></i> Articulo
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="productos">
                                <tr>
                                    <th>Articulo</th>
                                    <th width="120">Precio U.</th>
                                    <th width="100">Cantidad</th>
                                    <th width="100">Precio</th>
                                </tr>
                                    @foreach( $sales_item as $item )
                                        <tr>
                                            <td>{{$item->articulo_info->articulo}}</td>
                                            <td>{{$item->articulo_info->precio}}</td>
                                            <td>{{$item->cantidad}}</td>
                                            <td class="text-text-center v-middle" >${{$item->total}}</td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                            <div class="row">
                                <div class="col-sm-12 text-right text-center-xs">
                                    <strong>Total: $ {{$total_price}} pesos</strong>
                                </div>
                            </div>
                    </div>
                </section>

                <section class="panel panel-default">
                    <header class="panel-heading">
                        <i class="fa fa-clock-o icon"></i> Historial de Estados
                    </header>
                    <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th width="240">Fecha / hora</th>
                                            <th width="150">Estado</th>
                                            <th>Comentarios</th>
                                        </tr>
                                        @foreach( $sales_state as $state )
                                            <tr>
                                                <td>{{$state->fetcha_hora}}</td>
                                                @if($state->estado == "Pendiente")
                                                    <td class="text-center"> <label class="label label-warning"><strong> Pendiente </strong></label></td>
                                                @elseif($state->estado == "En Proceso")
                                                    <td class="text-center"> <label class="label label-warning"><strong> En Proceso </strong></label></td>
                                                @elseif($state->estado == "En Ruta")
                                                    <td class="text-center"> <label class="label label-info"><strong> En Ruta </strong></label></td>
                                                @elseif($state->estado == "Entregado")
                                                    <td class="text-center"> <label class="label label-success"><strong> Entregado </strong></label></td>
                                                @elseif($state->estado == "No Entregado")
                                                    <td class="text-center"> <label class="label label-danger"><strong> No Entregado </strong></label></td>
                                                @endif
                                                <td>{{$state->commentarios}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                    </div>
                </section>
                @foreach( $sales_info as $sales)
                    <strong> Pedido # {{$sales->idventas}}</strong>
                @endforeach
            </div>
        </div>
{{--    </form>--}}
    <div class="modal fade" id="modal-datos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach ($delivery_info as $delivery)
                            <h3 class="m-t-none m-b">Datos de Entrega</h3>
                            <form role="form" action="{{url('sales_history/edit_delivery')}}" class="form-horizontal" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Nombre</strong></label>
                                    <div class="col-md-8"><input required type="text" class="form-control" value="{{$delivery->nombre}}" name="e_nombre" id="e_nombre"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Dirección</strong></label>
                                    <div class="col-md-8"><input required type="text" class="form-control" value="{{$delivery->direccion}}" name="e_direccion" id="e_direccion"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Fecha / Hora de Entrega</strong></label>
                                    <div class="col-md-8"><input required type="text" class="form-control" value="{{$delivery->fetcha_hora}}" name="e_fechaentrega" id="e_fechaentrega" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Referencia</strong></label>
                                    <div class="col-md-8"><input type="text" class="form-control" value="{{$delivery->referencia}}" name="e_referencia" id="e_referencia"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Colonia</strong></label>
                                    <div class="col-md-8"><input type="text" class="form-control" value="{{$delivery->colonia}}" name="e_colonia" id="e_colonia"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Código Postal</strong></label>
                                    <div class="col-md-8"><input type="text" class="form-control" value="{{$delivery->codigopostal}}" name="e_codigopostal" id="e_codigopostal"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Mensaje de Tarjeta</strong></label>
                                    <div class="col-md-8"><textarea required style="height:100px;" class="form-control" value="{{$delivery->mensaje}}" name="e_mensaje" id="e_mensaje"></textarea></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Comentarios</strong></label>
                                    <div class="col-md-8"><textarea style="height:100px;" class="form-control" value="{{$delivery->commentarios}}" name="comen" id="comen"></textarea></div>
                                </div>
                                @foreach( $sales_info as $sale )
                                <input type="hidden" value="{{$sale->idventas}}" id="edit_sales_id" name="edit_sales_id">
                                @endforeach
                                <div class="checkbox m-t-lg">
                                    <button type="button" class="btn btn-white"
                                            data-dismiss="modal"><i class="entypo-cancel"></i>Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-sm pull-right btn-success m-t-n-xs" id="submitCliente"> <i class="fa fa-check"></i> <strong>Terminar</strong></button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/datetimepicker/build/jquery.datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        jQuery('#e_fechaentrega').datetimepicker();


    </script>
@endsection
