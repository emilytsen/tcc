<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use \Exception;
use App\Model\Usuario;

class LoginController extends BaseController
{
    public function showView()
    {
        return view('login');
    }

    public function logar()
    {
        $usuario = Usuario::buscarPorEmail($_REQUEST['email']);
        if ($usuario==null)
        {
            throw new Exception ("Email não encontrado");
        }

        if ($usuario->senha!=$_REQUEST['senha'])
        {
            throw new Exception ("Senha Incorreta");
        }

        session(['usuario' => $usuario]);

        return redirect("/artesanatos/listagem");
    }
}