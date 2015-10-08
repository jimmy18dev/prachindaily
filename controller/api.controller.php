<?php
class APIController{
	
	// Error Message on Verify Fail or System Error.
	public function errorMessage($message){
		$data = array(
	      "apiVersion" 	=> "1.0",
	      "message" 	=> $message,
	      "execute" 	=> round(microtime(true)-StTime,4)."s"
	     );
	    
	    // JSON Encode and Echo.
	    echo json_encode($data);
	}

	// Success Message
	public function successMessage($message,$return,$dataset){
		$data = array(
	      "apiVersion" 	=> "1.0",
	      "message" 	=> $message,
	      "return"		=> $return,
	      "execute" 	=> round(microtime(true)-StTime,4)."s",
	      "data" 		=> array(
	      	'items' 		=> array($dataset),
	      ),
	    );
	    
	    // JSON Encode and Echo.
	    echo json_encode($data);
	}

	// Export to json
	public function exportJson($message,$dataset){
		$data = array(
			"apiVersion" => "1.0",
			"data" => array(
				// "update" => time(),
				"time_now" => date('Y-m-d H:i:s'),
				"message" => $message,
				"execute" => round(microtime(true)-StTime,4)."s",
				"totalFeeds" => floatval(count($dataset)),
				"items" => $dataset,
			),
		);

	    // JSON Encode and Echo.
	    echo json_encode($data);
	}

	// Page Location Analytics
	public function ExportLocationInfoJson($message,$dataset){
		foreach($dataset as $subArray){
			$datasets[] = array(
				'name' 		=> $subArray['amphur'],
				'y' 		=> floatval($subArray['percent']),
			);
		}

		$data = array(
			"apiVersion" => "1.0",
			"data" => array(
				"update" => time(),
				"message" => $message,
				"execute" => round(microtime(true)-StTime,4)."s",
				"totalFeeds" => floatval(count($dataset)),
				"items" => $datasets,
			),
		);

	    // JSON Encode and Echo.
	    echo json_encode($data);
	}















	// Analytics info Export ///////////////////////////////
	public function ExportRatingInfoJson($message,$dataset){
		$rating = array(0,0,0,0,0);

		// Turning multidimensional array into one-dimensional array
		foreach($dataset as $var){
			//echo $var['total'].' = '.$var['rating'].'/';

			$k = 0;
			for($i=5;$i>0;$i--){
				if($var['rating'] == $i)
					$rating[$k] = floatval($var['total']);

				$k++;
			}
		}

		$data = array(
			"apiVersion" => "1.0",
			"data" => array(
				"update" => time(),
				"message" => $message,
				"execute" => round(microtime(true)-StTime,4)."s",
				"totalFeeds" => floatval(count($dataset)),
				"dataset" => $rating,
			),
		);
		echo json_encode($data);
	}



	public function ExportPeopleAccessInfoJson($message,$dataset){
		$week_ago 	= array(0,0,0,0,0,0,0);
		$week 		= array(0,0,0,0,0,0,0);

		$begin 		= new DateTime(date('Y-m-d', strtotime('-13 days', strtotime(date('Y-m-d')))));
		$end 		= new DateTime(date('Y-m-d H:i:s'));

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		$loop = 0;
		foreach($period as $dt){

			if($loop < 7){
				if($dt->format("l") == "Sunday")
					$day_name = "อาทิตย์";
				else if($dt->format("l") == "Monday")
					$day_name = "จันทร์";
				else if($dt->format("l") == "Tuesday")
					$day_name = "อังคาร";
				else if($dt->format("l") == "Wednesday")
					$day_name = "พุธ";
				else if($dt->format("l") == "Thursday")
					$day_name = "พฤหัสบดี";
				else if($dt->format("l") == "Friday")
					$day_name = "ศุกร์";
				else if($dt->format("l") == "Saturday")
					$day_name = "เสาร์";
				else
					$day_name = "n/a";

				$dayname[] = $day_name;
			}

			foreach($dataset as $var){
				if($dt->format("Y-m-d") == $var['date'])
					if($loop < 7)
						$week[$loop] = floatval($var['total']);
					else
						$week_ago[$loop-7] = floatval($var['total']);
			}

			$loop++;
		}

		$dataset_format[] = array(
			'name' => 'สัปดาห์นี้',
			'data' => $week_ago,
		);

		$dataset_format[] = array(
			'name' => 'สัปดาห์ที่แล้ว',
			'data' => $week,
		);

		$data = array(
			"apiVersion" 	=> "1.0",
			"data" 			=> array(
				"update" 		=> time(),
				"message" 		=> $message,
				"execute" 		=> round(microtime(true)-StTime,4)."s",
				"totalFeeds" 	=> floatval(count($dataset)),
				"dayname" 		=> $dayname,
				"dataset" 		=> $dataset_format,
			),
		);
		echo json_encode($data);
	}
}
?>