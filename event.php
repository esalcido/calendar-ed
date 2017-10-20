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
		$result = "/img/";		
	}
	else
		$result = $this->image;
	return $result;
}
public function getDow(){
	 
	
	switch ($this->dow){
		case 0:
			$result="Mon";
			break;
		case 1:
			$result="Tues";
			break;
		case 2:
			$result="Wed";
			break;
		case 3:
			$result="Thu";
			break;
		case 4:
			$result="Fri";
			break;
		case 5:
			$result="Sat";
			break;
		case 6:
			$result="Sun";
			break;
		
	}
	return $result;
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