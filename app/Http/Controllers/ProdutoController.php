<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ProdutoController extends BaseController
{
    public function showView()
    {
        return view('produto');
    }
}