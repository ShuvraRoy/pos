<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use App\Models\DeliveryModel;
use App\Models\InventoryModel;
use App\Models\SalesCreditModel;
use App\Models\SalesItemModel;
use App\Models\SalesModel;
use App\Models\SalesPaymentModel;
use App\Models\SalesStateModel;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        $data['from'] = '2015-01-01';
        $data['to'] = date('Y-m-d',time()+86400);
        $data['main_menu'] = "Pedidos";
        $data['sub_menu'] = "";
        return view('backend.order.order', $data);
    }
    public function edit_status(Request $request)
    {
        //dd($request->all());
        $id = $request->edit_sale_id;
        $request->validate([
            'estado' => 'required',
        ]);
        $sales = SalesModel::where('idventas',$id)->get()->first();
        $sales->estatus = $request->estado;
        $sales->save();
        $sales_status = SalesStateModel::where('idventa',$id)->get()->first();
        if ( $sales_status != null){
            $sales_status->estado = $request->estado;
            $sales_status->fetcha_hora = date('Y-m-d H:i:s');
            $sales_status->commentarios = $request->comentarios;
            if ( $sales_status->save()) {
                return redirect('orders')->with('success', 'Entrega editada correctamente');
            } else {
                return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
            }
        } else {
            return redirect()->back()->with('error', 'El estado del pedido no se registra');
        }

    }
    public function edit_delivery(Request $request)
    {
        //dd($request->all());
        $id = $request->edit_sales_id;
        $request->validate([
            'e_nombre' => 'required',
        ]);
        $delivery = DeliveryModel::where('idventa',$id)->get()->first();
        $delivery->nombre = $request->e_nombre;
        $delivery->direccion = $request->e_direccion;
        $delivery->fetcha_hora = $request->e_fechaentrega;
        $delivery->referencia = $request->e_referencia;
        $delivery->colonia = $request->e_colonia;
        $delivery->codigopostal = $request->e_codigopostal;
        $delivery->mensaje = $request->e_mensaje;
        $delivery->commentarios = $request->comen;

        if ( $delivery->save()) {
            return redirect('orders')->with('success', 'Entrega editada correctamente');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
        }
    }
    public function archiv(string $id)
    {
        $data = [];
        $data['main_menu'] = "Pedidos";
        $data['sub_menu'] = "";
        $sales_info = SalesModel::where('idventas', $id)->get();
        foreach ($sales_info as $row) {
            $client_id = $row->idcliente;
        }
        $client_info = ClientModel::where('idclientes', $client_id)->get();
        $sales_item = SalesItemModel::with('articulo_info')
            ->where('ventas_articulos.idventa', $id)
            ->get();
        $Total = 0;
        foreach ( $sales_item as $srow ){
            $total = $srow->total;
            $Total += $total;
        }
        $sales_credit = SalesCreditModel::where('idventa', $id)->get();
        $sales_payment = SalesPaymentModel::where('idventa', $id)->get();
        $delivery_info = DeliveryModel::where('idventa',$id)->get();
        $sales_state = SalesStateModel::where('idventa',$id)->get();
        $data['client_info'] = $client_info ;
        $data['sales_info'] = $sales_info ;
        $data['sales_item'] = $sales_item ;
        $data['sales_credit'] = $sales_credit ;
        $data['sales_payment'] = $sales_payment ;
        $data['delivery_info'] = $delivery_info ;
        $data['sales_state'] = $sales_state ;
        $data['total_price'] = $Total ;
        //dd($data['Total']);
        return view('backend.order.archive', $data);
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
        $data['main_menu'] = "Pedidos";
        $data['sub_menu'] = "";
        $data['from'] = $from;
        $data['to'] = $to;
        return view('backend.order.order', $data);
    }
    public function fetch_orders_data(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        //dd($request->all());
        $get_orders = DeliveryModel::with('sale_info')
            ->where('destinatarios.fetcha_hora', '>=',$from)
            ->where('destinatarios.fetcha_hora', '<=',$to)
            ->orderBy('id', 'DESC')
            ->get();
        //dd($get_orders);
        if ($get_orders->count() > 0) {
            $data = [];
            foreach ($get_orders as $row) {
                $id = $row->idventa;
                $fecha_hora = $row->fetcha_hora;
                $delivery_name = $row->nombre;
                $delivery_address = $row->direccion;
                $delivery_coloni = $row->colonia;
                $delivery_postcode =$row->codigopostal;
                $client_id = $row->sale_info->idcliente;
                $discount = $row->sale_info->descuento;
                $client_info = ClientModel::where('idclientes',$client_id)->get();
                //dd($delivery_name);
                if ($client_info->count() > 0 ) {
                    foreach ($client_info as $crow) {
                        $client_name = $crow->nombre;
                    }
                } else {
                    $client_name = 'N/A';
                }
                $article_info = SalesItemModel::where('idventa', $id)
                    ->get();
                if ( $article_info->count() > 0 ) {
                    foreach ($article_info as $arow) {
                        $article_id = $arow->idarticulo;
                        $quantity = $arow->cantidad;
                       //dd($article_id, $quantity);
                    }
                }else {
                    $article_id = null ;
                    $quantity = "N/a";
                }
                $article_name = InventoryModel::where('idarticulos',$article_id)->get();
                if ( $article_name->count() > 0 ) {
                    foreach ($article_name as $nrow){
                        $itemname = $nrow->articulo;
                    }
                } else {
                    $itemname = "N/A";
                }
                $article = "$itemname<br><strong>Cantidad:</strong>$quantity<br>";

                //dd($article_name);
                    $get_sales_articulos = SalesItemModel::where('idventa', $id)
                        ->sum('total');
                    $get_total = $get_sales_articulos - $discount;
                    $get_amount = SalesPaymentModel::where('idventa', $id)
                        ->sum('cantidad');
                    if ($get_amount >= $get_total) {
                        $status = "<label class='label label-success'>Liquidado</label>";
                    } elseif ($get_amount < $get_total) {
                        $status = "<label class='label label-danger'>Pendiente</label>";
                    }
                    $sale_status = SalesStateModel::where('idventa', $id)
                        ->get();
                    if( $sale_status->count() > 0 ) {
                        foreach ($sale_status as $srow){
                            $state = $srow->estado;
                        }
                    } else {
                        $state = "<label class='label label-danger'>No enlistado</label>";
                    }
                if ( $state == "Pendiente" ) {
                    $state = "<label class='label label-danger'>Pendiente</label>";
                } else if ( $state == "En Proceso" ){
                    $state = "<label class='label label-danger'>En Proceso</label>";
                } else if ( $state == "En Ruta" ){
                    $state = "<label class='label label-info'>En Ruta</label>";
                } else if ( $state == "Entregado" ){
                    $state = "<label class='label label-success'>Entregado</label>";
                } else if ( $state == "No Entregado" ){
                    $state = "<label class='label label-danger'>No Entregado</label>";
                }

                    $direction = "$delivery_address<br><strong>Colonia:</strong>$delivery_coloni<br><strong>CP:</strong>$delivery_postcode";
                    $archiv_url = route('archiv', ['sale'=>$id]);
                    $archiv_btn = "<a href=\"$archiv_url\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Archive\" class=\"fa fa-archive\"></span></a>";
                    $action = "$archiv_btn";
                    $temp = array();

                    array_push($temp, $id);
                    array_push($temp, $fecha_hora);
                    array_push($temp, $client_name);
                    array_push($temp, $delivery_name);
                    array_push($temp, $direction);
                    array_push($temp, $article);
                    array_push($temp, $status);
                    array_push($temp, $state);
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
