<?php
    require_once "php/classes/Base.class.php";
    require_once "php/classes/Utils.class.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio-Lucas Diniz</title>

    <?php include "php/componentes/links-base.php" ?>
</head>
<body>
    <?php include "php/componentes/menu-nav.php" ?>

    <main>
        <p>
            Conteúdo principal aqui. <br>
            Idade atual: <?= Utils::calcIdade(); ?> (Teste)
        </p>
    </main>
</body>
</html>