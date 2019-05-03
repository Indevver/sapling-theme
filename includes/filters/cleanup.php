<?php
// remove version from scripts and styles
function sapling_remove_version($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
add_filter('the_generator', '__return_empty_string');
add_filter('style_loader_src', 'sapling_remove_version', 10);
add_filter('script_loader_src', 'sapling_remove_version', 10);