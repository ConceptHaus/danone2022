<?php
/**
 * Betheme Child Theme
 *
 * @package Betheme Child Theme
 * @author Muffin group
 * @link https://muffingroup.com
 */

/**
 * Child Theme constants
 * You can change below constants
 */

// white label

define('WHITE_LABEL', false);

/**
 * Enqueue Styles
 */

function mfnch_enqueue_styles()
{
	// enqueue the parent stylesheet
	// however we do not need this if it is empty
	// wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');

	// enqueue the parent RTL stylesheet

	if (is_rtl()) {
		wp_enqueue_style('mfn-rtl', get_template_directory_uri() . '/rtl.css');
	}

	// enqueue the child stylesheet

	wp_dequeue_style('style');
	wp_enqueue_style('style', get_stylesheet_directory_uri() .'/style.css');
}
add_action('wp_enqueue_scripts', 'mfnch_enqueue_styles', 101);

/**
 * Load Textdomain
 */

function mfnch_textdomain()
{
	load_child_theme_textdomain('betheme', get_stylesheet_directory() . '/languages');
	load_child_theme_textdomain('mfn-opts', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mfnch_textdomain');

function actionbarcustom()
{
$action_bar = mfn_opts_get('action-bar');

					echo"<div class ='socialblock'>";
					echo "<h3>Síguenos en:</h3>";
					get_template_part('includes/include', 'social');
					echo "</div>";
}
add_shortcode('actiobar_custom', 'actionbarcustom');


/**
* Auto login after registration.
*/
function ip_gravity_registration_autologin( $user_id, $user_config, $entry, $password ) {
// Only automatically login if we aren't *already* logged in
if ( ! is_user_logged_in() ) {
// Get the user data (for the login)
$user = get_userdata( $user_id );
// Sign the user in
wp_signon( array(
'user_login' => $user->user_login,
'user_password' => $password,
'remember' => false, // Don't set the remember cookie
) );
}
}
add_action( 'gform_user_registered', 'ip_gravity_registration_autologin', 10, 4 );
// Logout sin confirmacion
add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result) {
// Allow logout without confirmation
if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
$redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '';
$location = str_replace('&amp;', '&', wp_logout_url($redirect_to));;
header("Location: $location");
die;
}
}
//Logout redirect
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( 'https://institutodanone.org.mx/iniciar-sesion/' );
         exit();
}
//REMOVER BARRA DE HERRAMIENTA
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
 show_admin_bar(false);
}
}

add_filter( 'tribe_customizer_should_print_shortcode_customizer_styles', '__return_true' );



