@extends('backend.layouts.master')
@section('page_header','Usuarios')
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
                <button type="button" onclick="jQuery('#add_user_modal').modal('show')" class="btn btn-primary btn-icon icon-left"><i class="entypo-plus"></i>Agregar Usuario</button>
            </div>
            <table class="table table-bordered datatable" id="user_table">
                <thead>
                <tr class="replace-inputs">
                    <th>Privilegio</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div id="add_user_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('users/store')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="add_user_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center">Agregar Usuarios</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Nombre<span style="color: red">*</span> </label>
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
                                    <label for="url" class="col-sm-3 control-label">Correo</label>

                                    <div class="col-sm-7">
                                        <input type="email" name="email" id="email"
                                               class="form-control"
                                               placeholder=""
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Privilegio</label>

                                    <div class="col-sm-7">
                                        <select name="privilegio" id="privilegio" class="form-control">
                                            <option value="1">Administrador</option>
                                            <option value="2">Usuario</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Password<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="password" data-validate="required"
                                               name="password" placeholder="Ex: XXXXXXX">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Confirm Password<span
                                            style="color: red">*</span></label>

                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="password_confirmation" data-validate="required"
                                               name="password_confirmation" placeholder="Ex: XXXXXXX">
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
            <div id="edit_user_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('users/update')}}" class="form-horizontal form-groups-bordered validate"
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
                                        <input type="text" name="user_name" id="user_name"
                                               class="form-control"
                                               data-validate="required"
                                               placeholder=""
                                        >
                                        <span id="name_err"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-3 control-label">Correo</label>

                                    <div class="col-sm-7">
                                        <input type="email" name="user_email" id="user_email"
                                               class="form-control"
                                               placeholder=""
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Privilegio</label>

                                    <div class="col-sm-7">
                                        <select name="user_privilegio" id="user_privilegio"  class="form-control">
                                            <option value="1">Administrador</option>
                                            <option value="2">Usuario</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" id="userid" name="userid">
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
            <div id="delete_user_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('users/delete')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="delete_user_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center; color: #00ffea" >Eliminar Usuario</h4>
                            </div>
                            <div class="modal-body">
                                <div style="text-align: center">
                                    <span id="delete_user"></span> El usuario será eliminado. Está seguro?
                                </div>
                                <input type="hidden" id="delete_user_id" name="delete_user_id">
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
            var user_table = jQuery("#user_table");

            user_table.DataTable({
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": false,
                "paging": true,
                "responsive": true,
                dom: 'Bfrtip',
                "ajax": {
                    "type": 'POST',
                    "url": '{{url('users/get_user_data')}}',
                    "data" : {
                        "_token": "{{ csrf_token() }}"
                    },
                },
                buttons: [
                    {
                        extend: 'copyHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-export"></i>Copy Table Data</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2 ]
                        }
                    },
                    {
                        extend: 'excelHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As Excel</button></a>',
                        title: "Client List",
                        exportOptions: {
                            columns: [0, 1, 2 ]
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
            user_table.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });
        }
        function show_edit_modal(userid, name, email, privilegio ) {
            $('#userid').val(userid);
            $('#user_name').val(name);
            $('#user_email').val(email);
            $('#user_privilegio').val(privilegio);
            $('#edit_user_modal').modal('show');
        }
        function show_delete_modal(userid, name) {
            var x = document.getElementById('delete_user');
            x.innerHTML = name;
            $('#delete_user_id').val(userid);
            $('#delete_user_modal').modal('show');
        }

    </script>
@endsection
