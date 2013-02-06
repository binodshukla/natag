<?php
	global $wpdb;

	if($_POST['action'] == "send")
	{
		if(count($_POST['users']) > 0)
		{
			// Empty Last Records
			$wpdb->query('TRUNCATE TABLE wp_send_feedback');
			
			foreach($_POST['users'] as $user_id)
			{
				// Start Mailing
				$user_info = get_userdata($user_id);
				$to = $user_info->user_email;
				$name = ucfirst($user_info->display_name);
				$subject = "Feedback Survey Natag";
				$message = str_replace("$name",$name,$_POST['content']);
				
				$headers = 'From: National AG';
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$mail = mail( $to, $subject, $message, $headers);
				if($mail)
				{
					$insert_query = "insert into wp_send_feedback (user_id, feedback_status) values ($user_id, 0)";
					$wpdb->query($insert_query);
				}
			}
		}
	}
	
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
                        <option value="<?php echo $user->ID; ?>"><?php echo $user->display_name; ?> < <?php echo $user->user_email; ?> ></option>
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
            	<input type="hidden" name="action" value="send" />
            	<input type="submit" name="submit" value="Send" class="button-primary">
            </td>
        </tr>
    </table>
</form>