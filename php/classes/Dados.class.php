<?php
    class Dados{
        private static function lerDados($arquivo){
            $arqJson = file_get_contents("json/" . $arquivo . ".json");
            $dadosJson = json_decode($arqJson, true);
            return $dadosJson;
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

        public static function carregarProjetos(){
            $projetos = self::lerDados("projetos");
            $html = "";

            foreach($projetos as $categoria => $projetosCategoria){
                $idProjeto = 0;
                
                $html .= <<<HTML
                <section class="projetos">
                    <h2>{$categoria}</h2>
                    <div class="grade-projetos">
                HTML;
                
                foreach($projetosCategoria as $projeto){
                    $imagens = "";
                    $imgsCartao = "";
                    $extrasProjeto = "";
                    $linkGit = $projeto["link_github"] ? "<a class='link-git' href='{$projeto['link_github']}'>Ver código</a>" : "<p class='link-git'>Código indisponível</p>";

                    // Verificar se existe a pasta, criar e arrumar o Array
                    if(is_dir(__DIR__ . "/../../" . $projeto["imagens"])){
                        $imagens = scandir(__DIR__ . "/../../" . $projeto["imagens"]);
                        array_splice($imagens, 0, 2);
                    }

                    // Verificar se foi encontrado imagens na pasta, preparar elementos do card (Fotos e Ver mais)
                    if(!empty($imagens)){
                        $imgsCartao .= isset($imagens[0]) ? "<img src=\"{$projeto['imagens']}{$imagens[0]}\" alt=\"Imagem do projeto\">" : "<img src=\"img/img-padrao.jpg\" alt=\"Imagem padrão\">";
                        $imgsCartao .= isset($imagens[1]) ? "<img src=\"{$projeto['imagens']}{$imagens[1]}\" alt=\"Imagem do projeto\">" : "<img src=\"img/img-padrao.jpg\" alt=\"Imagem padrão\">";

                        if(count($imagens) > 2){
                            $extrasProjeto = "<a href='detalhes-projeto.php?categoria=" . $categoria . "&projeto=" . $idProjeto . "'>+" . (count($imagens) - 2) . "</a>";
                        }else{
                            $extrasProjeto = "<a href='detalhes-projeto.php?categoria=" . $categoria . "&projeto=" . $idProjeto . "'>Ver projeto</a>";
                        }
                    }else{
                        $imgsCartao = <<<HTML
                        <img src="img/img-padrao.jpg" alt="Imagem padrão">
                        <img src="img/img-padrao.jpg" alt="Imagem padrão">
                        HTML;

                        $extrasProjeto = "<a href='detalhes-projeto.php?categoria=" . $categoria . "&projeto=" . $idProjeto . "'>Ver projeto</a>";
                    }
                    
                    // Criação do card
                    $html .= <<<HTML
                    <article class="projeto">
                        <h3>{$projeto["titulo"]}</h3>
                        <div class="grade-midia">
                            <iframe src="https://www.youtube.com/embed/{$projeto['id_youtube']}" frameborder="0" allowfullscreen></iframe>
                            {$imgsCartao}
                            {$extrasProjeto}
                        </div>
                        <p>{$projeto["descricao"]}</p>
                        {$linkGit}
                    </article>
                    HTML;

                    $idProjeto++;
                }

                $html .= <<<HTML
                    </div>
                </section>
                HTML;
            }

            return $html;
        }

        public static function carregarDetalhes($categoria, $projeto){
            $lstProjetos = self::lerDados("projetos");
            $projeto = $lstProjetos[$categoria][$projeto];
            $imgsProjeto = "<p class=\"informacao\">Não há imagens disponíveis.</p>";

            if(is_dir(__DIR__ . "/../../" . $projeto["imagens"])){
                $lstImagens = scandir(__DIR__ . "/../../" . $projeto["imagens"]);
                array_splice($lstImagens, 0, 2);
                
                if(count($lstImagens) > 0){
                    $imgsProjeto = "<p class=\"observacao\">Clique ou toque na imagem para abrir em tela cheia</p>" . "\n<div class=\"grade-imagens\">";
                    foreach($lstImagens as $imagem){
                        $imgsProjeto .= "<img src=\"{$projeto['imagens']}{$imagem}\" alt=\"Imagem do projeto {$projeto['titulo']}\">";
                    }
                    $imgsProjeto .= "</div>";
                }
            }
            
            $html = <<<HTML
            <h2>{$categoria}</h2>
            <h3>{$projeto["titulo"]}</h3>
            <p>{$projeto["descricao"]}</p>
            <iframe src="https://www.youtube.com/embed/{$projeto['id_youtube']}" frameborder="0" allowfullscreen></iframe>
            {$imgsProjeto}
            HTML;

            return $html;
        }
    }
?>