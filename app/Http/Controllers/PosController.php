<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Auth;
use Carbon\Carbon;
use App\Models\ClientModel;
use Illuminate\Http\Request;
use App\Models\SalesModel;
use App\Models\SalesItemModel;
use App\Models\SalesCreditModel;
use App\Models\InventoryModel;
use App\Models\SalesPaymentModel;
use App\Models\DeliveryModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class PosController extends Controller
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
        $data['main_menu'] = "POS";
        $client_info = ClientModel::get();
        $article_info = InventoryModel::get();
        $data['client_info'] = $client_info;
        $data['article_info'] = $article_info;
        //dd($data);
        return view('backend.pos.index', $data);
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
    public function store(Request $request)
    {
        $sale = new SalesModel();
        $sale->fetcha_hora = date('Y-m-d H:i:s');
        $sale->idcliente = $request->cliente;
        $sale->idusuario = Auth::user()->id;
        $sale->descuento = $request->descuento ? $request->descuento : 0;
        $sale->estatus = "Pendiente";
        $sale->save();
        $idventa =$sale->idventas;
        //dd($idventa);

        $idarticulo = $request->idarticulo;
        $precio = $request->precio;
        $cantidad = $request->cantidad;
        $Total = 0;
        for ( $i=0; $i < count($idarticulo); $i++) {
            $total = $cantidad[$i] * $precio[$i];
            InventoryModel::where('idarticulos', $idarticulo[$i])->decrement('stock',$cantidad[$i]);
            $sales_item = new SalesItemModel();
            $sales_item->idventa = $idventa;
            $sales_item->idarticulo = $idarticulo[$i];
            $sales_item->precio = $precio[$i];
            $sales_item->cantidad = $cantidad[$i];
            $sales_item->total = $total;
            $sales_item->save();
            $Total += $total;
        }
        if ( $request->has('pagocon') ){
            //dd($request->pagocon);
            $payment = $request->pagocon;
            if( $payment != null ){
                if( $payment >= $Total ){
                    $total_payment = $Total;
                } else {
                    $total_payment = $payment;
                }
            } else {
                $total_payment = 0;
            }
            $sales_payment = new SalesPaymentModel();
            $sales_payment->idventa = $idventa;
            $sales_payment->fetcha_hora = date('Y-m-d H:i:s');
            $sales_payment->cantidad = $total_payment;
            $sales_payment->metodo = $request->metodo;
            $sales_payment->comentario = "";
            $sales_payment->save();
            $cambio = $total_payment - $Total;
        }
        $delivery = new DeliveryModel();
        $delivery->idventa = $idventa;
        $delivery->nombre = $request->e_nombre;
        $delivery->direccion = $request->e_direccion;
        $delivery->fetcha_hora = $request->date ;
        $delivery->hora = $request->time ;
        $delivery->referencia = $request->e_referencia;
        $delivery->colonia = $request->e_colonia;
        $delivery->mensaje = $request->e_mensaje;
        $delivery->codigopostal = $request->e_codigopostal;
        $delivery->commentarios = $request->comen;
        $delivery->save();

        return redirect('home')->with('success', 'Venta agregada con éxito');
    }
    public function store_inventory(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'articulo_nombre' => 'required',
            'articulo_precio' => 'required'
        ]);
        $inventory = new InventoryModel();
        $inventory->articulo = $request->articulo_nombre;
        $inventory->precio = $request->articulo_precio;
        $inventory->stock = 0;
        $inventory->alerta = 0;
        $inventory->descripcion = $request->articulo_descripcion ? $request->articulo_descripcion : null;

        if ($inventory->save()) {
            return redirect('pos')->with('success', 'Articulo agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
        }
    }
    public function store_client(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nombre' => 'required',
            'correo' => 'email'
        ]);
        $client = new ClientModel();
        $client->nombre = $request->nombre;
        $client->telefono = $request->telefono;
        $client->correo = $request->correo;
        $client->domicilio = $request->direccion;

        if ($client->save()) {
            return redirect('pos')->with('success', 'Cliente agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
        }
    }

}
