<?php
require "dbconnect.php";


function getChildren(&$categories, $id) {
	
	$result = mysql_query("SELECT id FROM category WHERE parent_id='".$id."'");
	
	while ($row = mysql_fetch_array($result)) {
		$categories[] = $row['id'];
		getChildren($categories, $row['id']);
	}
}

//function getID($var, $from_date_range, $to_date_range) {
	$categories = array();
	getChildren($categories, $var, $from_date_range, $to_date_range);
/*	return $categories;
}*/

$categories = array();
getChildren($categories, 1);
echo implode(',',$categories);
echo '<pre>';
print_r($categories);
echo '</pre>';
?>
