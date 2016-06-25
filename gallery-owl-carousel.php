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

//other owl carousel settings
$items = foogallery_gallery_template_setting( 'items', '3' );
$nav = foogallery_gallery_template_setting( 'nav', 'true' );
$dots = foogallery_gallery_template_setting( 'dots', 'true' );
$autoplay = foogallery_gallery_template_setting( 'autoplay', 'true' );
$hash = foogallery_gallery_template_setting( 'hash', 'true' );
$pause = foogallery_gallery_template_setting( 'pause', 'true' );
$seconds = foogallery_gallery_template_setting( 'seconds', '4000' );
$loop = foogallery_gallery_template_setting( 'loop', 'true' );
$margin = foogallery_gallery_template_setting( 'margin', '10' );
$hover_effect = foogallery_gallery_template_setting( 'hover-effect', 'hover-effect-zoom' );
$border_style = foogallery_gallery_template_setting( 'border-style', 'border-style-square-white' );
$animation = foogallery_gallery_template_setting( 'animation', false );
$showdesc = foogallery_gallery_template_setting( 'showdesc', false );
$advanced = foogallery_gallery_template_setting( 'enable_advanced', 'no' );
$responsive = foogallery_gallery_template_setting( 'enable-responsive', 'no' );
$itemsat0 = foogallery_gallery_template_setting( 'items-at-0', false );
$itemsat480 = foogallery_gallery_template_setting( 'items-at-480', false );
$itemsat960 = foogallery_gallery_template_setting( 'items-at-960', false );
$autowidth = foogallery_gallery_template_setting( 'autowidth', false );

if(($border_style == '') || ($border_style == 'border-style-rounded')) {
$hasborder = '';
} else {$hasborder = 'hasborder';}

//general FooGallery settings that are useful for owl
if($hasborder == 'hasborder'){
	$height = ($args['height'] + 20);
} else {$height = $args['height'];}
$width = $args['width']; //image width
$gallid = $current_foogallery->ID; // current FooGallery ID
?>

<style>
/*Used to keep captions inside the visible area*/
#foogallery-gallery-<?php echo $gallid; ?> .foo-item {max-height: <?php echo $height ; ?>px;}
</style>

<div id="foogallery-gallery-<?php echo $gallid; ?>" class="<?php echo foogallery_build_class_attribute( $current_foogallery, 'foogallery-lightbox-' . $lightbox, 'owl-carousel ' . $hover_effect, $border_style, $hasborder); ?>">
	<?php
		foreach ( $current_foogallery->attachments() as $attachment ) {
			$title = $attachment->title;
			$strippedtitle = str_replace(' ', '_', $title);
			if($hash=='true'){$dohash = 'data-hash="' . $datahash . '"';}else{$dohash='';}
			if (empty($title)) {
				$datahash = 'no-title'; 	/* every image needs a data-hash 
													   so we'll give it one in case it got deleted somehow */
			} else {
				$datahash = $strippedtitle; //the image title with _ instead of spaces
			}
			?>
			<div class="foo-item" <?php echo $dohash ; ?>> 
			<?php
				$cap = $attachment->caption;
				$desc = $attachment->description;
				
				//the image instance
				echo $attachment->html( $args );
				
				// show caption if it exists
				// basically, if both caption and description are empty, show nothing here
				// otherwise, check if either exists then show it
				if($showdesc == true) { 
					if((empty($cap)) && (empty($desc))) { } else { ?>
					<div class="owl-caption">
						<?php if(!empty($cap)) { ?>
						<h4><?php echo $cap ; ?></h4>
						<?php } if(!empty($desc)) { ?>
						<p><?php echo $desc ; ?></p>
						<?php } ?>
					</div>
					<?php } ?>
			<?php } ?>
			</div> 
	<?php	} // end foreach ?>
</div>

<script>
/* The Owl Initialization Script
/* The first lines conditionally show the slide animation */
jQuery(function($){
	$('#foogallery-gallery-<?php echo $gallid; ?>').owlCarousel({
	<?php switch ($animation) {
		case 'lightspeed' : ?>
		animateOut: 'lightSpeedOut',
		animateIn: 'lightSpeedIn', <?php
		break;
		case 'zoomleftright' : ?>
		animateOut: 'zoomOutLeft',
		animateIn: 'zoomInRight', <?php
		break;
		case 'zoom' : ?>
		animateOut: 'zoomOut',
		animateIn: 'zoomIn', <?php
		break;
		case 'roll' : ?>
		animateOut: 'rollOut',
		animateIn: 'rollIn', <?php
		break;
		case 'sliderock' : ?>
		animateOut: 'slideOutDown',
		animateIn: 'flipInX', <?php
		break;
		case 'fade' : ?>
		animateOut: 'fadeOut',
		animateIn: 'fadeIn', <?php
		break;
		case 'left' : 
		break;
		} 
		if($advanced == 'yes') { ?>
		URLhashListener: <?php echo $hash; ?>,
		dots: <?php echo $dots; ?>,
		<?php  if($responsive = 'yes') { ?>
		responsiveClass: true,
		responsive:{
			0:{
				items: <?php echo $itemsat0 ?>,
			},
			480:{
				items: <?php echo $itemsat480 ?>,
			},
			960:{
				items: <?php echo $itemsat960 ?>,
			}
		}, 
		<?php } else { } ?>
		<?php } else { } ?>
		items: <?php echo $items; ?>,
		nav:<?php echo $nav; ?>,
		margin: <?php echo $margin; ?>,
		loop:<?php echo $loop; ?>,
		autoplay: <?php echo $autoplay; ?>,
		autoplaySpeed: <?php echo $seconds; ?>,
		smartSpeed:250,
		navSpeed: 1250,
		navText: ['<?php printf(__(apply_filters('owl_prev_text',esc_html__('prev'),'foogallery-owl-carousel'))); ?>', '<?php printf(__(apply_filters('owl_next_text',esc_html__('next'),'foogallery-owl-carousel'))); ?>'],
		autoplayHoverPause: <?php echo $pause; ?>,
		lazyLoad: true,
		autoWidth: <?php echo $autowidth; ?>
	});
});
</script>