$(document).ready(function () {

    $(window).scroll(function () {  /*Fonction ecoute le scroll*****/
        
var $scroll = $(window).scrollTop() ;


        if ($scroll > 100) { /*Nombre de pixcel pour condition ok***/

            $('.navbar-default').addClass("bigcontent");/*Aplique les classes****/
            $('.contact').addClass("cache");
            $('#logo').addClass("logoNav");
        } else {
            $('.navbar-default').removeClass("bigcontent");
            $('.contact').removeClass("cache");
            $('#logo').removeClass("logoNav");
        }

        
        
        if ($scroll < 100) {
          $('#inputResponsive').css("display","none")  ;
        }else{
          $('#inputResponsive').css("display","block")  ;   
        }

    });



});