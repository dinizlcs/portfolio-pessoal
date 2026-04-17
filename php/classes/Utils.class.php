<?php
    class Utils{
        public static function calcIdade(){
            $nascimento = new DateTime("2003-03-02");
            $hoje = new DateTime();
            $idadeAtual = $hoje->diff($nascimento)->y;

            return $idadeAtual;
        }

        public static function valHtml($valor){
            return htmlspecialchars($valor, ENT_QUOTES, "UTF-8");
        }
    }
?>