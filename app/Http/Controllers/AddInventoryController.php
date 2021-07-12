<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use App\Models\InventoryItemModel;
use App\Models\InventoryModel;
use App\Models\SalesItemModel;
use App\Models\ServiceItemModel;
use App\Models\ServiceModel;
use App\Models\ServicePaymentModel;
use Illuminate\Http\Request;

class AddInventoryController extends Controller
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
        $data['main_menu'] = "Inventario";
        $data['sub_menu'] = "Agregar Inventario";
        $client_info = ClientModel::get();
        $article_info = InventoryModel::get();
        $data['client_info'] = $client_info;
        $data['article_info'] = $article_info;
        //dd($data);
        return view('backend.inventory.add_inventory', $data);
    }
    public function store(Request $request)
    {
           // dd($request->file);
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);
        $inventory = new InventoryModel();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('backend/assets/images', $filename);
            $inventory->imagen ="backend/assets/images/$filename";

        } else {
//                return $request;
            $inventory->imagen = '';

        }
        $inventory->articulo = $request->nombre;
        $inventory->precio = $request->precio;
        $inventory->stock = $request->stock;
        $inventory->alerta = $request->alerta;
        $inventory->descripcion = $request->descripcion;
        $inventory->observaciones = $request->Observaciones;
        $inventory->save();
        $idarticulo = $inventory->idarticulos ;
        if ( $request->componente != null){
            $inventory_item = new InventoryItemModel();
            $inventory_item->idarticulo = $idarticulo;
            $component = $request->componente;
            $cantidad = $request->cantidad;
            $inventory_item->cantidad = $request->cantidad;
            for ( $i=0; $i < count($component); $i++) {
                $inventory_item = new InventoryItemModel();
                $inventory_item->idarticulo = $idarticulo;
                $inventory_item->componente = $component[$i];
                $inventory_item->cantidad = $cantidad[$i];
                $inventory_item->save();
            }
        }
        return redirect('inventory')->with('success', 'Articulo agregado correctamente');
    }

}
