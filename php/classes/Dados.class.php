<?php
    class Dados{
        private static function lerDados($arquivo){
            $arqJson = file_get_contents("json/" . $arquivo . ".json");
            $dadosJson = json_decode($arqJson, true);
            return $dadosJson;
        }

        public static function teste(){
            $dados = self::lerDados("");
            $html = "";
            
            foreach($dados as $curso => $info){
                $html .= "Curso: " . $curso . "<br>";
                $html .= "Descrição: " . $info["descricao"] . "<br>";
                $html .= $info["data-conclusao"] ? "Data: " . $info["data-conclusao"] . "<br>" : "Data: Curso em andamento <br>";
                
                if(!empty($info["tags"])){
                    $html .= "Tags[<br>";
                    foreach($info["tags"] as $tag){
                        $html .= "--" . $tag . "<br>";
                    }

                    $html .= "]<br>";
                }
            }

            return $html;
        }

        public static function carregarCursos(){
            $cursos = self::lerDados("conhecimentos");
            $html = "";

            foreach($cursos as $curso => $infos){
                $tags = "";
                $dataConclusao = $infos["data-conclusao"] ? "<strong>Curso finalizado em: </strong>" . $infos["data-conclusao"] . "." : "Curso em andamento";

                if(!empty($infos["tags"])){
                    $tags .= "<ul class='tags'>";
                    foreach($infos["tags"] as $tag){
                        $tags .= "<li>{$tag}</li>\n";
                    }
                    $tags .= "</ul>";
                }

                $html .= <<<HTML
<article class="curso">
    <header>
        <h3>{$curso}</h3>
    </header>

    <p>{$infos["descricao"]}</p>

    <footer>
        <p class="status-curso">{$dataConclusao}</p>
        $tags
    </footer>
</article>
HTML;
            }

            return $html;
        }
    }
?>