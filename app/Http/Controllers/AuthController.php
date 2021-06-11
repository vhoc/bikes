<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    /**
     * login( Request )
     *
     * @param Request $request
     */
    public function login( Request $request )
    {
        $response = Http::asForm()->post( env( 'APP_URL' ) . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => env( 'PASSPORT_CLIENT_ID' ),
            'client_secret' => env( 'PASSPORT_CLIENT_SECRET' ),
            'username' => $request->input( 'username' ),
            'password' => $request->input( 'password' ),
            'scope' => '',
        ] );

        return $response->json();
    }

}
