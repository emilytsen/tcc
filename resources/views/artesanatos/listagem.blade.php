@extends('artesanatos.layout_adm')

@section('conteudo')

<link rel="stylesheet" href="/css/listagem.css">

<div class="box">

    <img class="logo" src="/img/logo.png" alt="logo">
    <h1>Listagem de Produtos</h1>


    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>

                <tr>
                    <td><img src="<?php echo $produto->imagem1; ?>" alt=""> </td>
                    <td><?php echo $produto->nome; ?></td>
                    <td><?php echo $produto->preco; ?></td>


                    <td>
                        <a class="btn" href="/artesanatos/cadastrar?id=<?php echo $produto->id; ?>">Editar</a> </br>
                        <a class="btn" href="/artesanatos/excluir?id=<?php echo $produto->id; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </br>

    <div class="boxButtons">
        <a class="btn primary" href="/artesanatos/cadastrar">Novo Produto</a>
        <a  href="/catalogo">Voltar para página de produtos</a>
    </div>
</div>

@endsection