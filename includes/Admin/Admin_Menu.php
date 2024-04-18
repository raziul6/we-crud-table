<?php 
namespace Raziul\CrudWpPlugin\Admin;

class Admin_Menu{
    function __construct(){
        add_action('admin_menu', [$this, 'display_admin_menu']);
    }


    function display_admin_menu(){
        $capability = 'manage_options';
        add_menu_page( __( 
            'Crud Assignment',
             'we-crud-table' ), 
             __( 'Crud Assignment', 'we-crud-table' ), 
             $capability, 
             'we-crud-table', 
             [ $this, 'display_plugin_page' ], 
             'dashicons-database-view' 
        );

        add_submenu_page('we-crud-table', 'All Table Data', __( 'All Table Data', 'we-crud-table' ), $capability, 'all-table-list', [$this, 'display_submenu_page']);
    }

    function display_plugin_page(){
        $add_data = new Add_data();
        $add_data->plugin_add_data();
    }

    function display_submenu_page(){
        echo "Submenu";
    }
}