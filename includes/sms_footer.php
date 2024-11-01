<?php 
$server_status 	= get_option('sms_server_status');
if ($_POST['test_server'] || empty($server_status)){
		$test_code	= date('ymdhis');
		$response	= wp_remote_fopen('https://www.suresms.com/scripts/test.aspx?test_code='.$test_code);
		if ($response == $test_code){
			$server_err_stat	= 'test_successfull';
			$server_err_msg		= '';
		} else {
			$server_err_stat	= 'test_error';
			$server_err_msg 	= '<strong>Error</strong>: Not possible to reach the server.';	
		}
		update_option('sms_server_status', $server_err_stat);
		update_option('sms_server_msg', $server_err_msg);
}
$server_status 	= get_option('sms_server_status');
$server_message = get_option('sms_server_msg');
?>
        <br/>
        <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th>Instruction</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                    	<ol>
                        	<li>Get account information <a href="https://www.suresms.com/dk" target="_blank">here</a>.
                            </li>
                            
                            <li>Goto Apperance > Widgets and drag and drop SureSMS widget to your sidebar.</li>
                            
                            <li>Keep Footer Text to be send in every SMS. <br/>
                            <em><strong>Note : </strong>It doesnot work for test accounts</em></li>                            
                        </ol>
                    </td>
                </tr>
                </tbody>
            </table>
        
        </td>
        <td width="15">&nbsp;</td>
        <td width="250" valign="top">
        	<table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th>Server Connectivity Test</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                    	<div id="server_status" class="<?php echo $server_status; ?>">
                        	<?php echo str_replace('_',' ',$server_status); ?>
                        </div>						
                        
                        <?php if ($server_status == 'test_error'): ?>
						<div class="sms_test_msg"><?php echo $server_message; ?></div>
                        <?php endif; ?>
                        
                        
                        <form action="options-general.php?page=sms/plugin_interface.php" method="post">
                        	<p align="center">
                            <input type="submit" value="Test Again" class="button-primary" name="test_server" />
                            </p>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th>Quick Links</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                    <ul class="sms_list">

                        <li><a href="https://client.suresms.com" target="_blank">Add SMS Credit</a></li>
                        
                        <li><a href="https://www.suresms.com/dk/kontakt" target="_blank">Contact us</a></li>
                    </ul>
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th>Facebook</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FDnessCarKey%2F77553779916&amp;width=240&amp;height=260&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color=%23f9f9f9&amp;header=false&amp;appId=215419415167468" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:260px;" allowTransparency="true"></iframe>
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            
        </td>
    </tr>
</table>
</div>
