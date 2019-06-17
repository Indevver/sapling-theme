<?php

use Sapling\Plugin\ACF\Fields\Title;
use Sapling\Plugin\ACF\Fields\Button;
use Sapling\Plugin\ACF\Fields\Divider;
use Sapling\Plugin\ACF\Fields\Form;
use Sapling\Plugin\ACF\Fields\Gallery;
use Sapling\Plugin\ACF\Fields\Hero;
use Sapling\Plugin\ACF\Fields\Image;
use Sapling\Plugin\ACF\Fields\Slider;
use Sapling\Plugin\ACF\Fields\Text;
use Sapling\Plugin\ACF\Fields\Heading;
use Sapling\Plugin\ACF\Fields\Video;
use Sapling\Plugin\ACF\Tabs\Advanced;
use Sapling\Plugin\ACF\Tabs\Background;
use Sapling\Plugin\ACF\Tabs\Heading as HeadingTab;
use Sapling\Plugin\ACF\Tabs\Spacing;
use Sapling\Plugin\ACF\Tabs\Text as TextTab;

add_filter('sapling_acf_builder', function($section){
    $text_colors = apply_filters('sapling_acf_builder_text_colors', []);
    $background_colors = apply_filters('sapling_acf_builder_background_colors', []);
    $overlay_colors = apply_filters('sapling_acf_builder_overlay_colors', []);

    $advancedTab = new Advanced();
    $backgroundTab = new Background($background_colors, $overlay_colors);
    $spaceAlignTab = new Spacing();
    $textTab = new TextTab($text_colors);
    $headingTab = new HeadingTab();

    $headingTab->addTab($section);
    $textTab->addTab($section);
    $backgroundTab->addTab($section);
    $spaceAlignTab->addTab($section);
    $advancedTab->addTab($section);

    return $section;
});

add_filter('sapling_acf_builder_text_colors', function(array $colors): array{
    return [
        "text-dark"         => "Dark",
        "text-secondary"    => "Grey",
        "text-light"        => "Light",
        "text-white"        => "White",
        "text-primary"      => "Blue",
        "text-info"         => "Light Blue",
        "text-success"      => "Green",
        "text-danger"       => "Red",
        "text-warning"      => "Yellow",
    ];
});

add_filter('sapling_acf_builder_background_colors', function(array $colors): array{
    return [
        "bg-primary"    => "Blue",
        "bg-info"       => "Light Blue",
        "bg-success"    => "Green",
        "bg-danger"     => "Red",
        "bg-warning"    => "Yellow",
        "bg-dark"       => "Dark",
        "bg-secondary"  => "Grey",
        "bg-light"      => "Light",
        "bg-white"      => "White",
    ];
});

add_filter('sapling_acf_builder_overlay_colors', function(array $colors): array{
    return [
        "0, 123, 255"    => "Blue",
        "23, 162, 184"   => "Light Blue",
        "40, 167, 69"    => "Green",
        "220, 53, 69"    => "Red",
        "255, 193, 7"    => "Yellow",
        "52, 58, 64"     => "Dark",
        "108, 117, 125"  => "Grey",
        "248, 249, 250"  => "Light",
        "255, 255, 255"  => "White",
    ];
});

add_filter('sapling_acf_builder_button_styles', function(array $colors): array{
    return [
        "btn-primary"           => "Blue",
        "btn-info"              => "Light Blue",
        "btn-success"           => "Green",
        "btn-danger"            => "Red",
        "btn-warning"           => "Yellow",
        "btn-light"             => "Light",
        "btn-secondary"         => "Grey",
        "btn-dark"              => "Dark",
        "btn-outline-primary"   => "Outline Blue",
        "btn-outline-info"      => "Outline Light Blue",
        "btn-outline-success"   => "Outline Green",
        "btn-outline-danger"    => "Outline Red",
        "btn-outline-warning"   => "Outline Yellow",
        "btn-outline-light"     => "Outline Light",
        "btn-outline-secondary" => "Outline Grey",
        "btn-outline-dark"      => "Outline Dark",
        "btn-link"              => "Link",
    ];
});

add_filter('sapling_acf_builder_fields', function(array $fields): array {
    $text_colors = apply_filters('sapling_acf_builder_text_colors', []);
    $background_colors = apply_filters('sapling_acf_builder_background_colors', []);
    $overlay_colors = apply_filters('sapling_acf_builder_overlay_colors', []);
    $button_styles = apply_filters('sapling_acf_builder_button_styles', []);

    $advancedTab = new Advanced();

    $fields['button'] = new Button($button_styles);
    $advancedTab->addTab($fields['button']);
    $fields['divider'] = new Divider();
    $advancedTab->addTab($fields['divider']);
    if(class_exists('RGFormsModel')) {
        $fields['form'] = new Form();
        $advancedTab->addTab($fields['form']);
    }
    $fields['gallery'] = new Gallery();
    $advancedTab->addTab($fields['gallery']);
    $fields['hero'] = new Hero($button_styles);
    $advancedTab->addTab($fields['hero']);
    $fields['image'] = new Image();
    $advancedTab->addTab($fields['image']);
    $fields['slider'] = new Slider();
    $advancedTab->addTab($fields['slider']);
    $fields['text'] = new Text();
    $advancedTab->addTab($fields['text']);
    $fields['title'] = new Title();
    $advancedTab->addTab($fields['title']);
    $fields['heading'] = new Heading();
    $advancedTab->addTab($fields['heading']);
    $fields['video'] = new Video();
    $advancedTab->addTab($fields['video']);

    ksort($fields);

    return $fields;
});