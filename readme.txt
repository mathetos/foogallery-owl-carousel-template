=== FooGallery Owl Carousel Template ===
Contributors: webdevmattcrom, fooplugins
Donate link: https://www.mattcromwell.com/products/foogallery-owl-carousel/
Tags: foogallery, owl carousel, responsive
Requires at least: 3.8
Tested up to: 4.5.3
Stable tag: 1.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An Owl Carousel template with multiple options for presentation and functionality.

== Description ==

Owl Carousel for FooGallery let's you display your images in a wide variety of formats and combinations. It can be a very simple slider of any size with text overlays. It can show multiple images per "stage". And now (since version 1.0.3) it supports navigation by hashtag urls, meaning you can push the slides to a specific slide from anywhere on the page with a url like `<a href="#slide3">`.

[See full documentation for Owl Carousel here](http://docs.fooplugins.com/foogallery/owl-carousel/)

**ABOUT MATT CROMWELL**
> I'm Head of Support and Community Outreach at [WordImpress](https://wordimpress.com). Our most popular plugin is [Give](https://wordpress.org/plugins/give), the leading donation plugin for WordPress. I build custom WordPress plugins and themes and blog frequently at [mattcromwell.com](https://www.mattcromwell.com) on WordPress, Religion and Politics, and Family life.
>
> If you are enjoying FooGallery Owl Carousel please consider [giving a donation](https://www.mattcromwell.com/products/foogallery-owl-carousel) or [leaving a kind review](https://wordpress.org/support/view/plugin-reviews/foogallery-owl-carousel-template). All donations provided through my website go to [help San Diego nonprofit organizations with their hosting and web maintenance](https://www.mattcromwell.com/help-me-help-others/).

**FEATURES**

* Same great image cropping that FooGallery provides
* Same great border and hover styles that FooGallery provides
* Responsive to any size width
* Multiple images per stage
* Custom link per image to load a post, or external page, or load content into FooBox (image, html, or external page even!)
* Transition Animations between images when using 1 image per "stage"
* Navigate to any image by linking to it (a.k.a. deeplinking)
* Auto width feature to have image of different widths on the same stage
* Set break points to show different number of images depending on the available width

**Useful Resources**

* Do you love Owl Carousel for FooGallery? [Contribute to its further development with a tip over here](http://www.mattcromwell.com/product/foogallery-owl-carousel-template/)
* [Download FooGallery](https://wordpress.org/plugins/foogallery/)
* [Contribute to FooGallery on Github](https://github.com/fooplugins/foogallery)
* [Read about Owl Carousel and see demos](http://www.owlcarousel.owlgraphic.com/)
* [Contribute to Owl Carousel 2 on Github](https://github.com/OwlFonk/OwlCarousel2)
* [Found out more about Matt Cromwell, author of this plugin](http://mattcromwell.com)

== Installation ==

This is a normal plugin, and can be installed as normal.

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

**Can I set a different number of images for different size screens?**

Yes. This feature was added into version 1.2. Enable the "Advanced Options" section to set those options.

**I don't see Owl Carousel as an option in the Gallery Templates field when I go to add a new Gallery**

Make sure you go to "FooGallery > Extensions" and make sure you see "Owl Carousel" activated there.

**Can I update the text for the "prev" and "next" buttons?**

Yes, since version 1.2.3 you can now use a simple filter to change the text of those buttons. Here's some sample code that you can add into your theme's function.php file to customize that text.

*Update the "prev" text*
`add_filter('owl_prev_text','new_prev_text');

function new_prev_text() {
	return 'Go to the previous slide';
}`

*Update the "next" text*
`add_filter('owl_next_text','new_next_text');

function new_next_text() {
	return 'Go to the next slide';
}`

You can also return simple HTML. This allows you to swap out the text with font icons instead. For example, Twentyfifteen preloads the [Genericons](http://genericons.com/) font-icons on the front end for you. So you could swap out the text with a right and left button. In that case, your code would look like this:

*Use a Genericon Left Arrow for "prev"*
`add_filter('owl_prev_text','new_prev_text');

function new_prev_text() {
	return '<span class="genericon genericon-leftarrow"></span>';
}`

*Use a Genericon Right Arrow for "next"*
`add_filter('owl_next_text','new_next_text');

function new_next_text() {
	return '<span class="genericon genericon-rightarrow"></span>';
}`

**Can I use initialization rules from the original Owl Carousel?**

Yes! Since version 1.4 there's now a filter you can use to add additional Owl init rules. Here's some examples:

`add_filter('foogallery_owl_custom_init', 'my_custom_init', 10, 2);

 function my_custom_init($custom_init, $gallid) {
    $custom_init = "startPosition: 'URLHash',";
    return $custom_init;
 }`

Just remember to always end the line with a comma, and understand that doing this wrong can definitely break your galleries.

You can also target per gallery like so:

`add_filter('foogallery_owl_custom_init', 'my_custom_init', 10, 2);

 function my_custom_init($custom_init, $gallid) {
    if ( "5" != $gallid ) {
            return null;
    } else {
        $custom_init = "startPosition: 'URLHash',";
        return $custom_init;
    }
 }`

**What other filters are available?**

Since version 1.4 there now the following filters available as well:

 * **foogallery_owl_lazyload** -- to override the default laszyLoad : true, just return this false instead.
 * **foogallery_owl_startposition** -- this is used in comination with the Deep Linking feature. You can choose to change the first slide to whatever you like here.

**How do you do it, Matt!? How do you make such awesome stuff!?**

Awww shucks! I lean on tons of other stronger, smarter, more skilled people than me and work at it every day. If you really appreciate this plugin, then please feel free to send me a [tip over here](https://www.mattcromwell.com/products/foogallery-owl-carousel/).

== Screenshots ==

1. Choose Owl Carousel from the "Gallery Template" field in FooGallery
2. Custom settings for each Owl Carousel that control items per "stage", margin between items, navigation, pagination and more.
3. Have multiple types, shapes, sizes and functionalities for multiple galleries on the same page. 
4. Choose a custom link and target to launch from each image in your Carousel. Combined with FooBox Pro you can launch videos, forms, a Google Map, and more from each individual image in your Carousel.
5. Choose from a plethora of styles and hover effects. See a preview live while you create your gallery.

== Changelog ==
= 1.4.2 =
* BUG: Chrome circle effect was breaking out.
* Tweak: Better conditional function for animation in init

= 1.4.1 =
* Hotfix: properly wrap animateOut/animateIn values

= 1.4 =
* Added filter to disable LazyLoad
* Added filter for adding additional custom init rules
* Added URLHash startPosition listener with filter for customization
* Greatly simplify Admin JS
* General code cleanup

= 1.3 =
* General Code clean-up and enhancements for performance
* Updated Owl Carousel JS/CSS to latest [version 2.1.6](https://github.com/OwlCarousel2/OwlCarousel2)
* Added Keyboard navigation
* FIX: Inset shadow wasn't working well. The size is now also calculated according to the image height instead of static.
* FIX: Thumbnail Preview working correctly again and enhanced
* FIX: Border and Hover effect buttons working as expected again.

= 1.2.3 =
* ENHANCEMENT: Added a filter to allow the prev/next text buttons to be customized. See [FAQ #6](https://wordpress.org/plugins/foogallery-owl-carousel-template/faq/) for example code.

= 1.2.2 =
* FIX: Tightened CSS for Thumbnails with borders
* FIX: Fixed bug where advanced options where always enabled on front-end.
* FIX: Fixed bug where back-end conditional fields weren't show/hiding reliably.
* Other miscellaneous CSS updates for stability across themes.

= 1.2.1 =
* FIX: Updated init slug to prevent duplicate extensions issue with FooGallery Extensions panel

= 1.2 =
* NEW FEATURE: Added break points so different number of images can appear at different break points.
* NEW FEATURE: Added auto-width so images with different heights can be on the same stage but same height, auto-widths.
* ENHANCEMENT: Added more conditional fields for ease of use.
* FIX: Removed custom links/target since FooGallery does this in core now.
* FIX: Corrected defaults so all settings have defaults that work out of the box.
* FIX: Updated readme.txt to reflect previous changes better.

= 1.1 =
* FIX: CSS for nonlinked images
* FIX: Calculate height of images better
* NEW FEATURE: Add setting to enable/disable deeplinking

= 1.0.3 =
* UPDATE: Updated to latest FooGallery extension standards
* NEW FEATURE: Added HashListener
* NEW FEATURE: Added LazyLoad
* NEW FEATURE: Slide Transition Animations
* NEW FEATURE: Added optional add caption overlay. Only shows caption title (Caption field) or Description if one or the other is present. Hides completely if both are absent.
* FIX: Circles and hover effects now work when images are not linked

= 1.0.2 =
* FIX: Updated settings to use latest FooGallery Settings API changes
* NEW FEATURE: Conditionally show Autoplay when choosing "true"
* ENHANCEMENT: Tighten CSS for circles style. Some themes add hover transitions to images with links which causes the circles style to flash a square during transition. This is fixed now.

= 1.0.1 =
* BUGFIX: Custom Link field in Attachment Details could not be deleted after inserted.

= 1.0 =
* Just released.

== Upgrade Notice ==

Version 1.2 removes the custom link fields because FooGallery does this on its own now. You'll need to update each gallery that used custom links.

== FooGallery Required ==

Please note, this is an extension of [FooGallery](http://wordpress.org/plugins/foogallery), meaning this plugin will not do anything at all if you install it without FooGallery.

== Translations ==

* English - default, always included

*Note:* All my plugins are localized/ translateable by default. This is very important for all WordPress users worldwide. I'd love contributions of translations and would add you to the list of contributors to the plugin. Contact me in the support forum if you're interested. For translating I recommend the awesome ["Codestyling Localization" plugin](http://wordpress.org/extend/plugins/codestyling-localization/) and for validating ["Poedit Editor"](http://www.poedit.net/).
