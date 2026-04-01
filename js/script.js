$(document).ready(function(){
    $("#btn-menu").click(function(e){
        e.stopPropagation();
        $("#navegacao").slideToggle();
    });

    $(document).click(function(e){
        if(!$(e.target).closest("#navegacao, #btn-menu").length && window.innerWidth < 768){
            $("#navegacao").slideUp();
        }
    });

    // Previne que, ao diminuir a tela e clicar no botão do menu para esconder os itens. Continue escondido ao aumentar novamente.
    $(window).resize(function(){
        if(window.innerWidth > 768){
            $("#navegacao").removeAttr("style");
        }
    });
});