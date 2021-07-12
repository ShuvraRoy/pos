<?php

namespace App\Http\Controllers;

use App\Models\InventoryItemModel;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        //dd($request->inventory_id);
        $inventory_id = $request->inventory_id;
        $inventory = InventoryModel::where('idarticulos',$inventory_id)
            ->get()->first();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('backend/assets/images', $filename);
            $inventory->imagen ="backend/assets/images/$filename";
            if (file_exists($request->default_image)) {

                unlink($request->default_image);
            }

        } else {

            $inventory->imagen = $request->default_image;

        }
        $inventory->articulo = $request->nombre;
        $inventory->precio = $request->precio;
        $inventory->stock = $request->stock;
        $inventory->alerta = $request->alerta;
        $inventory->descripcion = $request->descripcion;
        $inventory->observaciones = $request->Observaciones;
        $inventory->save();
        if ( $request->componente != null){
            $inventory_item = new InventoryItemModel();
            $inventory_item->idarticulo = $inventory_id;
            $component = $request->componente;
            $cantidad = $request->cantidad;
            $inventory_item->cantidad = $request->cantidad;
            for ( $i=0; $i < count($component); $i++) {
                $inventory_item = new InventoryItemModel();
                $inventory_item->idarticulo = $inventory_id;
                $inventory_item->componente = $component[$i];
                $inventory_item->cantidad = $cantidad[$i];
                $inventory_item->save();
            }
        }
        return redirect('inventory')->with('success', 'Articulo agregado correctamente');

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

    public function inventory(string $id)
    {
//        dd($id);
        $data = [];
        $data['inventory_id'] = $id;
        $inventory_info = InventoryModel::where('idarticulos', $id)->get();
        $inventory_item = InventoryItemModel::where('idarticulo', $id)->get();
        $data['main_menu'] = "Inventario";
        $data['sub_menu'] = "Editar inventario";
        $data['inventory_info'] =  $inventory_info;
        $data['inventory_item'] = $inventory_item;
        //dd($data);
        return view('backend.inventory.edit_inventory', $data);
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
                $edit_url = route('inventory', ['inventory'=>$id]);
                if ($row->imagen == null) {
                    $image_name = "http://localhost:8000/backend/assets/images/unavailable.png";
                    $image = "<img height='30' width='30' src= '$image_name'   >";
                } else {
                    $image_name = ($row->imagen);
                    $image = "<img height='30' width='30' src= '$image_name'   >";
                }
                $edit_btn = "<a href=\"$edit_url\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit\" class=\"glyphicon glyphicon-edit\"></span></a>";
                $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\", \"$name\")' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";

                $action = "$edit_btn $delete_btn";
                $temp = array();
                array_push($temp, $name);
                array_push($temp, $description);
                array_push($temp, $image);
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
