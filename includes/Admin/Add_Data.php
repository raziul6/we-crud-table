<?php 
namespace Raziul\CrudWpPlugin\Admin;

class Add_data{

    public $errors_handel = [];

    function plugin_add_data(){
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';

        switch ($action) {

            case 'new':
                $template = __DIR__ . '/views/add-new-info.php';
                break;

            case 'edit':
                $template = __DIR__ . '/views/edit-new-info.php';
                break;

            case 'view':
                $template = __DIR__ . '/views/view-new-info.php';
                break;

            default:
                $template = __DIR__ . '/views/info-list.php';
                break;

        }
        if( file_exists( $template ) ){
            include $template;
        }
    }

    function form_control(){
        if(!isset($_POST['submit_data'])){
            return;
        }

        if(! wp_verify_nonce($_POST['_wpnonce'], 'crud-info')){
            wp_die('Fazlami Koro Na');
        }

        if(! current_user_can('manage_options')){
            wp_die('Fazlami Koro Na');
        }

        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';


        if(empty( $name )){
            $this->errors_handel['name'] = __('Please Provide Name', 'we-crud-table');
        }
        if(empty( $email )){
            $this->errors_handel['email'] = __('Please Provide Email', 'we-crud-table');
        }

        if(!empty($this->errors_handel)){
            return;
        }

        insert_data_inside_table(
            [
                'name'  => $name,
                'email' => $email
            ]
        );

        $redirect = admin_url('admin.php?page=we-crud-table&inserted=true');
        wp_redirect($redirect);

        var_dump($_POST);
        exit;
    }
}