<?php

namespace WeDevs\Academy;

/**
 * installer class
 */

class Installer{

    /**
     * run the installer
     * 
     * @return void 
     */

    public function run(){
        $this->add_version();
        $this->create_tables();

    }

    public function add_version(){
        $installed = get_option( 'wd_academy_installed' );

        if ( ! $installed ) {
            update_option( 'wd_academy_installed', time() );
        }

        update_option( 'wd_academy_version', WD_ACADEMY_VERSION );
        
    }

    /**
     * create necessary database tables
     * 
     * @return void
     */

    public function create_tables(){
        global $wpdb;

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses` ( 
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,  
            `name` VARCHAR(100) NOT NULL DEFAULT '' ,  
            `address` VARCHAR(255) DEFAULT NULL ,  
            `phone` VARCHAR(30) DEFAULT NULL ,  
            `created_by` BIGINT(20) UNSIGNED NOT NULL ,  
            `created_at` DATETIME NOT NULL, PRIMARY KEY(`id`)
            )$charset_collate";

            if(!function_exists('dbDelta')){
                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            }

            dbDelta($schema);
    }
}