<div class="wrap">
<h1 class="wp-heading-inline">Add New Info</h1>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e( 'Name', 'we-crud-table' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="email"><?php _e( 'Email', 'we-crud-table' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="email" id="email" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php 
            wp_nonce_field('crud-info');
            submit_button(__('Add Info', 'we-crud-table'), 'primary', 'submit_data' );
        ?>
    </form>
</div>