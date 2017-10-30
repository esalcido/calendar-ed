<?php

class Event{
	
private  $date;
private  $excerpt;
private  $image;
private $dow;
private $month;
private $dom;

function __construct($d, $ex, $im){
	$this->date = $d;
	$this->excerpt = $ex;
	$this->image = $im;
	$this->dow = date('D',strtotime($d));
	$this->month = date('M',strtotime($d));
	$this->dom = date('d',strtotime($d));
}



public function getDate(){
	return $this->date;
}
public function getExcerpt(){
	return $this->excerpt;
}
public function getImage(){

	if($this->image =="default-img"){
		$result = "/#";		
	}
	else
		$result = $this->image;
	return $result;
}

public function getDow(){
	 
	
	// switch ($this->dow){
	// 	case 0:
	// 		$dow="Mon";
	// 		break;
	// 	case 1:
	// 		$dow="Tues";
	// 		break;
	// 	case 2:
	// 		$dow="Wed";
	// 		break;
	// 	case 3:
	// 		$dow="Thu";
	// 		break;
	// 	case 4:
	// 		$dow="Fri";
	// 		break;
	// 	case 5:
	// 		$dow="Sat";
	// 		break;
	// 	case 6:
	// 		$dow="Sun";
	// 		break;
		
	// }
	return $this->dow;
}

public function getMonth(){
	//$month = date("m",strtotime($this->date));
	return $this->month;
}

public function getDom(){
	return $this->dom;
}

}//end class

?>