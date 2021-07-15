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
                $sale_amount = SalesItemModel::where('idventa', $sale_id)->sum('total');
                $sale_item = SalesItemModel::with('articulo_info')->where('ventas_articulos.idventa', $sale_id)->get();
                $delivery_info = DeliveryModel::where('idventa', $sale_id)->get();
                $get_payment = SalesPaymentModel::where('idventa',$sale_id)->sum('cantidad');
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
            ->select('ventas_creditos.comentarios','ventas_creditos.fecha','ventas_creditos.idventa','clientes.nombre')->first();
        $sales_order = DeliveryModel::whereDate('destinatarios.fetcha_hora', Carbon::today())
            ->Join('ventas', 'ventas.idventas', '=', 'destinatarios.idventa')
            ->Join('clientes', 'clientes.idclientes', '=', 'ventas.idcliente')
            ->select('destinatarios.*','ventas.estatus','ventas.idventas','ventas.descuento','clientes.nombre as nomcliente')
            ->orderBy('idventa', 'DESC')->first();
        if( $sales_order != null ){
            $total_amount = SalesItemModel::where('idventa',$sales_order->idventas)->sum('total');
            $paid_amount = SalesPaymentModel::where('idventa',$sales_order->idventas)->sum('cantidad');
            $article = SalesItemModel::where('ventas_articulos.idventa',$sales_order->idventas)
                ->leftJoin('articulos','articulos.idarticulos','=', 'ventas_articulos.idarticulo')
                ->select('articulos.articulo')->first();
            $total = $total_amount - $sales_order->descuento;
            if( $paid_amount >= $total ){
                $status = 'Liquidado';
            } else {
                $status = 'Pendiente';
            }
        } else {
            $status = "";
            $article ="";
            $total = "";
            $paid_amount = "";
        }

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
        $payment->comentario = $request->comentario ? $request->comentario : null;
        $payment->metodo = $request->metodo;
        if ($payment->save()) {
            return redirect('home')->with('success', 'Pago agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo.');
        }
    }
}
