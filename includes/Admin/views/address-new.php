<div class="wrap">

<?php //var_dump($this->errors); ?>
    <h1><?php _e( 'New Address', 'wedevs-academy' ); ?></h1>

    
    
    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr class="row<?php echo $this->has_error('name') ? ' form-invalid' : ' ';  ?>">
                    <th scope="row">
                        <label for="name"><?php _e( 'Name', 'wedevs-academy' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">

                        <?php if($this->has_error('name')) {?>

                        <p class="description error"><?php echo $this->get_error('name'); ?></p>

                        <?php }?>

                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e( 'Address', 'wedevs-academy' ); ?></label>
                    </th>
                    <td>
                        <textarea name="address" id="address" cols="10" rows="5" class="regular-text"></textarea>
                    </td>
                </tr>
                <tr class="row<?php echo $this->has_error('phone') ? ' form-invalid' : ' ';  ?>">
                    <th scope="row">
                        <label for="phone"><?php _e( 'phone', 'wedevs-academy' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="">
                        <?php if($this->has_error('phone')) {?>

                        <p class="description error"><?php echo $this->get_error('phone'); ?></p>

                        <?php }?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php wp_nonce_field( 'new-address') ?>
        <?php submit_button( __('Add Address', 'wedevs-acdemy'), 'primary', 'submit_address' ); ?>
    </form>
</div>