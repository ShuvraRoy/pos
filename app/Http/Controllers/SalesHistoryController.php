<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\ClientModel;
use App\Models\InventoryModel;
use App\Models\SalesStateModel;
use App\Models\SalesCreditModel;
use Illuminate\Http\Request;
use App\Models\DeliveryModel;
use App\Models\SalesModel;
use App\Models\SalesItemModel;
use App\Models\SalesPaymentModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class SalesHistoryController extends Controller
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
        $data['main_menu'] = "Historical de Ventas";
        $data['sub_menu'] = "";
        return view('backend.sales_history.index', $data);
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
        $data['main_menu'] = "Reportes";
        $data['sub_menu'] = "Ventas";
        $data['from'] = $from;
        $data['to'] = $to;
        return view('backend.historys.sales_history', $data);
    }
    public function store_payment(Request $request)
    {
        //dd($request->add_sales_id);
        $request->validate([
            'metod' => 'required',
            'Pago' => 'required',

        ]);
        $payment = new SalesPaymentModel();
        $payment->idventa = $request->add_sales_id;
        $payment->fetcha_hora = date('Y-m-d H:i:s');
        $payment->cantidad = $request->cantidad ;
        $payment->comentario = $request->comentario ? $request->comentario : null;
        $payment->metodo = $request->metod;
        //dd($payment);
        if ($payment->save()) {
            return redirect('sales_history')->with('success', 'Pago agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo.');
        }
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
        return redirect('sales_history')->with('success', 'Pago agregado correctamente');
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
    public function delete(Request $request)
    {
        $id = $request->delete_sales_history_id;
        $sales_payment = SalesPaymentModel::where('idventa', $id)->first();
        $sales_item = SalesItemModel::where('idventa', $id)->first();
        $sales_delivery = DeliveryModel::where('idventa', $id)->first();
        $sale = SalesModel::where('idventas', $id)->first();
        if ( $sales_payment!= null) {
            $sales_payment->delete();
        };
        if ( $sales_item!= null) {
            $sales_item->delete();
        };
        if ( $sales_delivery!= null) {
            $sales_delivery->delete();
        };
        if ( $sale->delete()){
            return redirect()->back()->with('success', 'Venta eliminado con éxito.');
        } else {
            return redirect()->back()->with('error', 'Error en la eliminación de venta!');
        }

    }
    public function archive(string $id)
    {
        $data = [];
        $data['main_menu'] = "Historical de Ventas";
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
        return view('backend.sales_history.archive', $data);
    }
    public function edit_sale(string $id)
    {
        $data = [];
        $data['main_menu'] = "Historical de Ventas";
        $data['sub_menu'] = "";
        $sales_info = SalesModel::where('idventas', $id)->get();
        foreach ($sales_info as $row) {
            $client_id = $row->idcliente;
        }
        $client_info = ClientModel::where('idclientes', $client_id)->get();
        $client_data = ClientModel::get();
        $sales_item = SalesItemModel::with('articulo_info')
            ->where('ventas_articulos.idventa', $id)
            ->get();
        $Total = 0;
        foreach ( $sales_item as $srow ){
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
        //dd($data['Total']);
        return view('backend.sales_history.edit_sale', $data);
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
            return redirect('sales_history')->with('success', 'Entrega editada correctamente');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
        }
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
                return redirect('sales_history')->with('success', 'Entrega editada correctamente');
            } else {
                return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo');
            }
        } else {
            return redirect()->back()->with('error', 'El estado del pedido no se registra');
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
    public function fetch_sales_history_data(Request $request)
    {
        $get_sales_history = SalesModel::with('client_info')
            ->get();
            if ($get_sales_history->count() > 0) {
            $data = [];
            foreach ($get_sales_history as $row) {
                $id = $row->idventas;
                $fecha_hora = $row->fetcha_hora;
                $order_status = $row->estatus;
                $discount = $row->descuento;
                if ($row->idcliente != null) {
                    $client_name = $row->client_info->nombre;
                    $client_address = $row->client_info->nombre;
                } else {
                    $client_name = 'N/A';
                }
                $get_delivery_info = DeliveryModel::where('idventa', $id)->get();
                if ( $get_delivery_info->count() > 0 ) {
                    foreach ( $get_delivery_info as $drow ) {
                        $delivery_name = $drow->nombre;
                        $delivery_address = $drow->direccion;
                        $delivery_reference = $drow->referencia;
                        $delivery_fetcha_hora = $drow->fetcha_hora;
                    }
                } else {
                    $delivery_name = "N/A";
                    $delivery_address = "N/A";
                    $delivery_reference = "N/A";
                    $delivery_fetcha_hora = "N/A";
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
                }
                $get_method = SalesPaymentModel::where('idventa', $id)
                    ->get();
                foreach ($get_method as $nrow) {
                    $method = $nrow->metodo;
                }
                if ( $order_status == "Pendiente" ) {
                    $order_status = "<label class='label label-danger'>Pendiente</label>";
                } else if ( $order_status == "En Proceso" ){
                    $order_status = "<label class='label label-danger'>En Proceso</label>";
                } else if ( $order_status == "En Ruta" ){
                    $order_status = "<label class='label label-info'>En Ruta</label>";
                } else if ( $order_status == "Entregado" ){
                    $order_status = "<label class='label label-success'>Entregado</label>";
                } else if ( $order_status == "No Entregado" ){
                    $order_status = "<label class='label label-danger'>No Entregado</label>";
                }
                $add_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_add_payment_modal(\"$id\")' data-placement=\"top\" title=\"Add\" class=\"glyphicon glyphicon-usd\"></span></a>";
                $archive_url = route('archive', ['sale'=>$id]);
                $archive_btn = "<a href=\"$archive_url\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Archive\" class=\"fa fa-archive\"></span></a>";
                $print_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_edit_modal(\"$id\" )' data-placement=\"top\" title=\"Print\" class=\"glyphicon glyphicon-print\"></span></a>";
                $edit_url = route('edit_sale', ['sale'=>$id]);
                $edit_btn = "<a href=\"$edit_url\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit\" class=\"glyphicon glyphicon-edit\"></span></a>";
                $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\")' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";

                $action = "$add_btn $archive_btn $print_btn $edit_btn $delete_btn";
                $temp = array();
                array_push($temp, $id);
                array_push($temp, $fecha_hora);
                array_push($temp, $client_name);
                array_push($temp, $delivery_name);
                array_push($temp, $delivery_address);
                array_push($temp, $delivery_reference);
                array_push($temp, $get_total);
                array_push($temp, $get_amount);
                array_push($temp, $status);
                array_push($temp, $order_status);
                array_push($temp, $delivery_fetcha_hora);
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
