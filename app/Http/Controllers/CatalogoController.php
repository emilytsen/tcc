<?php

namespace App\Http\Controllers;

use App\Model\Produtos;
use Illuminate\Routing\Controller as BaseController;

class CatalogoController extends BaseController
{
    public function showView()
    {
        if(@$_REQUEST['busca'] == ''){
            $produtos = Produtos::todos();
        }else{

            $produtos = Produtos::buscar($_REQUEST['busca']);

        }


        return view('catalogo' , [
            "produtos" => $produtos


        ]);
    }
}
