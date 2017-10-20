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
}

add_action('wp_enqueue_scripts', 'add_styles');




//add this plugin to the admin menu
add_action('admin_menu', 'calendar_ed_setup_menu');

function calendar_ed_setup_menu(){
	add_menu_page('Calendar Ed Page','Calendar Page','manage_options','calendar plugin','test_init' );
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


function create_calendar_entry(){



//$date = date_create("2017-10-16");
$ev1 = new Event("2017-10-16","this is the excerpt","/wp-content/uploads/2017/10/oct-20-olounge-flyer-final-2.png");
$ev2 = new Event("2017-10-18","Fuckin ay","default-img");
$ev3 = new Event("2017-10-21","trip[ ouyr","default-img");

$events = new ArrayList();
$events->add($ev1);
$events->add($ev2);
$events->add($ev3);


for($i=0;$i < $events->size() ;$i++){
//foreach($events as $x){
?>

<div class="row" >
          <div class="event-container">
            <div class="event-body">
              <div class="event-excerpt img-fluid"><p> <?=  $events->get($i)->getExcerpt();  ?></p></div>
              <div class="event-featured-img"><img src=<?= $events->get($i)->getImage(); ?> class="img-fluid" width="300px" height="400px"></div>
            </div>
            <div class="event-date"> 
              <center><p><b style="color:black;"><?= $events->get($i)->getDow(); ?></b> <?= $events->get($i)->getMonth(); ?> <b><h2><?= $events->get($i)->getDom();  ?></h2></b></p></center>
            </div>
 </div>
 

<?php
	}//end of for loop
?>
<div class="clear"></div>

<?php
}

add_shortcode('calendar','create_calendar_entry')

?>