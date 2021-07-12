@extends('backend.layouts.master')
@section('page_header','Tablero')
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
        <li class="active">
            <a href="#"><i class="fa fa-home"></i>{{$main_menu}}</a>
        </li>
{{--                <li class="active">--}}
{{--                    <strong>{{$sub_menu}}</strong>--}}
{{--                </li>--}}
    </ol>
@endsection
@section('page_content')
    <div class="row">
        <div class="col-sm-3">

            <div class="tile-stats tile-blue">
                <div class="icon"><i class="fa fa-usd"></i></div>
                <div class="num" data-start="0" data-end="{{$sale_amount}}" data-prefix="&dollar;" data-postfix="" data-duration="1500" data-delay="0">&dollar; 0 </div>
                <h3>VENTAS DE HOY</h3>
                <p></p>
            </div>

        </div>
        <div class="col-sm-3">
            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-tag"></i></div>
                <div class="num">{{$sale}}</div>
                <h3>VENTAS DE HOY</h3>
                <p></p>
            </div>
        </div>
        <div class="col-sm-3">

            <div class="tile-stats tile-cyan">
                <div class="icon"><i class="fa fa-usd"></i></div>
                <div class="num" data-start="0" data-end="{{$income}}" data-prefix="&dollar;" data-postfix="" data-duration="1500" data-delay="0">0 &pound;</div>
                <h3>INGRESOS DE HOY</h3>
                <p></p>
            </div>

        </div>

        <div class="col-sm-3">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-tag"></i></div>
                <div class="num">{{$orders}}</div>
                <h3>PEDIDOS DE HOY</h3>
                <p></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-default pos-rlt clearfix">
                <header class="panel-heading"> <i class="fa fa-archive"></i> Pedidos para hoy</header>

                <div class="table-responsive">
                    <table class="table ">
                        <tr>
                            <th width="10">#</th>
                            <th width="100">Fecha / Hora</th>
                            <th width="100">Estado</th>
                            <th>Articulos</th>
                            <th>Cliente</th>
                            <th>Destinarario</th>
                            <th>Direccion</th>
                            <th width="70">Total</th>
                            <th width="70">Pagado</th>
                            <th width="50">Estatus</th>
                            <th width="10"></th>
                            <th width="10"></th>
                        </tr>


                        <tr>
                            <td class='v-middle'>{{$sales_order->idventas}}</td>
                            <td class='v-middle'>{{$sales_order->fetcha_hora}}</td>
                            <td class='v-middle'>{{$status}}</td>
                            <td class='v-middle'>{{$article}}</td>
                            <td class="v-middle">{{$sales_order->nomcliente}}</td>
                            <td class='v-middle'>{{$sales_order->nombre}}</td>
                            <td class='v-middle'>{{$sales_order->direccion}}</td>
                            <td class='v-middle'>{{$total}}</td>
                            <td class='text-right'>{{$paid_amount}}</td>
                            <td class='text-right'> {{$status}}</td>
                            <td class="text-right"></td>>
                            <td><a href="#" data-id="{{$sales_order->idventas}}" class="agregarPago btn btn-sm btn-success"> <i class="fa fa-usd"></i> </a></td>
                            <td class='text-right'><a class='btn btn-sm btn-info' href='{{route('archive', ['sale'=>$sales_order->idventas])}}'><i class='fa fa-archive'></i></a></td>
                            </tr>



                    </table>
                </div>
            </section>
        </div>
        <div class="col-md-12">
            <section class="panel panel-default pos-rlt clearfix">
                <header class="panel-heading"> <i class="fa fa-warning"></i> Cuentas Por cobrar</header>
                <div class="table-responsive">
                    <table class="table ">
                        <tr>
                            <th width="100"># Orden</th>
                            <th width="150"> Fecha de pago </th>
                            <th>Comentarios</th>
                            <th>Cliente</th>
                            <th width="100"> </th>
                        </tr>
                        <tr>
                            <td class="text-center v-middle">{{$sales_credit->idventa}}</td>
                            <td class="v-middle">{{$sales_credit->fecha}}</td>
                            <td class="v-middle">{{$sales_credit->comentarios}}</td>
                            <td class="v-middle">{{$sales_credit->nombre}}</td>
                            <td class="text-right v-middle">
                                <a href="{{route('edit_sale', ['sale'=>$sales_credit->idventa])}}" class="btn btn-sm btn-success"> <i class="fa fa-usd"></i> </a>
                            </td>
                        </tr>
                        </table>
                </div>
            </section>
        </div>
        <div class="modal fade" id="modal-pagos">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="m-t-none m-b">Agregar pago</h3>
                                <form role="form" action="{{url('home/store_payment')}}" method="post">
                                  @csrf
                                    <input type="hidden" name="idventa" id="idventa" value="" >
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-6 control-label"><strong>Metodo de Pago</strong></label>
                                            <div class="col-md-6">
                                                <select name="metodo" class="form-control">
                                                    <option>Efectivo</option>
                                                    <option>Tarjeta Debido/Credito</option>
                                                    <option>Oxxo</option>
                                                    <option>Paypal</option>
                                                    <option>TEF</option>
                                                    <option>Credito</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-6 control-label"><strong>Pago</strong></label>
                                            <div class="col-md-6"><input type="text" class="form-control" name="cantidad" value="0" ></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Comentarios</strong></label>
                                        <textarea class="form-control" name="comentario" style="height:150px;"></textarea>
                                    </div>
                                    <div class="checkbox m-t-lg">
                                        <a class="btn btn-md btn-default m-t-n-xs" id="cancelar"> <i class="fa fa-times"></i> <strong>Cancelar</strong></a>
                                        <button type="submit" class="btn btn-md pull-right btn-success m-t-n-xs"> <i class="fa fa-check"></i> <strong>Agregar pago</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
@endsection
@section('page_scripts')
            <script type="text/javascript">
                $(".agregarPago").click(function(){
                    $("#idventa").val($(this).data("id"))
                    $("#modal-pagos").modal("show");
                });

                $("#cancelar").click(function(){
                    $("#modal-pagos").modal("hide");
                });
            </script>
@endsection
