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


            <form class="bs-example form-horizontal" id="formaVenta" action="{{url('accounts_receivable/store_modified_sale')}}" method="post">
                <div class="row">
                    @csrf
                    <div class="col-md-4">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <i class="fa fa-user icon"></i> Seleccionar Cliente
                            </header>
                            <div class="panel-body">
                                @foreach ($client_info as $client)
                                    <select name="cliente" id="cliente" style="width:100%;">
                                        <option value="{{ $client->idclientes }}">{{ $client->nombre }}</option>
                                        @if ((isset($client_info)))
                                            @foreach ($client_data as $cldata)
                                                <option value="{{$cldata->idclientes}}">{{$cldata->nombre}}</option>
                                            @endforeach
                                        @endif
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="200">Subtotal: </th>
                                                <td class="text-right">
                                                    $ <span id="subtotal"> {{ $total_price }} </span> pesos
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
                                                <td class="text-right"> $ <span id="total"> 0.00 </span> pesos</td>
                                            </tr>
                                            @foreach($sales_info as $info)
                                                <input type="hidden" value="{{$info->idventas}}" id="sales_id" name="sales_id">
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <button type="submit" id="finalizar" class="btn btn-md btn-success btn-block"><i class="fa fa-check icon"></i> Modificar Venta</button>
                                <a href="admin.php?m=pventa" class="btn btn-sm btn-danger btn-block"><i class="fa fa-times icon"></i> Cancelar</a>
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
                                        <select name="articulo" id="articulo" style="width:100%;">                                            <option></option>
                                            @if ((isset($article_info)))
                                                @foreach ($article_info as $article)
                                                    <option value="{{ $article->idarticulos }}">{{$article->articulo}}</option>
                                                @endforeach
                                            @endif
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
                                        @foreach( $sales_item as $item )
                                            <tr>
                                                <td>{{$item->articulo_info->articulo}}</td>
                                                <td class="text-right v-middle">
                                                    <input type="text" name="precio[]" id="precio" value="{{$item->articulo_info->precio}}" class="form-control precioArticulo text-right">
                                                </td>
                                                <td class="text-right v-middle">
                                                    <input type="text" name="cantidad[]" id="cantidad" value="{{$item->cantidad}}" class="form-control cantidad text-right">
                                                </td>
                                                <td class="text-right" >$ {{$item->total}}</td>
                                                <td class="text-right"><a href="#" class="btn btn-sm btn-danger clsEliminarFila"> <i class="fa fa-times"></i> </a></td>
                                            </tr>
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
                                                    <th class="text-left" colspan="3">Total: $ {{$total_sales_payment}} pesos</th>
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
    <div class="modal fade" id="modal-pagos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Agregar pago</h3>
                            <form action="{{url('accounts_receivable/add_payment')}}" method="post">
                                @csrf
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
                                        <label class="col-md-6 control-label"><strong>Cantidad</strong></label>
                                        <div class="col-md-6"><input type="text" class="form-control" name="cantidad2" value="0" ></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Comentarios</strong></label>
                                    <textarea class="form-control" name="comentario" style="height:150px;"></textarea>
                                    @foreach($sales_info as $info)
                                        <input type="hidden" value="{{$info->idventas}}" id="payment_id" name="payment_id">
                                    @endforeach
                                </div>
                                <div class="checkbox m-t-lg">
                                    <a class="btn btn-sm btn-default" id="cancelar"> <i class="fa fa-times"></i> <strong>Cancelar</strong></a>
                                    <button type="submit" class="btn btn-sm pull-right btn-success"> <i class="fa fa-usd"></i> <strong>Agregar pago</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-agendar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">Agendar pago</h3>
                            <form action="{{url('accounts_receivable/payment_date')}}" class="form-horizontal" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-4 control-label"><strong>Fecha de Pago</strong></label>
                                    <div class="col-md-8"><input type="text" class="form-control datepicker-input" name="a_fecha" value="<?php echo date("Y-m-d"); ?>" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd"></div>
                                </div>
                                <div class="form-group">
                                    @foreach($sales_info as $info)
                                        <input type="hidden" value="{{$info->idventas}}" id="payment_date" name="payment_date">
                                    @endforeach
                                    <label class="col-md-4 control-label"><strong>Comentarios</strong></label>
                                    <div class="col-md-8"><textarea class="form-control" name="a_comentarios" style="height:150px;"></textarea></div>
                                </div>
                                <div class="checkbox m-t-lg">
                                    <a class="btn btn-sm btn-default m-t-n-xs" id="cancelar2"> <i class="fa fa-times"></i> <strong>Cancelar</strong></a>
                                    <button class="btn btn-sm pull-right btn-success"> <i class="fa fa-check"></i> <strong>Agendar</strong></button>
                                </div>
                            </form>
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
    <script type="text/javascript">
        function actualizarSaldos(){
            var total = {{$total_price}};
            $(".totalArticulo").each(function(){
                total += parseFloat( $(this).html() );
            });
            $("#subtotal").html(total);
            $("#subtotalOculto").val(total);

            if ( $("#descuento").val() != "0"){
                var descuento 	= $("#descuento").val();
                var total2 		= $("#subtotalOculto").val();
                //var result = (descuento / 100) * total2;

                $("#total").html( total2 - descuento );
            } else {
                $("#total").html(total);
            }

        }
        function actualizarCambio(){
            var total = $("#total").html();
            var pago  = $("#pagocon").val();

            var resta = parseInt(pago) - parseInt(total);
            $("#cambio").html(resta);
        }
        $(function() {
            $("#cliente").select2({
                placeholder: 'Select...',
                allowClear: true
            }).on('change', function()
            {
                var client_id = $(this).val();
                console.log(client_id);
                // Adding Custom Scrollbar
                //$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
            });
            $("#articulo").select2({
                placeholder: 'Select...',
                allowClear: true
            }).on('change', function()
            {
                var article_id = $(this).val();
                console.log(article_id);
                $.ajax({
                    type : 'get',
                    url : '{{ url("accounts_receivable/get_article_data") }}',
                    data : {'id':article_id},
                    datatype: 'json',
                    success:function(data){
                        console.log(data[0].precio);
                        var id= data[0].idarticulos;
                        var nuevaFila = '<tr>'+
                            '<td>'+data[0].articulo+
                            '<input type="hidden" name="idarticulo[]" value="'+id+'">'+
                            '</td>'+
                            '<td class="text-right v-middle"><input type="text" name="precio[]" id="precio_'+id+'" data-id="'+id+'" value="'+data[0].precio+'" class="form-control precioArticulo text-right"></td>'+
                            '<td class="text-right v-middle"><input type="text" step="1" name="cantidad[]" value="1" id="cantidad_'+id+'" data-id="'+id+'" class="form-control cantidad text-right"></td>'+
                            '<td class="text-right v-middle">$ <span class="totalArticulo" id="total_'+id+'">'+data[0].precio+'</span></td>'+
                            '<td class="text-right"><a href="#" class="btn btn-sm btn-danger clsEliminarFila"> <i class="fa fa-times"></i> </a></td>'+
                            '</tr>';
                        $('table#productos tr:last').after(nuevaFila);
                        actualizarSaldos();
                        $('#articulo').val('').trigger('change');
                    }
                })

            });
            $(".agregarPago").click(function(){
                $("#modal-pagos").modal("show");
            });

            $("#cancelar").click(function(){
                $("#modal-pagos").modal("hide");
            });

            $(".agendarPago").click(function(){
                $("#modal-agendar").modal("show");
            });

            $("#cancelar2").click(function(){
                $("#modal-agendar").modal("hide");
            });

            actualizarSaldos();
            actualizarCambio();

            $(document).on('click','.clsEliminarFila',function(){
                var objFila = $(this).parents().get(1);
                $(objFila).remove();
                actualizarSaldos();
            });
            /* actualizar precio */
            $(document).on('keyup', '.precioArticulo', function(){
                var este = $(this).val();
                var id   = $(this).data("id");
                var cantidad = $("#cantidad_"+id).val();

                $("#total_"+ id).html( este * cantidad );

                actualizarSaldos();
            });
            /* descuento */
            $(document).on('keyup','.descuento',function(){
                var descuento 	= $(this).val()
                var total 		= $("#subtotalOculto").val();

                //var result = (descuento / 100) * total;

                $("#total").html( total - descuento);
            });
            $(document).on('keyup','.cantidad',function(){
                var este 	= $(this).val()
                var id 		= $(this).data("id");
                var precio 	= $("#precio_"+id).val();

                $("#total_"+id).html( parseFloat(este) * parseFloat(precio) );
                actualizarSaldos();
            });
            $(document).on('keyup', '#pagocon', function(){
                var total = $("#total").html();
                var pago  = $(this).val();

                var resta = parseFloat(pago) - parseFloat(total);
                $("#cambio").html(resta);
            });
            $("#finalizar").click(function(e){
                e.preventDefault();
                if ($("#pagocon").val() == ""){

                    //return false;
                } else {
                    $("#formaVenta").submit();
                }

            });
        });




    </script>
@endsection
