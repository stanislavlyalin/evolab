<?php
/*
Plugin Name:Wp NicEdit 
Plugin URI:http://www.thinkinginwordpress.com/2008/11/wp-nicedit-updated-version-10-released/
Author:Brajesh K.Singh
Author URI:http://ThinkingInWordpress.com
Version: 1.0
Description:This plugin integrates the a very slick <a href='http://nicedit.com/'>Nice editor</a>  by Brian Kirchoff to wordpress comments  converting it to a rich text editor.
For more details please look at .

For more Information on nicEdit visit http://nicedit.com/
Please Note
* NicEdit is  Copyright of Brian Kirchoff visit his site at http://nicedit.com/ .
License:GPL

*/

//define constants

define("NICEDITPATH","wp-nicedit");
//add hooks
add_action("comment_form","include_wpnicedit_js");

/**
@desc: Includes necessay javascript files and triggers functions */

function include_wpnicedit_js()
{
		//includes the required files..
		$niceeditor_url=get_option("siteurl")."/".PLUGINDIR."/".NICEDITPATH;
		$niceeditor_incpath=realpath("./");

?>
		<script type="text/javascript" src="<?php echo $niceeditor_url;?>/nicEdit.js" >
			</script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() {
			new nicEditor({iconsPath : '<?php echo $niceeditor_url;?>/nicEditorIcons.gif',fullPanel:<?php if(get_option("wpnicedit_settings")=="fullpanel") echo "true" ;else echo "false";?>}).panelInstance('comment');
			});
		</script>
		<?php

}



/***********admin Backenbnd for NicEdit settings***************************/
$wpadmin=new WpNicEditAdmin();
class WpNicEditAdmin
{

 function __construct()
   {
   
    add_action('admin_menu',array(&$this,"add_wpnic_settings_page"));
   }
   
   //for php4 compatibility
   function WpNicEditAdmin()
   {
   $this->__construct(); //for PHp 4 compatibility
   }
   
   
  //=============================================
    // Displays The Settings  Panel
    //=============================================

    function wpnic_options_page() 
    {
		if(isset($_POST['wpnicedit-settings-submitted']))
                {

               
               $current_option=$_POST["wpnicedit_settings"];//get the settings selected by user
			   //store it in the database
			   update_option("wpnicedit_settings",$current_option);//either add or update
                             
                  ?>        
                              
            <div class="update fade" style="text-align:center">Settings Saved</div>
            <?php
            }//updated

    ?>
        <?php
		$current_settings=get_option("wpnicedit_settings");
		$niceeditor_url=get_option("siteurl")."/".PLUGINDIR."/".NICEDITPATH;
		
		?>
        
        <div class="wrap">
		
            <h2>Wp NicEdit Settings</h2>
            <form method="post" action="">
            <table class="form-table">
            <tr valign="top">
                    <th scope="row">
                          
                            <?php _e("Choose the Editor Setting");?>
                    </th>
                    <td>Default<br />
                        <input type="radio" name="wpnicedit_settings"   value="default" <?php if($current_settings=="default") echo "checked=\"checked\" checked";?> /><img src="<?php echo $niceeditor_url;  ?>/includes/default.png" />
						
							<br />
							
						<input type="radio" name="wpnicedit_settings"   value="fullpanel" <?php if($current_settings=="fullpanel") echo "checked=\"checked\" checked";?> /><img src="<?php echo $niceeditor_url;  ?>/includes/extended.png" /><br />Fullpanel
                    </td>
            </tr>
            
            <tr valign="top">
            <th colspan='2' scope='row'>
                    <input class ="sub" type="submit" name="wpnicedit-settings-submitted" value="<?php _e('Save Settings') ?> &raquo; " />
            </th>
            </tr>
            </table>
            </form>
        </div>
        <?php
    }

    //=============================================
    // admin options panel
    //=============================================
    function add_wpnic_settings_page() {
        if (function_exists('add_options_page')) {
          add_options_page('Wp Nic Edit settings', 'Wp Nic Edit settings', 10, __FILE__, array(&$this,'wpnic_options_page'));
        }
    }
   }       
    
       
   
?>