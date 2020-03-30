<?php
use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;

$context = Timber::context();
$templates = ['layouts/base.twig'];

if(is_404())
{
    $context['title'] = '404 Page not found';
    array_unshift($templates, 'pages/404.twig');
}
else if(is_search())
{
    $templates = array( 'search.twig', 'archive.twig', 'index.twig' );
    array_unshift($templates, 'pages/search.twig');
    $context['title'] = 'Search results for ' . get_search_query();
    $context['posts'] = new PostQuery();
}
else if(is_page())
{
    array_unshift($templates, 'pages/page.twig');
    $context['post'] = new Post();
}
else if(is_single())
{
    array_unshift($templates, 'pages/single-'.get_post_type().'.twig', 'pages/single.twig');
    $context['post'] = new Post();
}
else if(is_archive())
{
    array_unshift($templates, 'pages/archive.twig');
    $context['posts'] = new PostQuery();
    $context['title'] = 'Archive';
    if ( is_day() ) {
        $context['title'] = 'Archive: ' . get_the_date( 'D M Y' );
    } else if ( is_month() ) {
        $context['title'] = 'Archive: ' . get_the_date( 'M Y' );
    } else if ( is_year() ) {
        $context['title'] = 'Archive: ' . get_the_date( 'Y' );
    } else if ( is_tag() ) {
        $context['title'] = single_tag_title( '', false );
    } else if ( is_category() ) {
        $context['title'] = single_cat_title( '', false );
        array_unshift( $templates, 'pages/archive-' . get_query_var( 'cat' ) . '.twig' );
    } else if ( is_post_type_archive() ) {
        $context['title'] = post_type_archive_title( '', false );
        array_unshift( $templates, 'pages/archive-' . get_post_type() . '.twig' );
    }
}
else if(is_front_page())
{
    array_unshift($templates, 'pages/front.twig', 'pages/page.twig');
    $context['post'] = new Post();
}
else if(is_home())
{
    array_unshift($templates, 'pages/home.twig', 'pages/archive.twig');
    $context['posts'] = new PostQuery();
    $context['title'] = 'Home';
}
Timber::render($templates, $context);
