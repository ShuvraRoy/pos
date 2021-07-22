<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SalesModel;
use App\Models\SalesItemModel;
use App\Models\SalesPaymentModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class ClearedSalesReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [];
        $data['from'] = Carbon::today()->startOfMonth();
        $data['to'] = date('Y-m-d');
        $data['main_menu'] = "Reportes";
        $data['sub_menu'] = "Liquidados";
        return view('backend.reports.cleared_sales_report', $data);
    }
    public function date_filter(Request $request)
    {
        $data = [];
        if ($request->filled('from_date')) {
            $from = $request->from_date;
            $to = $request->to_date;
        } else {
            $data['from'] = Carbon::today()->startOfMonth();
            $data['to'] = date('Y-m-d');
        }
        $data['main_menu'] = "Reportes";
        $data['sub_menu'] = "Liquidados";
        $data['from'] = $from;
        $data['to'] = $to;
        return view('backend.reports.cleared_sales_report', $data);
    }
    public function fetch_cleared_sales_report_data(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $toDate = date('Y-m-d', strtotime($to . " +1 days"));

        $get_sales_report = SalesModel::with('client_info')
            ->where('ventas.fetcha_hora', '>=',$from)
            ->where('ventas.fetcha_hora', '<=',$toDate)
            ->get();

        if ($get_sales_report->count() > 0) {
            $data = [];
            foreach ($get_sales_report as $row) {
                $id = $row->idventas;
                $fecha_hora = $row->fetcha_hora;
                $discount = $row->descuento;
                if ($row->idcliente != null) {
                    $client_name = $row->client_info->nombre;
                } else {
                    $client_name = 'N/A';
                }
                $get_sales_articulos = SalesItemModel::where('idventa', $id)
                    ->sum('total');
                $get_total = $get_sales_articulos - $discount;
                $get_amount = SalesPaymentModel::where('idventa', $id)
                    ->sum('cantidad');
                if ($get_amount >= $get_total) {
                    $status = "<label class='label label-success'>Liquidado</label>";
                } elseif ($get_amount < $get_total) {
                    $status = "<label class='label label-danger'>Pendiente</label>";
                    $id = 'null' ;
                }
                $get_method = SalesPaymentModel::where('idventa', $id)
                    ->get();
                foreach ($get_method as $nrow) {
                    $method = $nrow->metodo;

                    $temp = array();
                    array_push($temp, $id);
                    array_push($temp, $fecha_hora);
                    array_push($temp, $client_name);
                    array_push($temp, $get_total);
                    array_push($temp, $get_amount);
                    array_push($temp, $method);
                    array_push($temp, $status);
                    array_push($data, $temp);
                }
            }

            echo json_encode(array('data'=>$data));
        } else {
            echo '{
                    "sEcho": 1,
                    "iTotalRecords": "0",
                    "iTotalDisplayRecords": "0",
                    "aaData": []
                }';
        }

    }
}
