<?php
	global $wpdb;

	add_action('admin_print_scripts', 'do_jslibs' );
	add_action('admin_print_styles', 'do_css' );
	
	function do_css()
	{
		wp_enqueue_style('thickbox');
	}
	
	function do_jslibs()
	{
		wp_enqueue_script('editor');
		wp_enqueue_script('thickbox');
		add_action( 'admin_head', 'wp_tiny_mce' );
	}
?>
<div class="icon32">
    <img width="32" height="32" alt="icon" src="http://localhost/natag/wp-content/plugins/wp-feedback-survey-manager/static/admin/images/feedback_32.png">
</div>
<h2>Send Feedback to Users</h2>
<form action="" method="post" name="feedback_send">
	<table width="100%">
    	<tr>
        	<td width="150">
            	Select Users : 
            </td>
            <td>
            	<select name="users[]" multiple="multiple" id="users">
                	<?php
					$blogusers = get_users('orderby=nicename&role=formar');
					foreach ($blogusers as $user) {
						?>
                        <option value="<?php echo $user->ID; ?>"><?php echo $user->user_email; ?></option>
                        <?php
					}
					?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            	<div id="poststuff">
					<?php the_editor('<h2>Enter Message Here</h2>','content'); ?>
                </div>
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="right">
            	<input type="submit" name="submit" value="Send" class="button-primary">
            </td>
        </tr>
    </table>
</form>