@extends('backend.layouts.master')
@section('page_header','Historical de Ventas')
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
{{--        <form action="{{url('sales_history/date_filter')}}" method="post">--}}
{{--            @csrf--}}
{{--            <div class="panel-body">--}}

{{--            </div>--}}
{{--        </form>--}}
        <div class="table-responsive">
            <table class="table table-bordered datatable" id="sales_history_table">
                <thead>
                <tr class="replace-inputs">
                    <th>#</th>
                    <th>Fecha / Hora</th>
                    <th>Cliente</th>
                    <th>Destinatario</th>
                    <th>Direccion</th>
                    <th>Referencia</th>
                    <th>Total</th>
                    <th>Pagado</th>
                    <th>Estatus</th>
                    <th>pedido</th>
                    <th>F. Entrega</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div id="add_payment_modal" class="modal fade"
             role="dialog" tabindex="-1">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form action="{{url('sales_history/store_payment')}}" class="form-horizontal form-groups-bordered validate"
                      method="post" role="form" id="add_client_form">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="text-align: center">Agregar Pago</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Metodo de Pago</label>
                                <div class="col-sm-7">
                                    <select name="metod" id="metod" class="form-control">
                                        <option>Efectivo</option>
                                        <option>Tarjeta Debido/Credito</option>
                                        <option>Oxxo</option>
                                        <option>Paypal</option>
                                        <option>Credito</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-sm-3 control-label">Pago</label>

                                <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="cantidad" name="cantidad" rows="2"
                                                  placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-sm-3 control-label">Comentarios</label>

                                <div class="col-sm-7">
                                        <textarea class="form-control autogrow" id="comentario" name="comentario" rows="4"
                                                  placeholder=""></textarea>
                                </div>
                                <input type="hidden" id="add_sales_id" name="add_sales_id">
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
        <div id="delete_sales_history_modal" class="modal fade"
             role="dialog" tabindex="-1">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form action="{{url('sales_history/delete')}}" class="form-horizontal form-groups-bordered validate"
                      method="post" role="form" id="delete_sales_history_form">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="text-align: center; color: #00ffea" >Eliminar Ventas</h4>
                        </div>
                        <div class="modal-body">
                            <div style="text-align: center">
                                <span id="delete_sales_history"></span> El venta será eliminado. Está seguro?
                            </div>
                            <input type="hidden" id="delete_sales_history_id" name="delete_sales_history_id">
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
    <script src="{{ asset('backend/assets/js/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            initialise_table();
        });
        function initialise_table() {
            var sales_history_table = jQuery("#sales_history_table");
            let from = $("input[name=from_date]").val();
            let to = $("input[name=to_date]").val();
            sales_history_table.DataTable({
                order: [ [0, 'desc'] ],
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": false,
                "paging": true,
                "responsive": true,
                dom: 'Bfrtip',
                "ajax": {
                    "type": 'POST',
                    url:'{{ url("sales_history/get_sales_history_data") }}',
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                        }
                    },
                    {
                        extend: 'excelHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As Excel</button></a>',
                        title: "Sales Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                        }
                    },
                    {
                        extend: 'pdfHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As PDF</button></a>',
                        title: "Sales Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                        }
                    }
                ]
            });

            // Initalize Select Dropdown after DataTables is created
            sales_history_table.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });
        }
        function show_delete_modal(idventas) {
            $('#delete_sales_history_id').val(idventas);
            $('#delete_sales_history_modal').modal('show');
        }
        function show_add_payment_modal(idventas) {
            $('#add_sales_id').val(idventas);
            $("#add_payment_modal").modal("show");
        }
    </script>

@endsection
