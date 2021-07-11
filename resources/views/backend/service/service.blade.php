@extends('backend.layouts.master')
@section('page_header','Servicios')
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
        {{--        <li class="active">--}}
        {{--            <strong>{{$sub_menu}}</strong>--}}
        {{--        </li>--}}
    </ol>
@endsection
@section('page_content')
    @include('backend.error.error_msg')
    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-body">
            <div class="form-group">
                <a href = "{{url('add_service')}}"><button class="btn btn-primary btn-icon icon-left"><i class="entypo-plus"></i>Nuevo Servicio</button></a>
            </div>
            <table class="table table-bordered datatable" id="client_table">
                <thead>
                <tr class="replace-inputs">
                    <th>#</th>
                    <th>Fecha / Hora</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Pagado</th>
                    <th>Estatus</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div id="add_service_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('service/store')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="add_service_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center">Agregar Articulo</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Nombre del Articulo<span style="color: red">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="articulo" id="articulo"
                                               class="form-control"
                                               data-validate="required"
                                               placeholder=""
                                        >
                                        <span id="name_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Imagen del Articulo<span style="color: red"></span> </label>
                                    <div class="col-sm-7">
                                        <input type="file" name="imagen" id="imagen"
                                               class="form-control file2 inline btn btn-primary"
                                               data-label="<i class='glyphicon glyphicon-file'></i> Browse" />
                                        {{--                                        <input type="file" name="imagen" id="imagen"--}}
                                        {{--                                               class="form-control"--}}
                                        {{--                                               data-validate="required"--}}
                                        {{--                                               placeholder=""--}}
                                        {{--                                        >--}}
                                        <span id="name_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Precio</label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            {{--                                            <input type="text" class="form-control">--}}
                                            <input type="number" name="precio" id="precio" class="form-control">
                                            <span class="input-group-addon">pesos</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Stock</label>

                                    <div class="col-sm-4">
                                        <input type="number" name="stock" id="stock" class="form-control">
                                        {{--                                        <textarea class="form-control autogrow" id="stock" name="stock" rows="2"--}}
                                        {{--                                                  placeholder=""></textarea>--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Alerta</label>

                                    <div class="col-sm-4">
                                        <input type="number" name="alerta" id="alerta" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Descripcion</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="descripcion" name="descripcion" rows="4"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Observaciones</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="observaciones" name="observaciones" rows="4"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="add_btn">Save</button>
                                <button type="button" class="btn btn-white"
                                        data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="edit_service_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('service/update')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="edit_service_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center">Editar articulo</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Nombre del Articulo<span style="color: red">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="edit_articulo" id="edit_articulo"
                                               class="form-control"
                                               data-validate="required"
                                               placeholder=""
                                        >
                                        <span id="name_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Imagen del Articulo<span style="color: red"></span> </label>
                                    <div class="col-sm-7">
                                        <input type="file" name="edit_imagen" id="edit_imagen"
                                               class="form-control file2 inline btn btn-primary"
                                               data-label="<i class='glyphicon glyphicon-file'></i> Browse" />
                                        {{--                                        <input type="file" name="imagen" id="imagen"--}}
                                        {{--                                               class="form-control"--}}
                                        {{--                                               data-validate="required"--}}
                                        {{--                                               placeholder=""--}}
                                        {{--                                        >--}}
                                        <span id="name_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Precio</label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            {{--                                            <input type="text" class="form-control">--}}
                                            <input type="number" name="edit_precio" id="edit_precio" class="form-control">
                                            <span class="input-group-addon">pesos</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Stock</label>

                                    <div class="col-sm-4">
                                        <input type="number" name="edit_stock" id="edit_stock" class="form-control">
                                        {{--                                        <textarea class="form-control autogrow" id="stock" name="stock" rows="2"--}}
                                        {{--                                                  placeholder=""></textarea>--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Alerta</label>

                                    <div class="col-sm-4">
                                        <textarea class="form-control autogrow" id="edit_alerta" name="edit_alerta" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Descripcion</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="edit_descripcion" name="edit_descripcion" rows="4"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Observaciones</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="edit_observaciones" name="edit_observaciones" rows="4"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>

                                <input type="hidden" id="idarticulos" name="idarticulos">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="edit_btn">Update</button>
                                <button type="button" class="btn btn-white"
                                        data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="delete_service_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('service/delete')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="delete_service_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center; color: #00ffea" >Eliminar inventario</h4>
                            </div>
                            <div class="modal-body">
                                <div style="text-align: center">
                                    <span id="delete_client"></span> El artículo será eliminado. Está seguro?
                                </div>
                                <input type="hidden" id="delete_service_id" name="delete_service_id">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="delete_btn">Delete</button>
                                <button type="button" class="btn btn-white"
                                        data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            initialise_table();
        });
        function initialise_table() {
            var client_table = jQuery("#client_table");

            client_table.DataTable({
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": false,
                "paging": true,
                "responsive": true,
                dom: 'Bfrtip',
                "ajax": {
                    "type": 'POST',
                    "url": '{{url('service/get_service_data')}}',
                    "data" : {
                        "_token": "{{ csrf_token() }}"
                    },
                },
                buttons: [
                    {
                        extend: 'copyHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-export"></i>Copy Table Data</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'excelHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As Excel</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdfHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As PDF</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    }
                ]
            });

            // Initalize Select Dropdown after DataTables is created
            client_table.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });
        }
        function show_edit_modal(idarticulos, articulo, precio, stock, alerta, descripcion, observaciones) {
            $('#idarticulos').val(idarticulos);
            $('#edit_articulo').val(articulo);
            // $('#edit_imagen').val(imagen);
            $('#edit_precio').val(precio);
            $('#edit_stock').val(stock);
            $('#edit_alerta').val(alerta);
            $('#edit_descripcion').val(descripcion);
            $('#edit_observaciones').val(observaciones);
            $('#edit_service_modal').modal('show');
        }
        function show_delete_modal(idarticulos, articulo) {
            var x = document.getElementById('delete_client');
            x.innerHTML = articulo;
            $('#delete_service_id').val(idarticulos);
            $('#delete_service_modal').modal('show');
        }

    </script>
@endsection
