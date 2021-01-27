<?php
namespace App\Model;

use Illuminate\Support\Facades\DB;

class Produtos

{
    public static function todos ()
    {
        $sql = "SELECT * FROM produtos";
        return DB::select($sql);
        
    }

    public static function buscar($termoDePesquisa)
    {
        $sql = "select * from produtos where nome like ?;";
        return DB::select($sql, ['%'. $termoDePesquisa . '%']);

    }

    public static function inserir($dados)
    {
        $sql = "INSERT INTO PRODUTOS (imagem1, imagem2, imagem3, nome, descricao, preco) VALUES(?,?,?,?,?,?)";
        $params = [$dados['imagem1'], $dados['imagem2'], $dados['imagem3'], $dados['nome'], $dados['descricao'], $dados['preco'] ];
        DB::insert($sql, $params);
    }

    public static function excluir($id)
    {
        DB::table('produtos')->where('id', '=', $id)->delete();
    }

    public static function buscarPorId($id)
    {
        return DB::table('produtos')->find($id);
    }

    public static function editar($id,$nome, $descricao, $preco)
    {
        DB::table('produtos')->where('id', '=', $id)->update([
            "nome" => $nome,
            "descricao" => $descricao,
            "preco" => $preco
        ]);
    }

    public static function atualizarCaminhoProduto($id, $fileName, $novoCaminhoProduto)
    {
        DB::table('produtos')->where('id', '=', $id)->update([
            $fileName => $novoCaminhoProduto,
        ]);
    }

    public static function addImagem($fileName)
    {
        $hash1 = md5_file($_FILES[$fileName]['tmp_name']);
        move_uploaded_file($_FILES[$fileName]['tmp_name'], $_SERVER['DOCUMENT_ROOT']. "\produtos\\$hash1.jpg");

        
        return "/produtos/$hash1.jpg";
        

    }

    public static function substituirImagem($id, $fileName)
    {
        Produtos::removerImagem($id, $fileName);
        return Produtos::addImagem($fileName);
    }

    public static function removerImagens($id)
    {
        $produto = DB::table('produtos')->find($id);
        $caminhoAbsolutoProduto1 = $_SERVER['DOCUMENT_ROOT'] . $produto->imagem1;
        $caminhoAbsolutoProduto2 = $_SERVER['DOCUMENT_ROOT'] . $produto->imagem2;
        $caminhoAbsolutoProduto3 = $_SERVER['DOCUMENT_ROOT'] . $produto->imagem3;
        @unlink($caminhoAbsolutoProduto1);
        @unlink($caminhoAbsolutoProduto2);
        @unlink($caminhoAbsolutoProduto3);
    }

    public static function removerImagem($id, $fileName)
    {
        $produto = (array) DB::table('produtos')->find($id);
        $caminhoAbsolutoProduto1 = $_SERVER['DOCUMENT_ROOT'] . $produto[$fileName];

        @unlink($caminhoAbsolutoProduto1);
    }
}