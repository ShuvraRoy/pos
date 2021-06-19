@extends('backend.layouts.master')
@section('page_header','Clientes')
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
                <button type="button" onclick="jQuery('#add_client_modal').modal('show')" class="btn btn-primary btn-icon icon-left"><i class="entypo-plus"></i>Add New Client</button>
            </div>
            <table class="table table-bordered datatable" id="client_table">
                <thead>
                <tr class="replace-inputs">
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>E-mail</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div id="add_client_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('clients/store')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="add_client_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center">Agregar Cliente</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Nombre /Razon Social<span style="color: red">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nombre" id="nombre"
                                               class="form-control"
                                               data-validate="required"
                                               placeholder=""
                                        >
                                        <span id="name_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Telefono</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="telefono" name="telefono" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Correo</label>

                                    <div class="col-sm-7">
                                        <input type="email" name="correo" id="correo"
                                               class="form-control"
                                               placeholder=""
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Estado</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="estado" name="estado" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">País</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="pais" name="pais" rows="2"
                                                  placeholder="Ex: Mexico"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Domicilio</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="domicilio" name="domicilio" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">C.P</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="codigopostal" name="codigopostal" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Colonia</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="colonia" name="colonia" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Celular</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="celular" name="celular" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">RFC</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="rfc" name="rfc" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Contacto</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="contacto" name="contacto" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Comentarios</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="comentarios" name="comentarios" rows="4"
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
                    "url": '{{url('client/get_client_data')}}',
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
    // function show_edit_modal(id, name, description) {
    // $('#generic_name_id').val(id);
    // $('#generic_name').val(name);
    // $('#generic_name_description').val(description);
    // $('#edit_generic_name_modal').modal('show');
    // }

    </script>
@endsection
