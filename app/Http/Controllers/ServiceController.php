<?php

namespace App\Http\Controllers;

use App\Models\SalesPaymentModel;
use App\Models\ServiceItemModel;
use App\Models\ServiceModel;
use App\Models\ServicePaymentModel;
use Illuminate\Http\Request;
use App\Models\InventoryModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class ServiceController extends Controller
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
        $data['main_menu'] = "Servicios";
        return view('backend.service.service', $data);
    }

    /**
     * Store a newly created service in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */

    public function store(Request $request)
    {
        $request->validate([
            'articulo' => 'required',
            'precio' => 'required'
        ]);
        $service = new InventoryModel();
        $service->articulo = $request->articulo;
        $service->precio = $request->precio;
        $service->imagen = $request->imagen ? $request->imagen : null;
        $service->stock = $request->stock ? $request->stock : 0;
        $service->alerta = $request->alerta ? $request->alerta : 0;
        $service->descripcion = $request->descripcion ? $request->descripcion : null;
        $service->observaciones = $request->observaciones ? $request->observaciones : null;

        if ($service->save()) {
            return redirect('service')->with('success', 'Articulo agregado correctamente');
        } else {
            return redirect()->back()->with('error', '¡Ocurrió un error! Inténtalo de nuevo.');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'articulo' => 'required,"'.$request->idarticulos.'",idarticulos',
        ]);

        $service = InventoryModel::where('idarticulos', $request->idarticulos)->get()->first();
        abort_if(!$service, 404);
        $service->articulo = $request->edit_articulo;
        $service->precio = $request->edit_precio;
        $service->imagen = $request->edit_imagen ? $request->edit_imagen : null;;
        $service->stock = $request->edit_stock ? $request->edit_stock : 0;
        $service->alerta = $request->edit_alerta ? $request->edit_alerta : 0;
        $service->descripcion = $request->edit_descripcion ? $request->edit_descripcion : null;
        $service->observaciones = $request->edit_observaciones ? $request->edit_observaciones : null;

        if ($service->save()) {
            return redirect('service')->with('success', 'Articulos Editado correctamente');
        } else {
            return redirect()->back()->with('error', '¡Ocurrió un error! Inténtalo de nuevo.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $id = $request->delete_service_id;
        if ($service = ServiceModel::where('idservicios', $id)->first()) {
            if ($service->delete()) {
                return redirect()->back()->with('success', 'servicio eliminado con éxito. ');
            } else {
                return redirect()->back()->with('error', 'Error al eliminar el servicio !');
            }
        } else {
            return redirect()->back()->with('error', 'Servicio no encontrado!');
        }
    }

    public function fetch_service_data(Request $request)
    {

        $get_service = ServiceModel::all();

        if ($get_service->count() > 0) {
            $data = [];
            foreach ($get_service as $row) {
                $id = $row->idservicios;
                $fecha_hora = $row->fecha_hora;
                $discount =$row->descuento;
                if ($row->idcliente != null) {
                    $client_name = $row->client_info->nombre;
                } else {
                    $client_name = 'N/A';
                }
                $get_service_articulos = ServiceItemModel::where('idservicio', $id)
                    ->sum('total');
                $get_total = $get_service_articulos - $discount;
                $get_amount = ServicePaymentModel::where('idservicio', $id)
                    ->sum('cantidad');
                if ($get_amount >= $get_total) {
                    $status = "<label class='label label-success'>Liquidado</label>";
                } elseif ($get_amount < $get_total) {
                    $status = "<label class='label label-danger'>Pendiente</label>";
                }
                $edit_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_edit_modal(\"$id\" )' data-placement=\"top\" title=\"Edit\" class=\"glyphicon glyphicon-edit\"></span></a>";
                $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\")' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";

                $action = "$edit_btn $delete_btn";
                $temp = array();
                array_push($temp, $id);
                array_push($temp, $fecha_hora);
                array_push($temp, $client_name);
                array_push($temp, $get_total);
                array_push($temp, $get_amount);
                array_push($temp, $status);
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

