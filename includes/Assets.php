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
                'deps' => ['jquery']
            ],
            'academy-enquiry-script'=>[
                'src' => WD_ACADEMY_ASSETS . '/js/enquiry.js',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/js/enquiry.js'), 
                'deps' => ['jquery']
            ],
            'academy-admin-script'=>[
                'src' => WD_ACADEMY_ASSETS . '/js/admin.js',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/js/admin.js'), 
                'deps' => ['jquery', 'wp-util']
            ]
        ];
    }

    public function get_styles(){
        return[
            'academy-style'=>[
                'src' => WD_ACADEMY_ASSETS . '/css/frontend.css',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/css/frontend.css'), 
            ],
            'academy-admin-style'=>[
                'src' => WD_ACADEMY_ASSETS . '/css/admin.css',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/css/admin.css'), 
            ],
            'academy-enquiry-style'=>[
                'src' => WD_ACADEMY_ASSETS . '/css/enquiry.css',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/css/enquiry.css'), 
            ]
        ];
    }

    public function enqueue_assets(){
        $scripts = $this->get_scripts();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;
            
            wp_register_script( $handle, $script['src'], $deps, $script['version'], true);

        }
        $styles = $this->get_styles();

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;
            
            wp_register_style( $handle, $style['src'], $deps, $style['version'] );

        }

        wp_localize_script( 'academy-enquiry-script', 'weDevsAcademy', [

            'ajaxurl' => admin_url( 'admin-ajax.php', 'admin' ),
            'error'   => __('Somthing went Wrong', 'wedevs-academy')
        ] );

        wp_localize_script( 'academy-admin-script', 'weDevsAcademy', [

            'nonce'   => wp_create_nonce( 'wd-ac-admin-nonce' ),
            'confirm' => __( 'Are You Sure?', 'wedevs-academy'),
            'error'   => __('Somthing went Wrong', 'wedevs-academy')
        ] );

    }
}
