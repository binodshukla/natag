<?php
	global $wpdb;

	if($_POST['action'] == "save")
	{
		update_option("youtube_url", $_POST["youtube_url"]);
		update_option("linkedin_url", $_POST["linkedin_url"]);
		update_option("facebook_url", $_POST["facebook_url"]);
		update_option("twitter_url", $_POST["twitter_url"]);
		update_option("googleplus_url", $_POST["googleplus_url"]);
	}
?>
<div class="icon32">
    <img width="32" height="32" alt="icon" src="http://localhost/natag/wp-content/plugins/wp-feedback-survey-manager/static/admin/images/feedback_32.png">
</div>
<h2>Custom Social Media Links</h2>
<form action="" method="post" name="feedback_send" enctype="multipart/form-data">
	<table width="100%">
    	<tr>
        	<td width="150">
            	Youtube : 
            </td>
            <td>
            	<input type="text" name="youtube_url" value="<?php echo get_option('youtube_url'); ?>" size="150">
            </td>
        </tr>
        <tr>
        	<td width="150">
            	LinkedIn : 
            </td>
            <td>
            	<input type="text" name="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" size="150">
            </td>
        </tr>
        <tr>
        	<td width="150">
            	Facebook : 
            </td>
            <td>
            	<input type="text" name="facebook_url" value="<?php echo get_option('facebook_url'); ?>" size="150">
            </td>
        </tr>
        <tr>
        	<td width="150">
            	Twitter : 
            </td>
            <td>
            	<input type="text" name="twitter_url" value="<?php echo get_option('twitter_url'); ?>" size="150">
            </td>
        </tr>
        <tr>
        	<td width="150">
            	Google Plus : 
            </td>
            <td>
            	<input type="text" name="googleplus_url" value="<?php echo get_option('googleplus_url'); ?>" size="150">
            </td>
        </tr>
        <tr>
        	<td colspan="2">
            	<input type="hidden" name="action" value="save" />
            	<input type="submit" name="submit" value="Save" class="button-primary">
            </td>
        </tr>
    </table>
</form>