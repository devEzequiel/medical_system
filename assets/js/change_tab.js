//Trocar abas
$(function(){
    $(".aba:first").show();
    $("#sem-linha a").click(function(){
        $(".aba").hide();
        var i = $(this).attr('href');
        $(i).show();
        return false;
    });
});

//Verificação de campo vazio do cadastro
$(document).ready(function(){
    
    $("#sign-up").click(function(){
        var name = 0;
        var mail = 0;
        var password = 0;
        if($(".name_register").val()== null || $(".name_register").val() ==""){
            name= 1;
            alert('Campo nome vazio');
        }

        if($(".mail_register").val()== null || $(".mail_register").val() ==""){
            mail = 1;
            alert('Campo Email vazio');      
        }

        if($(".password_register").val()== null || $(".password_register").val() ==""){
            password = 1;
            alert('Campo Senha vazio');      
        }
        if(name == 1){
            ajax.abort();
        }else{
            if(mail==1){
                ajax.abort();
            }else{
                if(password == 1){
                    ajax.abort();
                };
            };
        };
        
    });
});

//texto de exibição no login
$(document).ready(function(){
    $('.clean_text').click(function(){
        $('#text_error').text('')
    });

    $('.clean_text_register').click(function(){
        $('#text_register_error').text('');
        $('#text_register_confirm').text('');
        $('#names, #emails, #pwds').val('');
    });

    $('#sign-up').click(function(){
        $('#text_register_error').text('');
        $('#text_register_confirm').text('');
    });
});

//Fazer com que "system medic" não redirecione
 $(function(){
    $("#sem_requisicao").click(function(){
        return false;
    });
 });
 //Form
 $(document).ready(function(){
    $('.fechar').click(function(){
        $('#medic-feedback').text("")
        $('#funcio-feedback').text("")
    })
    $('.close').click(function(){
        $('#medic-feedback').text("")
        $('#funcio-feedback').text("")
    })
 })
