@extends('backend.layouts.master')
@section('page_header','Agregar Articulo')
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

    <section class="panel panel-default">
        <header class="panel-heading bg-light">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-plus"></i> Agregar articulo</a></li>
                <li><a href="#profile" data-toggle="tab">Componentes</a></li>
            </ul>
        </header>
        <div class="panel-body">
            <form class="bs-example form-horizontal" action="{{url('add_inventory/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="">Imagen del Articulo</label>
                                <input type="file" name="file" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombre del Articulo</label>
                                <div class="col-md-9"><input type="text" name="nombre" class="form-control" placeholder=""></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Precio</label>
                                        <div class="col-md-6">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" name="precio" class="form-control">
                                                <span class="input-group-addon"> pesos </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Stock</label>
                                                <div class="col-md-6"><input type="text" name="stock" class="form-control" placeholder=""></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Alerta</label>
                                                <div class="col-md-6"><input type="text" name="alerta" class="form-control" value="0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Descripcion</label>
                                <div class="col-md-9"><textarea class="form-control" name="descripcion" style="height:150px;" placeholder=""></textarea></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Observaciones</label>
                                <div class="col-md-9"><textarea class="form-control" name="observaciones" style="height:150px;" placeholder=""></textarea></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile">
                        <div class="row">
                            <div class="col-md-12">
                                <a id="agregar" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Agregar Componente</a>
                                <br><br>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="imagenes" class="table table-bordered">
                                <tr>
                                    <th>Nombre del Componente</th>
                                    <th width="120">Cantidad</th>
                                    <th width="50"></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-md btn-success"><i class="fa fa-check icon"></i> Agregar</button>
                        <a href="{{url('inventory')}}" class="btn btn-md btn-danger"><i class="fa fa-times icon"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $("#agregar").click(function(){
                var nuevaFila = '<tr>'+
                    '<td class="v-middle">'+
                    '<input type="text" name="componente[]" class="form-control">'+
                    '</td>'+
                    '<td class="v-middle">'+
                    '<input type="text" name="cantidad[]" class="form-control">'+
                    '</td>'+
                    '<td class="v-middle text-center" width="50px"><button class="btn btn-sm btn-danger clsEliminarFila"> <i class="fa fa-trash-o"></i></button></td>'+
                    '</tr>';
                $('table#imagenes tr:last').after(nuevaFila);
                return false;
            });

            $(document).on('click','.clsEliminarFila',function(){
                var objFila = $(this).parents().get(1);
                $(objFila).remove();
            });
        });
    </script>
@endsection
