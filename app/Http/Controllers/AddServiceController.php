<?php

namespace App\Http\Controllers;

use App\Models\ServiceItemModel;
use App\Models\ServiceModel;
use App\Models\ServicePaymentModel;
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

class AddServiceController extends Controller
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
        $data['main_menu'] = "Servicios";
        $client_info = ClientModel::get();
        $article_info = InventoryModel::get();
        $data['client_info'] = $client_info;
        $data['article_info'] = $article_info;
        //dd($data);
        return view('backend.service.add_service', $data);
    }
    public function fetch_article_data(Request $request)
    {
        $data = [];
        $id = $request->id;
        $article_info = InventoryModel::where('idarticulos',$id)->get();
        $data['article_info'] = $article_info;
        return response()->json($article_info);
    }
    public function store(Request $request)
    {

        $service = new ServiceModel();
        $service->fecha_hora = date('Y-m-d H:i:s');
        $service->idcliente = $request->cliente;
        $service->idusuario = Auth::user()->id;
        $service->descuento = $request->descuento ? $request->descuento : 0;
        $service->estatus = "Pendiente";
        $service->save();
        $idservicio = $service->idservicios;
        //dd($idventa);

        $idarticulo = $request->idarticulo;
        $precio = $request->precio;
        $cantidad = $request->cantidad;
        $Total = 0;
        for ( $i=0; $i < count($idarticulo); $i++) {
            $total = $cantidad[$i] * $precio[$i];
            InventoryModel::where('idarticulos', $idarticulo[$i])->decrement('stock',$cantidad[$i]);
            $service_item = new ServiceItemModel();
            $service_item->idservicio = $idservicio;
            $service_item->idarticulo = $idarticulo[$i];
            $service_item->precio = $precio[$i];
            $service_item->cantidad = $cantidad[$i];
            $service_item->total = $total;
            $service_item->save();
            $Total += $total;
        }
        if ( $request->has('pagocon') ){
            $payment = $request->pagocon;
            if( $payment >= $Total ){
                $total_payment = $Total;
            } else {
                $total_payment = $payment;
            }
            $service_payment = new ServicePaymentModel();
            $service_payment->idservicio = $idservicio;
            $service_payment->fetcha_hora = date('Y-m-d H:i:s');
            $service_payment->cantidad = $total_payment;
            $service_payment->metodo = $request->metodo;
            $service_payment->comentario = "";
            $service_payment->save();
            $cambio = $total_payment - $Total;
        }

        return redirect('home')->with('success', 'Servicio agregada con éxito');
    }
    public function store_inventory(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'servicio_nombre' => 'required',
            'articulo_precio' => 'required'
        ]);
        $inventory = new InventoryModel();
        $inventory->articulo = $request->servicio_nombre;
        $inventory->precio = $request->articulo_precio;
        $inventory->stock = 0;
        $inventory->alerta = 0;
        $inventory->descripcion = $request->articulo_descripcion ? $request->articulo_descripcion : null;

        if ($inventory->save()) {
            return redirect('add_service')->with('success', 'Articulo agregada con éxito');
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
            return redirect('add_service')->with('success', 'Cliente agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
        }
    }
}
