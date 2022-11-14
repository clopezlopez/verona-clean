<?php
    /**
     * Register our custom source.
     */
    add_action( 'elementor/init', function() {
        include 'includes/source.php';
        
        // Unregister source with closure binding, thank Steve.
        $unregister_source = function($id) {
            unset( $this->_registered_sources[ $id ] );
        };
        
        $unregister_source->call( \Elementor\Plugin::instance()->templates_manager, 'remote');
        \Elementor\Plugin::instance()->templates_manager->register_source( 'Elementor\TemplateLibrary\Source_Custom' );
    }, 15 );
