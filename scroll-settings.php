<?php 
// create custom plugin settings menu
add_action('admin_menu', 'ac_scroll_create_menu');

function ac_scroll_create_menu() {

	//create new top-level menu
	add_menu_page('Ac Plugin Settings', 'Ac-Scroll', 'administrator', __FILE__, 'ac_scrl_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_myscrlsettings' );
}


function register_myscrlsettings() {
	//register our settings
	register_setting( 'ac-settings-group', 'background_color' );
	register_setting( 'ac-settings-group', 'font_color' );

}

function ac_scrl_settings_page() {
?>
<div class="wrap">
<h2>Ac-Scroll-Up</h2>

	<form method="post" action="options.php">

		<?php settings_fields( 'ac-settings-group' ); ?>
		<?php do_settings_sections( 'ac-settings-group' ); ?>
		
		<table class="form-table">	
			<tr valign="top">
			<th scope="row">Background-Color</th>
			<td><input type="text" class="color-field" name="background_color" value="<?php echo esc_attr( get_option('background_color') ); ?>" /></td>
			</tr>
			 
			<tr valign="top">
			<th scope="row">Font-Color</th>
			<td><input type="text" class="color-field" name="font_color" value="<?php echo esc_attr( get_option('font_color') ); ?>" /></td>
			</tr>		
		</table>
		
		<?php submit_button(); ?>

	</form>
</div>

<?php } ?>