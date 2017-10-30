<?php


//$date = date_create("2017-10-16");
$ev1 = new Event("2017-11-03","","/wp-content/uploads/2017/10/nov-3-olounge-flyer.png");
$ev2 = new Event("2017-11-17","","default-img");
$ev3 = new Event("2017-12-01","","default-img");

$events = new ArrayList();
$events->add($ev1);
$events->add($ev2);
$events->add($ev3);


?>
<div class="row" style="padding:20px;">
<center><h1 class="abril-fatface">Upcoming Events</h1></center>
</div>

<?php 
for($i=0;$i < $events->size() ;$i++){

$event = $events->get($i);
?>

<div class="row" >
          <div class="event-container">
            <div class="event-body upholstery">
            
              	<?php  if(  strcmp($event->getImage(),"/#" ) == 0): ?>	
              	  <div class="event-excerpt img-fluid">
              		<p> <?=  $event->getExcerpt();  ?></p>
              		<img src= <?php echo plugin_dir_url('__FILE__').'calendar-ed/img/40570-200.png'; ?> width="100px" height="200px" style="margin-left:31%;margin-top:-10%;" />
              	
              	<?php else:  ?>
              	<div >
              	<?php endif;  ?>
              	</div>
              	<div class="event-featured-img ">
              		<img src=<?= $event->getImage(); ?> class="img-fluid" width="300px" height="400px">

              	</div>
            </div>
            <div class="event-date"> 
              <center><p><b style="color:black;"><?= $event->getDow(); ?></b> <br><?= $event->getMonth(); ?> <b><h2><?= $event->getDom();  ?></h2></b></p></center>
            </div>
 </div>
 

<?php
	}//end of for loop
?>
<div class="clear"></div>

