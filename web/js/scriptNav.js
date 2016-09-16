$(document).ready(function () {

    $(window).scroll(function () {  /*Fonction ecoute le scroll*****/

        if ($(window).scrollTop() > 100) { /*Nombre de pixcel pour condition ok***/

            $('.navbar-default').addClass("bigcontent");/*Aplique les classes****/
            $('.contact').addClass("cache");
            $('#logo').addClass("logoNav");
        } else {
            $('.navbar-default').removeClass("bigcontent");
            $('.contact').removeClass("cache");
            $('#logo').removeClass("logoNav");
        }

    });

});