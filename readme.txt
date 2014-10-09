=== FooGallery Owl Carousel Template ===
Contributors: webdevmattcrom, fooplugins
Donate link: http://mattcromwell.com
Tags: foogallery, owl carousel, responsive
Requires at least: 3.8
Tested up to: 4.0
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An Owl Carousel template with multiple options for presentation and functionality.

== Description ==

Owl Carousel for FooGallery let's you display your images in a wide variety of formats and combinations. It can be a very simple slider of any size with text overlays. It can show multiple images per "stage". And now (since version 1.0.3) it supports navigation by hashtag urls, meaning you can push the slides to a specific slide from anywhere on the page with a url like `<a href="#slide3">`.

[See full documentation for Owl Carousel here](http://docs.fooplugins.com/foogallery/owl-carousel/)

##Useful Resources
* [Download FooGallery](https://wordpress.org/plugins/foogallery/)
* [Contribute to FooGallery on Github](https://github.com/fooplugins/foogallery)
* [Read about Owl Carousel and see demos](http://www.owlcarousel.owlgraphic.com/)
* [Contribute to Owl Carousel 2 on Github](https://github.com/OwlFonk/OwlCarousel2)
* [Found out more about Matt Cromwell, author of this plugin](http://mattcromwell.com)

== Installation ==

This is a normal plugin, and can be installed as normal. But there is one additional step to have it integrated with FooGallery.

###Downloading the Zip?
1. Upzip the zip
2. Upload the zip to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

###Searching in the backend
1. Go to "Plugins > Add New" then click "Search"
2. In the search field type "FooGallery Owl Carousel"
3. Click install
4. Click Activate

###It's Installed. What do I do now?
Assuming you already have [FooGallery](http://wordpress.org/plugins/foogallery) installed, go to "FooGallery > Extensions". Then go to the "Build Your Own" tab and you'll see the Owl Carousel there. Click "Activate" and you're good to go. Now when you go to create a new Gallery, you'll see "Owl Carousel" as a template option.

== Frequently Asked Questions ==

None yet.

== Screenshots ==

1. Choose Owl Carousel from the "Gallery Template" field in FooGallery
2. Custom settings for each Owl Carousel that control items per "stage", margin between items, navigation, pagination and more.
3. Have multiple types, shapes, sizes and functionalities for multiple galleries on the same page. 
4. Choose a custom link and target to launch from each image in your Carousel. Combined with FooBox Pro you can launch videos, forms, a Google Map, and more from each individual image in your Carousel.
5. Choose from a plethora of styles and hover effects. See a preview live while you create your gallery.
== Upgrade Notice ==
Version 1.0.3 re-arranges the settings a bit to support FooGallery's new "Sections" feature. But your settings will not be lost. But in order to benefit from the new features, like slide animations, you will need to go into your Owl Carousel galleries and re-save them.

== Changelog ==
= 1.0.3 =
* UPDATE: Updated to latest FooGallery extension standards
* ENHANCEMENT: Added HashListener
* ENHANCEMENT: Added LazyLoad
* ENHANCEMENT: Slide Transition Animations
* ENHANCEMENT: Added optional add caption overlay. Only shows caption title (Caption field) or Description if one or the other is present. Hides completely if both are absent.
* FIX: Circles and hover effects now work when images are not linked

= 1.0.2 =
* UPDATE: Updated settings to use latest FooGallery Settings API changes
* ENHANCEMENT: Conditionally show Autoplay when choosing "true"
* ENHANCEMENT: Tighten CSS for circles style. Some themes add hover transitions to images with links which causes the circles style to flash a square during transition. This is fixed now.

= 1.0.1 =
* BUGFIX: Custom Link field in Attachment Details could not be deleted after inserted.

= 1.0 =
* Just released.

= Coming Soon =
* Internationalization
* Carousel Stage styles
* Single slide animations