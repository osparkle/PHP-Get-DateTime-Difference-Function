<?php
/**
 * PHP Function: Get DateTime Difference Between Two Dates
 * and pluralize output
 *
 * Returns the difference in number of years, 
 * months, days, hours, minues and seconds
 *
 * @author Simeon Adedokun <femsimade@gmail.com>
 * @copyright (c) 2013, Simeon Adedokun
 * ====================================================
 * Created 30th November, 2013
 * Last modified 2nd December, 2020
 *
*/

/* 
* Pluralize Function
* This function pluralizes a regular noun that ends with 's'
* It is used in the getTimeDiff function below
*/

function pluralize($data,$suffix=""){

	if(!is_numeric($data)) {
		$plural = " N/A";
	}else {
		if($data <= 1){
			$plural = $data . " " . $suffix;
		}else {
			$plural = $data . " " . $suffix . "s";
		}
	}
	return $plural;
}
/*
* @param datetime1: the first date and time (format: Y-m-d H:i:s)
* @param datetime2: the second date and time (format: Y-m-d H:i:s)
*/
function getTimeDiff($datetime1, $datetime2) {

	$date1 = new DateTime($datetime1);

	$date2 = new DateTime($datetime2);

	$interval = date_diff($date1, $date2);

	$second = $interval -> format('%s');

	$minute = $interval -> format('%i');

	$hour = $interval -> format('%h');

	$day = $interval -> format('%d');

	$month = $interval -> format('%m');

	$year = $interval -> format('%y');

	if($year>0 && $month>0){

		$timediff = pluralize($year,"yr") . " " . pluralize($month,"month");

	}
	elseif($year>0 && $day>0){

		$timediff = pluralize($year,"yr") . " " . pluralize($day,"day");

	}
	elseif($year>0 && ($month<1 || $day<1)){

		$timediff = pluralize($year,"yr");

	}
	elseif($month>0 && $day>0){

		$timediff = pluralize($month,"month") . " " . pluralize($day,"day");

	}
	elseif($month>0 && $day<1){

		$timediff = pluralize($month,"month");

	}
	elseif($day>0 && $hour>0){

		$timediff = pluralize($day,"day") . " " . pluralize($hour,"hr");

	}
	elseif($day>0 && $hour<1){

		$timediff = pluralize($day,"day");

	}
	elseif($hour>0 && $minute>0){

		$timediff = pluralize($hour,"hr") . " " . pluralize($minute,"min");

	}
	elseif($hour>0 && $minute<1){

		$timediff = pluralize($hour,"hr");

	}
	elseif($minute>0 && $second>0){

		$timediff = pluralize($minute,"min");// . " " . pluralize($second,"sec");

	}
	elseif($minute>0 && $second<1){

		$timediff = pluralize($minute,"min");

	}
	else {

		$timediff = pluralize($second,"sec");

	}
	return $timediff;
}

?>
