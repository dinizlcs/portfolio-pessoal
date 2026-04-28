$(document).ready(function(){
    const areaSobre = document.getElementById("sobreposicao");
    const imgSobreposicao = document.getElementById("img-sobreposicao");

    $("main").on("click", "img", function(){
        const src = $(this).attr("src");
        const alt = $(this).attr("alt");

        imgSobreposicao.src = src;
        imgSobreposicao.alt = alt;

        areaSobre.showModal();
    });

    $("#btn-fechar").on("click", function(){
        areaSobre.close();
    });

    $("#cont-sobreposicao").on("click", function(e){
        if(e.target === this){
            areaSobre.close();
        }
    });
});