<?php

namespace App\Http\Controllers;

use App\Models\DeliveryModel;
use App\Models\SalesCreditModel;
use App\Models\SalesItemModel;
use App\Models\SalesModel;
use App\Models\SalesPaymentModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('main_menu', 'Inicio');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $Total_sale = 0;
        $data['main_menu'] = "Inicio";
        $data['sale'] = SalesModel::whereDate('fetcha_hora', Carbon::today())->count();
        $data['income'] = SalesPaymentModel::whereDate('fetcha_hora', Carbon::today())->sum('cantidad');
        $data['orders'] = DeliveryModel::whereDate('fetcha_hora', Carbon::today())->count();
        $sales_info = SalesModel::with('client_info')
            ->whereDate('ventas.fetcha_hora', Carbon::today())->get();
        if( $sales_info->count() > 0 )
        {
            foreach($sales_info as $row){
                $sale_id = $row->idventas;
                $discount = $row->descuento;
                $sale_amount = SalesItemModel::where('idventa', $sale_id)->sum('total');
                $sale_item = SalesItemModel::with('articulo_info')->where('ventas_articulos.idventa', $sale_id)->get();
                $delivery_info = DeliveryModel::where('idventa', $sale_id)->get();
                $get_payment = SalesPaymentModel::where('idventa',$sale_id)->sum('cantidad');
                $sale_actual_amount = $sale_amount - $discount;
                $Total_sale += $sale_actual_amount;
            }
        } else {
            $sale_amount = "";
            $sale_item = "";
            $delivery_info = "";
            $get_payment ="";
        }
        $sales_credit = SalesCreditModel::whereDate('ventas_creditos.fecha', Carbon::today())
            ->leftJoin('ventas', 'ventas.idventas', '=', 'ventas_creditos.idventa')
            ->leftJoin('clientes', 'clientes.idclientes', '=', 'ventas.idcliente')
            ->select('ventas_creditos.comentarios','ventas_creditos.fecha','ventas_creditos.idventa','clientes.nombre')->get();
        $sales_order = DeliveryModel::whereDate('destinatarios.fetcha_hora', Carbon::today())
            ->Join('ventas', 'ventas.idventas', '=', 'destinatarios.idventa')
            ->Join('clientes', 'clientes.idclientes', '=', 'ventas.idcliente')
            ->select('destinatarios.*','ventas.estatus','ventas.idventas','ventas.descuento','clientes.nombre as nomcliente')
            ->orderBy('idventa', 'DESC')->get();
        //dd($sales_order->idventas);
        if( $sales_order != null ){
            $i = 0;
            foreach ( $sales_order as $sales){
                $idventas[$i] = $sales->idventas;
                $discount = $sales->descuento;
                $total_amount[$i] = SalesItemModel::where('idventa',$idventas[$i])->sum('total');
                $paid_amount[$i] = SalesPaymentModel::where('idventa',$idventas[$i])->sum('cantidad');
                $article[$i] = SalesItemModel::where('ventas_articulos.idventa',$idventas[$i])
                    ->leftJoin('articulos','articulos.idarticulos','=', 'ventas_articulos.idarticulo')
                    ->value('articulos.articulo');
                $total[$i] = $total_amount[$i] - $discount;
                if( $paid_amount[$i] >= $total[$i] ){
                    $status[$i] = 'Liquidado';
                } else {
                    $status[$i] = 'Pendiente';
                }
                $i++;

            }
        } else {
            $status = "";
            $article ="";
            $total = "";
            $paid_amount = "";
        }
        //dd($status);
        $data['sale_amount'] = $sale_amount;
        $data['sales_info'] = $sales_info;
        $data['sale_item'] = $sale_item;
        $data['delivery_info'] = $delivery_info;
        $data['get_payment'] = $get_payment;
        $data['sales_credit'] = $sales_credit;
        $data['status'] = $status;
        $data['sales_order'] = $sales_order;
        $data['article'] = $article;
        $data['total'] = $total;
        $data['Total_sale'] = $Total_sale;
        $data['paid_amount'] = $paid_amount;
//        dd($article->articulo);
        return view('backend.home.index', $data);
    }
    public function store_payment(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'metodo' => 'required',
            'cantidad' => 'required',

        ]);
        $payment = new SalesPaymentModel();
        $payment->idventa = $request->idventa;
        $payment->fetcha_hora = date('Y-m-d H:i:s');
        $payment->cantidad = $request->cantidad ;
        $payment->comentario = $request->comentario ? $request->comentario : "";
        $payment->metodo = $request->metodo;
        if ($payment->save()) {
            return redirect('home')->with('success', 'Pago agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo.');
        }
    }
}
