		<div id="footer" class="col-md-12">

		<div class="row contenedorInterno">
			
			<div class="col-md-4 col-md-push-4" id="menu2">
			<!--
			<p class="viewInYourLanguageTxt">View this site in your language</p>
			<div id="google_translate_element"></div>
			<script type="text/javascript">
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,  autoDisplay: false, multilanguagePage: true}, 'google_translate_element');
				}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			-->


				<h1>FOLLOW US</h1>
				<ul id="rrss_bottom" class="list-inline">
					<li id="Facebook"><a href="https://www.facebook.com/MistiHostels?fref=ts"> </a></li>
					<li id="Twitter"><a href="https://twitter.com/MistiHostels"> </a></li>
					<li id="GooglePlus"><a href="https://plus.google.com/+Elmistihostels/"> </a></li>
					<li id="Instagram"><a href="https://instagram.com/elmistihostels"> </a></li>
					<li id="Youtube"><a href="https://www.youtube.com/user/ElMistiHostels"> </a></li>
				</ul>

				<p>WhatsApp +55.21.98485.5138</p>

				<p>TEL +55.21. 2547.6419</p>

				<p>E-MAIL <a href="mailto:info@elmistihostels.com">info@elmistihostels.com</a></p>
			</div>


			<?php 
				// IMAGE MENU
				wp_nav_menu(array(
					'theme_location'  	=> 		'image-menu',
					'container'			=>		'div',
					'container_id'		=>		'menu1',
					'container_class'	=>		'col-md-4 col-md-pull-4',
					'menu_id'	 		=>		'hostelList',
					'menu_class' 		=>		'hostelList',
					'echo'			 	=>		true,
					'before'			=>		'',
					'after'			 	=>		'',
					'link_before'		=>		'',
					'link_after'		=>		'',
					'depth'			 	=>		'0',
					'walker'	 		=>		 new themeslug_walker_nav_menu
				));
			?>
			
			<div class="col-md-4" id="menu3">
				<ul>
				  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>nossos-hostels/"><?php _e('Hostels','El-Misti'); ?></a></li>
				  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>contato/"><?php _e('Contact','El-Misti'); ?></a></li>
				  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>franquias/"><?php _e('Franquias','El-Misti'); ?></a></li>
				  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>termos-e-condicoes"><?php _e('Termos e Condições','El-Misti'); ?></a></li>
				  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>pagos/"><?php _e('Pagamentos','El-Misti'); ?></a></li>
				  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>trabalhe-conosco/"><?php _e('Careers','El-Misti'); ?></a></li>
				</ul>

				<p>We accept credit cards<br />
				<img src="<?php bloginfo('template_url') ?>/img/tarjetas.png" /> </p> 
			</div>
		</div>

			




			<div class="col-md-12" id="pieFinal">
				<div class="row contenedorInterno center" id="lineaFinal">
					<div class="col-md-10" id="copy">
						© Copyright <?php echo date("Y"); ?>. El Misti Hostels. 
					</div>
					<div class="col-md-2" id="chat">
						<!-- LiveZilla Tracking Code (ALWAYS PLACE IN BODY ELEMENT) --><div id="livezilla_tracking" style="display:none"></div><script type="text/javascript">
						var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "https://elmistibookings.com/lz/server.php?a=125c3&rqst=track&output=jcrpt&ovlp=MjI_&ovlc=IzY2NjY2Ng__&ovlct=I2ZmZmZmZg__&ovlt=Q0hBVCBPTkxJTkU_&ovloo=MQ__&ovlapo=MQ__&eca=MQ__&ecw=Mjg1&ech=OTU_&ecmb=Mjk_&echm=MQ__&ecfs=I0YwRkZENQ__&ecfe=I0QzRjI5OQ__&echc=IzZFQTMwQw__&ecslw=Mg__&ecsgs=IzY1OUYyQQ__&ecsge=IzY1OUYyQQ__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);</script><noscript><img src="https://elmistibookings.com/lz/server.php?a=125c3&amp;rqst=track&amp;output=nojcrpt&ovlp=MjI_&ovlc=IzY2NjY2Ng__&ovlct=I2ZmZmZmZg__&ovlt=Q0hBVCBPTkxJTkU_&ovloo=MQ__&ovlapo=MQ__&eca=MQ__&ecw=Mjg1&ech=OTU_&ecmb=Mjk_&echm=MQ__&ecfs=I0YwRkZENQ__&ecfe=I0QzRjI5OQ__&echc=IzZFQTMwQw__&ecslw=Mg__&ecsgs=IzY1OUYyQQ__&ecsge=IzY1OUYyQQ__" width="0" height="0" style="visibility:hidden;" alt=""></noscript><!-- http://www.LiveZilla.net Tracking Code -->
					</div>
				</div>
			</div>
      	</div><!-- /#footer -->
    </div><!-- /#container-fluid -->





    <!-- Scripts -->
    <!-- JQuey UI -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" ></script>
    <!-- Video.js -->
    <!-- <script src="//vjs.zencdn.net/4.12/video.js"></script> -->
    <script src="/scripts/video.js" ></script>
    
    <!-- Modernizer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js" ></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker.css" rel="stylesheet" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js" ></script>
    <!-- Slider -->
    <script src="<?php bloginfo('template_url') ?>/js/jquery.bgswitcher.js" ></script>
    <!-- checkout -->
    <script src="<?php bloginfo('template_url') ?>/js/checkout.js" ></script> 
    <!-- Modernizer Overlay Scripts -->
    <script src="/wp-content/themes/El-Misti/js/overlay.js" ></script>
    <!-- Parallax -->
    <script src="/wp-content/themes/El-Misti/js/parallax.min.js" ></script>
    <!-- Parallax -->
    <script src="/wp-content/themes/El-Misti/js/ajaxform.js" ></script>

    <!-- Analytics
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-22408272-1', 'auto', {'allowLinker': true});
		  //Multidomain
		  // Load the plugin.
		  ga('require', 'linker');
		  // Define which domain/s to autoLink.
		  ga('linker:autoLink', ['reservationarea.com']);
		  ga('send', 'pageview');


		</script>
	 -->
    
   

    <!-- Reservas 
	<script src="https://www.elmistihostels.com/scripts/booking.js.v1.3.js"></script>
    -->

    <script src="https://www.elmistihostels.com/scripts/booking.js.v2.0.js.compressed.js?v2.0" async></script>

    <script>
		$(document).ready(function() {
			var date = new Date();
			date.setDate(date.getDate());

			//datepicker init
			$('#llegada').datepicker({
                format: "dd/mm/yyyy",
                startDate: date
            });
		
            //datepicker init
			$('#partida').datepicker({
                format: "dd/mm/yyyy"
            });

            //close datepicker after select
			$('#llegada').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			    string = $('#llegada').val();
			    var fecha = new Array();
			    fecha = string.split('/');
			    endDate = fecha[2] + "," + fecha[1] + "," + fecha[0];
			    minPartida = new Date(endDate);
			    //add 1 day to fecha llegada
			    //to get partida start date
			    minPartida.setDate(minPartida.getDate() + 1);
			    $('#partida').data('datepicker').setStartDate(minPartida);
			    $('#partida').datepicker('show');
			});
			$('#partida').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			});


            //Mobile callendar
            //init
            $( "#calendarButton" ).click(function() {
			  $("#llegada").datepicker("show");
            });
            $( "#calendarCheckoutButton" ).click(function() {
			  $("#partida").datepicker("show");
            });



            $('.datepicker').datepicker();

            //datepicker affix  init
			$('#llegada-scroll').datepicker({
                format: "dd/mm/yyyy",
                startDate: date
            });

            $('#partida-scroll').datepicker({
                format: "dd/mm/yyyy"
            });

            //close datepicker after select
			$('#llegada-scroll').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			    string = $('#llegada-scroll').val();
			    var fecha = new Array();
			    fecha = string.split('/');
			    endDate = fecha[2] + "," + fecha[1] + "," + fecha[0];
			    minPartida = new Date(endDate);
			    //add 1 day to fecha llegada
			    //to get partida start date
			    minPartida.setDate(minPartida.getDate() + 1);
			    $('#partida-scroll').data('datepicker').setStartDate(minPartida);
			    $('#partida-scroll').datepicker('show');
			});
			$('#partida-scroll').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			});


			//datepicker form contato
			$('.wpcf7-validates-as-date').datepicker({
                format: "yyyy-mm-dd",
                startDate: date
            });

			//close datepicker after select
			$('.wpcf7-validates-as-date').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			});

		});//END document.ready()


		</script>

		
		




    <?php wp_footer(); ?>

	

		<!-- Async Google remarketing -->

		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion_async.js" charset="utf-8"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
		window.google_trackConversion({
		  google_conversion_id: 956712595,
		  google_custom_params: window.google_tag_params,
		  google_remarketing_only: true
		});
		//]]>
		</script>



		<!-- BING #lulo -->
		<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5256626"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=5256626&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>


		<!-- Track boton RESERVE AGORA de adentro de las pags de los hostels -->

		<script>
			window.addEventListener('load',function(){
			jQuery('a:contains("RESERVE AGORA")').click(function(){
			ga('send', 'event','button','click','Reserve_agora');
			})})
		</script>


		<script type="text/javascript">
		$(function() {
		    $( "#videoBanner" ).mouseover(function() {
			  $( "#tituloVideo" ).show();
			});
			$( "#tituloVideo" ).mouseover(function() {
			  $( "#tituloVideo" ).show();
			});
			$( "#videoBanner" ).mouseout(function() {
			  $( "#tituloVideo" ).hide();
			});
		});
	</script>




	<!-- Modal CSS -->

	<style type="text/css">
    .bs-example,
    .bs-example2{
    	margin: 20px;
    	display: none;
    }
    .modal-content iframe{
        margin: 0 auto;
        display: block;
    }
    .modal-dialog{
    	margin-top: 130px;
    }
	</style>
	<script type="text/javascript">
	$(document).ready(function(){

		//is mobile?
		/* Al clickear sobre el banner
	    abre el modal
	    */

	    var is_mobile;

	    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		 // some code..
		  is_mobile = 1;
		}else{
			is_mobile = 0;
		}
		
		// VIDEO 1
	    /* Get iframe src attribute value i.e. YouTube video url
	    and store it in a variable */
	    var url = $("#bannerVideo").attr('src');
	    
	    /* Assign empty url value to the iframe src attribute when
	    modal hide, which stop the video playing */
	    $("#videoModal").on('hide.bs.modal', function(){
	    	$(".bs-example").css("display","none");
	        $("#bannerVideo").attr('src', '');
	    });
	    
	    /* Assign the initially stored url back to the iframe src
	    attribute when modal is displayed again */
	    $("#videoModal").on('show.bs.modal', function(){
	    	$(".bs-example").css("display","block");
	        $("#bannerVideo").attr('src', url+"&amp;autoplay=1&amp;rel=0");
	    });

	    


        // My own arbitrary use of isMobile, as an example

            // I only want to redirect iPhones, Android phones and a handful of 7" devices
            if (is_mobile == 1) {

            	$("a[href$=#verao]").click(function() {
				  window.location.href = url+"&amp;autoplay=1&amp;rel=0";
				});
                
            }else{

            	$("a[href$=#verao]").click(function() {
				  $('#videoModal').modal('show'); 
				});

            }







         // VIDEO 2
	    /* Get iframe src attribute value i.e. YouTube video url
	    and store it in a variable */
	    var url2 = $("#bannerVideo2").attr('src');
	    
	    /* Assign empty url value to the iframe src attribute when
	    modal hide, which stop the video playing */
	    $("#videoModal2").on('hide.bs.modal', function(){
	    	$(".bs-example2").css("display","none");
	        $("#bannerVideo2").attr('src', '');
	    });
	    
	    /* Assign the initially stored url back to the iframe src
	    attribute when modal is displayed again */
	    $("#videoModal2").on('show.bs.modal', function(){
	    	$(".bs-example2").css("display","block");
	        $("#bannerVideo2").attr('src', url2+"&amp;autoplay=1&amp;rel=0");
	    });

	    


        // My own arbitrary use of isMobile, as an example

            // I only want to redirect iPhones, Android phones and a handful of 7" devices
            if (is_mobile == 1) {

            	$("a[href$=#groove]").click(function() {
				  window.location.href = url2+"&amp;autoplay=1&amp;rel=0";
				});
                
            }else{

            	$("a[href$=#groove]").click(function() {
				  $('#videoModal2').modal('show'); 
				});

            }

	    
	});
	</script>


	<!-- VIDEO 1 -->
	<div class="bs-example">
	    
	    <!-- Modal HTML -->
	    <div id="videoModal" class="modal fade">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-body">
	                    <iframe id="bannerVideo" width="560" height="315" src="https://www.youtube.com/embed/GTkqGStCAtk?html5=1" frameborder="0" allowfullscreen></iframe>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>   

	<!-- VIDEO 2 -->
	<div class="bs-example2">
	    
	    <!-- Modal HTML -->
	    <div id="videoModal2" class="modal fade">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-body">
	                    <iframe id="bannerVideo2" width="560" height="315" src="https://www.youtube.com/embed/VSfWni8PzDU?html5=1" frameborder="0" allowfullscreen></iframe>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>   

  </body>
</html>