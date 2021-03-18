//Trocar a cor das abas
$(document).ready(function(){
    $(".borda").click(function(){
        $(".borda")
        .css('background', 'white'); 
        $(this)
        .addClass("borda").css('background', '#b1b1b1'); 
    });
});
//movimento do menu
$(document).ready(function(){
    $(window).scroll(function(){
        var topo = $(window).scrollTop();
        if(topo > 0.5){
            $('.procurar_direita')
            .fadeOut('fast');
        }else{
            $('.procurar_direita')
            .fadeIn('fast');
        }
    });
});
