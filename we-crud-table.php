<?php
/**
 * Plugin Name: CRUD Table
 * Description: CRUD Project
 * Author: Raziul Islam
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  we-crud-table
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Plugin Main Class
 */
final class We_Crud_Table {


    /**
     * Plugin version
     *
     * @var string
     */
    const versions = '1.0';


    /**
     * class Construct
     */
    private function __construct(){
        $this->define_constants();
        register_activation_hook( __FILE__, [ $this, 'plugin_activate' ] );
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /**
     * Single Tnstance
     *
     * @return void
     */
    public static function init(){
        static $instance = false;
        if(! $instance ){
            $instance = new self();
        }
        return $instance;
    }


    /**
     * Define Constants
     *
     * @return void
     */
    function define_constants(){
        define( 'WECT_VERSION', self::versions );
        define( 'WECT_FILE', __FILE__ );
        define( 'WECT_PATH', __DIR__ );
        define( 'WECT_URL', plugins_url( '', WECT_FILE ) );
        define( 'WECT_ASSETS', WECT_URL . '/assets' );
    }

    function init_plugin(){
        new Raziul\CrudWpPlugin\Admin();
    }


    /**
     * Plugin Activate
     *
     * @return void
     */
    function plugin_activate(){
        new Raziul\CrudWpPlugin\Activate();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \We_Crud_Table
 */
function We_Crud_Table() {
    return We_Crud_Table::init();
}

// Run plugin
We_Crud_Table();