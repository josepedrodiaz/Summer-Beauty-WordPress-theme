/* SCROLL BAR - BOX HOME */
(function($){
	$(window).load(function(){
		$("#content_1").mCustomScrollbar({
			autoHideScrollbar:true,
			theme:"light-thin"
		});
	});
})(jQuery);

/* MENU MOBILE */
$(function(){
    $('.click1').click(function(){
        if($('.menu-item').is(":visible")){
            $('.menu-item').slideUp();
        }else{
            $('.menu-item').slideDown();
        }
    });
});


/* MENU MOBILE */
$(function(){
    $('.click2').click(function(){
        if($('.menu-item').is(":visible")){
            $('.menu-item').slideUp();
        }else{
            $('.menu-item').slideDown();
        }
    });
});




