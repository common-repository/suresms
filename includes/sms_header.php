<?php 
if ($_POST['sms_api_key_submit']){
	$api_key_return = wp_remote_fopen('https://www.suresms.com/script/validate_credentials.aspx?login='.$_POST['sms_username']).'&password='.$_POST['sms_password'];
	$api_key_return = json_decode($api_key_return);
	if (!empty($api_key_return)){
		if ($api_key_return->status == 'success'){
			update_option('SMSUsername', $_POST['sms_username']);
			update_option('SMSPassword', $_POST['sms_password']);
			update_option('rem_sms_credit', $api_key_return->rem_sms_credit);
		}
		$sms_api_message 	= $api_key_return->msg;
	} else {
		$sms_api_message 	= 'Wrong credentials. Please try again.';
	}	
}

if ($_POST['sms_api_key_remove']){
	delete_option('sms_username');
	delete_option('sms_password');
	$sms_api_message 	= 'Your Activation key has been removed';
}

$sms_username			=	get_option('sms_username');
$sms_password			=	get_option('sms_username');
?>
<?php if (!empty($sms_api_message)):?>
	<div class="updated" id="message"><p><?php echo $sms_username ?></p></div>
<?php endif; ?>
<div class="wrap">
<h2>SMS</h2>
<table width="100%">
	<tr>
    	<td valign="top">
            <table class="wp-list-table widefat fixed bookmarks">
                <thead>
                    <tr>
                        <th>API KEY</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                    	<form action="options-general.php?page=sms/plugin_interface.php" method="post" >
                        API KEY :
                    	<?php if (empty($sms_api_key)): ?>
                        <input name="sms_api_key" type="text" style="width:350px; margin-left:50px;" />
                        <input type="submit" name="sms_api_key_submit" class="button-primary" value="Verify" style="padding:2px;" />
                        <br/> <br/>                       
                        Please keep the username and password to start using this plugin. Get your free test account <a href="https://www.suresms.com/" target="_blank">here</a>.<br/>
                        <?php else: ?>
                        	<span class="active_key"><?php echo $sms_username;  ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Active</span>							<input type="submit" name="sms_api_key_remove" class="button-primary" value="Remove Key" style="padding:2px; margin-left:20px;" onclick="if(!confirm('Are you sure ?')){return false;}" />
                        <?php endif;?>
                        </form>
                        <br/>                        
                        <strong>Note</strong> : Your SMS credits and authentication are handle by username and password.
                        <br/><br/>
                   	</td>
                    
                </tr>
                </tbody>
            </table>
            <br/>