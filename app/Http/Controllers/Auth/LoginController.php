<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function Login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $email        = $request->input('email');
        $password     = $request->input('password');

        // dd($password);

        $client = new Client();
        $res = $client->request('POST', env('API_CMS_URL').'admin/login-admin', array(
            'form_params' => array(
                'email' => $email,
                'password' => $password
            )
        ));

        $admin_login = json_decode($res->getBody()->getContents());

        Session::put('arr_login_success', $admin_login->data->access_token);

        // dd($admin_login);
        if (Session::get('arr_login_success')) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->intended('/');
        }
    }

    public function LogoutUser()
    {
        Session::forget('arr_login_success');
        return redirect()->intended('/');
    }
}
