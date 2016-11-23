Owl Carousel for FooGallery
================================
A custom template for FooGallery which implements Owl Carousel 2.

###Current Version = 1.0.2

This repository will most often be one step ahead of the WordPress Repo. Development happens here, so if you'd like to see what's coming down the pipe, feel free to download and experiment with this. Issues and Pull requests welcome!

##Useful Resources
* [Download FooGallery](https://wordpress.org/plugins/foogallery/)
* [Contribute to FooGallery on Github](https://github.com/fooplugins/foogallery)
* [Read about Owl Carousel and see demos](http://www.owlcarousel.owlgraphic.com/)
* [Contribute to Owl Carousel 2 on Github](https://github.com/OwlFonk/OwlCarousel2)
* [Found out more about Matt Cromwell, author of this plugin](http://mattcromwell.com)

##Screenshots
*Choose Owl Carousel from the "Gallery Template" field in FooGallery*

![FooGallery Owl Carousel Template](https://ps.w.org/foogallery-owl-carousel-template/assets/screenshot-1.png?rev=1064277)

*Custom settings for each Owl Carousel that control items per "stage", margin between items, navigation, pagination and more.*

![Custom settings for each Owl Carousel that control items per "stage", margin between items, navigation, pagination and more.](https://ps.w.org/foogallery-owl-carousel-template/assets/screenshot-2.png?rev=1064277)

*Have multiple types, shapes, sizes and functionalities for multiple galleries on the same page.*

![Have multiple types, shapes, sizes and functionalities for multiple galleries on the same page.
](https://ps.w.org/foogallery-owl-carousel-template/assets/screenshot-3.png?rev=1064277)

*Choose a custom link and target to launch from each image in your Carousel. Combined with FooBox Pro you can launch videos, forms, a Google Map, and more from each individual image in your Carousel.*

![Choose a custom link and target to launch from each image in your Carousel. Combined with FooBox Pro you can launch videos, forms, a Google Map, and more from each individual image in your Carousel.](https://ps.w.org/foogallery-owl-carousel-template/assets/screenshot-4.png?rev=1064277)

*Choose from a plethora of styles and hover effects. See a preview live while you create your gallery.*

![Choose from a plethora of styles and hover effects. See a preview live while you create your gallery.](https://ps.w.org/foogallery-owl-carousel-template/assets/screenshot-5.png?rev=1064277)

##FAQs
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
```
add_filter('owl_prev_text','new_prev_text');

function new_prev_text() {
	return '<span class="genericon genericon-leftarrow"></span>';
}
```

*Use a Genericon Right Arrow for "next"*
```
add_filter('owl_next_text','new_next_text');

function new_next_text() {
	return '<span class="genericon genericon-rightarrow"></span>';
}
```

**Can I use initialization rules from the original Owl Carousel?**

Yes! Since version 1.4 there's now a filter you can use to add additional Owl init rules. Here's some examples:

```
add_filter('foogallery_owl_custom_init', 'my_custom_init', 10, 2);

function my_custom_init($custom_init, $gallid) {
    $custom_init = "startPosition: 'URLHash',";
    return $custom_init;
}
 ```

Just remember to always end the line with a comma, and understand that doing this wrong can definitely break your galleries.

You can also target per gallery like so:

```
add_filter('foogallery_owl_custom_init', 'my_custom_init', 10, 2);

function my_custom_init($custom_init, $gallid) {
    if ( "5" != $gallid ) {
            return null;
    } else {
        $custom_init = "startPosition: 'URLHash',";
        return $custom_init;
    }
}
```

**What other filters are available?**

Since version 1.4 there now the following filters available as well:

 * **`foogallery_owl_lazyload`** -- to override the default laszyLoad : true, just return this false instead.
 * **`foogallery_owl_startposition`** -- this is used in comination with the Deep Linking feature. You can choose to change the first slide to whatever you like here.

**How do you do it, Matt!? How do you make such awesome stuff!?**

Awww shucks! I lean on tons of other stronger, smarter, more skilled people than me and work at it every day. If you really appreciate this plugin, then please feel free to send me a [tip over here](https://www.mattcromwell.com/products/foogallery-owl-carousel/).