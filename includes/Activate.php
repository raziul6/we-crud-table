<?php 
namespace Raziul\CrudWpPlugin;

class Activate{

    /**
     * Table Property
     *
     * @var [type]
     */
    private $table_name;

    /**
     * Construct
     */
    function __construct(){
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'we_crud_db';
        $this->create_db_table();
    }

    /**
     * Create Table
     *
     * @return void
     */
    function create_db_table(){
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $this->table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(50) NOT NULL,
            email varchar(50) NOT NULL,
            PRIMARY KEY  (id)
          ) $charset_collate;";

          require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
          dbDelta($sql);
    }

    
}