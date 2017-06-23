<?php
/*
author: ANDRÉ VALLE - Web Developer Full Stack
agency: http://b4w.com.br

description document: Content Footer

*/
?>

<footer class="footer">

	<div class="container container-footer">

		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-botafogo">
				<img src="<?php bloginfo('template_url') ?>/images/logo1-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-copacabana">
				<img src="<?php bloginfo('template_url') ?>/images/logo2-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-house">
				<img src="<?php bloginfo('template_url') ?>/images/logo3-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-rio">
				<img src="<?php bloginfo('template_url') ?>/images/logo4-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-rooms">
				<img src="<?php bloginfo('template_url') ?>/images/logo5-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-leme">
				<img src="<?php bloginfo('template_url') ?>/images/logo6-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-congonhas">
				<img src="<?php bloginfo('template_url') ?>/images/logo7-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-ilha-grande">
				<img src="<?php bloginfo('template_url') ?>/images/logo8-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-salvador">
				<img src="<?php bloginfo('template_url') ?>/images/logo9-footer.png">
			</a>
		</div>
		<div class="col-lg-1 col-sm-1 col-md-1 icons-boxs">
			<a href="<?php echo $_SERVER["REQUEST_URI"] ?>produto/el-misti-yellow-buzios">
				<img src="<?php bloginfo('template_url') ?>/images/logo10-footer.png">
			</a>
		</div>

		<div class="clear"></div>
		<hr class="hr-footer">

		<div class="col-lg-10 col-menu col-menu2">
			
			<span class="switcher click2"><i class="icon-list"></i>MENU</SPAN>
				<?php 

				wp_nav_menu(array(
					'theme_location'  	=> 		'footer-menu',
					'container'			=>		'nav',
					'container_id'		=>		'nav-teste',
					'container_class'	=>		'nav-teste',
					'menu_id'	 		=>		'menu menu-responsive',
					'menu_class' 		=>		'menu menu-responsive menu2',
					'echo'			 	=>		true,
					'before'			=>		'',
					'after'			 	=>		'',
					'link_before'		=>		'',
					'link_after'		=>		'',
					'depth'			 	=>		'0',
					'walker'	 		=>		 new themeslug_walker_nav_menu

				));
				

				?>
		</div><!-- end menu2 -->


		<div class="col-lg-2 col-sociais2">
			<a href="https://www.facebook.com/MistiHostels?fref=ts" target="_blank"><i class="icon-facebook"></i></a>
			<a href="https://twitter.com/MistiHostels" target="_blank"><i class="icon-twitter"></i></a>
			<a href="https://plus.google.com/+Elmistihostels/" target="_blank"><i class="icon-google-plus"></i></a>
			<a href="https://instagram.com/elmistihostels" target="_blank"><i class="icon-instagram"></i></a>
			<a href="https://www.youtube.com/user/ElMistiHostels" target="_blank"><i class="icon-youtube-sign"></i></a>
		</div>

		<div class="clear"></div>
		<hr class="hr-footer2">
		
		<div class="col-lg-12 col-sm-12 col-md-12 col-iuteis">
			<ul>
				<li class="hifen"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>pagos"><?php _e('PAGOS','El-Misti'); ?></a></li>
				<li class="hifen"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>termos-e-condicoes"><?php _e('TERMOS E CONDIÇÕES','El-Misti'); ?></a></li>
				<li class="hifen"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>guestbook/"><?php _e('GUESTBOOK','El-Misti'); ?></a></li>
				<li class="hifen"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>trabalhe-conosco/"><?php _e('TRABALHE CONOSCO','El-Misti'); ?></a></li>
                <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>seguro-viagem/"><?php _e('SEGURO DE VIAGEM','El-Misti'); ?></a></li>
			</ul>
		</div>

		<div class="clear"></div>
		<hr class="hr-footer3">

		<div class="col-lg-12 col-sm-12 col-md-12 inf-seguranca">
			
			<div class="col-lg-3 col-sm-3 col-md-3 boxs-infseg">
				<div class="col-lg-12 col-sm-12 col-md-12">
					<p class="box1-infseg">SECURITY <br>& PAYMENT</p>
				</div>
			</div>
			
			<div class="col-lg-3 col-sm-3 col-md-3 boxs-infseg">
				<div class="col-lg-12 col-sm-12 col-md-12">
					<p>The website uses Comodo. We accept the following bank cards</p>
				</div>
			</div>
			
			<div class="col-lg-3 col-sm-3 col-md-3 boxs-infseg">
				<div class="col-lg-12 col-sm-12 col-md-12">
					<i class="icon-card1"><img src="<?php bloginfo('template_url') ?>/images/visa1.png"></i>
					<i class="icon-card2"><img src="<?php bloginfo('template_url') ?>/images/visa2.png"></i>
					<i class="icon-card3"><img src="<?php bloginfo('template_url') ?>/images/maestro.png"></i>
					<i class="icon-card4"><img src="<?php bloginfo('template_url') ?>/images/mastercard.png"></i>
				</div>
			</div>

			<div class="col-lg-3 col-sm-3 col-md-3 boxs-infseg">
				<div class="col-lg-12 col-sm-12 col-md-12">
					<i class="icon-telefone"></i><p class="p-footer">+55 21 2246-107<br />0800 020 2661</p>
					<a href="mailto:INFO@ELMISTIHOSTELS.COM" class="mail-footer"><i class="icon-mail"></i><p class="p-footer">INFO@ELMISTIHOSTELS.COM</p></a>
				</div>
				<img src="<?php bloginfo('template_url') ?>/images/whatsapp-footer.png" class="img-footer" title="Reserve pelo WhatsApp" alt="img-whatsapp"><p class="p-footer">+55 21 984855138</p>
			</div>

		</div>

		<div class="clear"></div>
		<br>

		<div class="col-lg-12 col-sm-12 col-md-12 ">
			
			<div class="col-lg-3 col-sm-3 col-md-3 col-logo-3-custom">
				<a href="#header"><img src="<?php bloginfo('template_url') ?>/images/logo-footer.png"></a>
			</div>
			
			<div class="col-lg-4 col-sm-4 col-md-4 col-copy-3-custom">
				<p>© Copyright <?php echo date("Y"); ?>. El Misti Hostels & Pousadas</p>
			</div>

			<address class="address">
				<a href="http://b4w.com.br/" target="_BLANK" title="B4W - Agência Digital">
					<span class="icon-ass-b4w"></span>
				</a>
			</address>

		</div>

	</div>

</footer>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/script.js"></script>
<script type="text/javascript">
$(document).ready(function(){	
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

  	checkInOut($('#checkindate'), $('#checkoutdate'), now);
  	checkInOut($('#checkindate2'), $('#checkoutdate2'), now);
	});
    
var checkInOut = function(inEl, outEl, now) {
	var checkin = inEl.datepicker({
			onRender: function(date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function(ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date);
				newDate.setDate(newDate.getDate() + 1);
				checkout.setValue(newDate);
			}
			checkin.hide();
			outEl.focus();
		}).data('datepicker');
	var checkout = outEl.datepicker({
			onRender: function(date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function(ev) {
			checkout.hide();
		}).data('datepicker');
    };
		
	//Instagram
	var userFeed = new Instafeed({
	    get: 'user',
	    userId: 292809173,
	    accessToken: '287679399.5b9e1e6.579740af98964f889f7f950c699c1106',
	    limit: 8,
	    template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>'
	});
	userFeed.run();

	//active menu class
	jQuery(document).ready(function($){
    var url = window.location.href;
        $('.menu a[href="'+url+'"]').addClass('active-menu');
    });

    jQuery(document).ready(function($){
    var url = window.location.href;
    	$('.sub-menu a[href="'+url+'"]').removeClass('active-menu');
        $('.sub-menu a[href="'+url+'"]').addClass('active-menu2');
        
    });

	//idiomas select on Ul
  	$(".dropdown-menu li a").click(function(){
	  var selText = $(this).text();
	  switch(selText){
	  	case 'Português':
	  		selText = selText + "<img src='<?php bloginfo('template_url') ?>/images/pais1.jpg'>";
	  	break;
	  	case 'Inglês':
	  		selText = selText + "<img src='<?php bloginfo('template_url') ?>/images/pais2.gif'>";
	  	break;
	  	case 'Espanhol':
	  		selText = selText + "<img src='<?php bloginfo('template_url') ?>/images/pais3.gif'>";
	  	break;
	  }
	  $(this).parents('.dropdown').find('.dropdown-toggle').html(selText+'<span class="caret"></span>');
	});


	$('.lang_sel_sel').mouseenter(function(event) {
		$(this).next('ul').css({
			visibility: 'visible'
		});
	});
	$('.lang_sel_sel').click(function(event) {
		event.preventDefault();

		$(this).next('ul').toggle();
	});
	$('.lang_sel_sel').next('ul').mouseleave(function(event) {
		$(this).css({
			visibility: 'hidden'
		});
	});

	jQuery(document).ready(function($){
		if(window.location.pathname == "/" || 
		window.location.pathname == "/en/" ||
		window.location.pathname == "/es/" ||
		window.location.pathname == "/de/"){
	    	$('select#cat>option:eq(0)').prop('selected', true);    
	    }
    });

</script>
	
<?php wp_footer(); ?>

<?php //if( !is_order_received_page() ): ?>
<!-- Código veinteractive para recuperação de carrinho --> 
<!-- <script src="//configusa.veinteractive.com/tags/65E2D886/2FB9/4B03/A1C3/1132DB186A05/tag.js" type="text/javascript" async></script> -->
<!-- Código veinteractive para recuperação de carrinho --> 
<?php //endif; ?>


<!-- LiveZilla Tracking Code (ALWAYS PLACE IN BODY ELEMENT) --><div id="livezilla_tracking" style="display:none"></div><script type="text/javascript">
var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "https://elmistibookings.com/lz/server.php?a=d0589&request=track&output=jcrpt&ovlp=MjI_&ovlc=IzczYmUyOA__&ovlct=I2ZmZmZmZg__&ovloo=MQ__&ovlapo=MQ__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);</script><noscript><h1><img src="https://elmistibookings.com/lz/server.php?a=d0589&amp;request=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt=""></h1></noscript><!-- http://www.LiveZilla.net Tracking Code -->


<!-- Google Code para etiquetas de remarketing -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 956712595;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/956712595/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


</body>
</html>