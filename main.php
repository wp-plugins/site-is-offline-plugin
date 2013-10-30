<?php
/*
Plugin Name: Site Offline or Coming Soon
Version: 1.6.1
Plugin URI: http://wp-ecommerce.net/
Author: wpecommerce
Author URI: http://wp-ecommerce.net/
Description: Make safe changes to your site by enabling site offline mode with this plugin you'll be able to navigate your site normally but your regular visitor will se a site offline or coming soon page
*/

function cp_siteoffline_activate()
	{
		$options = array(
				'enabled' => false,
				'content' => NULL,
				'version' => 1.0
				);
		if ( get_option('sp_siteoffline_options') === false )
			add_option('sp_siteoffline_options',$options);
	}
function cp_siteoffline_options_page()
{
	add_submenu_page( 'options-general.php', 'Site Offline Mode Options', 'Site Offline Mode', 'manage_options', __FILE__, 'cp_siteoffline_options_page_content' );
}
function cp_siteoffline_options_page_content()
{
	
	$options = get_option('sp_siteoffline_options');
	
	
	if (!empty($_POST['cp_siteoffline_content'])){
		$options['content'] = stripslashes($_POST['cp_siteoffline_content']);
	
	}
	if ( !empty($_POST['cp_siteoffline_enabled']) )
		{
			if ( $_POST['cp_siteoffline_enabled'] == 'true' )
				$options['enabled'] = true;
			else
				$options['enabled'] = false;
		}
	update_option('sp_siteoffline_options',$options);
	include_once('site-offline-options.php');
}
function cp_siteoffline_message()
{
	$options = get_option('sp_siteoffline_options');
	if ( $options['enabled'] === false ) return;
	if ( !current_user_can('edit_posts') ){
		echo $options['content'];
		exit();
	}
}

/* The most effective would be init hook but then if the user logout, user may need to disable or 
 * delete the plugin for a succesful login again.
 * No effect would be on admin dashboard, so user can login by going to siturl.com/wp-admin
 * if the user have manage_options capabaility he can easily navigate,test,make changes without letting the general public know.
 * */ 
add_action('init','cp_siteoffline_activate');
add_action('admin_menu','cp_siteoffline_options_page');
if (!is_admin())
	add_action('send_headers','cp_siteoffline_message');


?>
