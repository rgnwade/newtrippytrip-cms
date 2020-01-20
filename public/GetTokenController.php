<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class GetTokenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $client_id = $request->input('client_id');
        $client_secret = $request->input('client_secret');
        $login = Client::where('id', $client_id)->first();

        if (!$login) {
            $results['status'] = 4001;
            $results['message'] = 'Incorrect client id!';
            $results['data'] = new \stdClass;

            return response($results);

        } else {

            if ($client_secret === $login->secret) {
                
                $api_token = sha1(time());

                $create_token = Client::where('id', $login->id)->update(['api_token' => $api_token]);
                
                $data['access_token'] = $api_token;

                $results['status'] = 2000;
                $results['message'] = 'Success';
                $results['display_message'] = 'Success get token! Welcome...';
                $results['data'] = $data;

                return response($results);
            } else {

                $results['status'] = 4001;
                $results['message'] = 'Incorrect client secret key!';
                $results['data'] = new \stdClass;
                return response($results);
            }
        }
    }

}