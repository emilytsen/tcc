<?php

namespace App\Http\Controllers;

use App\Model\Produtos;
use Illuminate\Routing\Controller as BaseController;

class ListagemController extends BaseController
{
    public function showView()
    {
        $produtos = Produtos::todos();

        return view('artesanatos.listagem', [
            "produtos" => $produtos
        ]);
    }

}