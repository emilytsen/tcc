@extends('artesanatos.layout_adm')

@section('conteudo')

<link rel="stylesheet" href="/css/cadastro.css">


<?php
if (@$_REQUEST['id']) {
    $action = "/artesanatos/editar";
} else {
    $action = "/artesanatos/cadastrar";
}
?>

<div class="box">

    <img class="logo" src="/img/logo.png" alt="logo">
    <h1>Cadastro de produtos:</h1>

    <form method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
        @csrf

        <?php
        $required = "required";
        if (@$_REQUEST['id']) $required = " ";
        ?>

        <div class="boxImg">

            <div class="boxImgCol">
                <img src="<?php echo @$produtos->imagem1; ?>" alt="" class="imgProduto">
                <label class="btn" for="fileImg1">selecionar arquivo</label>
                <input id="fileImg1" type="file" name="imagem1" accept="jpg, jpeg, png" <?php echo $required ?>></br>
            </div>

            <div class="boxImgCol">
                <img src="<?php echo @$produtos->imagem2; ?>" alt="" class="imgProduto">
                <label class="btn" for="fileImg2">selecionar arquivo</label>
                <input id="fileImg2" type="file" name="imagem2"> </br>
            </div>

            <div class="boxImgCol">
                <img src="<?php echo @$produtos->imagem3; ?>" alt="" class="imgProduto">
                <label class="btn" for="fileImg3">selecionar arquivo</label>
                <input id="fileImg3" type="file" name="imagem3"> </br>
            </div>

        </div>

        <div class="boxLineInput">
            <input type="hidden" name="id" value="<?php echo @$produtos->id; ?>">
            <input type="text" name="produto" placeholder="nome do produto" value="<?php echo @$produtos->nome; ?>" required>

            <input type="text" name="preco" placeholder="preço do produto" value="<?php echo @$produtos->preco; ?>" required> </br>
        </div>

        <p class="descProduto">Descrição do produto:</p>
        <textarea class="descricao" name="descricao" placeholder="descrição do produto" required><?php echo @$produtos->descricao; ?></textarea> </br>

        <div class="boxButtons">
            <button class="btn primary" type="submit">Enviar</button>
            <a href="/artesanatos/listagem">Voltar para listagem</a>
        </div>
    </form>

</div>

@endsection