<?php
//This init class is used to add the extension to the extensions list while you are developing them.
//When the extension is added to the supported list of extensions, this file is no longer needed.

if ( !class_exists( 'Owl_Carousel_Template_FooGallery_Extension_Init' ) ) {
	class Owl_Carousel_Template_FooGallery_Extension_Init {

		function __construct() {
			add_filter( 'foogallery_available_extensions', array( $this, 'add_to_extensions_list' ) );
		}

		function add_to_extensions_list( $extensions ) {
			$extensions[] = array(
				'slug'=> 'foogallery-owl-carousel-template',
				'class'=> 'Owl_Carousel_Template_FooGallery_Extension',
				'title'=> 'Owl Carousel Template',
				'file'=> 'foogallery-owl-carousel-extension.php',
				'description'=> 'An Owl Carousel template with multiple options for presentation and functionality. Full details on Owl Carousel <a href="http://www.owlcarousel.owlgraphic.com/">here</a>.',
				'author'=> ' Matt Cromwell',
				'author_url'=> 'http://mattcromwell.com',
				'thumbnail'=> 'https://s3.amazonaws.com/foogallery/extensions/owl_carousel.jpg',
				'tags'=> array('template'),
				'categories'=> array('Build Your Own'),
				'source'=> 'generated'
			);

			return $extensions;
		}
	}

	new Owl_Carousel_Template_FooGallery_Extension_Init();
}