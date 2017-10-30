<?php
/*
Plugin Name: Calendar Ed
Description: Plugin that displays calendar on any page with a shortcode.  More features to come.
Author: Edward Salcido
Version: 0.1
*/
include 'ArrayList.inc';
include 'event.php';


//enqueue the style sheet
function add_styles(){
	//wp_register_style('ed-calendar-styles', '' , '','screen');

	wp_enqueue_style('ed-calendar-styles',plugin_dir_url('__FILE__').'/calendar-ed/css/calendar-style.css');
	wp_enqueue_style('google-font-Abrilfatface','https://fonts.googleapis.com/css?family=Italianno');

	
}

add_action('wp_enqueue_scripts', 'add_styles');




//add this plugin to the admin menu
add_action('admin_menu', 'calendar_ed_setup_menu');

function calendar_ed_setup_menu(){
	add_menu_page('Calendar Ed Page','Calendar Page','manage_options','calendar plugin','test_init' );
	add_options_page('My Plugin Options','calendar-ed','manage_options','calendar plugin','my_plugin_options');

	add_action('admin_init','register_my_plugin_settings');
}

function test_init(){
	test_handle_post();

?>
	<h1>Ed's Calendar</h1>
	<h2>Upload a File</h2>
	<!--form to handle the upload - The enctype value here is very important -->
	<form method="post" enctype="multipart/form-data">
		<input type='file' id='test_upload_pdf' name='test_upload_pdf' ></input>
		<?php submit_button('upload') ?>
	</form>
<?php

}

function test_handle_post(){
	//first check if the file appears on the $_FILES array
	if(isset($_FILES['test_upload_pdf'])){
		$pdf = $_FILES['test_upload_pdf'];

		//use the wp function to upload
		//test_upload_pdf corresponds to the position in the $_FILES array
		//0 means the content is not associated with any other posts
		$uploaded = media_handle_upload('test_upload_pdf', 0);
		//error checking using wp functions
		if(is_wp_error($uploaded)){
			echo "error uploading file: ".$uploaded->get_error_message();
		}
		else{
			echo "File upload successful.";
		}
	}
}

function register_my_plugin_settings(){
	register_setting('my-plugin-group', 'date');
	register_setting('my-plugin-group', 'image');

}

function my_plugin_options(){

	if(!current_user_can('manage_options')){
		wp_die( __('You do not have sufficient permissions to access this page.'));
	}

	// echo '<div class="wrap">';
	// echo '<p>Here is where the form would go if I actually had options.</p>';
	// echo '</div>';

?>
<div class="wrap">
	<h1>Calendar Ed</h1>
<form method="post" action="options.php">
	<?php settings_fields('my-plugin-group'); ?>
	<?php do_settings_sections('my-plugin-group'); ?>
	<table class="form-table" >
		<tr valign="top">
		<th scope="row" > date </th>
		<td><input type="text" name="date" value="<?php echo esc_attr(get_option('date')); ?>" /></td>
		</tr>

		<tr valign="top">
		<th scope="row" > image </th>
		<td><input type="text" name="image" value="<?php echo esc_attr(get_option('image')); ?>" /></td>
		</tr>
	</table>

	<?php submit_button(); ?>
</form>
</div>
<?php

	
}





function create_calendar_entry2(){

	ob_start();

	include '/views/calendar-entry.php';

	return ob_get_clean();
	

}

add_shortcode('calendar1','create_calendar_entry2');




?>



