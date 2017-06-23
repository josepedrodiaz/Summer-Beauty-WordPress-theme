<?php
$path = $_SERVER[REQUEST_URI];
if ($path == "/"){
?>
<style type="text/css">
	.flip-container:hover .flipper, .flip-container.hover .flipper {
		transform: rotateY(180deg);
	}
</style>
	<div style="z-index: 2; position: relative; width: 150px;" class="hidden-xs hidden-sm contenedorMoneda">
		<div class="flip-container" id="moneda" ontouchstart="this.classList.toggle('hover');" style="perspective: 1000px;width: 150;height: 150;">
			<div class="flipper" style="transition: 0.6s;transform-style: preserve-3d;position: relative;">
				<div class="front" style="width: 150;height: 150;	backface-visibility: hidden;-webkit-backface-visibility: hidden;position: absolute;top: 0;left: 0;z-index: 2;/* for firefox 31 */transform: rotateY(0deg);">
					<!-- front content -->
					<img src="/banners/best-price/<?php echo ICL_LANGUAGE_CODE; ?>/A.png" />
				</div>
				<div class="back" style="width: 150;height: 150;	backface-visibility: hidden;-webkit-backface-visibility: hidden;position: absolute;top: 0;left: 0;transform: rotateY(180deg);">
					<!-- back content -->
					<img src="/banners/best-price/<?php echo ICL_LANGUAGE_CODE; ?>/B.png" />
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">	
		setInterval(
				function(){ 
					$('#moneda').toggleClass("hover");
				}, 2000);
	</script>
<?php } ?>