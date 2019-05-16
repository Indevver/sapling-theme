<?php

use Sapling\ACF\Fields\Button;
use Sapling\ACF\Fields\Divider;
use Sapling\ACF\Fields\Form;
use Sapling\ACF\Fields\Gallery;
use Sapling\ACF\Fields\Grid;
use Sapling\ACF\Fields\Hero;
use Sapling\ACF\Fields\Image;
use Sapling\ACF\Fields\Quote;
use Sapling\ACF\Fields\Slider;
use Sapling\ACF\Fields\Text;
use Sapling\ACF\Fields\Heading;
use Sapling\ACF\Fields\Video;
use Sapling\ACF\Tabs\Advanced;
use Sapling\ACF\Tabs\Background;
use Sapling\ACF\Tabs\Design;
use Sapling\ACF\Tabs\Heading;
use Sapling\ACF\Tabs\Spacing;
use Sapling\ACF\Tabs\Text as TextTab;

add_filter('sapling_acf_builder', function($section){
    $text_colors = apply_filters('sapling_acf_builder_text_colors', []);
    $background_colors = apply_filters('sapling_acf_builder_background_colors', []);

    $advancedTab = new Advanced();
    $backgroundTab = new Background($background_colors);
    $spaceAlignTab = new Spacing();
    $textTab = new TextTab($text_colors);
    $headingTab = new Heading();

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
    $fields['heading'] = new Heading();
    $advancedTab->addTab($fields['heading']);
    $fields['video'] = new Video();
    $advancedTab->addTab($fields['video']);

    ksort($fields);

    return $fields;
});