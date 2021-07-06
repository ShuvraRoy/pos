@extends('backend.layouts.master')
@section('page_header','POS')
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
    </ol>
@endsection
@section('page_content')
    @include('backend.error.error_msg')

    <form class="bs-example form-horizontal" role="form" action="{{url('pos/store')}}" id="formaVenta" method="post">
        @csrf
        <div class="row">
                <div class="col-md-4">
                <section class="panel panel-default">
                    <header class="panel-heading">
                        <i class="fa fa-user icon"></i> Seleccionar Cliente
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                        <button type="button" onclick="jQuery('#modal-clientes').modal('show')" class="btn btn-success btn-sm pull-right"><i class="entypo-plus"></i>Agregar Cliente</button>
                        </div>

                            <select name="cliente" id="cliente" style="width:100%;">
                                <option value=""></option>
                                @if ((isset($client_info)))
                                    @foreach ($client_info as $client)
                                        <option value="{{$client->idclientes}}">{{$client->nombre}}</option>
                                    @endforeach
                                @endif
                            </select>

                        <div class="alert alert-warning m-t" style="display:none;" id="errorCliente">
                            <i class="fa fa-warning"></i> Favor de seleccionar un cliente.
                        </div>
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
                                            $ <span id="subtotal"> 0.00 </span> pesos
                                            <input type="hidden" id="subtotalOculto" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="200">
                                            <label class="control-label"><strong>Descuento: ($) </strong></label>
                                        </th>
                                        <td>
                                            <div class="form-group">
                                                <input type='number' step='0.01' placeholder='0.00' class="form-control input-md text-right descuento" id="descuento" name="descuento" value="" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="200">Total: </th>
                                        <td class="text-right"> $ <span id="total"> 0.00 </span> pesos</td>
                                    </tr>
                                    <tr>
                                        <th width="200">
                                            <label class="control-label"><strong>Metodo de Pago: </strong></label>
                                        </th>
                                        <td>
                                            <div class="form-group">
                                                <select name="metodo" class="form-control">
                                                    <option>Efectivo</option>
                                                    <option>Tarjeta Debido/Credito</option>
                                                    <option>Oxxo</option>
                                                    <option>Paypal</option>
                                                    <option>TEF</option>
                                                    <option>Credito</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="200">
                                            <label class="control-label"><strong>Pago Con: ($)</strong></label>
                                        </th>
                                        <td>
                                            <div class="form-group">
                                                <input type='number' step='0.01' placeholder='0.00' class="form-control input-md text-right" id="pagocon" name="pagocon"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="200">Cambio: </th>
                                        <td width="300" class="text-right"> $ <span id="cambio"> 0.00 </span> pesos</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>
                        <button type="submit" id="finalizar" class="btn btn-md btn-success btn-block"><i class="fa fa-check icon"></i> Finalizar Venta</button>
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
                        <div class="alert alert-warning m-t" style="display:none;" id="errorArticulo">
                            <i class="fa fa-warning"></i> Favor de seleccionar un articulo
                        </div>
                        <div class="row m-b">
                            <div class="col-md-12">
                                <div class="form-group">
                                <button type="button" onclick="jQuery('#modal-articulo').modal('show')" class="btn btn-success btn-sm "><i class="entypo-plus"></i> Registrar Articulo</button>
                                    </div>
{{--                                <a href="#" class="btn btn-success btn-sm m-b agregarArticulo"> <i class="fa fa-plus"></i> Registrar Articulo</a>--}}
                                <select name="articulo" id="articulo" style="width:100%;">
                                    <option value=""></option>
                                    @if ((isset($article_info)))
                                        @foreach ($article_info as $article)
                                            <option value="{{ $article->idarticulos }}">{{$article->articulo}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped datatable" id="productos">
                                <tr>
                                    <th>Articulo</th>
                                    <th width="120">Precio U.</th>
                                    <th width="100">Cantidad</th>
                                    <th width="120">Total</th>
                                    <th width="80"></th>
                                </tr>

                            </table>
                        </div>

                    </div>

                </section>
                <!-- <form class="bs-example form-horizontal" action="" method="post"> -->
                <div class="row">
                    <div class="col-md-12">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <i class="fa fa-archive icon"></i> Datos de Entrega
                            </header>
                            <div class="panel-body">
                                <div class="alert alert-warning m-t" style="display:none;" id="errorNombre">
                                    <i class="fa fa-warning"></i> Favor de introducir un nombre.
                                </div>
                                <div class="alert alert-warning m-t" style="display:none;" id="errorDir">
                                    <i class="fa fa-warning"></i> Favor de introducir una direccion.
                                </div>
                                <div class="alert alert-warning m-t" style="display:none;" id="errorFecha">
                                    <i class="fa fa-warning"></i> Favor de introducir una fecha.
                                </div>
                                <div class="alert alert-warning m-t" style="display:none;" id="errorHora">
                                    <i class="fa fa-warning"></i> Favor de introducir una Hora.
                                </div>
                                <div class="alert alert-warning m-t" style="display:none;" id="errorMensaje">
                                    <i class="fa fa-warning"></i> Favor de introducir un mensaje.
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Nombre</strong></label>
                                        <div class="col-md-8"><input required type="text" class="form-control" name="e_nombre" id="e_nombre"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Dirección</strong></label>
                                        <div class="col-md-8"><input required type="text" class="form-control" name="e_direccion" id="e_direccion"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Fecha / Hora Entrega</strong></label>
                                        <div class="col-md-8"><input type="datetime-local" name="date_time" id="date_time" value="{{Carbon::now()->format('Y-m-d\TH:i')}}" /></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Comentarios</strong></label>
                                        <div class="col-md-8"><textarea style="height:100px;" class="form-control" name="comen" id="comen"></textarea></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Referencia</strong></label>
                                        <div class="col-md-8"><input type="text" class="form-control" name="e_referencia" id="e_referencia"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Colonia</strong></label>
                                        <div class="col-md-8"><input type="text" class="form-control" name="e_colonia" id="e_colonia"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Código Postal</strong></label>
                                        <div class="col-md-8"><input type="text" class="form-control" name="e_codigopostal" id="e_codigopostal"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Mensaje de Tarjeta</strong></label>
                                        <div class="col-md-8"><textarea required style="height:100px;" class="form-control" name="e_mensaje" id="e_mensaje"></textarea></div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- </form> -->
            </div>

        </div>
    </form>
    <div class="modal fade" id="modal-clientes">
        <div class="modal-dialog">
            <form action="{{url('pos/store_client')}}" class="form-horizontal form-groups-bordered validate"
                  method="post" role="form" id="add_user_form">
                @csrf
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="m-t-none m-b">Agregar Cliente</h3>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label"><strong>Nombre</strong></label>
                                                <div class="col-md-8"><input type="text" class="form-control" name="nombre"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label"><strong>Tel&eacute;fono</strong></label>
                                                <div class="col-md-8"><input type="text" class="form-control" name="telefono" ></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label"><strong>Correo</strong></label>
                                                <div class="col-md-8"><input type="text" class="form-control" name="correo"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label"><strong>Direcci&oacute;n</strong></label>
                                                <div class="col-md-8"><input type="text" class="form-control" name="direccion"></div>
                                            </div>
                                        </div>
                                        <div class="checkbox m-t-lg">
                                            <button type="button" class="btn btn-white"
                                                    data-dismiss="modal"><i class="entypo-cancel"></i>Cancelar
                                            </button>
        {{--                                    <a class="btn btn-sm btn-default m-t-n-xs" id="cancelar"> <i class="fa fa-times"></i> <strong>Cancelar</strong></a>--}}
                                            <button type="submit" class="btn btn-sm pull-right btn-success m-t-n-xs" id="submitCliente"> <i class="fa fa-check"></i> <strong>Agregar Cliente</strong></button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-articulo">
        <div class="modal-dialog">
            <form action="{{url('pos/store_inventory')}}" class="form-horizontal form-groups-bordered validate"
                  method="post" role="form" id="add_user_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="m-t-none m-b">Agregar Articulo</h3>

                                        <label class="col-md-3 control-label">Nombre del Articulo</label>
                                        <div class="col-md-9"><input type="text" name="articulo_nombre" class="form-control" placeholder=""></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Precio</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" name="articulo_precio" class="form-control">
                                                <span class="input-group-addon"> pesos </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Descripci&oacute;n</label>
                                        <div class="col-md-9"><textarea class="form-control" name="articulo_descripcion" style="height:150px;" placeholder=""></textarea></div>
                                    </div>
                                    <div class="checkbox m-t-lg">
                                        <button type="button" class="btn btn-white"
                                                data-dismiss="modal"><i class="entypo-cancel"></i>Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-sm pull-right btn-success m-t-n-xs" id="submitArticulo"> <i class="fa fa-check"></i> <strong>Agregar Articulo</strong></button>
                                    </div>
                            </div>
                        </div>
                    </div>
                <!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script type="text/javascript">
        function actualizarSaldos(){
            var total = 0;
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
        jQuery(document).ready(function ($) {
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
                    url : '{{ url("pos/get_article_data") }}',
                    data : {'id':article_id},
                    datatype: 'json',
                    success:function(data){
                        //console.log(data[0].precio);
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
       });

        $(function(){
            $("#agregarCliente").click(function(){
                $("#modal-clientes").modal("show");
            });
        });
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
            //alert($("#productos tr").length);

            if ($("#pagocon").val() == ""){
                // mensaje de que selecicone cliente
                // return false;
                if ($("#cliente").val() != ""){
                    if($("#e_nombre").val() != ""){
                        if($("#e_direccion").val() != ""){
                            if($("#e_fechaentrega").val() != ""){
                                if($("#e_horaentrega").val() != ""){
                                    if($("#e_mensaje").val() != ""){
                                        if($("#productos tr").length > 1){
                                            $("#formaVenta").submit();
                                        }else{$("#errorArticulo").show(); $("#errorMensaje").hide();}
                                    }else{$("#errorMensaje").show(); $("#errorHora").hide();}
                                }else{$("#errorHora").show(); $("#errorFecha").hide(); $("#errorDir").hide();}
                            }else{$("#errorFecha").show(); $("#errorDir").hide();}
                        }else{$("#errorDir").show(); $("#errorNombre").hide();}
                    }else{$("#errorNombre").show(); $("#errorCliente").hide();}
                }else{$("#errorCliente").show();}


            } else {
                $("#formaVenta").submit();
            }


        });
    </script>
@endsection
