<?php
/**
 * FooGallery Owl Carousel Template
 *
 *
 * @package   Owl_Carousel_Template_FooGallery_Extension
 * @author    Matt Cromwell
 * @license   GPL-2.0+
 * @link      https://www.mattcromwell.com/products/foogallery-owl-carousel/
 * @copyright 2014  Matt Cromwell
 *
 * @wordpress-plugin
 * Plugin Name: FooGallery Owl Carousel Template
 * Description: An Owl Carousel template for <a href="https://wordpress.org/plugins/foogallery" target="_blank">FooGallery</a> with multiple options for presentation and functionality. Full details on Owl Carousel <a href="http://www.owlcarousel.owlgraphic.com/" target="_blank">here</a>
 * Version:     1.4.2
 * Author:      Matt Cromwell
 * Author URI:  https://www.mattcromwell.com/products/foogallery-owl-carousel/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*Main Owl Carousel Extension Code Base */
if ( !class_exists( 'Owl_Carousel_Template_FooGallery_Extension' ) ) {

	define( 'OwlC_URL', plugin_dir_url( __FILE__ ) );
	define( 'OwlC_VERSION', '1.3' );
	define( 'OwlC_FG_SLUG', 'owl-carousel' );
	define( 'OwlC_FG_PATH', plugin_dir_path( __FILE__ ) );
	define( 'OwlC_FG_EXTENSION_FILE', __FILE__ );

	include( OwlC_FG_PATH . 'admin/notices.php');

	register_activation_hook( __FILE__,  'foog_owl_set_review_trigger_date' );

	function foog_owl_set_review_trigger_date() {

		// Create timestamp for when plugin was activated
		// For use with our delayed Admin Notice reminder

		$triggerreview = mktime(0, 0, 0, date("m")  , date("d")+30, date("Y"));

		if ( !get_option('foog_owl_activation_date')) {
			add_option( 'foog_owl_activation_date', $triggerreview, '', 'yes' );
		}
	}


	class Owl_Carousel_Template_FooGallery_Extension {	
		/**
		 * Wire up everything we need to run the extension
		 */
		function __construct() {			
			add_filter( 'foogallery_gallery_templates', array( $this, 'add_template' ) );
			add_filter( 'foogallery_gallery_templates_files', array( $this, 'register_myself' ) );
			//add_filter( 'foogallery_located_template-owl-carousel', array( $this, 'enqueue_dependencies' ) );

		}

		/**
		 * Register myself so that all associated JS and CSS files can be found and automatically included
		 * @param $extensions
		 *
		 * @return array
		 */
		function register_myself( $extensions ) {
			$extensions[] = __FILE__;
			return $extensions;
		}
		
		function enqueue_dependencies() {
			//*If you need additional CSS/JS put them here*//
		}
	
		/**
		 * Add our gallery template to the list of templates available for every gallery
		 * @param $gallery_templates
		 *
		 * @return array
		 */
		function add_template( $gallery_templates ) {

			$gallery_templates[] = array(
				'slug'        => 'owl-carousel',
				'name'        => __( 'Owl Carousel', 'foogallery-owl-carousel' ),
				'preview_css' => OwlC_URL . 'css/admin-gallery-owl-carousel.css',
				'admin_js'	  => OwlC_URL . 'js/admin-gallery-owl-carousel.js',
				'fields'	  => array(
					array(
						'id'	  => 'help',
						'title'	  => __( 'Tip', 'foogallery' ),
						'section' => __('Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'type'	  => 'html',
						'help'	  => true,
						'desc'	  => __( 'This section controls the appearance and functionality of the individual thumbnails of your Carousel.', 'foogallery' ),
					),
					array(
						'id'      => 'thumbnail_size',
						'title'   => __( 'Image Size', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Choose the size of the individual images.', 'foogallery-owl-carousel' ),
						'type'    => 'thumb_size',
						'default' => array(
							'width' => get_option( 'thumbnail_size_w' ),
							'height' => get_option( 'thumbnail_size_h' ),
							'crop' => true
						)
					),
					array(
						'id'      => 'autowidth',
						'title'   => __( 'Enable Auto-width?', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Auto width allows you to have images of different widths appear on the same page without cropping them. This is useful if have images with different heights and want them all set to the same height but different widths. <a href="http://docs.fooplugins.com/foogallery/foogallery-owl-carousel-documentation/" target="_blank">See documentation for details and examples</a>.', 'foogallery-owl-carousel' ),
						'type'    => 'radio',
						'default' => false,
						'choices' => array(
							true => __( 'Yes! Please do!','foogallery-owl-carousel' ),
							false => __( 'No thanks!','foogallery-owl-carousel' )
						)
					),
					array(
						'id'      => 'margin',
						'title'   => __( 'Margin', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Stage', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc'    => __( 'The margin between items in the carousel', 'foogallery-owl-carousel' ),
						'default' => '10',
						'type'    => 'number',
						'class'   => 'small-text',
						'step'    => 5,
						'min'     => 0
					),
					array(
						'id'      => 'thumbnail_link',
						'title'   => __( 'Image Link', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'default' => 'image' ,
						'type'    => 'thumb_link',
						'spacer'  => '<span class="spacer"></span>',
						'desc'	  => __( 'You can choose to either link each thumbnail to the full size image or to the image\'s attachment page.', 'foogallery-owl-carousel' )
					),
					array(
						'id'      => 'lightbox',
						'title'   => __( 'Lightbox', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Choose which lightbox you want to use in the gallery.', 'foogallery-owl-carousel' ),
						'type'    => 'lightbox'
					),
					array(
						'id'      => 'showdesc',
						'title'   => __( 'Show Image Caption?', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Show the image caption title and description on the image.', 'foogallery-owl-carousel' ),
						'type'    => 'radio',
						'default' => false,
						'choices' => array(
							true => __( 'Yes! Please do!','foogallery-owl-carousel' ),
							false => __( 'No thanks!','foogallery-owl-carousel' )
						)
					),
					array(
						'id'      => 'border-style',
						'title'   => __( 'Border Style', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc'    => __( 'The border style for each thumbnail in the gallery.', 'foogallery-owl-carousel' ),
						'type'    => 'icon',
						'default' => 'border-style-square-white',
						'choices' => array(
							'border-style-square-white' => array(
								'label' => 'Square white border with shadow',
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/border-style-icon-square-white.png'
							),
							'border-style-circle-white' => array(
								'label' => 'Circular white border with shadow',
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/border-style-icon-circle-white.png'
							),
							'border-style-square-black' => array(
								'label' => 'Square Black',
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/border-style-icon-square-black.png'
							),
							'border-style-circle-black' => array(
								'label' => 'Circular Black',
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/border-style-icon-circle-black.png'
							),
							'border-style-inset' => array(
								'label' => 'Square Inset',
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/border-style-icon-square-inset.png'
							),
							'border-style-rounded' => array(
								'label' => 'Plain Rounded',
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/border-style-icon-plain-rounded.png'
							),
							'' => array(
								'label' => 'Plain',
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/border-style-icon-none.png'
							),
						)
					),

					array(
						'id'      => 'hover-effect',
						'title'   => __( 'Hover Effect', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc'    => __( 'A hover effect is shown when you hover over each thumbnail.', 'foogallery-owl-carousel' ),
						'type'    => 'icon',
						'default' => 'hover-effect-zoom',
						'choices' => array(
							'hover-effect-zoom' => array(
								'label' => __('Zoom' ,'foogallery-owl-carousel' ),
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/hover-effect-icon-zoom.png'
							),
							'hover-effect-zoom2' => array(
								'label' => __( 'Zoom 2' ,'foogallery-owl-carousel' ),
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/hover-effect-icon-zoom2.png'
							),
							'hover-effect-zoom3' => array(
								'label' => __( 'Zoom 3' ,'foogallery-owl-carousel' ),
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/hover-effect-icon-zoom3.png'
							),
							'hover-effect-plus' => array(
								'label' => __( 'Plus' ,'foogallery-owl-carousel' ),
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/hover-effect-icon-plus.png'
							),
							'hover-effect-circle-plus' => array(
								'label' => __( 'Cirlce Plus' ,'foogallery-owl-carousel' ), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/hover-effect-icon-circle-plus.png'
							),
							'hover-effect-eye' => array(
								'label' => __('Eye' ,'foogallery-owl-carousel'),
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/hover-effect-icon-eye.png'
							),
							'' => array(
								'label' => __( 'None' ,'foogallery-owl-carousel' ),
								'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'shared/img/admin/hover-effect-icon-none.png'
							),
						)
					),
					array(
						'id' => 'thumb_preview',
						'title' => __( 'Thumbnail Preview', 'foogallery-owl-carousel' ),
						'section' => __( 'Thumbnail Size and Styles', 'foogallery-owl-carousel' ),
						'desc' => __( 'This is what your carousel thumbnail style will look like (actual thumbnail dimensions are not reflected here).', 'foogallery-owl-carousel' ),
						'type' => 'default_thumb_preview'
					),
					array(
						'id'	  => 'help',
						'title'	  => __( 'Tip', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Stage', 'foogallery-owl-carousel' ),
						'type'	  => 'html',
						'help'	  => true,
						'desc'	  => __( 'The "Stage" is the visible area where the images appear. You can have 1 or 2 or 3 or more images per "stage". The number of images per stage affects how the "Dots" navigation works. Each "dot" represents one "stage" area. This is general not relevant if you are using Owl Carousel like a slider with only one image per "stage".', 'foogallery' ),
					),
					array(
						'id'      => 'items',
						'title'   => __( 'Items', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Stage', 'foogallery-owl-carousel' ),
						'desc'    => __( 'How many images do you want to show at a time?', 'foogallery-owl-carousel' ),
						'default' => '3',
						'type'    => 'select',
						'choices' => array(
							'1' => 1,
							'2' => 2,
							'3' => 3,
							'4' => 4,
							'5' => 5,
							'6' => 6,
						)
					),
					array(
						'id'      => 'animation',
						'title'   => __( 'Animation', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Stage', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Slide transition animation<br /><strong style="color: maroon;"><em>Only relevant when there\'s 1 item per stage</em></strong>', 'foogallery-owl-carousel' ),
						'default' => 'left',
						'type'    => 'select',
						'choices' => array(
							'left' => __( 'Slide Left', 'foogallery-owl-carousel' ),
							'fade' => __( 'Fade', 'foogallery-owl-carousel' ),
							'sliderock' => __( 'Slide Out and Rock In', 'foogallery-owl-carousel' ),
							'roll' => __( 'Roll In and Out', 'foogallery-owl-carousel' ),
							'zoomleftright' => __( 'Zoom Back and Out', 'foogallery-owl-carousel' ),
							'zoom' => __( 'Zoom/Fade In and Out', 'foogallery-owl-carousel' ),
							'lightspeed' => __( 'Lightspeed In and Out', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'	  => 'help',
						'title'	  => __( 'Tip', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Navigation', 'foogallery-owl-carousel' ),
						'type'	  => 'html',
						'help'	  => true,
						'desc'	  => __( 'You can choose to have prev/next buttons, or "dots" which represent each "stage area". You can also disable navigation completely. Also see our documentation on using the "Hash Navigation" feature.', 'foogallery-owl-carousel' ),
					),
					array(
						'id'      => 'nav',
						'title'   => __( 'Navigation', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Navigation', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Show Prev/Next Navigation?', 'foogallery-owl-carousel' ),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'True', 'foogallery-owl-carousel' ),
							'false' => __( 'False', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'loop',
						'title'   => __( 'Loop', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Navigation', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Loop back to the beginning? Affects both autoplay and navigation.', 'foogallery-owl-carousel' ),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'Yes', 'foogallery-owl-carousel' ),
							'false' => __( 'No', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'autoplay',
						'title'   => __( 'Autoplay', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Navigation', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Enable Autoplay?', 'foogallery-owl-carousel' ),
						'default' => 'false',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'Yes', 'foogallery-owl-carousel' ),
							'false' => __( 'No', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'pause',
						'title'   => __( 'Pause', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Navigation', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Pause Autoplay on Hover?', 'foogallery-owl-carousel' ),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'Yes', 'foogallery-owl-carousel' ),
							'false' => __( 'No', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'seconds',
						'title'   => __( 'Seconds', 'foogallery-owl-carousel' ),
						'section' => __( 'Carousel Navigation', 'foogallery-owl-carousel' ),
						'desc'    => __( 'How many seconds between slides while on Autoplay?', 'foogallery-owl-carousel' ),
						'default' => '4000',
						'type'    => 'select',
						'choices' => array(
							'1000' => __( '1 second', 'foogallery-owl-carousel' ),
							'2000' => __( '2 seconds', 'foogallery-owl-carousel' ),
							'3000' => __( '3 seconds', 'foogallery-owl-carousel' ),
							'4000' => __( '4 seconds', 'foogallery-owl-carousel' ),
							'5000' => __( '5 seconds', 'foogallery-owl-carousel' ),
							'6000' => __( '6 seconds', 'foogallery-owl-carousel' ),
							'7000' => __( '7 seconds', 'foogallery-owl-carousel' ),
							'8000' => __( '8 seconds', 'foogallery-owl-carousel' ),
							'9000' => __( '9 seconds', 'foogallery-owl-carousel' ),
							'10000' => __( '10 seconds', 'foogallery-owl-carousel' )
						)
					),
					array(
						'id'	  => 'help',
						'title'	  => __( 'Tip', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'type'	  => 'html',
						'help'	  => true,
						'desc' => __( 'These options provide robust functionality; only mess with them if you know what you\'re doing.', 'foogallery-owl-carousel' ),
					),
					array(
						'id'      => 'enable_advanced',
						'title'   => __( 'Enable Advanced Options?', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'desc'	  => __( 'The Owl Carousel jQuery script has an endless amount of options. Most users will not need items in this section. But for those looking for even more customization, these are available .', 'foogallery-owl-carousel' ),
						'default' => 'no',
						'type'    => 'radio',
						'choices' => array(
							'no' => __( 'No thanks!', 'foogallery-owl-carousel' ),
							'yes' => __( 'Yes please!', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'dots',
						'title'   => __( 'Pagination', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Show pagination dots? These will appear below the prev/next buttons if you show them. They represent how many "pages" you have based on how many total images and how many you are showing at a time. For example, if you have 6 images and are showing 3 at a time, then there will be 2 pagination dots available.', 'foogallery-owl-carousel' ),
						'default' => 'false',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'True', 'foogallery-owl-carousel' ),
							'false' => __( 'False', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'hash',
						'title'   => __( 'Enable Deeplinking?', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'desc'    => __( 'Setting this to "Yes" will give each image in your Carousel a unique hashtag url that will appear in the address bar. This can be used to force your carousel to navigate to that image with a link. <a href="http://docs.fooplugins.com/foogallery/foogallery-owl-carousel-documentation" target="_blank">See documentation for examples</a>.', 'foogallery-owl-carousel' ),
						'default' => 'false',
						'type'    => 'radio',
						'choices' => array(
							'false' => __( 'No thanks!', 'foogallery-owl-carousel' ),
							'true' => __( 'Yes please!', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'enable-responsive',
						'title'   => __( 'Enable Stage Break Points?', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'desc'	  => __( 'This allows you to set a different amount of items to appear on the stage at different available widths.', 'foogallery-owl-carousel' ),
						'default' => 'no',
						'type'    => 'radio',
						'choices' => array(
							'no' => __( 'No thanks!', 'foogallery-owl-carousel' ),
							'yes' => __( 'Yes please!', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'items-at-0',
						'title'   => __( 'Items for smallest screens (max 480px)', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'default' => '2',
						'type'    => 'select',
						'choices' => array(
							'1' => 1,
							'2' => 2,
							'3' => 3,
							'4' => 4,
							'5' => 5,
							'6' => 6,
						)
					),
					array(
						'id'      => 'items-at-480',
						'title'   => __( 'Items for medium screens (max 768px)', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'default' => '3',
						'type'    => 'select',
						'choices' => array(
							'1' => 1,
							'2' => 2,
							'3' => 3,
							'4' => 4,
							'5' => 5,
							'6' => 6,
						)
					),
					array(
						'id'      => 'items-at-960',
						'title'   => __( 'Items for large screens (769px and above)', 'foogallery-owl-carousel' ),
						'section' => __( 'Advanced Options', 'foogallery-owl-carousel' ),
						'default' => '4',
						'type'    => 'select',
						'choices' => array(
							'1' => 1,
							'2' => 2,
							'3' => 3,
							'4' => 4,
							'5' => 5,
							'6' => 6,
						)
					),
				)
			);

			return $gallery_templates;
		} // End add_template
		
	} // End Owl_carousel class
	

} // End if !class_exists