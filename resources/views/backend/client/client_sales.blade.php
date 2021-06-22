@extends('backend.layouts.master')
@section('page_header','Cliente Ventas')
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
{{--            <div class="form-group">--}}
{{--                <button type="button" onclick="jQuery('#add_client_modal').modal('show')" class="btn btn-primary btn-icon icon-left"><i class="entypo-plus"></i>Add New Client</button>--}}
{{--            </div>--}}
            <div class="col-md-6">

                <h4>Ventas</h4>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><h3>Fecha</h3></th>
                        <th><h3>Hora</h3></th>
                        <th><h3>Total</h3></th>
                        <th><h3>Liquidado</h3></th>
                    </tr>
                    </thead>


                </table>

            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script src="{{ asset('backend/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2/select2.min.js') }}"></script>
    <script type="text/javascript">




    </script>
@endsection
