<?php
    class Valores{
        private $valorSistema = 100;
        private $valDomAno = 40;
        private $valDomMes;
        private $valHospedagem = 20;
        private $valBanco = 20;
        private $porcentagemSup = 55;

        public function __construct(){
            $this->valDomMes = $this->valDomAno / 12;
        }

        // Função para formatar os números
        public function formatarNumero($valor){
            return number_format($valor, 2, ",", ".");
        }

        // Gets
        public function getValorSistema(){
            return $this->formatarNumero($this->valorSistema);
        }

        public function getValDomAno(){
            return $this->formatarNumero($this->valDomAno);
        }

        public function getValDomMes(){
            return $this->formatarNumero($this->valDomMes);
        }

        public function getValHospedagem(){
            return $this->formatarNumero($this->valHospedagem);
        }

        public function getValBanco(){
            return $this->formatarNumero($this->valBanco);
        }

        public function getPorcentagemSup(){
            // Caso a porcentagem seja um número inteiro, não formatar.
            if($this->porcentagemSup == (int)$this->porcentagemSup){
                return $this->porcentagemSup;
            }

            return $this->formatarNumero($this->porcentagemSup);
        }

        // Funções de cálculos
        public function calcValSistema(){
            return ($this->valorSistema * 0.3);
        }

        public function calcSubtotalSistema($tipo){
            if($tipo === "Desktop"){
                return ($this->valorSistema * 0.3) + $this->valBanco;
            }elseif($tipo === "Web"){
                return ($this->valorSistema * 0.3) + $this->valDomMes + $this->valHospedagem + $this->valBanco;
            }else{
                return "Erro: [$tipo] não foi encontrado para o cálculo do sistema.";
            }
        }

        public function calcValSuporte($tipo){
            if($tipo === "Desktop"){
                return $this->calcSubtotalSistema("Desktop") * ($this->porcentagemSup / 100);
            }elseif($tipo === "Web"){
                return $this->calcSubtotalSistema("Web") * ($this->porcentagemSup / 100);
            }else{
                return "Erro: [$tipo] não foi encontrado para o cálculo do suporte.";
            }
        }

        public function calcValTotalSistema($tipo){
            if($tipo === "Desktop"){
                return $this->calcSubtotalSistema("Desktop") + $this->calcValSuporte("Desktop");
            }elseif($tipo === "Web"){
                return $this->calcSubtotalSistema("Web") + $this->calcValSuporte("Web");
            }else{
                return "Erro: [$tipo] não foi encontrado para o cálculo do valor total do sistema.";
            }
        }
    }
?>