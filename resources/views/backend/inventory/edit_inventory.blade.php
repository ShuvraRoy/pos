@extends('backend.layouts.master')
@section('page_header','Editar inventario')
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
            <form class="bs-example form-horizontal" action="{{url('inventory/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">

                    <div class="tab-pane active" id="home">
                        @foreach($inventory_info as $inventory)
                        <div class="col-md-3">
                            <div class="col-sm-10">
                                <img height="200" width="200" src="{{asset($inventory->imagen)}}">
                                <input type="file" name="image" id="image" class="form-control">
                                <input type="hidden" id="default_image" name="default_image" value="{{ $inventory->imagen }}">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label class="">Imagen del Articulo</label>--}}
{{--                                <input type="file" name="file" class="form-control" placeholder="">--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombre del Articulo</label>
                                <div class="col-md-9"><input type="text" value="{{$inventory->articulo}}" name="nombre" class="form-control" placeholder=""></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Precio</label>
                                        <div class="col-md-6">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" name="precio" value="{{$inventory->precio}}" class="form-control">
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
                                                <div class="col-md-6"><input type="text" name="stock" value="{{$inventory->stock}}" class="form-control" placeholder=""></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-6 control-label">Alerta</label>
                                                <div class="col-md-6"><input type="text" name="alerta" value="{{$inventory->alerta}}" class="form-control" value="0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Descripcion</label>
                                <div class="col-md-9"><textarea class="form-control" name="descripcion"  style="height:150px;" placeholder="">{{$inventory->descripcion}}</textarea></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Observaciones</label>
                                <div class="col-md-9"><textarea class="form-control" name="observaciones" style="height:150px;" placeholder="">{{$inventory->observaciones}}</textarea></div>
                            </div>
                        </div>
                        @endforeach
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
                                @if ((isset($inventory_item)))
                                    @foreach ($inventory_item as $item)
                                        <tr>
                                        <td class="v-middle"><input type="text" value="{{$item->componente}}" name="componente[]" class="form-control"></td>
                                        <td class="v-middle"><input type="text" value="{{$item->cantidad}}" name="cantidad[]" class="form-control"></td>
                                        <td class="v-middle text-center" width="50px">
                                            <button class="btn btn-sm btn-danger clsEliminarFila"> <i class="fa fa-trash-o"></i></button>
                                        </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group text-right">
                        <input type="hidden" id="inventory_id" value="{{$inventory_id}}" name="inventory_id">
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
