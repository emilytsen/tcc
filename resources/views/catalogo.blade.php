

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="\plugin\flexslider\flex-slider.css">
    <script src="\plugin\flexslider\flex-slider.js"></script>
    <link rel="stylesheet" href="\css\catalogo.css">
    
</head><link rel="shortcut icon" href="/img/logo.png">
<body>
    <header>
        <img class="logo" src="/img/logo.png" alt="logo">
        <form>
            <input id="barraBusca" type="text" name="busca" placeholder="Buscar...">
            <button type="submit"> <img src="/img/lupa.png" alt=""> </button>
        </form>
       
        <a  href="/catalogo"><img class="icon" src="/img/bag.png" alt=""></a>
        <a  href="/"><img class="icon" src="/img/home.png" alt=""></a>
    </header>

    <div class="banner" style="background-image: url(/img/bannerCatalogo.JPG);">
        <div class="filtro"></div>
        <h1>Wave of Grace</h1>
    </div>

    <div id="conteudo">
        <?php foreach($produtos as $produto) { ?> 
            <div class="boxProduto">
                <div class="flexSlider">
                    <div class="flexSliderBody">
                    <div class="carousel" style=" background-image: url('<?php echo $produto->imagem1?>');"></div>
                    <div class="carousel" style=" background-image: url('<?php echo $produto->imagem2?>');"></div>
                    <div class="carousel" style=" background-image: url('<?php echo $produto->imagem3?>');"></div>
                    </div>
                
                    <span class="flexSliderBtnBack" onclick="FlexSlider.back(this)">&lsaquo;</span>
                    <span class="flexSliderBtnNext" onclick="FlexSlider.next(this)">&rsaquo;</span>
                </div>
                <h3><?php echo $produto->nome?></h3> 
                <p><?php echo $produto->descricao?></p>
                <h3>R$<?php echo $produto->preco?></h3>   
            </div>
        <?php } ?>
    </div>

    <footer>
        Pojeto Wave of Grace 2020 </br> </br> </br>
        <a href="/login">área restrita</a>
    </footer>

</body>
</html>