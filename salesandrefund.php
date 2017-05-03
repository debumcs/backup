<?php
public function get_totalsales_amount(){
		$database = new Database();
		$revenue = array();		
		$alldata = array();		
		
		$sql = "SELECT MONTHNAME(od.date) as MONTHNAME, IFNULL(SUM(od.amt), 0) as revenue FROM orderdetails od WHERE orderstatus IN(4) AND (DATE(od.date) BETWEEN DATE_FORMAT(NOW(), '%Y-01-01') AND DATE_FORMAT(NOW(), '%Y-%m-%d')) GROUP BY MONTHNAME(od.date)";
		
		//echo $sql; die();
		$stmt = $database->prepare($sql);
		if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $database->errno . ' ' . $database->error, E_USER_ERROR);
		}
		// Bind parameters. Types: s = string, i = integer, d = double,  b = blob //		
		// Execute statement //
		$stmt->execute();	 
		// Fetch result to array //
		$result = $stmt->get_result();
         while($field = $result->fetch_assoc()){
			$alldata[] = $field['revenue'];					
		}		
	    //$alldata[] = implode(',',$revenue);
			
		$stmt->close();
		$database->close();		
		return $alldata;		
	}	
	?>