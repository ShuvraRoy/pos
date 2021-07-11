@extends('backend.layouts.master')
@section('page_header','Cuentas por pagar')
@section('page_links')
    <link rel="stylesheet" href="{{ asset('backend/assets/js/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/js/selectboxit/jquery.selectBoxIt.css') }}">
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
        <form action="{{url('accounts_payable/date_filter')}}" method="post">
            @csrf
            <div class="panel-body">
                <div class="row input-daterange">
                    <div class="col-md-4">
                        <input type="text" name="from_date" id="from_date" value="{{$from}}" class="form-control" placeholder="From Date" readonly />
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="to_date" id="to_date" value="{{$to}}" class="form-control" placeholder="To Date" readonly />
                    </div>
                    <div class="col-md-4">

                        <button type="submit" name="search" id="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <br />
            </div>
        </form>
        <div class="table-responsive">
            <div class="form-group">
                <button type="button" onclick="jQuery('#add_account_modal').modal('show')" class="btn btn-primary btn-icon icon-left"><i class="entypo-plus"></i>Agregar Cuenta por Pagar</button>
            </div>
            <table class="table table-bordered datatable" id="accounts_payable_table">
                <thead>
                <tr class="replace-inputs">
                    <th>Fecha / Hora</th>
                    <th>Proveedor</th>
                    <th>Total</th>
                    <th>Pagado</th>
                    <th>Estatus</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div class="modal fade" id="add_account_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="m-t-none m-b">Agregar Cuenta por Pagar</h3>
                                    <form role="form" action="{{url('accounts_payable/store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label"><strong>Proveedor</strong></label>
                                            <select name="idproveedor" class="form-control">
                                                <option value=""></option>
                                                @if ((isset($provider_info)))
                                                    @foreach ($provider_info as $provider)
                                                        <option value="{{$provider->idproveedores}}">{{$provider->nombre}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Cantidad</strong></label>
                                                    <div class="input-group m-b">
                                                        <span class="input-group-addon">$</span>
                                                        <input type="text" name="cantidad" class="form-control">
                                                        <span class="input-group-addon"> pesos </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>Abono</strong></label>
                                                    <div class="input-group m-b">
                                                        <span class="input-group-addon">$</span>
                                                        <input type="text" name="abono" value="0" class="form-control">
                                                        <span class="input-group-addon"> pesos </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label><strong>Comentarios</strong></label>
                                            <textarea class="form-control" name="comentarios" style="height:150px;"></textarea>
                                        </div>
                                        <div class="checkbox m-t-lg">
                                            <button type="submit" class="btn btn-success" id="add_btn">Save</button>
                                            <button type="button" class="btn btn-white"
                                                    data-dismiss="modal">Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <div id="delete_account_modal" class="modal fade"
                 role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="{{url('accounts_payable/delete')}}" class="form-horizontal form-groups-bordered validate"
                          method="post" role="form" id="delete_accounts_form">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="text-align: center; color: #00ffea" >Eliminar quentas</h4>
                            </div>
                            <div class="modal-body">
                                <div style="text-align: center">
                                    <span id="delete_account"></span> El quentas será eliminado. Está seguro?
                                </div>
                                <input type="hidden" id="delete_accounts_id" name="delete_accounts_id">
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
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            initialise_table();
        });
        function initialise_table() {
            var accounts_payable_table = jQuery("#accounts_payable_table");
            let from = $("input[name=from_date]").val();
            let to = $("input[name=to_date]").val();
            accounts_payable_table.DataTable({
                order: [ [0, 'desc'] ],
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": false,
                "paging": true,
                "responsive": true,
                dom: 'Bfrtip',
                "ajax": {
                    "type": 'POST',
                    url:'{{ url("accounts_payable/get_accounts_payable_data") }}',
                    "data" : {
                        "_token": "{{ csrf_token() }}",
                        from:from,
                        to:to
                    },
                },
                buttons: [
                    {
                        extend: 'copyHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-export"></i>Copy Table Data</button></a>',
                        title: "Sales Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'excelHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As Excel</button></a>',
                        title: "Sales Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdfHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As PDF</button></a>',
                        title: "Sales Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    }
                ]
            });

            // Initalize Select Dropdown after DataTables is created
            accounts_payable_table.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });
        }
        function show_delete_modal(id, nombre) {
            $('#delete_accounts_id').val(id);
            $('#delete_account_modal').modal('show');
        }
        $(document).ready(function(){
            $('.input-daterange').datepicker({
                todayBtn:'linked',
                format:'yyyy-mm-dd',
                autoclose:true,
                daysOfWeek: ['DO', 'Lu', 'Ma', 'Mi', 'Ju', 'Vie', 'Sa'],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Julio', 'Agosto', 'Saptiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            });
        });
    </script>

@endsection
