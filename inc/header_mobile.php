<?php
  // SLIDE PRINCIPAL
  $images_switcher = array();
  $banner = new WP_Query(array('post_type' =>  'banner'));
  if($banner->have_posts()):while($banner->have_posts()): $banner->the_post();
    $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),"full");
    $thumbnail = $src[0];
    $images_switcher[] = $thumbnail;
  endwhile; endif;
  wp_reset_query();
?>

<script type="text/javascript">

    var width = document.body.clientWidth;
      
    $(function(){
      if (width <= 1024){// sololo ejecuto para > col-md (Bootstrap)
       //if (width){// ejecuto pa too el pueblo
        var images_switcher = <?php echo json_encode($images_switcher); ?>;
        //Slider init
        $("#headervideo").bgswitcher({
            images : images_switcher
        });
      }
    });
</script>