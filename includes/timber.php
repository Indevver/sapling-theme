<?php
use Timber\Timber;

$timber = new Timber();
Timber::$dirname = ['templates'];
Timber::$autoescape = false;

// used in woocommerce timber templates to get the product
function timber_set_product($post) {
    global $product; //grab the global $product
    $product = get_product($post->ID); //over-ride it with the current product in the loop
}