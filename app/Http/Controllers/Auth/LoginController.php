<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function get_login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        $login_status = false;
        $resp = array('accessGranted' => false, 'errors' => '');
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = User::find(Auth::user()->id);

            $user->save();

            $user_data = [
                'name' => Auth::user()->name,
                'id' => Auth::user()->id,

            ];
            session(['user_data' => $user_data]);

            $login_status = true;
        }
        if($login_status == true)
        {
            //$resp['accessGranted'] = true;
            $resp['login_status'] = $login_status;
        }
        else
        {
            $resp['errors'] = '<strong>Invalid login!</strong><br />Please enter valid user id and password.<br />';
        }
        echo json_encode($resp);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }

}
