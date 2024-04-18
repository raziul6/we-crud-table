<?php 
namespace Raziul\CrudWpPlugin\Admin;

if(! class_exists('WP_List_Table')){
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Info_List  extends \WP_List_Table{

    function __construct(){
        parent::__construct([
            'plural'   => 'contact',
            'singular' => 'contact',
            'ajax'     => false,
        ]);
    }

    function get_columns(){
        return [
            'cb' => '<input type="checkbox"/>',
            'name' => __('Name', 'we-crud-table.php'),
            'email' => __('Email', 'we-crud-table.php'),
        ];
    }
    
    
    protected function column_default( $item, $column_name ) {

        return isset( $item->$column_name ) ? $item->$column_name : '';
    }

    function column_cb( $item ){
        return sprintf(
            '<input type="checkbox" name="info_id[]" value="%d" />', $item->id
        );
    }

    function column_name( $item ){
        $actions = [];

        $actions['edit']   = sprintf( '<a href="%s" title="%s">%s</a>', admin_url( 'page=we-crud-table&action=edit&id=' . $item->id ), $item->id, __( 'Edit', 'we-crud-table' ), __( 'Edit', 'we-crud-table' ) );
        $actions['delete'] = sprintf( '<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=wd-ac-delete-address&id=' . $item->id ), 'wd-ac-delete-address' ), $item->id, __( 'Delete', 'we-crud-table' ), __( 'Delete', 'we-crud-table' ) );

        return sprintf(
            '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=we-crud-table&action=view&id' . $item->id ), $item->name, $this->row_actions( $actions )
        );
    }

    function prepare_items(){
        $column   = $this->get_columns();
        $hidden   = [];
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [ $column, $hidden, $sortable ];
        $this->items = we_get_infos();
    }

}