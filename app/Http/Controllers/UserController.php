<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UserController extends Controller
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
        $data['sub_menu'] = "Usuarios";
        return view('backend.user.user', $data);
    }

    /**
     * Store a newly created user in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new UserModel();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password_confirmation);
        $user->privilegio = $request->privilegio;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
        if ($user->save()) {
            return redirect('users')->with('success', 'Usuario agregada con éxito');
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
            'name' => 'required,"'.$request->userid.'",userid',
            'email' => 'email|unique:users,email, "'.$request->user_id.'",user_id'
        ]);

        $user = UserModel::where('id', $request->userid)->get()->first();
        abort_if(!$user, 404);
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->privilegio = $request->user_privilegio;
        $user->updated_at = date('Y-m-d H:i:s');
        if ($user->save()) {
            return redirect('users')->with('success', 'Usuario  agregada con éxito');
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
        $id = $request->delete_user_id;
        if ($user = UserModel::where('id', $id)->first()) {
            if ($user->delete()) {
                return redirect()->back()->with('success', 'Usuario eliminado con éxito.');
            } else {
                return redirect()->back()->with('error', 'la eliminación del usuario falló!');
            }
        } else {
            return redirect()->back()->with('error', 'Usuario no encontrado!');
        }
    }


    public function fetch_user_data(Request $request)
    {

        $get_clients = UserModel::all();

        if ($get_clients->count() > 0) {
            $data = [];
            foreach ($get_clients as $row) {
                $id = $row->id;
                $name = $row->name;
                $email = $row->email;
                $privilegio = $row->privilegio;
                if ( $privilegio == 1 ){
                    $privilegio = 'Administrador' ;
                } else {
                    $privilegio = 'Usuario' ;
                }
                $edit_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_edit_modal(\"$id\", \"$name\", \"$email\", \"$privilegio\" )' data-placement=\"top\" title=\"Edit\" class=\"glyphicon glyphicon-edit\"></span></a>";
                $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\", \"$name\")' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";

                $action = "$edit_btn $delete_btn ";
                $temp = array();
                array_push($temp, $privilegio);
                array_push($temp, $name);
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
