<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class APIController extends Controller
{
    public $loginAfterSignUp = true;

    /**
     * Cadastra um token
     * @param  Request $request  email | senha
     * @return json [description]
     */
    public function login(Request $request)
    {
        $token       = null;
        $campos_json = json_decode($request->getContent(), JSON_OBJECT_AS_ARRAY);
        $credenciais = [
            'email'    => $campos_json['email'],
            'password' => $campos_json['password']
        ];

        try {
            //Se as credenciais forem invalidas, retornamos 401
            if ( !$token = JWTAuth::attempt($credenciais) ) { //Se ao receber as credenciais o token for nulo retorna uma mensagem de erro
                return  response()->json([
                    'success' => false,
                    'message' => 'Credenciais Invalidas'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token não pode ser criado'], 500);
        }

        return response()->json([
            'success' => true,
            'token'   => $token], 200);
    }

    /**
     * Função para invalidar o token antes da expiração
     * @param  Request $request  Token a ser desvalidado
     * @return json  [description]
     */
    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate( JWTAuth::getToken() );

            return response()->json([
                'success' => true,
                'message' => 'Token Invalidado']);

        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao invalidar o Token',
                'error'   => var_export($e->getMessage())], 500);
        }
    }

}
