<?php
	
	/*
	 * Plugin Name: WP Chat (product by <a target="_blank" href="http://jaxl.im">Jaxl Inc.</a>)
	 * Author: Abhinav Singh
	 * Plugin URI: http://abhinavsingh.com/blog/2010/07/introducing-wp-chat-xmpp-chat-plugin-for-wordpress
	 * Author URI: http://abhinavsingh.com/blog
	 * Description: WPChat is a simple easy to use communicator for websites with Instant Messaging, Social Networking and Sharing capabilities. It is a hosted solution provided by Jaxl and expects no pre-requisistes from your site servers.
	 * Version: 0.0.3
	*/
	
	define('WPCHAT_PLUGIN_VERSION', '0.0.3');

	class wpchat {
		
		public static function activatePlugin() {
			add_option("wpchat_version", WPCHAT_PLUGIN_VERSION);
		}
		
		public static function deactivatePlugin() {
			
		}
		
		public static function addAdminPanel() {
			add_options_page('WP Chat Admin', 'WP Chat', 8, 'wp-chat', array('wpchat', 'populateAdminPanel'));
		}
		
		public static function embedJaxlIM() {
			$js =<<<JS
<!-- Jaxl IM embed starts -->
<script type="text/javascript">
(function() {
var jaxlChat = document.createElement("script");
jaxlChat.type = "text/javascript";
jaxlChat.async = true;
jaxlChat.src = "http://jaxl.im/jaxl.js";
(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(jaxlChat);
})();
</script>
<!-- Jaxl IM embed ends -->
JS;
			echo $js;
		}
		
		public static function populateAdminPanel() {
			$html =<<<HTML
<style type="text/css">
#wpchatAdmin {
}
#wpchatAdmin h2 {
        font-size:25px;
        padding-bottom:5px;
        margin-bottom:5px;
}
#wpchatAdminMenu {
        background-color:#444;
        padding:10px 20px 0px;
        color:#FFF;
}
#wpchatAdminMenu li {
        font-size:14px;
        float:left;
        margin-bottom:0px;
        margin-right:10px;
        padding:0px 10px;
        cursor:pointer;
}
#wpchatAdminMenu li.selected {
        background-color:#FFF;
        color:#444;
}
#wpchatContainer {
        padding:10px;
}
</style>
<div id="wpchatAdmin">
	<h2>WP Chat Admin Panel</h2>
	<ul id="wpchatAdminMenu">
		<li class="selected">Getting Started</li>
		<div style="clear:both;"></div>
	</ul>
	<div id="wpchatContainer">
		<p>1. Register at Jaxl Inc. by clicking <a href="http://jaxl.im/register.php" target="_blank">here</a></p>
		<p>2. Submit your site by clicking <a href="http://jaxl.im/submitasite.php" target="_blank">here</a></p>
		<p>3. View detailed Jaxl IM <a href="http://jaxl.im/features.php" target="_blank">feature list</a></p>
		<p>4. View <a href="http://jaxl.im/dashboard.php" target="_blank">dashboard</a> for chat history and Jaxl IM configuration</p>
		<p>5. <a href="http://jaxl.im/contact.php" target="_blank">Contact</a> for support, feature request, bug filing or any other query you might have</p>
		<p>6. Check registered email account for further instructions</p>
		<p>7. Keep WP Chat plugin up-to-date as more features come right inside wordpress admin panel</p>
	</div>
</div>
HTML;
			echo $html;
		}
		
	}
	
	register_activation_hook(__FILE__, array('wpchat', 'activatePlugin'));
	register_deactivation_hook(__FILE__, array('wpchat', 'deactivatePlugin'));
	add_action('admin_menu', array('wpchat', 'addAdminPanel'));
	add_action('wp_footer', array('wpchat', 'embedJaxlIM'));

?>
