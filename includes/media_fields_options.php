<?php
/* ADD CUSTOM FIELDS TO IMAGE ATTACHMENTS */

$textdomain = 'owlcarousel';

$owl_attchments_options = array(
    'owl_heading' => array(
        'label'       => 'Owl Carousel Fields',
        'input'       => 'title',
        'application' => 'image',
		'html'		  => '<h4>Owl Carousel Fields</h4>',
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