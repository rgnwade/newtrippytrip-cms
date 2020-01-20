<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Session;
use Alert;

class PageController extends Controller
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


    public function Index()
    {
        if (Session::get('arr_login_success')) {
            return view('pages.index');
        } else {
            return redirect()->intended('/');
        }
    }


    public function postLogin(Request $request)
    {
        $email        = $request->input('email');
        $password     = $request->input('password');

        $client = new Client();
        $res = $client->request('POST', env('API_CMS_URL').'admin/login-admin', array(
            'form_params' => array(
                'email' => $email,
                'password' => $password
            )
        ));

        $admin_login = json_decode($res->getBody()->getContents());
        // dd($admin_login);
        if ($admin_login->status == 200) {
            return redirect()->intended('/dashboard');
        }
    }

    public function allUser()
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();
            $res = $client->request('GET', env('API_CMS_URL').'user/all-user');

            $get_all_user = json_decode($res->getBody()->getContents());

            return view('pages.all-user', array(
                'all_user' => $get_all_user->data
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function allClient()
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();
            $res = $client->request('GET', env('API_CMS_URL').'admin/all-client');

            $get_all_client = json_decode($res->getBody()->getContents());



            return view('pages.all-client', array(
                'all_client' => $get_all_client->data
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function allEmployee()
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();
            $res = $client->request('GET', env('API_CMS_URL').'admin/all-admin');

            $get_all_admin= json_decode($res->getBody()->getContents());

            $res_roles = $client->request('GET', env('API_CMS_URL').'admin/roles');

            $get_roles= json_decode($res_roles->getBody()->getContents());

            // dd($get_all_admin->data[0]->roles);

            return view('pages.all-employee', array(
                'all_admin' => $get_all_admin->data,
                'all_roles' => $get_roles->data
            ));
        } else {
            return redirect()->intended('/');
        }
    }


    public function getArticlebyId($id)
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();

            $res = $client->request('GET', env('API_CMS_URL').'article/get-article?category_id='.$id);

            $get_article= json_decode($res->getBody()->getContents());


            return view('pages.article.article', array(
                'article' => $get_article->data,
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function registerEmployee(Request $request)
    {
        $email        = $request->input('email');
        $password     = $request->input('password');
        $name         = $request->input('name');
        $phone_num    = $request->input('phone_num');
        $roles        = $request->input('roles');

        $client = new Client();
        $res = $client->request('POST', env('API_CMS_URL').'admin/register-admin', array(
            'form_params' => array(
                'email' => $email,
                'password' => $password,
                'name' => $name,
                'phone_num' => $phone_num,
                'roles' => $roles

            )
        ));

        $admin_register = json_decode($res->getBody()->getContents());

        // dd($admin_login);
        if ($admin_register->status == 200) {
            Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        // return view('all-employee');
        } else {
            Alert::success('Error Gboblok', 'Judul Pesan');
        }
    }

    public function addClient()
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();

            //Location
            $res_location = $client->request('GET', env('API_CMS_URL').'article/location?parent=102');

            $get_location= json_decode($res_location->getBody()->getContents());

            return view('pages.add-client', array(
                'location' => $get_location->data,
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function registerClient(Request $request)
    {
        $name         = $request->input('name');
        $email        = $request->input('email');
        $address      = $request->input('address');
        $phone_number = $request->input('phone_number');
        $location_id  = $request->input('location_id');

        $client = new Client();
        $res = $client->request('POST', env('API_CMS_URL').'admin/register-client', array(
            'form_params' => array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone_number' => $phone_number,
                'country_id' => '102',
                'location_id' => $location_id
            )
        ));

        $register_client = json_decode($res->getBody()->getContents());
        // dd($admin_login);
        if ($register_client->status == 200) {
            return redirect()->intended('/all-client');
        }
    }

    public function getContract()
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();
            $res = $client->request('GET', env('API_CMS_URL').'admin/get-contract');

            $get_all_contract= json_decode($res->getBody()->getContents());

            // dd($get_all_admin->data[0]->roles);
            return view('pages.all-contract', array(
                'contract' => $get_all_contract->data,
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function getSubscribe()
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();
            $res = $client->request('GET', env('API_CMS_URL').'user/all-subscribe');

            $get_subscribe= json_decode($res->getBody()->getContents());

            // dd($get_all_admin->data[0]->roles);
            return view('pages.all-subscribe', array(
                'subscribe' => $get_subscribe->data,
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function media()
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();
            $res = $client->request('GET', env('API_CMS_URL').'article/get-media');

            $get_media= json_decode($res->getBody()->getContents());


            return view('pages.media', array(
                'media' => $get_media->data,
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function addMedia(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'link' => 'required|mimes:jpeg,jpg,png|max:2048'
        ));

        $name        = $request->input('name');
        $link        = $request->file('link');


        $client = new Client();
        $res = $client->request('POST', env('API_CMS_URL').'article/post-media', array(
            'multipart' => array(
                array(
                    'name'     => 'name',
                    'contents' => $name,
                ),
                array(
                    'name'     => 'link',
                    'contents' => fopen($link->move(public_path('uploads/thumbnail'), $link->getClientOriginalName()), 'r'),
                    'filename' => $link->getClientOriginalName(),
                ),
            )
        ));

        $add_media = json_decode($res->getBody()->getContents());
        if ($add_media->code == 200) {
            $file = new Filesystem;
            $file->delete(public_path('uploads/thumbnail/') . $link->getClientOriginalName());
            Alert::success('Success to add picture, Bitch!', 'Fuck! You are awesome!')->persistent("Ok");
            return redirect('/media');
        }
        if ($add_media->code == 400 && $add_media->status == 'FAILED') {
            Alert::error('Oh Snap!', 'You have got wrong, Stupid!')->persistent("Ok");
            return redirect('/media');
        }
    }
}
