//Use this file to inject custom javascript behaviour into the foogallery edit page
//For an example usage, check out wp-content/foogallery/extensions/default-templates/js/admin-gallery-default.js

(function (FOOGALLERY_OWL_TEMPLATE, $, undefined) {
	
	FOOGALLERY_OWL_TEMPLATE.setPreviewClasses = function() {

		var $previewImage = $('.foogallery-thumbnail-preview'),
			border_style = $('input[name="foogallery_settings[owl-carousel_border-style]"]:checked').val(),
			hover_effect = $('input[name="foogallery_settings[owl-carousel_hover-effect]"]:checked').val();

		$previewImage.attr('class' ,'foogallery-thumbnail-preview foogallery-container foogallery-owl-carousel ' + hover_effect + ' ' + border_style);
	};
	
	FOOGALLERY_OWL_TEMPLATE.adminReady = function () {
		$('body').on('foogallery-gallery-template-changed-owl-carousel', function() {
			FOOGALLERY_OWL_TEMPLATE.setPreviewClasses();
		});

		$('input[name="foogallery_settings[owl-carousel_border-style]"], input[name="foogallery_settings[owl-carousel_hover-effect]"]').change(function() {
			FOOGALLERY_OWL_TEMPLATE.setPreviewClasses();
		});

		$('.foogallery-thumbnail-preview').click(function(e) {
			e.preventDefault();
		});
		};

}(window.FOOGALLERY_OWL_TEMPLATE = window.FOOGALLERY_OWL_TEMPLATE || {}, jQuery));

jQuery(function () {
	FOOGALLERY_OWL_TEMPLATE.adminReady();
});

jQuery(document).ready( function($) {
	//OnLoad, hide these:
	$('tr.gallery_template_field-owl-carousel-animation').hide(400)
	$('tr.gallery_template_field-owl-carousel-pause').hide(400)
	$('tr.gallery_template_field-owl-carousel-seconds').hide(400)
	$('tr.gallery_template_field-owl-carousel-dots').hide(400)
	$('tr.gallery_template_field-owl-carousel-hash').hide(400)
	$('tr.gallery_template_field-owl-carousel-enable-responsive').hide(400)
	$('tr.gallery_template_field-owl-carousel-items-at-0').hide(400)
	$('tr.gallery_template_field-owl-carousel-items-at-480').hide(400)
	$('tr.gallery_template_field-owl-carousel-items-at-960').hide(400);
	
	
	
	//Set Onload visibility of conditional settings
	$(window).load(function() {
		//Define variables for shorthand reference
		var items = $('select[name*="owl-carousel_items"] option:selected').val();
		var autoplayOn = $('input#FooGallerySettings_owl-carousel_autoplay0').is(':checked');
		var advancedOn = $('input#FooGallerySettings_owl-carousel_enable_advanced1');
		
		//Onload, if "Items" is "1" show "Animations"
		if( items == 1) {
		  $('tr.gallery_template_field-owl-carousel-animation').show();
		}
		//Otherwise, hide "Animations"
		else{
		  $('tr.gallery_template_field-owl-carousel-animation').hide();
		}    
		
		//Onload, if "Autoplay" is "Yes", show "Pause" & "Seconds"
		if( autoplayOn == true) {
			$('tr.gallery_template_field-owl-carousel-pause').show()
			$('tr.gallery_template_field-owl-carousel-seconds').show();
		} 
		//Otherwise, hide "Pause" & "Seconds"
		else {
			$('tr.gallery_template_field-owl-carousel-pause').hide()
			$('tr.gallery_template_field-owl-carousel-seconds').hide();
		}
		
		//Onload, if "Enable Advanced" is "Yes", show all the Advanced Settings
		if( advancedOn.is(':checked')) {
			$('tr.gallery_template_field-owl-carousel-dots').show()
			$('tr.gallery_template_field-owl-carousel-hash').show()
			$('tr.gallery_template_field-owl-carousel-enable-responsive').show()
			$('tr.gallery_template_field-owl-carousel-items-at-0').show()
			$('tr.gallery_template_field-owl-carousel-items-at-480').show()
			$('tr.gallery_template_field-owl-carousel-items-at-960').show();
		} 
		//Otherwise, hide all the Advanced Settings
		else {
			$('tr.gallery_template_field-owl-carousel-dots').hide()
			$('tr.gallery_template_field-owl-carousel-hash').hide()
			$('tr.gallery_template_field-owl-carousel-enable-responsive').hide()
			$('tr.gallery_template_field-owl-carousel-items-at-0').hide()
			$('tr.gallery_template_field-owl-carousel-items-at-480').hide()
			$('tr.gallery_template_field-owl-carousel-items-at-960').hide();
		}
		
	});
	
	$('select').change(function() {
		var items = $('select[name*="owl-carousel_items"] option:selected').val();

		if( items == 1) {
		  $('tr.gallery_template_field-owl-carousel-animation').show(400);
		}
		else{
		  $('tr.gallery_template_field-owl-carousel-animation').hide(400);
		}         
	});
	
	//Hide/Show "Pause" & "Seconds"
	//on change of "Autoplay"
	$('input[name*="owl-carousel_autoplay"]').change(function () { 
    
		if( $(this).attr('id') == 'FooGallerySettings_owl-carousel_autoplay0') {
		  $('tr.gallery_template_field-owl-carousel-pause').show(400)
		  $('tr.gallery_template_field-owl-carousel-seconds').show(400);
		}
		if( $(this).attr('id') == 'FooGallerySettings_owl-carousel_autoplay1') {
		  $('tr.gallery_template_field-owl-carousel-pause').hide(400)
		  $('tr.gallery_template_field-owl-carousel-seconds').hide(400);
		} 
	});
	
	//Hide/Show Advaced
	//on change of "Enable Advanced"
	$('input[name*="owl-carousel_enable_advanced"]').change(function () { 
		if( $(this).attr('id') == 'FooGallerySettings_owl-carousel_enable_advanced0') { 
			$('tr.gallery_template_field-owl-carousel-dots').hide(400)
			$('tr.gallery_template_field-owl-carousel-hash').hide(400)
			$('tr.gallery_template_field-owl-carousel-enable-responsive').hide(400)
			$('tr.gallery_template_field-owl-carousel-items-at-0').hide(400)
			$('tr.gallery_template_field-owl-carousel-items-at-480').hide(400)
			$('tr.gallery_template_field-owl-carousel-items-at-960').hide(400);
		}
		if( $(this).attr('id') == 'FooGallerySettings_owl-carousel_enable_advanced1') { 
			$('tr.gallery_template_field-owl-carousel-dots').show(400)
			$('tr.gallery_template_field-owl-carousel-hash').show(400)
			$('tr.gallery_template_field-owl-carousel-enable-responsive').show(400)
			$('tr.gallery_template_field-owl-carousel-items-at-0').show(400)
			$('tr.gallery_template_field-owl-carousel-items-at-480').show(400)
			$('tr.gallery_template_field-owl-carousel-items-at-960').show(400);
		}
	});
	
});