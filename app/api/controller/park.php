<?php
class park {
	//THIS IS PSEUDOCODE TO EXPLAIN THE LOGIC!
	//YET TO BE FULLY STRUCTURED!!
	function checkParkTimeValidity($park){

		date_default_timezone_set('America/Chicago');
		$currTime = date('m/d/Y h:i:s');


		if (($currTime - $park->duration) <= $park->time){
			return 1;
		}
		else{
			return 0;
		}

		//check parktime + duration against timestamp
			//time validity

	}

	function checkParKValidity($park, $employee){

		//check user garage against employee garage
			//garage validity

		$parkValidity = checkParkTimeValidity($park);

		if (($parkValidity == 1)  && ($park->garage == $employee->garage)){
			return 1;
		}
		else{
			return 0;
		}

	}
}
?>