@extends('backend.layouts.master')
@section('page_header','Proveedores')
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
    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-body">
            <div class="form-group">
                <button type="button" onclick="jQuery('#add_provider_modal').modal('show')" class="btn btn-primary btn-icon icon-left"><i class="entypo-plus"></i>Agregar Usuario</button>
            </div>
            <table class="table table-bordered datatable" id="provider_table">
                <thead>
                <tr class="replace-inputs">
                    <th>Razon Social</th>
                    <th>Contactto</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div id="add_provider_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('providers/store')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="add_provider_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center">Agregar Usuarios</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Nombre /Razon Social<span style="color: red">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="name" id="name"
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
                                        <input type="email" name="email" id="email"
                                               class="form-control"
                                               placeholder=""
                                        >
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
                                    <label for="url" class="col-sm-3 control-label">Domicilio</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="domicilio" name="domicilio" rows="2"
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
            <div id="edit_provider_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('providers/update')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="edit_generic_name_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center">Editar usuario</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Nombre <span style="color: red">*</span> </label>
                                    <div class="col-sm-7">
                                        <input type="text" name="provider_name" id="provider_name"
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
                                        <textarea class="form-control autogrow" id="provider_telefono" name="provider_telefono" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Correo</label>

                                    <div class="col-sm-7">
                                        <input type="email" name="provider_email" id="provider_email"
                                               class="form-control"
                                               placeholder=""
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">C.P</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="provider_codigopostal" name="provider_codigopostal" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Domicilio</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="provider_domicilio" name="provider_domicilio" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Colonia</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="provider_colonia" name="provider_colonia" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Estado</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="provider_estado" name="provider_estado" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">País</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="provider_pais" name="provider_pais" rows="2"
                                                  placeholder="Ex: Mexico"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">RFC</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="provider_rfc" name="provider_rfc" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Contacto</label>

                                    <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="provider_contacto" name="provider_contacto" rows="2"
                                                  placeholder=""></textarea>
                                    </div>
                                </div>

                                <input type="hidden" id="provider_id" name="provider_id">
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
            <div id="delete_provider_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('providers/delete')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="delete_provider_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center; color: #00ffea" >Eliminar Usuario</h4>
                            </div>
                            <div class="modal-body">
                                <div style="text-align: center">
                                    <span id="delete_provider"></span> El usuario será eliminado. Está seguro?
                                </div>
                                <input type="hidden" id="delete_provider_id" name="delete_provider_id">
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
            var provider_table = jQuery("#provider_table");

            provider_table.DataTable({
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": false,
                "paging": true,
                "responsive": true,
                dom: 'Bfrtip',
                "ajax": {
                    "type": 'POST',
                    "url": '{{url('providers/get_provider_data')}}',
                    "data" : {
                        "_token": "{{ csrf_token() }}"
                    },
                },
                buttons: [
                    {
                        extend: 'copyHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-export"></i>Copy Table Data</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4 ]
                        }
                    },
                    {
                        extend: 'excelHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As Excel</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As PDF</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2 ]
                        }
                    }
                ]
            });

            // Initalize Select Dropdown after DataTables is created
            provider_table.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });
        }
        function show_edit_modal(id, name, email, direction, contact, telefono, colonia, codigopostal, estado, pais, rfc ) {
            $('#provider_id').val(id);
            $('#provider_name').val(name);
            $('#provider_email').val(email);
            $('#provider_domicilio').val(direction);
            $('#provider_contacto').val(contact);
            $('#provider_telefono').val(telefono);
            $('#provider_colonia').val(colonia);
            $('#provider_codigopostal').val(codigopostal);
            $('#provider_estado').val(estado);
            $('#provider_pais').val(pais);
            $('#provider_rfc').val(rfc);
            $('#edit_provider_modal').modal('show');
        }
        function show_delete_modal(providerid, name) {
            var x = document.getElementById('delete_provider');
            x.innerHTML = name;
            $('#delete_provider_id').val(providerid);
            $('#delete_provider_modal').modal('show');
        }

    </script>
@endsection
