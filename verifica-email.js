//Aqui vai ser verificado se o email colocado no cadastro já existe
src = "https://code.jquery.com/jquery-3.6.0.min.js"

$(".erro").show();
$(document).ready(function(){
    $("input[name='email']").blur(function(){
        var email = $(this).val();
        $.post("cadastro.php", {email: email}, function(resultado){
            if(resultado == 'existe'){
                $(".erro").show();
                
            }else{
                $(".erro").hide();
            }
        });
    });
});





//Aqui vai ser verificado o login


