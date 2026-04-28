<?php
    require_once "php/classes/Base.class.php";
    require_once "php/classes/Utils.class.php";
    require_once "php/classes/Dados.class.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio-Lucas Diniz</title>

    <?php include "php/componentes/links-base.php" ?>
    <link rel="stylesheet" href="css/detalhes-projeto.css">
    <script src="js/detalhes-projeto.js"></script>
</head>
<body>
    <dialog id="sobreposicao">
        <button id="btn-fechar">X</button>
        <div id="cont-sobreposicao">
            <img id="img-sobreposicao" src="img/img-padrao.jpg" alt="">
        </div>
    </dialog>

    <?php include "php/componentes/menu-nav.php" ?>

    <main>
        <div class="container">
            <?php
                $categoria = $_GET["categoria"];
                $projeto = $_GET["projeto"];

                echo Dados::carregarDetalhes($categoria, $projeto);
            ?>
        </div>
    </main>
</body>
</html>