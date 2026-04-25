<?php
    require_once "php/classes/Base.class.php";
    require_once "php/classes/Utils.class.php";
    require_once "php/classes/Valores.class.php";

    $valores = new Valores();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio-Lucas Diniz</title>

    <?php include "php/componentes/links-base.php" ?>
    <link rel="stylesheet" href="css/info-servicos.css">
    <script src="js/info-servicos.js"></script>
</head>
<body>
    <?php include "php/componentes/menu-nav.php" ?>

    <main>
        <div class="container">
            <section class="area-info">
                <h2>Excel</h2>
                <p>
                    Com foco principal em Visual Basic for Applications (VBA), voltado à automação de processos e otimização de planilhas por meio de programação.
                </p>
                <p>
                    Exemplos de uso do VBA incluem a automatização de tarefas repetitivas, como formatação e atualização de dados, a criação de relatórios dinâmicos e dashboards automatizados, o desenvolvimento de formulários personalizados para entrada de dados, a integração e o tratamento de informações provenientes de diferentes bases de dados, além da geração automática de arquivos e do envio de e-mails diretamente pelo Excel.
                </p>
                <p class="info-pagamento">O serviço é cobrado por hora, no valor de R$ 42,86. Sendo realizado um pagamento único ao final da entrega do serviço.</p>
            </section>

            <section class="area-info">
                <h2>Desktop e Web (Com Java)</h2>
                <p>
                    Desenvolvimento de aplicações para ambientes desktop e web utilizando Java, inclui a criação de sistemas personalizados, integração com bancos de dados, implementação de interfaces funcionais e desenvolvimento de soluções que atendam às necessidades específicas do negócio, tanto em aplicações locais quanto em ambientes online.
                </p>
                <p class="info-pagamento">O pagamento desse serviço é feito por etapas.</p>
                <nav class="abas" aria-label="Navegação da área de informações">
                    <button class="aba ativa" data-aba="a1-aba1">Etapa 1</button>
                    <button class="aba" data-aba="a1-aba2">Etapa 2</button>
                    <button class="aba" data-aba="a1-aba3">Etapa 3</button>
                </nav>
                <section id="a1-aba1" class="conteudo-aba ativo">
                    <h3>Documentação e Protótipo</h3>
                    <p>
                        Esta é a etapa inicial e uma das mais importantes do projeto. O processo de elaboração da documentação geralmente leva cerca de 2 horas, podendo variar conforme a complexidade e o tamanho do sistema. A documentação serve como base para definir a estrutura do projeto, incluindo a estimativa de telas e funcionalidades.
                    </p>
                    <p>
                        Em seguida, é desenvolvido o protótipo, que consiste na criação de telas simuladas, sem funcionalidades implementadas. Ele tem como objetivo servir de referência visual e estrutural para o desenvolvimento do sistema, permitindo validar ideias e realizar ajustes de forma simples nesta fase inicial, inclusive em relação ao comportamento geral da aplicação.
                    </p>
                    <p class="info-pagamento">O valor desta etapa é de R$25,00 por tela.</p>
                    <aside class="observacao">
                        <p>Obs.:</p>
                        <ol>
                            <li>Após a conclusão da documentação, será cobrado um valor não reembolsável correspondente a 25% do total de telas planejadas. Por exemplo, caso o sistema possua 5 telas (R$ 125), será cobrado R$ 31,25 para início da etapa de protótipo.</li>
                            <li>A documentação será mantida por até 30 dias e, caso o pagamento não seja realizado dentro desse prazo, ela poderá ser excluída.</li>
                        </ol>
                    </aside>
                </section>
                <section id="a1-aba2" class="conteudo-aba">
                    <h3>Desenvolvimento do sistema</h3>
                    <p>
                        Nesta etapa, o protótipo é transformado em uma aplicação funcional, podendo ser um sistema desktop ou um website. É aqui que as funcionalidades passam a ser implementadas na prática, com botões realizando ações, tabelas exibindo e carregando dados, e campos de texto permitindo entrada e edição de informações.
                    </p>
                    <p>
                        As alterações nesta fase são mais pontuais, geralmente envolvendo ajustes como a inclusão de novos botões, pequenas funcionalidades adicionais mantendo a estrutura definida no protótipo, ou mudanças visuais como cores e elementos de interface. Em geral, são mudanças que não alteram a base estabelecida na etapa de prototipação.
                    </p>
                    <p class="info-pagamento">O valor desta etapa é de R$30,00 por hora trabalhada.</p>
                </section>
                <section id="a1-aba3" class="conteudo-aba">
                    <h3>Finalização/Exportação do projeto</h3>
                    <p>Nesta etapa, o projeto já está concluído e pronto para ser publicado online ou utilizado como aplicativo.</p>
                    <p>Para aplicativos desktop (programas instalados no computador), o valor é composto por três partes:</p>
                    <ul>
                        <li>Criação do sistema</li>
                        <li>Manutenção do bando de dados online (Quando necessário)</li>
                        <li>Suporte técnico (Suporte total)</li>
                    </ul>
                    <p class="info-pagamento">Como funciona na prática?</p>
                    <p>Como exemplo, vamos usar os seguintes valores:</p>
                    <ul>
                        <li>Valor do sistema: R$ <?= $valores->getValorSistema(); ?></li>
                        <li>Banco de dados: R$ <?= $valores->getValBanco(); ?></li>
                        <li>Suporte: Acréscimo de <?= $valores->getPorcentagemSup(); ?>% sobre o valor mensal final</li>
                    </ul>
                    <p>Cálculo:</p>
                    <ol>
                        <li>Valor mensal base do sistema: <?= $valores->getValorSistema() . " x 30% = R$ " . $valores->formatarNumero($valores->calcValSistema("Desktop")); ?></li>
                        <li>Soma com o banco de dados (Quando necessário): <?= $valores->formatarNumero($valores->calcValSistema("Desktop")); ?> + <?= $valores->getValBanco() . " = R$ " . $valores->formatarNumero($valores->calcSubtotalSistema("Desktop")); ?></li>
                        <li>Valor do suporte: <?= $valores->formatarNumero($valores->calcSubtotalSistema("Desktop")) . " x " . $valores->getPorcentagemSup() . "% = R$ " . $valores->formatarNumero($valores->calcValSuporte("Desktop")); ?></li>
                    </ol>
                    <p class="info-pagamento">Total mensal: R$ <?= $valores->formatarNumero($valores->calcValTotalSistema("Desktop")); ?></p>
                    <p>Para aplicativos web (sites), existem duas formas diferentes de cálculo, que serão apresentadas a seguir.</p>
                    <div id="opcoes-web">
                        <section class="opcao-web">
                            <h3>Primeira forma: Compra do sistema</h3>
                            <p>Nesse modelo, você paga apenas pelo desenvolvimento do sistema. Usando os dados do desktop, o valor é de R$ <?= $valores->getValorSistema(); ?></p>
                            <p>A hospedagem, o banco de dados e a publicação do site ficam sob sua responsabilidade. Caso precise de suporte futuramente, ele será cobrado à parte, com base no valor por hora da <strong>Etapa 2</strong>.</p>
                        </section>
                        <section class="opcao-web">
                            <h3>Segunda forma: Aluguel do sistema</h3>
                            <ul>
                                <li>Criação do sistema: R$ <?= $valores->getValorSistema(); ?></li>
                                <li>Domínio: R$ <?= $valores->getValDomAno() . " por ano (R$ " . $valores->getValDomMes() . " por mês)"; ?></li>
                                <li>Hospedagem: R$ <?= $valores->getValHospedagem(); ?></li>
                                <li>Banco de dados: R$ <?= $valores->getValBanco(); ?></li>
                                <li>Suporte: Acréscimo de <?= $valores->getPorcentagemSup(); ?>%</li>
                            </ul>
                            <p>Nesse modelo, você não paga o sistema integralmente, mas sim uma mensalidade para utilizá-lo.</p>
                            <p class="info-pagamento">O valor mensal é calculado da seguinte forma:</p>
                            <ul>
                                <li>30% do valor de criação do sistema</li>
                                <li>Custos de hospedagem, domínio e banco de dados</li>
                                <li>Acréscimo de <?= $valores->getPorcentagemSup(); ?>% referente ao suporte em tempo integral</li>
                            </ul>
                            <p class="info-pagamento">Seguindo o mesmo princípio do cálculo do exemplo anterior (Desktop), o valor final fica em: R$ <?= $valores->formatarNumero($valores->calcValTotalSistema("Web")); ?> por mês.</p>
                        </section>
                    </div>
                </section>
            </section>

            <section class="area-info">
                <h2>Contato</h2>
                <p>lucdinizcontato@gmail.com</p>
                <h2>Formas de pagamentos</h2>
                <ul>
                    <li>PIX</li>
                    <li>Boleto</li>
                    <li>Link para cartão</li>
                </ul>
                <p class="observacao">Obs.: A opção "Link para cartão" poderá gerar uma taxas.</p>
            </section>
        </div>
    </main>
</body>
</html>