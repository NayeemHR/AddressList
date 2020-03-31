<?php

namespace WeDevs\Academy\Frontend;

/**
 * shortcode handler class
 */

 class Shortcode{

    /**
     * Initializes the class
     * 
     */
     function __construct(){
        add_shortcode( 'wedevs-academy', [ $this , 'render_shortcode'] );
     }
     /**
      * Shortcode handler class
      *
      * @param array $atts
      * @param string $content
      *
      *
      * @return string
      */

     public function render_shortcode( $atts, $content =''){
         return '<div class="shortcode-wedevs">hello from shortcode</div>';
     }
 }