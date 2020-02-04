wp.domReady( () => {
    wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
    wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
    wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );
    wp.blocks.unregisterBlockStyle( 'core/button', 'border-radius' );
} );