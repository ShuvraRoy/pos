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
        <div class="col-md-5">
            <section class="panel panel-default">
                <header class="panel-heading">
                    <i class="fa fa-user icon"></i> Datos del Proveedor
                </header>
                <div class="panel-body">
                    @foreach ($provider_info as $provider)
                        @if ((isset($provider->nombre)))
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Nombre:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $provider->nombre }}</div>
                            </div><br>
                        @endif

                        @if ((isset($provider->domicilio)))
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Direcci&oacute;n:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $provider->domicilio }}</div>
                            </div><br>
                        @endif
                        @if ((isset($provider->telefono)))
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Tel&eacute;fono:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $provider->telefono }}</div>
                            </div><br>
                        @endif
                        @if ((isset($provider->celular)))
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Celular:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $provider->celular }}</div>
                            </div><br>
                        @endif

                        @if ((isset($provider->correo)))
                            <div class="row m-t">
                                <div class="col-xs-12 col-md-4"><strong>Correo:</strong></div>
                                <div class="col-xs-12 col-md-8">{{ $provider->correo }}</div>
                            </div><br>
                        @endif

                    @endforeach
                </div>
            </section>

            <section class="panel panel-default">
                <header class="panel-heading">
                    <i class="fa fa-pencil icon"></i> Detalles
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-4"><strong>Importe:</strong></div>
                        <div class="col-xs-12 col-md-8">$ {{$payable_amount}} pesos</div>
                    </div>
                    <br>
                    <div class="row m-t">
                        <div class="col-xs-12 col-md-4"><strong>Comentarios:</strong></div>
                        <div class="col-xs-12 col-md-8">{{$comment}}</div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-7">

            <section class="panel panel-default">
                <header class="panel-heading">
                    <i class="fa fa-usd icon"></i> Listado de Abonos
                </header>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 m-b">
                                <a href="#" id="agregarAbono" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Agregar Abono</a>
                            </div>
                        </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th width="120">Fecha</th>
                                <th width="150" class="text-right">Abonos</th>
                                <th width="80"></th>
                            </tr>
                            <tr>
                                @foreach($payment_info as $payment)
                                <td> {{$payment->fetcha_hora}}</td>
                                <td class="text-right">$ {{$payment->cantidad}} pesos</td>
                                <td class="text-right">
                                    <a href="" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a>
                                </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th></th>
                                <th class="text-right">Total: $ {{$total_payment}} pesos</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="modal fade" id="modal-pagos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b text-center">Agregar Abono</h3>
                            <form role="form" class="form-horizontal" action="{{url('accounts_payable/store_payment')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-6 control-label"><strong>Abono</strong></label>
                                    <div class="col-md-6">
                                        <div class="input-group m-b">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" name="abono" value="0" class="form-control">
                                            <span class="input-group-addon"> pesos </span>
                                            <input type="hidden" id="account_id" name="account_id" value="{{$id_account}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkbox m-t-lg">
                                    <a class="btn btn-md btn-default m-t-n-xs" id="cancelar2"> <i class="fa fa-times"></i> <strong>Cancelar</strong></a>
                                    <button type="submit" class="btn btn-md pull-right btn-success m-t-n-xs"> <i class="fa fa-check"></i> <strong>Agregar abono</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
{{--


    </div>
    {{--    </form>--}}

    {{--        </div>--}}
    {{--    </div>--}}
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/datetimepicker/build/jquery.datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){

            $("#agregarAbono").click(function(){
                $("#modal-pagos").modal("show");
            });

            $("#cancelar2").click(function(){
                $("#modal-pagos").modal("hide");
            });
        });


    </script>
@endsection
