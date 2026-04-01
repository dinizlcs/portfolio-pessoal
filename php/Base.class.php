<?php
    class Base{
        private static $areasMenu = [
            "Sobre" => "index.php",
            "Conhecimentos" => "conhecimentos.php",
            "Projetos" => "projetos.php",
            "Info. Serviços" => "info-servicos.php"
        ];

        public static function carregarLinks(){
            return "
                <link rel='stylesheet' href='css/cores-sistema.css'>
                <link rel='stylesheet' href='css/layout.css'>
                <script src='https://code.jquery.com/jquery-3.7.1.min.js'></script>
                <script src='js/script.js'></script>
                <script src='https://kit.fontawesome.com/ea18f1896e.js' crossorigin='anonymous'></script>
                <link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'>";
        }

        public static function carregarAreas(){
            $html = "";

            foreach(self::$areasMenu as $texto => $refArquivo){
                $definirClasse = (basename($_SERVER["PHP_SELF"]) === $refArquivo) ? "ativo" : ""; 
                $html .= "<li><a class='$definirClasse' href='$refArquivo'>$texto</a></li>";
            }

            return $html;
        }
    }
?>