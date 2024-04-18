<?php 
namespace Raziul\CrudWpPlugin;

class Admin{
    function __construct(){
        $this->action_handle();
        new Admin\Admin_Menu();
    }

    function action_handle(){
        $infolists = new Admin\Add_data();
        add_action('admin_init', [$infolists, 'form_control']);
    }
}