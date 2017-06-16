<?php 
error_reporting(E_ERROR);
ini_set('display_errors', 1);
include_once("database.class.php");
include_once("class.config.php");

class Orderdetails extends config{
	
	//public $database;
	
	function __construct() {
		if(!isset($_SESSION['ADMIN_NAME']) || (trim($_SESSION['ADMIN_NAME']) == ''))
		{
			$this->redirect('index.php');
			exit();
		}
	}
	
	function __destruct(){
		//parent::__construct();
		//$database->close;
	}
	
	public function getRecomandedPrice($stylecode){
		$database = new Database();
		$stylecode = $this->sanitize($stylecode);
		$sql = "SELECT selling_price FROM style_master WHERE style_code = '".$stylecode."'";
		
		$result = $database->query($sql);
		$data = $result->fetch_assoc();
		$result->close();
		$database->close();
		return $data['selling_price'];
	}
	
	public function getCustomizedRecomandedPrice($stylecode){
		$database = new Database();
		$stylecode = $this->sanitize($stylecode);
		$sql = "SELECT selling_price FROM customized_style WHERE style_code = '".$stylecode."'";
		
		$result = $database->query($sql);
		$data = $result->fetch_assoc();
		$result->close();
		$database->close();
		return $data['selling_price'];
	}
	
	public function getorderDetailByorderID($order_id) {
		$database = new Database();

        if($order_id){
			$sql = "select * from orderdetails where orderno='".$order_id."'"; 
			$result = $database->query($sql);
			$data = $result->fetch_assoc();
		}
		$result->close();
		$database->close();
		return $data;
	}
	
	public function checkOrderID($orderno){
		$database = new Database();
		
		$sql = "SELECT COUNT(*) AS total FROM `orderdetails` WHERE orderno = '".$orderno."'";
		
		$result = $database->query($sql);
		$data = $result->fetch_assoc();
		$result->close();
		$database->close();
		return $data;
	}
	
	public function getAll() {
		$database = new Database();
		$proAction = 'ORDALL';			
		
		$sql = "SELECT * FROM orderdetails ORDER BY modifiedon DESC";
		$result = $database->query($sql);
		$alldata = array();
		
		while($field = $result->fetch_assoc())
		{
			$alldata[] = $field;
		}
		$database->close();
		return $alldata;
	}
	
	public function getAll_order() {
		$database = new Database();
		$sql="SELECT * FROM orderdetails order by modifiedon desc";
		$result = $database->query($sql);
		$alldata = array();
		while($field = $result->fetch_assoc())
		{
			$alldata[] = $field;
		}
		$database->close();
		return $alldata;
		
	}
	
	public function getSuborderNumber($orderno) {
		$database = new Database();
	
		$orderno = $this->sanitize($orderno);
		$sql = "SELECT suborderno FROM suborder WHERE orderno = '$orderno'";		
		$result = $database->query($sql);
		$row_cnt = $result->num_rows;
		if($row_cnt == 0){
			$data = '';
		}
		$data = $result->fetch_assoc();
		$database->close();
		return $data;
	}
	
	public function getById($orderno) {
		$database = new Database();
	
		// Initialize result array
		$result = array();
		$proAction = 'ORDGET';			
		$orderno = $this->sanitize($orderno);
		
		$sql = "SELECT CONCAT(c.name_first,' ',c.name_last,'(',c.cust_id,')') AS custname, o.order_type, o.orderno, o.customer_id, o.trial_date, o.delivery_due_date, o.order_date, GROUP_CONCAT(s.personname) AS personname, o.sale_person, o.alt_order_no, o.order_detail, o.orderstatus, s.sale_amount1, s.discount_amount1, s.netamount, p.received_amount FROM orderdetails o INNER JOIN customer c ON o.customer_id = c.cust_id LEFT JOIN salesperson s ON FIND_IN_SET(s.id,o.sale_person) LEFT JOIN (SELECT orderno, CONVERT(SUM(IFNULL(sale_amount,0)), DECIMAL(17,2)) AS sale_amount1, CONVERT(SUM(CASE WHEN discount_type = 'Percentage' THEN (IFNULL(sale_amount,0) * IFNULL(discount_amount,0)/100) ELSE IFNULL(discount_amount,0) END), DECIMAL(17,2)) AS discount_amount1, CONVERT(SUM(CASE WHEN discount_type = 'Percentage' THEN IFNULL(sale_amount,0) - (IFNULL(sale_amount,0) * IFNULL(discount_amount,0)/100) ELSE IFNULL(sale_amount,0) - IFNULL(discount_amount,0) END), DECIMAL(17,2)) AS netamount FROM suborder GROUP BY orderno) s ON s.orderno = o.orderno LEFT JOIN (SELECT SUM(received_amount) AS received_amount, orderno FROM `payment` GROUP BY orderno) p ON p.orderno = o.orderno WHERE o.orderno = '".$orderno."' GROUP BY o.orderno";
		//echo $sql;die();
		$result = $database->query($sql);
		$data = $result->fetch_assoc();
		$database->close();
		return $data;
	}
	
	public function get_order_payemt_amount($orderno)
	{
		$database = new Database();
		$orderno = $this->sanitize($orderno);
		$sql = "SELECT o.orderno, o.customer_id, s.original_amount, s.discount_amount, s.sale_amount, p.received_amount FROM orderdetails o LEFT JOIN (SELECT suborderno, orderno, IFNULL(SUM(original_amount),0.00) AS original_amount, IFNULL(SUM(discount_amount),0.00) AS discount_amount, IFNULL(SUM(sale_amount),0.00) AS sale_amount FROM suborder GROUP BY orderno) s ON o.orderno = s.orderno LEFT JOIN (SELECT orderno, IFNULL(SUM(received_amount),0.00) AS received_amount FROM payment GROUP BY orderno) p ON o.orderno = p.orderno WHERE o.orderno = '".$orderno."' GROUP BY o.orderno";
		$result = $database->query($sql);
		$data = $result->fetch_assoc();
		return $data;
	}
	
	public function deleteOrder($order_no){
		$database = new Database();
		$delorderno = $this->sanitize($order_no);
		
		$ipaddress 			= $this->sanitize($_SERVER['REMOTE_ADDR']);
		$createdby 			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$createdon 			= date('Y-m-d H:i:s');
		$modifiedby			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$modifiedon			= date('Y-m-d H:i:s');
		$sql_log = "INSERT INTO orderdetails_log SELECT id, order_type, orderno, customer_id, trial_date, delivery_due_date, order_date, sale_person, alt_order_no, order_detail, orderstatus, createdon, createdby, '".$modifiedon."', '".$modifiedby."', '".$ipaddress."', flag FROM orderdetails WHERE orderno =  '".$order_no."'";
		$result_log = $database->query($sql_log);
		
		
	    $sqlorderupdate = "UPDATE orderdetails SET flag = '0' WHERE orderno = '$delorderno'";
		$database->query($sqlorderupdate);
		$database->close();
	}

	public function save() {
		$database = new Database();
				
        $order_type			= $this->sanitize($_POST["order_type"]);
		$orderno 			= $this->sanitize($_POST["orderno"]);
		$customer_id 		= $this->sanitize($_POST["customer_id"]);
		$order_detail 		= $this->sanitize($_POST["order_detail"]);
		
		$order_date			= $this->sanitize($_POST["order_date"]);
		$trial_date 		= $this->sanitize($_POST["trial_date"]);
		$delivery_due_date 	= $this->sanitize($_POST["delivery_due_date"]);
		
		$sale_person1		= $this->sanitize($_POST["sale_person"]);
		$sale_person		= implode(',',$sale_person1);
		$alt_order_no		= $this->sanitize($_POST["alt_order_no"]);
		$orderstatus		= $this->sanitize($_POST["orderstatus"]);
		
		$ipaddress 			= $this->sanitize($_SERVER['REMOTE_ADDR']);
		$createdby 			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$createdon 			= date('Y-m-d H:i:s');
		$modifiedby			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$modifiedon			= date('Y-m-d H:i:s');
		
		$submit = $this->sanitize($_POST["submit"]);
		
        if($submit == 'SAVE'){
			$proAction = 'ORDINSERT';
			$sqlorderinsert = "INSERT INTO orderdetails(order_type, orderno, customer_id, trial_date, delivery_due_date, order_date, sale_person, alt_order_no, order_detail,  createdon, createdby, modifiedon, modifiedby, ipaddress) VALUES ('".$order_type."', '".$orderno."', '".$customer_id."', '".$trial_date."', '".$delivery_due_date."', '".$order_date."', '".$sale_person."', '".$alt_order_no."', '".$order_detail."', '".$createdon."', '".$createdby."', '".$modifiedon."', '".$modifiedby."', '".$ipaddress."')";
			
			if($database->query($sqlorderinsert) === TRUE){
				$order_id = $database->insert_id;
				$_SESSION['msgD'] = 'Order data inserted successfully';
			}
			
		}
		
		if($submit == 'UPDATE'){
			$sql_log = "INSERT INTO orderdetails_log SELECT id, order_type, orderno, customer_id, trial_date, delivery_due_date, order_date, sale_person, alt_order_no, order_detail, orderstatus, createdon, createdby, '".$modifiedon."', '".$modifiedby."', '".$ipaddress."', flag FROM orderdetails WHERE orderno =  '".$orderno."'";
			//echo $sql_log; exit;
			$result_log = $database->query($sql_log);
		
			$sqlorderupdate = "UPDATE orderdetails SET order_type='".$order_type."', trial_date='".$trial_date."', delivery_due_date='".$delivery_due_date."', order_date='".$order_date."', sale_person='".$sale_person."', alt_order_no='".$alt_order_no."', order_detail='".$order_detail."', orderstatus='".$orderstatus."', modifiedon='".$modifiedon."', modifiedby='".$modifiedby."', ipaddress='".$ipaddress."' WHERE orderno='".$orderno."'";
			//return $sqlorderupdate;
			if($database->query($sqlorderupdate) == TRUE){
				$msgD = 'Order data updated successfully';
				return $msgD;
			}
		}
		
		$database->close();
		$this->redirect('orderManage.php');
	}
	
	/***************************************************************************************************************************************/
	/******************************************************** Payment Details **************************************************************/
	/***************************************************************************************************************************************/
	
	public function getPaymentInfoById($id) {
		$database = new Database();
		
		$sql = "SELECT * FROM payment WHERE id = '".$id."'";
		$result = $database->query($sql);
		
		$field = $result->fetch_assoc();
		$result->close();
		$database->close();
		return $field;
	}
	
	public function getAllPaymentByOrderno($orderno) {
		$database = new Database();
		
		$sql = "SELECT * FROM payment WHERE orderno = '".$orderno."'";
		$result = $database->query($sql);
		$alldata = array();
		
		while($field = $result->fetch_assoc())
		{
			$alldata[] = $field;
		}
		$database->close();
		return $alldata;
	}
	
	public function savePaymentDetails() {
		$database = new Database();		   
        
		$payment_date 		= strtotime($_POST["payment_date"]);
		$payment_date 		= $this->sanitize(date('Y-m-d',$payment_date));
		
		$orderno 			= $this->sanitize($_POST["orderno"]);
		$suborder 			= $this->sanitize($_POST["suborder"]);
		$payment_mode 		= $this->sanitize($_POST["payment_mode"]);
		
		$received_amount 	= $this->sanitize($_POST["received_amount"]);
		$remarks 			= $this->sanitize($_POST["remarks"]);
		
		$ipaddress 			= $this->sanitize($_SERVER['REMOTE_ADDR']);
		$createdby 			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$action_date 		= date('Y-m-d H:i:s');
		
		$submit = $this->sanitize($_POST["submit"]);
		
        $sql = "INSERT INTO payment(orderno,suborderno, payment_date, payment_mode, received_amount, remarks, ipaddr, action_date, createdby) VALUES ('$orderno', '$suborder', '$payment_date', '$payment_mode', '$received_amount', '$remarks', '$ipaddress', '$action_date', '$createdby')";
		//echo $sql;die();
		$result = $database->prepare($sql);
		if($result->execute()){
			$msg = 'OK';
		}else{
			$msg = $database->error;
		}
		$result->close();
		$database->close();
		return $msg;
	}
	
	public function updatePaymentDetails() {
		$database = new Database();		   
        $suborderno			= $this->sanitize($_POST["suborderno"]);
		$payment_date 		= strtotime($_POST["payment_date"]);
		$payment_date 		= $this->sanitize(date('Y-m-d',$payment_date));
		
		$id 				= $this->sanitize($_POST["id"]);
		$payment_mode 		= $this->sanitize($_POST["payment_mode"]);
		
		$received_amount 	= $this->sanitize($_POST["received_amount"]);
		$remarks			= $this->sanitize($_POST["remarks"]);
		$ipaddress 			= $this->sanitize($_SERVER['REMOTE_ADDR']);
		$createdby 			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$action_date 		= date('Y-m-d H:i:s');
		
		$submit = $this->sanitize($_POST["submit"]);
		
		$sql_log = "INSERT INTO payment_log SELECT id, customer_id, orderno, suborderno, payment_date, payment_mode, received_amount, remarks, order_id, ipaddr, action_date, createdby FROM payment WHERE id='".$id."'";
		$result_log = $database->query($sql_log);
		
        $sql = "UPDATE payment SET suborderno = '".$suborderno."', payment_date='".$payment_date."', payment_mode='".$payment_mode."', received_amount='".$received_amount."', remarks='".$remarks."', ipaddr='".$ipaddr."', action_date='".$action_date."', createdby='".$createdby."' WHERE id='".$id."'";
		//echo $sql;die();
		$result = $database->prepare($sql);
		if($result->execute()){
			$msg = 'OK';
		}else{
			$msg = $database->error;
		}
		$result->close();
		$database->close();
		return $msg;
	}
	
	public function deletePaymentDetails() {
		$database = new Database();		   
        
		$id = $this->sanitize($_POST["id"]);
		
        $sql = "DELETE FROM payment WHERE id='".$id."'";
		//echo $sql;die();
		$result = $database->prepare($sql);
		if($result->execute()){
			$msg = 'OK';
		}else{
			$msg = $database->error;
		}
		$result->close();
		$database->close();
		return $msg;
	}
	/*******************************************************************************************************************************************************/
	/********************************************************************** Sub Order Details **************************************************************/
	/*******************************************************************************************************************************************************/
	
	public function getSuborderById($suborderno) {
		$database = new Database();
		
		$suborderno = $this->sanitize($suborderno);
	
		$sql = "SELECT CONCAT(c.name_first,' ',c.name_last,'(',c.cust_id,')') as custname, o.orderno, o.order_date, s.* FROM suborder s INNER JOIN orderdetails o ON s.orderno = o.orderno INNER JOIN customer c ON c.cust_id = o.customer_id WHERE s.suborderno = '".$suborderno."'";
		//echo $sql;die();
		$result = $database->query($sql);
		$data = $result->fetch_assoc();
		
		$result->close();
		$database->close();
		return $data;
	}
	
	public function getAllSuborder($orderno)
	{
		$database 	= new Database();
		$array 		= array();
		$orderno 	= $this->sanitize($orderno);
		
		$sql="SELECT suborderno, orderno, style_ref, sale_amount, trial_date, delivery_due_date, discount_type, (CASE WHEN discount_type = 'Percentage' THEN CONVERT((sale_amount * discount_amount/100), DECIMAL(17,2)) ELSE CONVERT(discount_amount, DECIMAL(17,2)) END) AS discount_amount, substatus, (CASE WHEN discount_type = 'Percentage' THEN CONVERT(sale_amount - (sale_amount * discount_amount/100), DECIMAL(17,2)) ELSE CONVERT((sale_amount - discount_amount), DECIMAL(17,2)) END) AS netamount FROM suborder WHERE orderno = '".$orderno."'";
		//echo $sql; die();
		$result = $database->query($sql);
		while($field = $result->fetch_assoc()){
			$array[]=$field;
		}
		return $array;		
	}
	
	public function get_all_suborder($sub)
	{
		$database = new Database();
		$sub=implode(",",array_map('intval', $sub));
		$sql="Select * from suborder where orderno in ($sub)";
		$result = $database->query($sql);
		$array=array();
		while($field = $result->fetch_assoc()){
			
			$array[$field['orderno']][]=$field;		
			
		}
		return $array;		
	}
	
	public function savesuborder(){
		$database = new Database();
	//task:task,style_ref_type:style_ref_type,customized_style_ref_type:customized_style_ref_type,customized_style_ref:customized_style_ref,style_code:style_code,description:description,style_group_code:style_group_code,designer_code:designer_code,cost_price:cost_price,selling_price:selling_price,orderno:sorderno,details:details,style_ref:style_ref,discount_type:discount_type,discount_amount:discount_amount,sale_amount:sale_amount,substatus:substatus,trial_date:trial_date,delivery_due_date:delivery_due_date,submit:submit
	
		$id = $this->sanitize($_POST["id"]);
		
		$style_ref_type				= $this->sanitize($_POST["style_ref_type"]);
		$customized_style_ref_type	= $this->sanitize($_POST["customized_style_ref_type"]);
		$customized_style_ref		= $this->sanitize($_POST["customized_style_ref"]);
		
		
		
		
        $orderno			= $this->sanitize($_POST["orderno"]);
		$suborderno 		= $this->sanitize($_POST["suborderno"]);
		$substatus			= $this->sanitize($_POST["substatus"]);		
		$delivery_due_date	= $this->sanitize($_POST["delivery_due_date"]);
		$trial_date			= $this->sanitize($_POST["trial_date"]);
		$discount_type		= $this->sanitize($_POST["discount_type"]);
		$discount_amount 	= $this->sanitize($_POST["discount_amount"]);
		$sale_amount		= $this->sanitize($_POST["sale_amount"]);
		$details			= $this->sanitize($_POST["details"]);
		
		$ipaddress			= $this->sanitize($_SERVER['REMOTE_ADDR']);
		$createdby			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$createdon			= date('Y-m-d H:i:s');
		$modifiedby			= $this->sanitize($_SESSION['ADMIN_NAME']);
		$modifiedon			= date('Y-m-d H:i:s');
		
		$submit = $this->sanitize($_POST["submit"]);
		
        if($submit == 'PROCEED'){
			
			if($style_ref_type == '1'){
				$style_ref 			= $this->sanitize($_POST["style_ref"]);
			}else if (($style_ref_type == '0') && ($customized_style_ref_type == '1')){
				$style_ref 			= $this->sanitize($_POST["customized_style_ref"]);
			}else{
				//imagename:imagename,imagelocation:imagelocation
				$style_ref			= $this->sanitize($_POST["style_code"]);
				$description		= $this->sanitize($_POST["description"]);
				$style_group_code	= $this->sanitize($_POST["style_group_code"]);
				$designer_code		= $this->sanitize($_POST["designer_code"]);
				$cost_price			= $this->sanitize($_POST["cost_price"]);
				$selling_price		= $this->sanitize($_POST["selling_price"]);
				$imagename 			= $this->sanitize($_POST["imagename"]);
				$imagelocation 		= $this->sanitize($_POST["imagelocation"]);
				$this->saveCustomizedStyle($style_ref,$description,$style_group_code,$designer_code,$cost_price,$selling_price,$imagename,$imagelocation);			
			}
			
			$sql="Select suborderno from suborder where orderno='$orderno' order by id DESC limit 0,1";
			$result = $database->query($sql);
			$array=array();
			$field = $result->fetch_assoc();
			if($field && !empty($field))
			{
				$suborderno=$field['suborderno'];
				$sub_array=explode('-',$suborderno);
				if(count($sub_array)>1)
				{
					$tot=count($sub_array)-1;
					$num=(int)$sub_array[$tot];
					$num=$num+1;
					$suborderno=$orderno.'-'.$num;
				}
				else{
					$suborderno=$orderno.'-1';
				}
				
			}
			else{
				
				$suborderno=$orderno.'-1';
			}
			
			$sql = "INSERT INTO suborder(suborderno, orderno, style_ref, sale_amount, trial_date, delivery_due_date, discount_type, discount_amount, details, substatus, createdon, createdby, modifiedon, modifiedby, ipaddress) VALUES ('".$suborderno."', '".$orderno."', '".$style_ref."', '".$sale_amount."', '".$trial_date."', '".$delivery_due_date."', '".$discount_type."', '".$discount_amount."', '".$details."', '".$substatus."', '".$createdon."', '".$createdby."', '".$modifiedon."', '".$modifiedby."', '".$ipaddress."')";
		}
		
		if($submit == 'UPDATE'){
			$sql_log = "INSERT INTO suborder_log SELECT id, suborderno, orderno, style_ref, sale_amount, trial_date, delivery_due_date, discount_type, discount_amount, details, substatus, createdon, createdby, '".$modifiedon."', '".$modifiedby."', '".$ipaddress."' FROM suborder WHERE suborderno='".$suborderno."'";
			$result_log = $database->query($sql_log);
			
			$sql = "UPDATE suborder SET style_ref='".$style_ref."', sale_amount='".$sale_amount."', trial_date='".$trial_date."', delivery_due_date='".$delivery_due_date."', discount_type='".$discount_type."', discount_amount='".$discount_amount."', details='".$details."', substatus='".$substatus."', modifiedon='".$modifiedon."', modifiedby='".$modifiedby."', ipaddress='".$ipaddress."' WHERE suborderno='".$suborderno."'";
		}
		
		//echo $sql; exit();
		$result = $database->prepare($sql);
		if($result->execute()){
			//$_SESSION['msgD'] = 'Suborder Data processed successfully';
			$msgD = 'OK';
		}else{
			$msgD = $database->error;
		}
		$result->close();
		$database->close();
		return $msgD;
	}
	
	public function saveCustomizedStyle($style_code,$description,$style_group_code,$designer_code,$cost_price,$selling_price,$imagename,$imagelocation){
		$database = new Database();		   
        
		$ipaddr 		= $this->sanitize($_SERVER['REMOTE_ADDR']);
		$modifiedby 	= $createdby = $this->sanitize($_SESSION['ADMIN_NAME']);
		$createddate 	= $modifieddate = date('Y-m-d H:i:s');
		
		$submit = $this->sanitize($_POST["submit"]);
		
        $sql = "INSERT INTO customized_style(style_code, description, style_group_code, designer_code, creation_date, cost_price, selling_price, imagename, imagelocation, createdby, createddate, modifieddate, modifiedby, ipaddr) VALUES ('".$style_code."', '".$description."', '".$style_group_code."', '".$designer_code."', '".date('Y-m-d')."', '".$cost_price."', '".$selling_price."', '".$imagename."', '".$imagelocation."', '".$createdby."', '".$createddate."', '".$modifieddate."', '".$modifiedby."', '".$ipaddr."')";
		//echo $sql;die();
		$result = $database->prepare($sql);
		if($result->execute()){
			$msg = 'OK';
		}else{
			$msg = $database->error;
		}
		$result->close();
		$database->close();
	}
	
	public function moveToRegularStyle($id){
		$database = new Database();
	    
		$id = $this->sanitize($id);
	   	$sql1 = "INSERT INTO customized_style_log SELECT * FROM customized_style WHERE id = '".$id."'";
		$result1 = $database->prepare($sql1);
		$success1 = $result1->execute();
		$result1->close();
		if($success1){
			$sql2 = "INSERT INTO style_master SELECT * FROM customized_style WHERE id = '".$id."'";
			$result2 = $database->prepare($sql2);
			$success2 = $result2->execute();
			$result2->close();
			if($success2){
				$sql3 = "DELETE FROM customized_style WHERE id = '".$id."'";
				$result3 = $database->prepare($sql3);
				$success3 = $result3->execute();
				$result3->close();
			}
		}
		$database->close();
		if($success3){
			return true;
		}else{
			return false;
		}
	}
	
}

?>