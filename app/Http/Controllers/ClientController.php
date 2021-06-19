<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
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
//        abort_if(!$this->hasPermission('Manage Generic Name'), 403);
        $data = [];
       $data['main_menu'] = "Clientes";
        return view('backend.client.index', $data);
    }
    /**
     * Store a newly created client in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'email'
        ]);
        $client = new ClientModel();
        $client->nombre = $request->nombre;
        $client->correo = $request->correo;
        $client->domicilio = $request->domicilio ? $request->domicilio : null;
        $client->colonia = $request->colonia ? $request->colonia : null;
        $client->codigopostal = $request->codigopostal ? $request->codigopostal : null;
        $client->telefono = $request->telefono ? $request->telefono : null;
        $client->celular = $request->celular ? $request->celular : null;
        $client->rfc = $request->rfc ? $request->rfc : null;
        $client->contacto = $request->contacto ? $request->contacto : null;
        $client->estado = $request->estado ? $request->estado : null;
        $client->pais = $request->pais ? $request->pais : null;
        $client->comentarios = $request->comentarios ? $request->comentarios : null;
        $client->fecharegistro = date('Y-m-d H:i:s');


        if ($client->save()) {
            return redirect('clients')->with('success', 'Cliente agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'An error occurred! Please try again.');
        }
    }
    /**
     * fetches a list of client from database
     *
     * @return mixed
     */

    public function fetch_client_data(Request $request)
    {

            $get_clients = ClientModel::all();

            if ($get_clients->count() > 0) {
                $data = [];
                foreach ($get_clients as $row) {
                    $id = $row->idclientes;
                    $name = $row->nombre;
                    $direccion = $row->domicilio ? $row->domicilio : 'N/A';
                    $telefono= $row->telefono ? $row->telefono : 'N/A';
                    $email= $row->correo ? $row->correo : 'N/A';
//                    $edit_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_edit_modal(\"$id\", \"$name\", \"$row->description\")' data-placement=\"top\" title=\"Edit\" class=\"glyphicon glyphicon-edit\"></span></a>";
//                    $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\", \"$name\")' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";



                    $temp = array();
                    array_push($temp, $name);
                    array_push($temp, $direccion);
                    array_push($temp, $telefono);
                    array_push($temp, $email);
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
