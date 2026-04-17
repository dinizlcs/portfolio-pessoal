<?php
    class Base{
        private static $areasMenu = [
            "Sobre" => "index.php",
            "Conhecimentos" => "conhecimentos.php",
            "Projetos" => "projetos.php",
            "Info. Serviços" => "info-servicos.php"
        ];

        public static function carregarAreas(){
            $html = "";

            foreach(self::$areasMenu as $texto => $refArquivo){
                $definirClasse = (basename($_SERVER["PHP_SELF"]) === $refArquivo) ? "ativo" : ""; 
                $html .=    "<li class='" . Utils::valHtml($definirClasse) . "'>
                                <a href='" . Utils::valHtml($refArquivo) . "'>" . Utils::valHtml($texto) . "</a>
                            </li>";
            }

            return $html;
        }
    }
?>