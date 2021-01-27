<?php
namespace App\Model;

use Illuminate\Support\Facades\DB;

class Usuario
{
    public static function buscarPorEmail($email)
    {
        $sql = "SELECT * FROM login WHERE email = :email ";
        $params = ['email' => $email];
        $results = DB::select($sql, $params);

        if(count($results)>= 1){
            return $results[0];
        } else {
            return null;
        }
    }
    public static function logar($dados)
    {
        $sql = "INSERT INTO login (email, senha) VALUES (:email, :senha)";
        $params = [
            'email' => $dados['nome'],
            'senha' => $dados['senha'],
        ];
        DB::insert($sql, $params);
    }
}