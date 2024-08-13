<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

if (!function_exists('actualiza_token')) {
    function actualiza_token($usuario_id, $token_id, $token)
    {
        DB::table('personal_access_tokens')
            ->where('id', $token_id)
            ->update([
                'token' => hash('sha256', $token)
            ]);
        DB::table('users')
            ->where('id', $usuario_id)
            ->update([
                'token' => $usuario_id . '|' . $token
            ]);
    }
}

if (!function_exists('token_api')) {
    function token_api()
    {
        $user = auth()->user();
        $tokens = DB::table('personal_access_tokens')
            ->select('id', 'tokenable_id', 'token')
            ->where('tokenable_id', $user->id)
            ->get()->toArray();
        if (0 < count($tokens)) {
            $user->tokens()->where('id', '<>', $tokens[0]->id)->delete();// ¿No se borran de otros usuarios?
            if (!empty($user->token)) {
                $partes = explode('|', $user->token);
                $plainTextToken = $partes[1];
                if (hash('sha256', $plainTextToken) != $tokens[0]->token) {
                    $plainTextToken = Str::random(40);
                    actualiza_token($user->id, $tokens[0]->id, $plainTextToken);
                }
                $plainTextToken = $user->token;
            } else {
                $plainTextToken = Str::random(40);
                actualiza_token($user->id, $tokens[0]->id, $plainTextToken);
                $plainTextToken = $user->id . '|' . $plainTextToken;
            }
        } else {
            $token =  $user->createToken('api');
            $plainTextToken = $token->plainTextToken;
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'token' => $plainTextToken
                ]);
        }
        return $plainTextToken;
    }
}