<?php
    require_once "php/Base.class.php";

    $nascimento = new DateTime("2003-03-02");
    $hoje = new DateTime();
    $idadeAtual = $hoje->diff($nascimento)->y;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio-Lucas Diniz</title>

    <?= Base::carregarLinks() ?>
</head>
<body>
    <nav>
        <img src="img/perfil.jpg" alt="foto de perfil">
        <button id="btn-menu"><i class="fa-solid fa-bars"></i></button>
        <ul id="navegacao">
            <?= Base::carregarAreas(); ?>
        </ul>
    </nav>

    <main>
        Conteúdo principal aqui. <br>
        Idade atual: <?= $idadeAtual; ?> (Teste)
    </main>
</body>
</html>