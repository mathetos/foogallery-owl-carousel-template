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