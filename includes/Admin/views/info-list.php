<div class="wrap">
    <h1 class="wp-heading-inline">New Info List 11</h1>
    <a class="page-title-action" href="<?php echo admin_url('admin.php?page=we-crud-table&action=new') ?>">Add New Info</a>

    <form action="" method="post">
        <?php 
            $table = new Raziul\CrudWpPlugin\Admin\Info_List();
            $table->prepare_items();
            $table->display();
        ?>
    </form>
</div>