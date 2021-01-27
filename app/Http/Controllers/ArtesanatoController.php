<?php

namespace App\Http\Controllers;

use App\Model\Produtos;
use Illuminate\Routing\Controller as BaseController;

class ArtesanatoController extends BaseController
{
    public function viewCadastro()
    {
        $produto = null;

        if(@$_REQUEST['id']) {
            $produto = Produtos::buscarPorId($_REQUEST['id']);
        }


        return view("artesanatos.cadastro", [
            "produtos" => $produto
        ]);
    }

    public function cadastrar()
    {
        
      $caminhoDaImagem1 = Produtos::addImagem('imagem1');
      $caminhoDaImagem2 = Produtos::addImagem('imagem2');
      $caminhoDaImagem3 = Produtos::addImagem('imagem3');
       
       Produtos::inserir([
           "imagem1" => $caminhoDaImagem1,
           "imagem2" => $caminhoDaImagem2,
           "imagem3" => $caminhoDaImagem3,
           "nome" => $_REQUEST['produto'],
           "descricao" => $_REQUEST['descricao'],
           "preco" => $_REQUEST['preco']

       ]);

       return redirect ("/artesanatos/listagem");
    }

    public function editar()
    {
        Produtos::editar($_REQUEST['id'], $_REQUEST['produto'], $_REQUEST['descricao'], $_REQUEST['preco']);
        
        if(@$_FILES['imagem1']['tmp_name'])  {
            $novoCaminhoProduto = Produtos::substituirImagem($_REQUEST['id'], 'imagem1');
            Produtos::atualizarCaminhoProduto($_REQUEST['id'], 'imagem1', $novoCaminhoProduto);
        }

        if(@$_FILES['imagem2']['tmp_name']) {
            $novoCaminhoProduto = Produtos::substituirImagem($_REQUEST['id'], 'imagem2');
            Produtos::atualizarCaminhoProduto($_REQUEST['id'], 'imagem2', $novoCaminhoProduto);
        }

        if(@$_FILES['imagem3']['tmp_name']) {
            $novoCaminhoProduto = Produtos::substituirImagem($_REQUEST['id'], 'imagem3');
            Produtos::atualizarCaminhoProduto($_REQUEST['id'], 'imagem3', $novoCaminhoProduto);
        }


        return redirect ("/artesanatos/listagem");
    }

    public function excluir()
    {
        Produtos::removerImagens($_REQUEST['id']);
        Produtos::excluir($_REQUEST['id']);
        return redirect ("/artesanatos/listagem");
    }
}