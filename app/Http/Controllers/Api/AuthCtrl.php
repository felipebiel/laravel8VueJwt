<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthCtrl extends Controller
{

    public function __construct(){
        $this->middleware('auth:api', ['except' => [
            'authenticate',
        ]])
    }

    //AUTENTICA O USER E RETORNA O USER E TOKEN
    public function authenticate(Request $request)
    {
        // PEGA O E-MAIL E A SENHA 
        $credentials = $request->only('email', 'password');

        try {
            // VERIFICA SE AS CREDENCIAIS SÃO VALIDAS , SENAO RETORNA UM ERRO
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // SE ALGO DER ERRADO RETORNA ERRO 500
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        //retorna o user logado
        $user = auth()->user();
        // SE TUDO DER CERTO ELE RETORNA O TOKEN
        return response()->json(compact('token', 'user'));
    }
    //PEGA O USUARIO LOGADO COM O TOKEN NO HEADER
    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    //METODO QUE ATUALIZA O TOKEN
    public function refreshToken(){
        //resgata o token do header
        if(!$token = JWTAuth::getToken())
            return response()->json(['error' => 'Token inválido'], 401);

        try {
            $token = JWTAuth::refresh();

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        }

        return response()->json(compact('token'));

    }

}
