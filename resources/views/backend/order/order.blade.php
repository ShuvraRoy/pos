@extends('backend.layouts.master')
@section('page_header','Listado de Pedidos')
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
        <form action="{{url('orders/date_filter')}}" method="post">
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
            <table class="table table-bordered datatable" id="orders_table">
                <thead>
                <tr class="replace-inputs">
                    <th>#</th>
                    <th>Fecha / Hora</th>
                    <th>Cliente</th>
                    <th>Para</th>
                    <th>Direccion</th>
                    <th>Articulos</th>
                    <th>Estatus</th>
                    <th>Pedido</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
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
            var orders_table = jQuery("#orders_table");
            let from = $("input[name=from_date]").val();
            let to = $("input[name=to_date]").val();
            orders_table.DataTable({
                order: [ [0, 'desc'] ],
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": false,
                "paging": true,
                "responsive": true,
                dom: 'Bfrtip',
                "ajax": {
                    "type": 'POST',
                    url:'{{ url("orders/get_orders_data") }}',
                    "data" : {
                        "_token": "{{ csrf_token() }}",
                        from:from,
                        to:to
                    },
                },
                buttons: [
                    {
                        extend: 'copyHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-export"></i>Copy Table Data</button></a>',
                        title: "Order Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'excelHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As Excel</button></a>',
                        title: "Order Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'pdfHtml5', text: '<a><button class="btn btn-primary btn-icon icon-left"><i class="entypo-download"></i>Download As PDF</button></a>',
                        title: "Order Report",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    }
                ]
            });

            // Initalize Select Dropdown after DataTables is created
            orders_table.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });
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
