$(document).ready(function(){
    $(".aba").on("click", function(){
        var abaAlvo = $(this).data("aba");
        var area = $(this).closest(".area-info");

        area.find(".aba").removeClass("ativa");
        $(this).addClass("ativa");

        area.find(".conteudo-aba").removeClass("ativo");
        area.find("#" + abaAlvo).addClass("ativo");
    });
});