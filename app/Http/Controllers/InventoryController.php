<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;
use App\Models\SalesItemModel;
use App\Models\InventoryModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class InventoryController extends Controller
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
        $data['main_menu'] = "Inventario";
        return view('backend.inventory.index', $data);
    }

    /**
     * Store a newly created inventory in database.
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
        $inventory = new InventoryModel();
        $inventory->articulo = $request->articulo;
        $inventory->precio = $request->precio;
        $inventory->imagen = $request->imagen ? $request->imagen : null;
        $inventory->stock = $request->stock ? $request->stock : 0;
        $inventory->alerta = $request->alerta ? $request->alerta : 0;
        $inventory->descripcion = $request->descripcion ? $request->descripcion : null;
        $inventory->observaciones = $request->observaciones ? $request->observaciones : null;

        if ($inventory->save()) {
            return redirect('inventory')->with('success', 'Articulo agregado correctamente');
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

        $inventory = InventoryModel::where('idarticulos', $request->idarticulos)->get()->first();
        abort_if(!$inventory, 404);
        $inventory->articulo = $request->edit_articulo;
        $inventory->precio = $request->edit_precio;
        $inventory->imagen = $request->edit_imagen ? $request->edit_imagen : null;;
        $inventory->stock = $request->edit_stock ? $request->edit_stock : 0;
        $inventory->alerta = $request->edit_alerta ? $request->edit_alerta : 0;
        $inventory->descripcion = $request->edit_descripcion ? $request->edit_descripcion : null;
        $inventory->observaciones = $request->edit_observaciones ? $request->edit_observaciones : null;

        if ($inventory->save()) {
            return redirect('inventory')->with('success', 'Articulos Editado correctamente');
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
        $id = $request->delete_inventory_id;
        if ($inventory = InventoryModel::where('idarticulos', $id)->first()) {
            if ($inventory->delete()) {
                return redirect()->back()->with('success', 'artículo eliminado con éxito. ');
            } else {
                return redirect()->back()->with('error', 'Error al eliminar el artículo !');
            }
        } else {
            return redirect()->back()->with('error', 'Artículo no encontrado!');
        }
    }

    public function inventory_sales(string $id)
    {
        $data = [];
        $inventory_info = ClientModel::where('idinventoryes', $id)->get();
        $inventory_sales_info = SalesModel::select('idventas')
            ->where('idinventorye', $id)
            ->get();
        if ($inventory_sales_info->count() > 1) {
            $data = [];
            foreach ($inventory_sales_info as $row) {
                $inventory_sales_item = SalesItemModel::wherein('idventa',$row )
                    ->sum('total');
//                $idventas = $row->idventas;
//                $data['idventas'] = $idventas;

            }
            //dd($inventory_sales_item);
//            $inventory_sales_item = SalesItemModel::where('idventa', $row->idventas)
//                ->sum('total');
        } else {
            echo 'No data found';
        }

        //dd($inventory_sales_item);
        $data['main_menu'] = "Clientes";
        $data['inventory_info'] = $inventory_info;
        //$data['idventas'] = $idventas;
        $data['inventory_sales_info'] = $inventory_sales_info ;
//        $inventory_sales_item = SalesItemModel::select('total')
//        ->whereIn('idventa',$inventory_sales_info )
//            ->get();

        $data['inventory_sales_item'] = $inventory_sales_item;
        dd($data);
        return view('backend.inventory.inventory_sales', $data);
    }
    public function fetch_inventory_data(Request $request)
    {

        $get_inventory = InventoryModel::all();

        if ($get_inventory->count() > 0) {
            $data = [];
            foreach ($get_inventory as $row) {
                $id = $row->idarticulos;
                $name = $row->articulo;
                $description = $row->descripcion ? $row->descripcion : 'N/A';
                $price = $row->precio;
                $stock = $row->stock;
                $edit_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_edit_modal(\"$id\", \"$name\", \"$price\",\"$stock\",\"$row->alerta\", \"$row->descripcion\", \"$row->observaciones\" )' data-placement=\"top\" title=\"Edit\" class=\"glyphicon glyphicon-edit\"></span></a>";
                $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\", \"$name\")' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";

                $action = "$edit_btn $delete_btn";
                $temp = array();
                array_push($temp, $name);
                array_push($temp, $description);
                array_push($temp, $price);
                array_push($temp, $stock);
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
