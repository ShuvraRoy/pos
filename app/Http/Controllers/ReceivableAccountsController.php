<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use Illuminate\Http\Request;
use App\Models\SalesModel;
use App\Models\SalesItemModel;
use App\Models\SalesCreditModel;
use App\Models\InventoryModel;
use App\Models\SalesPaymentModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class ReceivableAccountsController extends Controller
{
    //
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
        $data['from'] = '2015-01-01';
        $data['to'] = date('Y-m-d');
        $data['main_menu'] = "Cuentas por Cobrar";
        return view('backend.accounts.receivable', $data);
    }
    public function date_filter(Request $request)
    {
        $data = [];
        if ($request->filled('from_date')) {
            $from = $request->from_date;
            $to = $request->to_date;
        } else {
            $from = '2010-01-01';
            $to = date('Y-m-d');
        }
        $data['main_menu'] = "Cuentas por Cobrar";
        $data['from'] = $from;
        $data['to'] = $to;
        return view('backend.accounts.receivable', $data);
    }
    public function client_sales(string $id)
    {
        $data = [];
        $data['main_menu'] = "Cuentas por Cobrar";
        $data['sub_menu'] = "Detalles de Ventas";
        $sales_info = SalesModel::where('idventas', $id)->get();
            foreach ($sales_info as $row) {
                $client_id = $row->idcliente;
            }
        $client_info = ClientModel::where('idclientes', $client_id)->get();
        $sales_item = SalesItemModel::where('idventa', $id)->get();
            foreach ($sales_item as $srow) {
                $article_id = $srow->idarticulo;
            }
        $article_info = InventoryModel::where('idarticulos', $article_id)->get();
            $sales_credit = SalesCreditModel::where('idventa', $id)->get();
        $sales_payment = SalesPaymentModel::where('idventa', $id)->get();
        $data['client_info'] = $client_info ;
        $data['sales_info'] = $sales_info ;
        $data['sales_item'] = $sales_item ;
        $data['article_info'] = $article_info ;
        $data['sales_credit'] = $sales_credit ;
        $data['sales_payment'] = $sales_payment ;
        //dd($data);
        return view('backend.accounts.salesdetails', $data);
    }
    public function fetch_receivable_accounts_data(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $get_receivable_accounts = SalesCreditModel::with('sales_info')
            ->where('ventas_creditos.fecha', '>=',$from)
            ->where('ventas_creditos.fecha', '<=', $to)
            ->get();

        if ($get_receivable_accounts->count() > 0) {
            $data = [];
            foreach ($get_receivable_accounts as $row) {
                $id = $row->idcreditos;
                $salesid = $row->idventa;
                $fecha = $row->fecha;
                $comments =$row->comentarios;
//
                $get_sales_info = SalesModel::where('idventas', $salesid)
                    ->get();
                foreach ($get_sales_info as $nrow ) {
                    $client_id = $nrow->idcliente;
                }
                $get_client_name = ClientModel::where('idclientes', $client_id)
                    ->get();
                foreach ($get_client_name as $crow ) {
                    $client_name = $crow->nombre;
                }
                $sale_url = route('client_sales', ['client'=>$salesid]);
                $sale_btn = "<a href=\"$sale_url\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Sales\" class=\"glyphicon glyphicon-usd\"></span></a>";
//
                $action = "$sale_btn";
                $temp = array();
                array_push($temp, $id);
                array_push($temp, $fecha);
                array_push($temp, $comments);
                array_push($temp, $client_name);
                array_push($temp, $action);
                array_push($data, $temp);

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
