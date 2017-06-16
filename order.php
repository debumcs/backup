<?php 
	session_start();
	error_reporting(E_ERROR);
	ini_set('display_errors', 1);
	
	require_once('class/class.orderdetails.php');
	require_once('class/class.customer.php');
	require_once('class/class.stylemaster.php');
	require_once('class/class.salesman.php');
	$objsalesman = new Salesman();
	$allsalesman = $objsalesman->getAll();
	
	$objstyle 	= new Stylemaster();
	$allstyle 	= $objstyle->getAll();
	
	$allCusStyle 	= $objstyle->getAllCustomized();
	
	$objord 	= new Orderdetails();
	$objcust 	= new Customer();
	
	$cust_id 	= $_GET["cust_id"];
	$action 	= $_GET["action"];
	$orderno 	= $_GET["orderno"];
	$msgD 		= '';
	
	if($action=="edit")
	{
		$data = $objord->getById($orderno);
        $btnvalue = "UPDATE";
	}
	else
	{
		$btnvalue = "SAVE";
		$custname = $objcust->getCustomerDetailsID($cust_id);
	}
	
	if($_REQUEST['checkOrderID']=='checkOrderID')
	{
		$orderno = $_POST['orderno'];
		$objsta = new Orderdetails();
		$data 	= $objsta->checkOrderID($orderno);
		
		if($data['total'] < 1){
			echo "1";
		}else{
			echo "0";
		}
		exit;
	}
	
	$database = new Database();
	
	if (!empty($orderno)) {
		$wheres = "and o.orderno not LIKE '".$orderno."'";
	}else{
		$wheres = '';
	}
	
	$sql = "SELECT o.orderno, CONCAT(c.name_first,' ',c.name_last,' (',c.cust_id,')') AS custname, c.cust_id, o.order_date, o.trial_date, 
o.delivery_due_date, o.order_type, s.personname, IFNULL(sa.sale_amount,0) AS sale_amount, IFNULL(sa.netamount,0) AS netamount, IFNULL(rc.received_amount,0) AS received_amount 
FROM orderdetails o INNER JOIN customer c ON o.customer_id = c.cust_id LEFT JOIN salesperson s ON o.sale_person = s.id 
LEFT JOIN (SELECT orderno, IFNULL(SUM(sale_amount),0) AS sale_amount, 
CONVERT(SUM(CASE WHEN discount_type = 'Percentage' THEN IFNULL(sale_amount,0) - (IFNULL(sale_amount,0) * IFNULL(discount_amount,0)/100) 
ELSE IFNULL(sale_amount,0) - IFNULL(discount_amount,0) END), DECIMAL(17,2)) AS netamount FROM suborder GROUP BY orderno) sa ON sa.orderno = o.orderno
LEFT JOIN (SELECT SUM(IFNULL(received_amount,0)) AS received_amount, orderno FROM payment GROUP BY orderno) rc ON rc.orderno = o.orderno where o.flag = '1' and c.cust_id = '".$cust_id."' ".$wheres." ORDER BY o.modifiedon DESC ";
	//echo $sql;die();
	
	$result = $database->query($sql);
	$alldata = array();
	while($field = $result->fetch_assoc())
	{
		$alldata[] = $field;
	}	
	
if(isset($_POST['submit']) && $_POST['submit'] == 'SAVE' )
{
	$objord->save();
	exit();
}

if(isset($_POST['submit']) && $_POST['submit'] == 'UPDATE' ){
	$successmsg = $objord->save();
	$_SESSION['msgD'] = $successmsg;
	$objord->redirect($_SERVER['HTTP_REFERER']);
	exit();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $PRO_TITLE;?> | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/datepicker.css">
     <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/minimal/orange.css">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"></link>	
    <link rel="stylesheet/less" type="text/css" href="side.less" />
	<link rel="stylesheet" href="dist/css/bootstrap-multiselect.css" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="dist/js/html5shiv.min.js"></script>
        <script src="dist/js/respond.min.js"></script>
    <![endif]-->
	<style>
	input[type=checkbox] {
		display: block;
	}
	.datepicker-dropdown{z-index:1151 !important;}
	</style>
	<script type="text/javascript" language="javascript">
		function check_order_id(orderno){
			if(orderno != ''){
				$.ajax({
					url: "order.php",
					type: 'POST',
					context: this,
					data: {checkOrderID:'checkOrderID',orderno:orderno},
					success: function(response){
						if(response == '1'){
							var check_referel = "<span class='refferal_success'>Valid ID!</span>";
						}else{
							var check_referel = "<span class='refferal_failure'>Order ID '"+orderno+"' is already exist!</span>";
							$('#orderno').val('');
						}
						$('#order_id_html').html(check_referel);					
					}
				});
			}else{
				$('#order_id_html').html('');
			}		
		}
		
		function calculateSaleAmount() {		
			var original_amount 	= parseFloat($("#original_amount").val());
			var discount 			= parseFloat($("#discount").val());
			
			if((original_amount != '' && discount != '') && (original_amount < discount )){
				alert('Discounted amount should be less than original amount!');
				document.getElementById('discount').value = '';
				document.getElementById('discount').focus();
				return false;
			}else{
				document.getElementById('sale_amount').value = original_amount - discount;
			}
		}
		
		function isDecimalNumber(evt, element)
		{			
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
			{
				status = "This field accepts numbers only.";
				return false;
			}else {
				var len = $(element).val().length;
				var index = $(element).val().indexOf('.');
				if (index > 0 && charCode == 46) {
					return false;
				}
				if (index > 0) {
					var CharAfterdot = (len + 1) - index;
					if (CharAfterdot > 3) {
						return false;
					}
				}

			}
			return true;
		}
		
		function checkIt(evt)
		{
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			{
				status = "This field accepts numbers only.";
				return false;
			}
			status = "";
			return true ;
		}
		
		function checkalphanumeric(evt)
		{
			evt = (evt) ? evt : event;
			var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :((evt.which) ? evt.which : 0));
			if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
				// alert("Enter letters only.");
				return false;
			}
			return true;
		}
		
		function validateorderform(){
			var order_date 			= $("#order_date").val();
			var trial_date 			= $("#trial_date").val();
			var delivery_due_date 	= $("#delivery_due_date").val();
			
			if(document.getElementById('order_type').value =='' ){
				alert('Please enter order type!');
				document.getElementById('order_type').focus();
				return false;
			}else if(document.getElementById('orderno').value =='' ){
				alert('Please enter order number!');
				document.getElementById('orderno').focus();
				return false;
			}else if(document.getElementById('order_date').value =='' ){
				alert('Please select order date!');
				document.getElementById('order_date').focus();
				return false;
			}else if(document.getElementById('trial_date').value =='' ){
				alert('Please select trial date!');
				document.getElementById('trial_date').focus();
				return false;
			}else if((document.getElementById('trial_date').value !='') && (Date.parse(order_date) > Date.parse(trial_date))){
				alert('Trial date should be greater than order date!');
				document.getElementById('trial_date').focus();
				return false;
			}else if(document.getElementById('delivery_due_date').value =='' ){
				alert('Please select delivery due date!');
				document.getElementById('delivery_due_date').focus();
				return false;
			}else if((document.getElementById('delivery_due_date').value !='') && (Date.parse(order_date) > Date.parse(delivery_due_date))){
				alert('Delivery due date should be greater than order date!');
				document.getElementById('delivery_due_date').focus();
				return false;
			}else if(document.getElementById('order_detail').value =='' ){
				alert('Please enter order detail!');
				document.getElementById('order_detail').focus();
				return false;
			}else{
				return true;
			}
		}		
	
	</script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
     
   <?php if(isset($_SESSION['msgD']) and $_SESSION['msgD'] != ''){echo '<div id="message">'.$_SESSION['msgD'].'</div>';} unset($_SESSION['msgD']);?>
   <div class="wrapper">

		<?php $objord->psheader(); ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php $objord->pssidebar(); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
            	<div class="col-md-12">
              		<div class="box box-warning">
                        <div class='box-header with-border'>
							<div class="col-md-12">
								<h3 class="box-title"><?php if($action == "edit"){ echo 'Edit Order';}else{echo 'New Order';} ?> </h3>
								<p><br />(Customer : <strong><?php if($action=="edit"){	echo $data['custname'];}else{echo $custname['salutation'].' '.$custname['name_first'].' '.$custname['name_last'].' ('.$custname['cust_id'].')';} ?></strong></p>
							</div>
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                            <form action="" name="userCreate" id="userCreate" method="post" >
							<div class="row">
							<input type="hidden" id="id" name="id" value="<?php echo $data['id']; ?>" />
							<input type="hidden" id="customer_id" name="customer_id" value="<?php if($action=="edit"){echo $data['customer_id'];}else{echo $cust_id;} ?>" />
								<div class="col-lg-12">
									
									<div class="col-lg-4">										
										<div class="form-group">
										  <label for="name">Order Number</label>
										  <input type="text" tabindex="1" class="form-control" <?php if($action == "edit"){ echo 'readonly="true"';}else{echo 'onblur="check_order_id(this.value);"';} ?> onKeyPress="return checkalphanumeric(event);" id="orderno" name="orderno" placeholder="Enter orderno" value="<?php if($action == "edit"){ echo $data['orderno'];} ?>" >
										  <p id="order_id_html"></p>
										</div>
									</div><!-- /.col -->
									
									<div class="col-lg-4">
										<div class="form-group">
											<label for="name">Order Type</label>
											<select id="order_type" class="form-control"  name="order_type" tabindex="2" >
											<option value="" selected="selected" disabled >Select Delivery Status</option>
											<option value="PD" <?php if($data['order_type']== 'PD'){echo 'selected';} ?>>Only for Stitching</option>
											<option value="RMO" <?php if($data['order_type']== 'RMO'){echo 'selected';} ?>>RMO (stitching and Ready Made Order)</option>
											<option value="ALT" <?php if($data['order_type']== 'ALT'){echo 'selected';} ?>>ALT ( Alteration)</option>
											</select>
										</div>
									</div><!-- /.col -->
									
									<div class="col-lg-4">										
										<div class="form-group">
											<label for="name">Old Order Number</label>
											<input type="text" readonly="true" tabindex="3" class="form-control" id="alt_order_no" name="alt_order_no" placeholder="Enter old order no" value="<?php echo $data['alt_order_no']; ?>">
										</div>			  
									</div><!-- /.col -->
									
								</div>
								
								<div class="col-lg-12">									
									<div class="col-lg-4">
										<div class="form-group">
											<label for="name">Order Date</label>
											<input type="text" tabindex="4" name="order_date" id="order_date" placeholder="click here for order date" value="<?php if($data['order_date']){echo $data['order_date'];}else{echo date('Y-m-d');} ?>" class="form-control datepicker" />
										</div><!-- /.form-group -->
									</div><!-- /.col -->
									
									<div class="col-lg-4">
										<div class="form-group">
											<label for="name">Trial Date</label>
											<input type="text" tabindex="5" name="trial_date" id="trial_date" placeholder="click here for order date" value="<?php if($data['trial_date']){echo $data['trial_date'];}else{echo date('Y-m-d');} ?>" class="form-control datepicker" />
										</div><!-- /.form-group -->
									</div><!-- /.col -->
									
									<div class="col-lg-4">
										<div class="form-group">
											<label for="name">Delivery Due Date</label>
											<input type="text" tabindex="6" name="delivery_due_date" id="delivery_due_date" placeholder="click here for order date" value="<?php if($data['delivery_due_date']){echo $data['delivery_due_date'];}else{echo date('Y-m-d');} ?>" class="form-control datepicker" />
										</div><!-- /.form-group -->
									</div><!-- /.col -->
								</div>
								
								<div class="col-lg-12">		
									<div class="col-lg-4">
										<div class="form-group">
											<label for="name">Sale Person </label>
											<div style="width:100%;">
											<?php $sale_person_array = explode(',',$data['sale_person']); ?>
											<select name="sale_person[]" tabindex="7" id="sale_person" multiple="multiple" style="width:100%;">
											<?php foreach($allsalesman as $salesman){?>
											<option value="<?php echo $salesman['id'];?>" <?php if (in_array($salesman['id'], $sale_person_array)){echo 'selected';} ?>><?php echo $salesman['personname']; ?></option>
											<?php } ?>
											</select>
											</div>
										</div>	
									</div><!-- /.col -->									
								</div>
								
								<div class="col-lg-12">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="name">Order Details</label>
											<textarea class="form-control" tabindex="8" id="order_detail" name="order_detail" placeholder="Enter order detail"><?php echo $data['order_detail']; ?></textarea>
										</div>	
									</div>
								</div>
								
							</div><!-- /.row -->
                           
                           <div class="row">
                              <div class="col-lg-12">
                                   <div class="form-group center">
                                      <input type="submit" tabindex="9" name="submit" id="submit" onclick="return validateorderform();" class="btn btn-warning left-10 btn-sm" value="<?php echo $btnvalue; ?>" />
									  <?php if($action == "edit"){ ?> <a href="order.php?cust_id=<?php echo $cust_id; ?>" class="btn btn-warning left-10 btn-sm">New Order</a> <a href="orderManage.php" class="btn btn-warning left-10 btn-sm">View All Order</a> <?php } ?>
                                   </div>
                               </div><!-- /.col -->
             				 </div><!-- /.row -->
                           </form>
                        </div><!-- /.box-body--> 
                     </div><!-- /.box--> 
                        
                </div><!-- /.col -->
              </div><!-- /.row -->
        </section><!--CONTENT-->
		<?php if(count($alldata) > 0){ ?>
		<section class="content">
            <div class="row">
			
            	<div class="col-md-12">
              		<div class="box box-warning">
						<div class='box-header with-border'>
							<h3 class="box-title">Other Order details</h3>
                        </div><!-- /.box-header -->
                <div class='box-body table-responsive'>
				<table class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>Order No</th>
						<th>Customer Name</th>
                        <th>Order Date</th>
						<th>Trial Date</th>
						<th>Order Type</th>
						<th>Sales Person</th>
						<th>Total Amount</th>
						<th>Balance Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php 			
					for($i=0; $i<count($alldata); $i++) { ?>	
						<tr id="<?php print $alldata[$i]['orderno']; ?>">
                            <?php if($alldata[$i]['status']=='1'){$status='Active';}else{$status='Inactive';}
							$id= $alldata[$i]['id'];
							?>
							<td><?php print $alldata[$i]['orderno']; ?></td>
							<td><a href="#" data-toggle="modal" data-target="#getCutomerbyId" onclick='getCutomerbyId("<?php print $alldata[$i]['cust_id']; ?>")'><?php print $alldata[$i]['custname']; ?></a></td>
							<td><?php print $alldata[$i]['order_date']; ?></td>
							<td><?php print $alldata[$i]['trial_date']; ?></td>
							<td><?php 
							if($alldata[$i]['order_type'] == 'PD'){echo 'Stitching Only';}
							elseif($alldata[$i]['order_type'] == 'RMO'){echo 'Ready Made';}
							elseif($alldata[$i]['order_type'] == 'ALT'){echo 'Alteration Only';}
							?></td>
							<td><?php print $alldata[$i]['personname']; ?></td>
							<td><?php print $alldata[$i]['netamount']; ?></td>
							<td><?php print (floatval($alldata[$i]['netamount']) - floatval($alldata[$i]['received_amount'])); ?></td>
							<td><a href="vieworder.php?orderno=<?php print $alldata[$i]['orderno']; ?>">View</a>&nbsp;|&nbsp;<a href="order.php?action=edit&cust_id=<?php print $alldata[$i]['cust_id']; ?>&orderno=<?php print $alldata[$i]['orderno']; ?>">Edit</a>&nbsp;|&nbsp;
							<a href="#" data-toggle="modal" data-target="#suborder" onclick='getSuborderForm("<?php print $alldata[$i]['orderno']; ?>","<?php print $alldata[$i]['trial_date']; ?>","<?php print $alldata[$i]['delivery_due_date']; ?>")'>Create Suborder</a>&nbsp;|&nbsp;<a href="#" onclick='getDeleteOrderNo("<?php print $alldata[$i]['orderno']; ?>")'>Delete</a>
							</td>							
						</tr>
					<?php	
						}
					?>
                    </tbody>
                </table>
                           
                          </div><!-- /.box-body--> 
                     </div><!-- /.box--> 
                        
                </div><!-- /.col -->
              </div><!-- /.row -->
        </section><!--CONTENT-->
		<?php } ?>
	</div><!-- /.content-wrapper -->
      
      
      <?php include('footer.php'); ?>

      <!-- Control Sidebar -->
      
    </div><!-- ./wrapper -->

<div class="modal fade" id="suborder" tabindex="-1" role="dialog" aria-labelledby="orderdetailsLabel">
	<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Create New Suborder</h4>
		</div>
		<div class="modal-body">
			
					<div class="row"  style="clear: both;">
						<fieldset class="fsStyle">
							<legend class="legendStyle">
								<a href="#">Style Selection</a>
							</legend>
							<input type="hidden" id="sorderno" name="sorderno" value="" />
							<div class="col-lg-4">
								<div class="form-group">
									<label for="name">Style Ref Type</label>
									<div style="width:100%;">
									<input type="radio" id="existing_type" name="style_ref_type" value="1" onclick="style_ref_type(this.value)" />Existing
									<input type="radio" id="customized_type" name="style_ref_type" value="0" onclick="style_ref_type(this.value)" />Customized
									</div>
								</div>	
							</div><!-- /.col -->
							
							<div style="width:100%;">
								<div class="col-lg-4" id="existing_type_ref" style="display:none;">
									<div class="form-group">
										<label for="name">Style Ref</label>
										<select id="style_ref" tabindex="2" class="form-control" name="style_ref" onchange="getRecomandedPrice(this.value);">
										<option value="" selected="selected">Select Style Ref</option>
										<?php for($si = 0; $si < count($allstyle); $si++){ ?>
										<option value="<?php echo $allstyle[$si]['style_code']; ?>"><?php echo $allstyle[$si]['style_code']; ?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								
								<div class="col-lg-4" id="customized_type_ref" style="display:none;">
									<div class="form-group">
										<label for="name">Customized Style Type</label>
										<div style="width:100%;">
										<input type="radio" id="customized_existing_type" name="customized_style_ref_type" value="1" onclick="customized_ref_type(this.value)" />Existing
										<input type="radio" id="customized_type" name="customized_style_ref_type" value="0" onclick="customized_ref_type(this.value)" />New
										</div>
									</div>	
								</div><!-- /.col -->
								
								<div class="col-lg-4" id="customized_type_ref_list" style="display:none;">
									<div class="form-group">
										<label for="name">Customized Style Ref</label>
										<select id="customized_style_ref" class="form-control" name="customized_style_ref" onchange="getCustomizedRecomandedPrice(this.value);">
										<option value="" selected="selected">Select Style Ref</option>
										<?php for($csi = 0; $csi < count($allCusStyle); $csi++){ ?>
										<option value="<?php echo $allCusStyle[$csi]['style_code']; ?>"><?php echo $allCusStyle[$csi]['style_code']; ?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								
							</div>
							</fieldset>
						</div>
						<div class="row" id="selectedstyle" style="display:none; clear: both;"></div>
						<div class="row" id="newcusomizedstyle" style="display:none; clear:both;">
						<fieldset class="fsStyle">
							<legend class="legendStyle">
								<a href="#">New Customized Style</a>
							</legend>

							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="name">Style Code</label><?php echo $MANDATORY; ?>
										<input type="text" class="form-control" id="style_code" name="style_code" placeholder="Enter Style Code" value="">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="name">Description</label><?php echo $MANDATORY; ?>
										<input type="text" class="form-control" rows="2" id="description" name="description" placeholder="Enter Description" value="" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="name">Style Group Code</label>
										<input type="text" class="form-control" id="style_group_code" name="style_group_code" placeholder="Enter style group code" value="">
									</div>
								</div>
							</div><!-- /.col -->
							
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="name">Designer Code</label>
										<input type="text" class="form-control" id="designer_code" name="designer_code" placeholder="Enter Designer Code" value="">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="name">Cost Price</label>
										<input type="text" onKeyPress="return isDecimalNumber(event,this);" class="form-control" id="cost_price" name="cost_price" placeholder="Enter cost price" onfocus="if(this.value=='0' || this.value=='0.00') this.value = ''" onblur="if(this.value=='')this.value = '0'" value="0">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="form-group">
										<label for="name">Recommended Selling Price</label>
										<input type="text" class="form-control" id="selling_price" name="selling_price" placeholder="Enter Selling Price" onKeyPress="return isDecimalNumber(event,this);" onfocus="if(this.value=='0' || this.value=='0.00') this.value = ''" onblur="if(this.value=='')this.value = '0'" value="0">
									</div>
								</div>
								
							</div><!-- /.col -->
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="name">Picture</label><?php echo $MANDATORY; ?>&nbsp;<font color='red'>(Allowed image formate : gif, jpeg, jpg, png)</font>
										<input type="file"  name="styleimage" id="styleimage" size="30" >
									</div>
								</div>
								<div class="col-lg-6" id="showstyleimages">
									
								</div>
							</div><!-- /.col -->
							
						</fieldset>
							
					   </div><!-- /.row -->
						
					<div class="row"  style="clear: both;">
						<fieldset class="fsStyle">
							<legend class="legendStyle">
								<a href="#">Sub-Order Details</a>
							</legend>
						<div class="row">
							<div class="col-lg-4">										
								<div class="form-group">
									<label for="name">Sale Amount</label>
									<input type="text" class="form-control" tabindex="3" id="sale_amount" name="sale_amount" onKeyPress="return isDecimalNumber(event,this);" onfocus="if(this.value=='0' || this.value=='0.00') this.value = ''" onblur="if(this.value=='')this.value = '0'" value="0" >
								</div>			  
							</div><!-- /.col -->
							
							<div class="col-lg-4">										
								<div class="form-group">
									<label for="name">Trial Date</label>
									<input type="text" class="form-control datepicker" tabindex="4" id="trial_date1" name="trial_date1" placeholder="Enter trial date" value="<?php echo date('Y-m-d'); ?>">
								</div>			  
							</div><!-- /.col -->
							
							<div class="col-lg-4">										
								<div class="form-group">
									<label for="name">Delivery Due Date</label>
									<input type="text" class="form-control datepicker" tabindex="5" id="delivery_due_date1" name="delivery_due_date1" placeholder="Delivery due date" value="<?php echo date('Y-m-d'); ?>">
								</div>			  
							</div><!-- /.col -->
							
						</div>
								
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label for="name">Discount Type </label>
									<div style="width:100%;">
									<input type="radio" id="discount_type" tabindex="6" name="discount_type" value="Amount">Amount
									<input type="radio" id="discount_type" tabindex="7" name="discount_type" value="Percentage">Percentage
									</div>
								</div>
							</div><!-- /.col -->
							
							<div class="col-lg-4">										
								<div class="form-group">
									<label for="name">Discount Value</label>
									<input type="text" class="form-control" tabindex="8" onKeyPress="return isDecimalNumber(event,this);" id="discount_amount" name="discount_amount" placeholder="Enter Discount Amount" onfocus="if(this.value=='0' || this.value=='0.00') this.value = ''" onblur="if(this.value=='')this.value = '0'" value="0">
								</div>			  
							</div><!-- /.col -->
						</div>
						
						<div class="row">
							<div class="col-lg-12">										
								<div class="form-group">
									<label for="name">Order Detail</label>
									<textarea tabindex="9" id="details" name="details" class="form-control" placeholder="Order Detail" ></textarea>
								</div>									  
							</div><!-- /.col -->
						</div>
						</fieldset>
							
					  </div><!-- /.row -->
					
		</div>
		<div class="modal-footer">
			<input type="button" class="btn btn-primary" tabindex="10" name="addsuborder" id="addsuborder" onclick="addsuborder();" value="Submit" />
			<button type="button" class="btn btn-default" tabindex="11" data-dismiss="modal">Close</button>
		</div>
	
	</div>	
	</div>
</div>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="dist/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="dist/js/jquery.form.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script src="bootstrap/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {	
		$('.datepicker').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
		
		var today = new Date();
		$('.datepicker input').val(today);
		
		$("#order_type").on("change", function () {
			if ($(this).val() === "ALT"){
				$('#alt_order_no').prop('readonly',false);
			}else{
				$('#alt_order_no').prop('readonly',true);
				$("#alt_order_no").val('');
			}
		});
		
	});
	$.widget.bridge('uibutton', $.ui.button);
	


function getSuborderForm(orderno,trial_date,delivery_due_date){
	$("#sorderno").val(orderno);
	$("#trial_date1").val(trial_date);
	$("#delivery_due_date1").val(delivery_due_date);
	return false;
}

function getDeleteOrderNo(order_no){
		
	if(confirm('Do you want to delete this order?')){
		var rows = $('table.table tr');
		var tablerow = rows.filter('#'+order_no+'');
		tablerow.fadeOut("slow");
		$.ajax({
			type: "post",
			url: "ajax_suborder.php",
			data: {task:'delOrderbyno',order_no:order_no},
			success: function(data){
				return false;
			}
		});
	}
	return false;
}

$('#styleimage').change(function(e){
	var file = this.files[0];
	var form = new FormData();
	form.append('image', file);
	form.append('task', 'fileupload');
	$.ajax({
		url : "ajax_suborder.php",
		type: "POST",
		cache: false,
		contentType: false,
		processData: false,
		data : form,
		success:function(data){
			$("#showstyleimages").html('');
			$("#showstyleimages").html(data);
			return false;
		}
	});
});

function customized_ref_type(val2){
	if(val2 == '1'){
		$('#customized_style_ref').prop('selectedIndex',0);
		$("#customized_type_ref_list").show();
		$("#newcusomizedstyle").hide();
		$("#selectedstyle").hide();
		$('#sale_amount').val('0');
	}else{
		$('#customized_style_ref').prop('selectedIndex',0);
		$("#customized_type_ref_list").hide();
		$("#newcusomizedstyle").show();
		$("#selectedstyle").hide();
		$('#sale_amount').val('0');
	}
}

function style_ref_type(val){
	//alert(val);
	if(val == '1'){
		$("#existing_type_ref").show();
		$("#customized_type_ref").hide();
		$('input[name="customized_style_ref_type"]').attr('checked', false);
		$("#newcusomizedstyle").hide();
		$("#selectedstyle").hide();
		$("#customized_type_ref_list").hide();
		$('#sale_amount').val('0');
	}else{
		$("#existing_type_ref").hide();
		$("#customized_type_ref").show();
		$('#style_ref').prop('selectedIndex',0);
		$('#sale_amount').val('0');
		$("#selectedstyle").hide();
		$("#customized_type_ref_list").hide();
	}
}

function addsuborder(){
	var sorderno = $("#sorderno").val();
	
	var style_ref_type 				= $("input[name='style_ref_type']:checked").val();
	var customized_style_ref_type 	= $("input[name='customized_style_ref_type']:checked").val();
	
	var style_ref 					= $("#style_ref").val();
	var customized_style_ref		= $("#customized_style_ref").val();
	var style_code					= $("#style_code").val();
	var description					= $("#description").val();
	var style_group_code			= $("#style_group_code").val();
	var designer_code				= $("#designer_code").val();
	var cost_price					= $("#cost_price").val();
	var selling_price				= $("#selling_price").val();
	var imagename					= $("#imagename_hidden").val();
	var imagelocation				= $("#imagelocation_hidden").val();
	//alert(imagename+' '+imagelocation);
	var details 					= $("#details").val();
	var discount_amount 			= parseFloat($("#discount_amount").val());
	var sale_amount 				= parseFloat($("#sale_amount").val());
	var substatus 					= $("#substatus").val();
	var trial_date 					= $("#trial_date1").val();
	var delivery_due_date 			= $("#delivery_due_date1").val();
	var submit = 'PROCEED';
	
	var discount_type = $("input[name=discount_type]:checked").val();
	
	if((style_ref_type == '1') && ( $("#style_ref").val() == '' )){
		alert('Please select style reference!');
		$( "#style_ref" ).focus();
		return false;		
	}
	
	if((customized_style_ref_type == '1') && ( customized_style_ref == '' )){
		alert('Please select style reference!');
		$( "#customized_style_ref" ).focus();
		return false;
	} 
	
	if((customized_style_ref_type == '0') && ( style_code == '' )){
		alert('Please enter style code!');
		$( "#style_code" ).focus();
		return false;
	}

	if((customized_style_ref_type == '0') && ( description == '' )){
		alert('Please enter style description!');
		$( "#description" ).focus();
		return false;
	}

	if ( parseFloat(sale_amount) <= 0) {
		alert('Please enter sale amount!');
		$( "#sale_amount" ).focus();
		return false;
	}
	if ($("#discount_type:checked").length == 0){
		alert('Please check discount type');
		return false;
	}
	if (($("#discount_type:checked").length > 0) && (discount_type == 'Percentage') && (discount_amount > 99.99)){
		alert('Discount percentage should be less than 100%!');
		return false;
	}
	if (($("#discount_type:checked").length > 0) && (discount_type == 'Amount') && (discount_amount > sale_amount)){
		alert('Discount amount should be less than sale amount!');
		return false;
	}
	if ( details == '' ){
		alert('Please enter order details!');
		return false;
	}
	
	var task = 'AddSuborder';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,style_ref_type:style_ref_type,customized_style_ref_type:customized_style_ref_type,customized_style_ref:customized_style_ref,style_code:style_code,description:description,style_group_code:style_group_code,designer_code:designer_code,cost_price:cost_price,selling_price:selling_price,imagename:imagename,imagelocation:imagelocation,orderno:sorderno,details:details,style_ref:style_ref,discount_type:discount_type,discount_amount:discount_amount,sale_amount:sale_amount,substatus:substatus,trial_date:trial_date,delivery_due_date:delivery_due_date,submit:submit},

		success: function(data){
			console.log(data);
			if(data == 'OK'){
				alert('Sub-Order Data Added Successfully.');
			}else{
				alert('Error Message: '+data);
			}
			window.location.reload(true);
			return false;
		}
	});
	return false;
}

function getCustomizedSelectedStyle(stylecode){
	var task = 'getCustomizedSelectedStyle';
	//alert(stylecode);
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data: {task:task,stylecode:stylecode},
		success: function(data){
			//console.log(data);
			$("#selectedstyle").html('');
			$("#selectedstyle").show();
			$("#selectedstyle").html(data);
			return false;
		}
	});
	
	return false;
}

function getCustomizedRecomandedPrice(stylecode){
	var task = 'getCustomizedRecomandedPrice';
	getCustomizedSelectedStyle(stylecode);
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data: {task:task,stylecode:stylecode},
		success: function(data){
			console.log(data);
			$("#sale_amount").val('');
			$("#sale_amount").val(data);
			
			return false;
		}
	});
	
	return false;
}

function getSelectedStyle(stylecode){
	var task = 'getSelectedStyle';
	//alert(stylecode);
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data: {task:task,stylecode:stylecode},
		success: function(data){
			//console.log(data);
			$("#selectedstyle").html('');
			$("#selectedstyle").show();
			$("#selectedstyle").html(data);
			return false;
		}
	});
	
	return false;
}

function getRecomandedPrice(stylecode){
	var task = 'getRecomandedPrice';
	getSelectedStyle(stylecode);
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data: {task:task,stylecode:stylecode},
		success: function(data){
			console.log(data);
			$("#sale_amount").val('');
			$("#sale_amount").val(data);
			
			return false;
		}
	});
	
	return false;
}
</script>
    
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="dist/js/bootstrap-multiselect.js"></script>
	<script>
	$('#sale_person').multiselect();
	$("#message").fadeIn('slow').delay(2000).fadeOut('slow');
    </script>
  
	<script src="dist/js/app.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  </body>
</html>