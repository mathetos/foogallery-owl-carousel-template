<?php
/**
 * FooGallery Owl Carousel template
 * This is the template that is run when a FooGallery shortcode is rendered to the frontend
 */
//the current FooGallery that is currently being rendered to the frontend
global $current_foogallery;
//the current shortcode args
global $current_foogallery_arguments;
//get our thumbnail sizing args
$args = foogallery_gallery_template_setting( 'thumbnail_size', 'thumbnail' );
//add the link setting to the args
$args['link'] = foogallery_gallery_template_setting( 'thumbnail_link', 'image' );
//get which lightbox we want to use
$lightbox = foogallery_gallery_template_setting( 'lightbox', 'unknown' );
$items = foogallery_gallery_template_setting( 'items', '3' );
$nav = foogallery_gallery_template_setting( 'nav', 'true' );
$autoplay = foogallery_gallery_template_setting( 'autoplay', 'true' );
$pause = foogallery_gallery_template_setting( 'pause', 'true' );
$seconds = foogallery_gallery_template_setting( 'seconds', '4000' );
$loop = foogallery_gallery_template_setting( 'loop', 'true' );
$margin = foogallery_gallery_template_setting( 'margin', '10' );
$gallid = $current_foogallery->ID;
$hover_effect = foogallery_gallery_template_setting( 'hover-effect', 'hover-effect-zoom' );
$border_style = foogallery_gallery_template_setting( 'border-style', 'border-style-square-white' );
?>
<script>
jQuery(function($){
	$('#foogall-<?php echo $gallid; ?>').owlCarousel({
		items: <?php echo $items; ?>,
		nav:<?php echo $nav; ?>,
		margin: <?php echo $margin; ?>,
		loop:<?php echo $loop; ?>,
		dots:false,
		autoplay:<?php echo $autoplay; ?>,
		autoplayTimeout:<?php echo $seconds; ?>,
		autoplaySpeed:1000,
		autoplayHoverPause: <?php echo $pause; ?>
	});
});
</script>
<div id="foogall-<?php echo $gallid; ?>" class="<?php echo foogallery_build_class_attribute( $current_foogallery, 'foogallery-lightbox-' . $lightbox, 'owl-carousel ' . $hover_effect, $border_style); ?>">
	<?php 
		foreach ( $current_foogallery->attachments() as $attachment ) {
			echo $attachment->html( $args );
		}
	?>
</div>