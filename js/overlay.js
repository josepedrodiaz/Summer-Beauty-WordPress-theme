//Link Overlay js
$(document).ready(function(){
    if (Modernizr.touch) {
        // show the close overlay button
        $(".close-overlay").removeClass("hidden");
        // handle the adding of hover class when clicked
        $(".img").click(function(e){
            if (!$(this).hasClass("hover")) {
                $(this).addClass("hover");
            }
        });
        // handle the closing of the overlay
        $(".close-overlay").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            if ($(this).closest(".img").hasClass("hover")) {
                $(this).closest(".img").removeClass("hover");
            }
        });
    } else {
        // handle the mouseenter functionality
        $(".img").mouseenter(function(){
            $(this).addClass("hover");
        })
        // handle the mouseleave functionality
        .mouseleave(function(){
            $(this).removeClass("hover");
        });
    }
});



/* 
// Link Overlay  por Pedro
// para Nossos Hostels y QUartos Privados
// 11/01/2015
*/
$(document).ready(function(){
    if (Modernizr.touch) {

        //if mobile/tablet do nothing

    } else {
        // handle the mouseover functionality

        //hostel List hostel image
        $('.hostelPhotoLink').hover(function() {

          $(this).parent().find("img.hostel-list-header-hostel-image").css('transform', 'scale(' + 1.075 + ')');

        }, function() {
           
           $(this).parent().find("img.hostel-list-header-hostel-image").css('transform', 'scale(' + 1 + ')');

        });


        //quartos privados
        $('.img-privado').hover(function() {

          $(this).css('transform', 'scale(' + 1.075 + ')');

        }, function() {
           
           $(this).css('transform', 'scale(' + 1 + ')');

        });


        //promocoes
        $('.bannerPromoWrapper .bannerPromo').hover(function() {

          $(this).css('transform', 'scale(' + 1.075 + ')');

        }, function() {
           
           $(this).css('transform', 'scale(' + 1 + ')');

        });


    }



});