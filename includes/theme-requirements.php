<?php
if(!class_exists('Sapling\Plugin\Blocks\AbstractBlock'))
{
    add_action('admin_notices', function() {
        echo '<div class="error"><p>Sapling not installed.</p></div>';
    });

    add_filter('template_include', function($template) {
        return get_stylesheet_directory().'/static/no-sapling.html';
    });

    return;
}