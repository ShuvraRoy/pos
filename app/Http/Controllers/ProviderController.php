<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProviderModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProviderController extends Controller
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
        $data['main_menu'] = "Config";
        $data['sub_menu'] = "Proveedores";
        return view('backend.provider.provider', $data);
    }

    /**
     * Store a newly created provider in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $provider = new ProviderModel();
        $provider->nombre = $request->name;
        $provider->correo = $request->email;
        $provider->domicilio = $request->domicilio;
        $provider->colonia = $request->colonia;
        $provider->codigopostal = $request->codigopostal;
        $provider->telefono = $request->telefono;
        $provider->rfc = $request->rfc;
        $provider->estado = $request->estado;
        $provider->pais = $request->pais;
        $provider->contacto = $request->contacto;
        $provider->created_at = date('Y-m-d H:i:s');
        if ($provider->save()) {
            return redirect('providers')->with('success', 'Proveedor agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo.');
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
            'name' => 'required,"'.$request->provider_id.'",provider_id',
        ]);

        $provider = ProviderModel::where('idproveedores', $request->provider_id)->get()->first();
       // dd($provider);
        abort_if(!$provider, 404);
        $provider->nombre = $request->provider_name;
        $provider->correo = $request->provider_email;
        $provider->domicilio = $request->provider_domicilio;
        $provider->colonia = $request->provider_colonia;
        $provider->codigopostal = $request->provider_codigopostal;
        $provider->telefono = $request->provider_telefono;
        $provider->rfc = $request->provider_rfc;
        $provider->estado = $request->provider_estado;
        $provider->pais = $request->provider_pais;
        $provider->contacto = $request->provider_contacto;
        $provider->updated_at = date('Y-m-d H:i:s');
        if ($provider->save()) {
            return redirect('providers')->with('success', 'Proveedor  agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error! Inténtalo de nuevo.');
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
        $id = $request->delete_provider_id;
        //dd($id);
        if ($provider = ProviderModel::where('idproveedores', $id)->first()) {
            //dd($provider);
            if ($provider->delete()) {
                return redirect()->back()->with('success', 'Usuario eliminado con éxito.');
            } else {
                return redirect()->back()->with('error', 'la eliminación del usuario falló!');
            }
        } else {
            return redirect()->back()->with('error', 'Usuario no encontrado!');
        }
    }


    public function fetch_provider_data(Request $request)
    {

        $get_providers = ProviderModel::all();
//        dd($get_providers);
        if ($get_providers->count() > 0) {
            $data = [];
            foreach ($get_providers as $row) {
                $id = $row->idproveedores;
                $name = $row->nombre;
                $email = $row->correo;
                $direction = $row->domicilio;
                $contact = $row->contacto;
                $telefono = $row->telefono;
                $colonia = $row->colonia;
                $codigopostal = $row->codigopostal;
                $rfc = $row->rfc;
                $estado = $row->estado;
                $pais = $row->pais;
                $edit_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_edit_modal(\"$id\", \"$name\", \"$email\", \"$direction\", \"$contact\", \"$telefono\", \"$colonia\", \"$codigopostal\", \"$estado\", \"$pais\", \"$rfc\" )' data-placement=\"top\" title=\"Edit\" class=\"glyphicon glyphicon-edit\"></span></a>";
                $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\", \"$name\" )' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";

                $action = "$edit_btn $delete_btn ";
                $temp = array();
                array_push($temp, $name);
                array_push($temp, $contact);
                array_push($temp, $direction);
                array_push($temp, $telefono);
                array_push($temp, $email);;
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
