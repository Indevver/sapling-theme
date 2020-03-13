<?php

namespace Sapling;

use Sapling\Plugin\AbstractTheme;
use Sapling\Plugin\Blocks\Sample;

class Theme extends AbstractTheme
{
    /**
     * https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js
     * @var bool|string false removes jquery, true adds wordpress version, string adds the string url
     */
    private $jquery = false;

    public function __construct()
    {
        parent::__construct();
        if($this->jquery && $this->jquery !== true) {
            add_action('wp_default_scripts', [$this,  'swapDefaultScripts']);
        }
        add_action('wp_head', [$this, 'dequeue']);
    }

    public function sidebars() :array
    {
        return [
            [
                'name' => 'sidebar',
                'id' => 'sidebar',
                'before_widget' => '<aside>',
                'after_widget' => '</aside>',
                'before_title' => '<h2>',
                'after_title' => '</h2>',
            ]
        ];
    }

    public function menus() :array {
        return  [
            'primary_menu' => 'Primary Menu',
            'topbar_menu' => 'Top Bar Menu',
        ];
    }

    public function blocks(array $blocks): array
    {
        $blocks[] = new Sample();
        return $blocks;
    }

    public function colors(): array
    {
        return [[
                'name' => __('Primary'),
                'slug' => 'primary',
                'color' => '#101a2c',
            ],
            [
                'name' => __('Success'),
                'slug' => 'success',
                'color' => '#87a52c',
            ],
            [
                'name' => __('Info'),
                'slug' => 'info',
                'color' => '#3298dc',
            ],
            [
                'name' => __('Warning'),
                'slug' => 'warning',
                'color' => '#ffdd57',
            ],
            [
                'name' => __('Danger'),
                'slug' => 'danger',
                'color' => '#f14668',
            ],
            [
                'name' => __('Black'),
                'slug' => 'black',
                'color' => '#000000',
            ],
            [
                'name' => __('Dark'),
                'slug' => 'dark',
                'color' => '#363636',
            ],
            [
                'name' => __('Grey'),
                'slug' => 'grey',
                'color' => '#eeeeee',
            ],
            [
                'name' => __('Light'),
                'slug' => 'light',
                'color' => '#f5f5f5',
            ],
            [
                'name' => __('White'),
                'slug' => 'white',
                'color' => '#ffffff',
            ],
        ];
    }

    public function fonts() : array
    {
        return [
            [
                'name' => __('H1'),
                'size' => 42,
                'slug' => 'title-1'
            ],
            [
                'name' => __('H2'),
                'size' => 35,
                'slug' => 'title-2'
            ],
            [
                'name' => __('H3'),
                'size' => 30,
                'slug' => 'title-3'
            ],
            [
                'name' => __('H4'),
                'size' => 22,
                'slug' => 'title-4'
            ],
        ];
    }

    public function imageSizes()
    {
//        add_image_size();
    }

    public function dequeue()
    {
        if (!is_user_logged_in()) {
            wp_dequeue_style('dashicons');
            wp_deregister_style( 'dashicons' );
            wp_dequeue_style('admin-bar');
            wp_deregister_style('admin-bar');
            wp_dequeue_script('admin-bar');
            wp_deregister_script('admin-bar');
            if(!$this->jquery)
            {
                wp_dequeue_script('jquery');
                wp_deregister_script('jquery');
            }
        }
    }

    public function swapDefaultScripts(&$scripts)
    {
        if(!is_admin()){
            $scripts->remove( 'jquery');
            $scripts->add( 'jquery', $this->jquery, [], '3.4.1' );
        }
    }

    public function assets()
    {
        $this->dequeue();
        wp_enqueue_style('sapling/main.css', $this->getAsset('app.css'), false, null);
        wp_enqueue_script('sapling/runtime.js', $this->getAsset('runtime.js'), [], null, true);
        wp_enqueue_script('sapling/main.js', $this->getAsset('app.js'), ['sapling/runtime.js'], null, true);
        add_editor_style($this->getAsset('app.css'));
    }

    public function adminAssets()
    {
        wp_enqueue_style('fontawesome', "https://use.fontawesome.com/releases/v5.8.1/css/all.css", false);
        wp_enqueue_style('sapling/admin.css', $this->getAsset('admin.css'), ['fontawesome']);
        wp_enqueue_script('sapling/admin.js', $this->getAsset('admin.js'), [], null, true);
    }

    public function editorAssets()
    {
        wp_enqueue_script('be-editor', get_stylesheet_directory_uri() . '/../assets/js/editor.js', array('wp-blocks', 'wp-dom'), filemtime(get_stylesheet_directory() . '/../assets/js/editor.js'), true);
    }
}