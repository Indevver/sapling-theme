<?php
namespace Sapling;

use Sapling\Plugin\Blocks\Sample;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Timber\Menu;
use Timber\Timber;
use Twig\Environment;

class Theme
{
    protected $menus = [
      'primary_menu'    => 'Primary Menu',
      'topbar_menu'     => 'Top Bar Menu',
    ];

    protected $sidebars = [
        [
            'name'          => 'sidebar',
            'id'            => 'sidebar',
            'before_widget' => '<aside>',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ]
    ];

    public function __construct()
    {
        add_filter('timber/context', [$this, 'context']);
        add_filter('timber/twig', [$this, 'twig']);
        add_filter('after_setup_theme', [$this, 'supports']);
        add_filter('after_setup_theme', [$this, 'menus']);
        add_filter('after_setup_theme', [$this, 'sizes']);
        add_action('widgets_init', [$this, 'sidebars']);
        add_action('wp_enqueue_scripts', [$this, 'assets']);
        add_action('admin_enqueue_scripts', [$this, 'adminAssets']);
        add_filter('gutenblock_blocks', [$this, 'blocks']);
    }

    public function blocks (array $blocks) :array
    {
        $blocks[] = new Sample();
        return $blocks;
    }

    protected function getAsset($asset)
    {
        $dist = get_theme_file_uri().'/../dist';
        $manifestPath = get_theme_file_path().'/../dist/manifest.json';
        $manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
        $file = isset($manifest[$asset]) ? $manifest[$asset] : $asset;

        return "{$dist}{$file}";
    }

    public function assets()
    {
        wp_deregister_script( 'jquery-core' );
        wp_deregister_script( 'jquery-migrate' );
        wp_enqueue_style('sapling/main.css', $this->getAsset('app.css'), false, null);
        wp_enqueue_script('sapling/main.js', $this->getAsset('app.js'), ['jquery'], null, true);
        add_editor_style($this->getAsset('app.css'));
    }

    public function adminAssets()
    {
        wp_enqueue_style( 'sapling/admin.css', $this->getAsset('admin.css'), false );
        wp_enqueue_script('sapling/admin.js', $this->getAsset('admin.js'), ['jquery'], null, true);
    }

    public function sizes()
    {
//        add_image_size();
    }

    public function menus()
    {
        register_nav_menus($this->menus);
    }

    public function sidebars()
    {
        foreach($this->sidebars as $widget)
        {
            register_sidebar($widget);
        }
    }

    public function context(array $context)
    {
        foreach($this->sidebars as $widget)
        {
            if($widget_id = $widget['id'])
            {
                $context[$widget_id] = Timber::get_widgets($widget_id);
            }
        }

        foreach($this->menus as $menu => $description)
        {
            $context[$menu] = new Menu($menu);
        }

        return $context;
    }

    public function twig(Environment $twig)
    {
        return $twig;
    }

    public function supports()
    {
        add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('title-tag');
        add_theme_support('customize-selective-refresh-widgets');
    }
}