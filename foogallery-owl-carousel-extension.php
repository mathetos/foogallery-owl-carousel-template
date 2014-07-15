<?php
/**
 * FooGallery My New Template Extension
 *
 * A cool description about what your cool thing can do
 *
 * @package   Owl_Carousel_Template_FooGallery_Extension
 * @author     Matt Cromwell
 * @license   GPL-2.0+
 * @link      http://mattcromwell.com
 * @copyright 2014  Matt Cromwell
 *
 * @wordpress-plugin
 * Plugin Name: FooGallery - Owl Carousel
 * Description: An Owl Carousel template with multiple options for presentation and functionality. Full details on Owl Carousel <a href="http://www.owlcarousel.owlgraphic.com/">here</a>
 * Version:     1.0.0
 * Author:       Matt Cromwell
 * Author URI:  http://mattcromwell.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( !class_exists( 'Owl_Carousel_Template_FooGallery_Extension' ) ) {

	define('OwlC_URL', plugin_dir_url( __FILE__ ));
	define('OwlC_VERSION', '1.0.0');

	require_once( 'foogallery-owl-carousel-init.php' );

	class Owl_Carousel_Template_FooGallery_Extension {
		/**
		 * Wire up everything we need to run the extension
		 */
		function __construct() {
			add_filter( 'foogallery_gallery_templates', array( $this, 'add_template' ) );
			add_filter( 'foogallery_gallery_templates_files', array( $this, 'register_myself' ) );
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

		/**
		 * Add our gallery template to the list of templates available for every gallery
		 * @param $gallery_templates
		 *
		 * @return array
		 */
		function add_template( $gallery_templates ) {

			$gallery_templates[] = array(
				'slug'        => 'owl-carousel',
				'name'        => __( 'Owl Carousel', 'foogallery-owl-carousel'),
				'preview_css' => OwlC_URL . 'css/gallery-owl-carousel.css',
				'admin_js'	  => OwlC_URL . 'js/admin-gallery-owl-carousel.js',
				'fields'	  => array(
					array(
						'id'      => 'thumbnail_size',
						'title'   => __('Image Size', 'foogallery-owl-carousel'),
						'desc'    => __('Choose the size of the individual images.', 'foogallery-owl-carousel'),
						'type'    => 'thumb_size',
						'default' => array(
							'width' => get_option( 'thumbnail_size_w' ),
							'height' => get_option( 'thumbnail_size_h' ),
							'crop' => true
						)
					),
					array(
						'id'      => 'thumbnail_link',
						'title'   => __('Image Link', 'foogallery-owl-carousel'),
						'default' => 'image' ,
						'type'    => 'thumb_link',
						'spacer'  => '<span class="spacer"></span>',
						'desc'	  => __('You can choose to either link each thumbnail to the full size image or to the image\'s attachment page.', 'foogallery-owl-carousel')
					),
					array(
						'id'      => 'lightbox',
						'title'   => __('Lightbox', 'foogallery-owl-carousel'),
						'desc'    => __('Choose which lightbox you want to use in the gallery.', 'foogallery-owl-carousel'),
						'type'    => 'lightbox'
					),
					array(
						'id'      => 'items',
						'title'   => __('Items', 'foogallery-owl-carousel'),
						'desc'    => __('How many images do you want to show at a time?', 'foogallery-owl-carousel'),
						'default' => '3',
						'type'    => 'number',
						'class'   => 'small-text',
						'step'    => 1,
						'min'     => 0
					),
					array(
						'id'      => 'margin',
						'title'   => __('Margin', 'foogallery-owl-carousel'),
						'desc'    => __('The margin between items in the carousel', 'foogallery-owl-carousel'),
						'default' => '10',
						'type'    => 'number',
						'class'   => 'small-text',
						'step'    => 5,
						'min'     => 0
					),
					array(
						'id'      => 'nav',
						'title'   => __('Navigation', 'foogallery-owl-carousel'),
						'desc'    => __('Show Prev/Next Navigation?', 'foogallery-owl-carousel'),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'True', 'foogallery-owl-carousel' ),
							'false' => __( 'False', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'dots',
						'title'   => __('Pagination', 'foogallery-owl-carousel'),
						'desc'    => __('Show pagination dots? These will appear below the prev/next buttons if you show them. They represent how many "pages" you have based on how many total images and how many you are showing at a time. For example, if you have 6 images and are showing 3 at a time, then there will be 2 pagination dots available.', 'foogallery-owl-carousel'),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'True', 'foogallery-owl-carousel' ),
							'false' => __( 'False', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'loop',
						'title'   => __('Loop', 'foogallery-owl-carousel'),
						'desc'    => __('Loop back to the beginning? Affects both autoplay and navigation.', 'foogallery-owl-carousel'),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'Yes', 'foogallery-owl-carousel' ),
							'false' => __( 'No', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'autoplay',
						'title'   => __('Autoplay', 'foogallery-owl-carousel'),
						'desc'    => __('Enable Autoplay?', 'foogallery-owl-carousel'),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'Yes', 'foogallery-owl-carousel' ),
							'false' => __( 'No', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'pause ap',
						'title'   => __('Pause', 'foogallery-owl-carousel'),
						'desc'    => __('Pause Autoplay on Hover?', 'foogallery-owl-carousel'),
						'default' => 'true',
						'type'    => 'radio',
						'choices' => array(
							'true' => __( 'Yes', 'foogallery-owl-carousel' ),
							'false' => __( 'No', 'foogallery-owl-carousel' ),
						)
					),
					array(
						'id'      => 'seconds ap',
						'title'   => __('Seconds', 'foogallery-owl-carousel'),
						'desc'    => __('How many seconds between slides while on Autoplay?', 'foogallery-owl-carousel'),
						'default' => '4 seconds',
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
					//available field types available : html, checkbox, select, radio, textarea, text, checkboxlist, icon
					//an example of a icon field used in the default gallery template
					array(
						'id'      => 'border-style',
						'title'   => __('Border Style', 'foogallery-owl-carousel'),
						'desc'    => __('The border style for each thumbnail in the gallery.', 'foogallery-owl-carousel'),
						'type'    => 'icon',
						'default' => 'border-style-square-white',
						'choices' => array(
							'border-style-square-white' => array('label' => 'Square white border with shadow', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-white.png'),
							'border-style-circle-white' => array('label' => 'Circular white border with shadow', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-circle-white.png'),
							'border-style-square-black' => array('label' => 'Square Black', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-black.png'),
							'border-style-circle-black' => array('label' => 'Circular Black', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-circle-black.png'),
							'border-style-inset' => array('label' => 'Square Inset', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-inset.png'),
							'border-style-rounded' => array('label' => 'Plain Rounded', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-plain-rounded.png'),
							'' => array('label' => 'Plain', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-none.png'),
						)
					),
					array(
						'id'      => 'hover-effect',
						'title'   => __('Hover Effect', 'foogallery-owl-carousel'),
						'desc'    => __('A hover effect is shown when you hover over each thumbnail.', 'foogallery-owl-carousel'),
						'type'    => 'icon',
						'default' => 'hover-effect-zoom',
						'choices' => array(
							'hover-effect-zoom' => array('label' => __('Zoom' ,'foogallery-owl-carousel'), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/hover-effect-icon-zoom.png'),
							'hover-effect-zoom2' => array('label' => __('Zoom 2' ,'foogallery-owl-carousel'), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/hover-effect-icon-zoom2.png'),
							'hover-effect-zoom3' => array('label' => __('Zoom 3' ,'foogallery-owl-carousel'), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/hover-effect-icon-zoom3.png'),
							'hover-effect-plus' => array('label' => __('Plus' ,'foogallery-owl-carousel'), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/hover-effect-icon-plus.png'),
							'hover-effect-circle-plus' => array('label' => __('Cirlce Plus' ,'foogallery-owl-carousel'), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/hover-effect-icon-circle-plus.png'),
							'hover-effect-eye' => array('label' => __('Eye' ,'foogallery-owl-carousel'), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/hover-effect-icon-eye.png'),
							'' => array('label' => __('None' ,'foogallery-owl-carousel'), 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/hover-effect-icon-none.png'),
						)
					),
					array(
						'id' => 'thumb_preview',
						'title' => __('Thumbnail Preview', 'foogallery-owl-carousel'),
						'desc' => __('This is what your carousel thumbnail style will look like (actual thumbnail dimensions are not reflected here).', 'foogallery-owl-carousel'),
						'type' => 'thumb_preview'
					),
				)
			);

			return $gallery_templates;
		}
	}
}