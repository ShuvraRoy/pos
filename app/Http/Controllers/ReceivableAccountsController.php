<?php

namespace App\Http\Controllers;

use App\Models\AccountspaymentModel;
use App\Models\ClientModel;
use App\Models\DeliveryModel;
use App\Models\SalesStateModel;
use Carbon\Carbon;
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
        $data['from'] = Carbon::today()->startOfMonth();
        $data['to'] = date('Y-m-d');
        $data['main_menu'] = "Cuentas por Cobrar";
        return view('backend.accounts.receivable', $data);
    }
    public function store_modified_sale(Request $request)
    {
        //dd($request->all());
        $id = $request->sales_id;
        $sales_item = SalesItemModel::where('idventa', $id)->first();
        //dd($sales_item);
        if ( $sales_item != null ){
            $sales_item ->delete();
        }
        $sale = SalesModel::where('idventas',$id)->get()->first();
        $sale->idcliente = $request->cliente;
        $sale->fetcha_hora = date('Y-m-d H:i:s');
        $sale->idusuario = Auth::user()->id;
        $sale->descuento = $request->descuento ? $request->descuento : 0;
        $sale->update();
        if( $request->idarticulo != null){
            $idarticulo = $request->idarticulo;
            $precio = $request->precio;
            $cantidad = $request->cantidad;
            $Total = 0;
            for ( $i=0; $i < count($idarticulo); $i++) {
                $total = $cantidad[$i] * $precio[$i];
                InventoryModel::where('idarticulos', $idarticulo[$i])->decrement('stock',$cantidad[$i]);
                $sales_item = new SalesItemModel();
                $sales_item->idventa = $id;
                $sales_item->idarticulo = $idarticulo[$i];
                $sales_item->precio = $precio[$i];
                $sales_item->cantidad = $cantidad[$i];
                $sales_item->total = $total;
                $sales_item->save();
                $Total += $total;
            }
        }
        return redirect('accounts_receivable')->with('success', 'Pago agregado correctamente');
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
        $data['main_menu'] = "Cuentas por Cobrar";
        $data['from'] = $from;
        $data['to'] = $to;
        return view('backend.accounts.receivable', $data);
    }
    public function delete_payment(Request $request)
    {
        $id = $request->delete_payment_id;
        dd($id);
        $account_payment = SalesPaymentModel::where('idpagos', $id)->first();
        if ($account_payment->delete()) {
            return redirect()->back()->with('success', 'Cuenta eliminado con éxito.');
        } else {
            return redirect()->back()->with('error', 'Error en la eliminación de Cuenta!');
        }
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
        $client_data = ClientModel::get();
        $sales_item = SalesItemModel::with('articulo_info')
            ->where('idventa', $id)
            ->get();
        $Total = 0;
            foreach ($sales_item as $srow) {
                $total = $srow->total;
                $Total += $total;
            }
        $article_info = InventoryModel::get();
            $sales_credit = SalesCreditModel::where('idventa', $id)->get();
        $sales_payment = SalesPaymentModel::where('idventa', $id)->get();
        $total_sales_payment = SalesPaymentModel::where('idventa', $id)->sum('cantidad');
        $delivery_info = DeliveryModel::where('idventa',$id)->get();
        $sales_state = SalesStateModel::where('idventa',$id)->get();
        $data['client_info'] = $client_info ;
        $data['client_data'] = $client_data ;
        $data['sales_info'] = $sales_info ;
        $data['sales_item'] = $sales_item ;
        $data['article_info'] = $article_info ;
        $data['sales_credit'] = $sales_credit ;
        $data['sales_payment'] = $sales_payment ;
        $data['delivery_info'] = $delivery_info ;
        $data['sales_state'] = $sales_state ;
        $data['total_sales_payment'] = $total_sales_payment ;
        $data['total_price'] = $Total ;
        //dd($data);
        return view('backend.accounts.salesdetails', $data);
    }
    public function add_payment(Request $request)
    {
        //dd($request->all());
        $id = $request->payment_id;
        if ( $request->has('cantidad2') ){
            $sales_payment = new SalesPaymentModel();
            $sales_payment->idventa = $id;
            $sales_payment->fetcha_hora = date('Y-m-d H:i:s');
            $sales_payment->cantidad = $request->cantidad2;
            $sales_payment->metodo = $request->metodo;
            $sales_payment->comentario = $request->comentario ? $request->comentario : "N/A";
            $sales_payment->save();
            return redirect()->back()->with('success', 'Pago agregado correctamente');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
        }
    }
    public function payment_date(Request $request)
    {
        ///dd($request->payment_date);
        $id = $request->payment_date;
        if ( $request->has('a_comentarios') ){
            $sales_credit = new SalesCreditModel();
            $sales_credit->idventa = $id;
            $sales_credit->fecha = $request->a_fecha;
            $sales_credit->comentarios = $request->a_comentarios ? $request->a_comentarios : "N/A";
            $sales_credit->save();
            return redirect()->back()->with('success', 'Pago programado con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
        }
    }
    public function fetch_article_data(Request $request)
    {
        $data = [];
        //dd($request->id);
        $id = $request->id;
        $article_info = InventoryModel::where('idarticulos',$id)->get();
        $data['article_info'] = $article_info;
        //dd($data);
        return response()->json($article_info);
    }
    public function fetch_receivable_accounts_data(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $toDate = date('Y-m-d', strtotime($to . " +1 days"));

        $get_receivable_accounts = SalesCreditModel::with('sales_info')
            ->where('ventas_creditos.fecha', '>=',$from)
            ->where('ventas_creditos.fecha', '<=', $toDate)
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
