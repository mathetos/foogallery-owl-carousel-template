<?php
/* ADD CUSTOM FIELDS TO IMAGE ATTACHMENTS */

$textdomain = 'owlcarousel';

$owl_attchments_options = array(
    'owl_heading' => array(
		'label'       => 'Owl Carousel Fields',
        'application' => 'image',
		'helps' => '<p><small><em>These fields are for linking the image to something other than the media file. You can link to a post, or an external url. If you are using FooBox Pro, you can even link to inline html within your page, like a Sign-up form or alert. For full details, <a href="http://docs.fooplugins.com/foogallery/owl-carousel" target="_blank">read our documentation about the Owl Carousel template</a>. </em></small></p>',
        'exclusions'   => array( 'audio', 'video' ),
    ),
	'owl_href' => array(
        'label'       => __( 'Custom Image Link', $textdomain ),
        'input'       => 'text',
        'application' => 'image',
		'helps'		  => 'e.g. http://google.com',
        'exclusions'   => array( 'audio', 'video' ),
    ),
    'owl_target' => array(
        'label'       => __( 'Link Target', $textdomain ),
        'input'       => 'select',
        'options' => array(
            '_self' => __( 'Same Page', $textdomain ),
            '_blank' => __( 'New Page', $textdomain ),
			'foobox' => __( 'FooBox', $textdomain ),
        ),
        'application' => 'image',
		'helps'		  => 'Use this to launch iFrames or Videos or Forms in FooBox.',
        'exclusions'   => array( 'audio', 'video' )
    ),
);