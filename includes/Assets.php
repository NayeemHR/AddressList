<?php

namespace WeDevs\Academy;

/**
 * Assets Handler Class
 */

class Assets{
    function __construct(){

        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);

    }

    public function get_scripts(){
        return[
            'academy-script'=>[
                'src' => WD_ACADEMY_ASSETS . '/js/frontend.js',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/js/frontend.js'), 
            ]
        ];
    }

    public function get_styles(){
        return[
            'academy-script'=>[
                'src' => WD_ACADEMY_ASSETS . '/css/frontend.css',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/css/frontend.css'), 
            ]
        ];
    }

    public function enqueue_assets(){
        $scripts = $this->get_scripts();

        foreach ($scripts as $handle => $script) {
            wp_register_script( 'academy-script', WD_ACADEMY_ASSETS . '/js/frontend.js', false, filemtime( WD_ACADEMY_PATH . '/assets/js/frontend.js'), true);

        }
        $styles = $this->get_styles();
        wp_register_style( 'academy-style', WD_ACADEMY_ASSETS . '/css/frontend.css', false, filemtime( WD_ACADEMY_PATH . '/assets/css/frontend.css'));


        // wp_enqueue_script( 'academy-script' );
        // wp_enqueue_style( 'academy-style' );
    }
}