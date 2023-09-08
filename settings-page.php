<?php
// Avoid direct calls
defined('ABSPATH') || die;
?>

<div class="wrap">
    <h2>Remove WYSIWYG Settings</h2>
    <form method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Disable WYSIWYG for:</th>
                <td>
                    <?php foreach ($post_types as $post_type): ?>
                        <input type="checkbox" name="post_types[]" value="<?php echo $post_type; ?>" <?php checked(in_array($post_type, $disabled_types)); ?>>
                        <?php echo $post_type; ?>
                        <br>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>

