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

    <form class="bs-example form-horizontal" action="{{url('clients/delete_payment')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <section class="panel panel-default">
                    <header class="panel-heading">
                        <i class="fa fa-users"></i> Cliente
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
            </div>
            <div class="col-sm-12 col-md-8">
                <section class="panel panel-default pos-rlt clearfix">

                    <header class="panel-heading"> <i class="fa fa-usd"></i> Ventas</header>

                    <div class="row wrapper">
                        <div class="col-md-12 m-b-xs">
                            <a href="{{url('clients')}}" class="btn btn-sm btn-warning"><i class="fa fa-reply"></i> Regresar</a> &nbsp;&nbsp;&nbsp;
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th width="120">Fecha / Hora</th>
                                <th width="200" class="text-center">Total</th>
                                <th width="200" class="text-center">Liquidado</th>
                                <th></th>
                                <th width="120"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sale_info as $sales)
                            <tr>
                                <td>{{$sales->fetcha_hora}}}</td>
                                <td class="text-right">$ {{$sales->total}} pesos</td>
                                <td class="text-right">$ {{$sales->cantidad}} pesos</td>
                                @if($sales->total <= $sales->cantidad)
                                    <td class="text-center"><label class="label label-success"> liquidado</label></td>
                                @else
                                    <td class="text-center"> <label class="label label-warning"> pendiente</label></td>
                                @endif
                                <td class="text-center"> </td>
                                <td class="text-right">
{{--                                    <button type="submit" value="{{$clients->idpagos}}" name="delete_id" id="delete_id" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i></button>--}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>

    </form>
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



    </script>
@endsection
