@extends('backend.layouts.master')
@section('page_header','Inicio')
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
            <div class="tile-stats tile-blue" >
                <a class="clear" href="{{url('sales_report/today_sale_report')}}">
                <div class="icon"><i class="fa fa-usd"></i></div>
                <div class="num" data-start="0" data-end="{{$Total_sale}}" data-prefix="&dollar;" data-postfix="" data-duration="1500" data-delay="0">&dollar; 0 </div>
                <h3>VENTAS DE HOY</h3>
                <p></p>
                </a>
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
                <a class="clear" href="{{url('sales_report/today_sale_report')}}">
                <div class="icon"><i class="fa fa-usd"></i></div>
                <div class="num" data-start="0" data-end="{{$income}}" data-prefix="&dollar;" data-postfix="" data-duration="1500" data-delay="0">$ 0 </div>
                <h3>INGRESOS DE HOY</h3>
                <p></p>
                </a>
            </div>

        </div>

        <div class="col-sm-3">
            <div class="tile-stats tile-green">
                <a class="clear" href="{{url('orders/today_order_report')}}">
                <div class="icon"><i class="entypo-tag"></i></div>
                <div class="num">{{$orders}}</div>
                <h3>PEDIDOS DE HOY</h3>
                <p></p>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-default pos-rlt clearfix">
                <header class="panel-heading"><i class="fa fa-archive"></i> Pedidos para hoy </header>
                <div class="table-responsive">
                    <table class="table " >
                        <tr>
                            <th width="10">#</th>
                            <th width="100">Fecha</th>
                            <th width="100">Hora</th>
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
                        <?php $i = 0 ?>
                        @if(isset($sales_order))
                            @foreach($sales_order as $sales)

                        <tr>
                            <td class='v-middle'>{{$sales->idventas}}</td>
                            <td class='v-middle'>{{$sales->fetcha_hora}}</td>
                            <td class='v-middle'>{{$sales->hora}}</td>
                            @if($sales->estatus == "Pendiente")
                                <td class="text-center"> <label class="label label-warning"><strong> Pendiente </strong></label></td>
                            @elseif($sales->estatus == "En Proceso")
                                <td class="text-center"> <label class="label label-warning"><strong> En Proceso </strong></label></td>
                            @elseif($sales->estatus == "En Ruta")
                                <td class="text-center"> <label class="label label-info"><strong> En Ruta </strong></label></td>
                            @elseif($sales->estatus == "Entregado")
                                <td class="text-center"> <label class="label label-success"><strong> Entregado </strong></label></td>
                            @elseif($sales->estatus == "No Entregado")
                                <td class="text-center"> <label class="label label-danger"><strong> No Entregado </strong></label></td>
                           @endif
                            <td class='v-middle'>{{$article[$i]}}</td>
                            <td class="v-middle">{{$sales->nomcliente}}</td>
                            <td class='v-middle'>{{$sales->nombre}}</td>
                            <td class='v-middle'>{{$sales->direccion}}</td>
                            <td class='v-middle'>{{$total[$i]}}</td>
                            <td class='text-right'>{{$paid_amount[$i]}}</td>
                            @if($paid_amount[$i] >= $total[$i])
                                <td class="text-center"><label class="label label-success"><strong> Liquidado </strong></label></td>
                            @else
                                <td class="text-center"> <label class="label label-warning"><strong> Pendiente</strong></label></td>
                            @endif
                            <td class="text-right"></td>
                            <td><a href="#" data-id="{{$sales->idventas}}" class="agregarPago btn btn-sm btn-success"> <i class="fa fa-usd"></i> </a></td>
                            <td class='text-right'><a class='btn btn-sm btn-info' href='{{route('archive', ['sale'=>$sales->idventas])}}'><i class='fa fa-archive'></i></a></td>

                        </tr>
                                <?php $i++ ?>
                            @endforeach
                        @endif
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
                        @if(isset($sales_credit))
                            @foreach($sales_credit as $credit)
                        <tr>
                            <td class="text-center v-middle">{{$credit->idventa}}</td>
                            <td class="v-middle">{{$credit->fecha}}</td>
                            <td class="v-middle">{{$credit->comentarios}}</td>
                            <td class="v-middle">{{$credit->nombre}}</td>
                            <td class="text-right v-middle">
                                <a href="{{route('edit_sale', ['sale'=>$credit->idventa])}}" class="btn btn-sm btn-success"> <i class="fa fa-usd"></i> </a>
                            </td>
                        </tr>
                            @endforeach
                        @endif
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
