<?php 
	//require_once('include/auth.php');
	
	require_once('class/class.fabric.php');
	$objfabric 		= new Fabric();
	$allfabric = $objfabric->getAll();
	require_once('class/class.stylemaster.php');
	$objstyle = new Stylemaster();
	$allstyle = $objstyle->getAll();
	$allCusStyle 	= $objstyle->getAllCustomized();
	require_once('class/class.agencymaster.php');
	$objagency 		= new Agencymaster();
	$allagent 		= $objagency->getAll();
	require_once('class/class.orderdetails.php');
	$objord = new Orderdetails();
	
	$scustomer = trim($objord->sanitize($_GET['customer']));
	$sorder = trim($objord->sanitize($_GET['order']));
	
	$sqlsearch = '';
	
	$wheres = array();
	$wheres[] = "o.flag = 1 ";
	if (!empty($scustomer)) {
		$wheres[] = "(CONCAT(c.name_first,' ',c.name_last,' (',c.cust_id,')') LIKE '%".$scustomer."%')";
	}
	if (!empty($sorder)) {
		$wheres[] = "( o.orderno LIKE '%".$sorder."%')";
	}
		
	$database = new Database();
	
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$limit = 10;
	$startpoint = ($page * $limit) - $limit;
	$sql = "SELECT o.orderno, CONCAT(c.name_first,' ',c.name_last,' (',c.cust_id,')') AS custname, c.cust_id, o.order_date, o.trial_date, 
o.delivery_due_date, o.order_type, o.sale_person, GROUP_CONCAT(s.personname) AS personname, IFNULL(sa.sale_amount,0) AS sale_amount, IFNULL(sa.netamount,0) AS netamount, IFNULL(rc.received_amount,0) AS received_amount 
FROM orderdetails o INNER JOIN customer c ON o.customer_id = c.cust_id LEFT JOIN salesperson s ON FIND_IN_SET(s.id,o.sale_person) 
LEFT JOIN (SELECT orderno, IFNULL(SUM(sale_amount),0) AS sale_amount, 
CONVERT(SUM(CASE WHEN discount_type = 'Percentage' THEN IFNULL(sale_amount,0) - (IFNULL(sale_amount,0) * IFNULL(discount_amount,0)/100) 
ELSE IFNULL(sale_amount,0) - IFNULL(discount_amount,0) END), DECIMAL(17,2)) AS netamount FROM suborder GROUP BY orderno) sa ON sa.orderno = o.orderno
LEFT JOIN (SELECT SUM(IFNULL(received_amount,0)) AS received_amount, orderno FROM payment GROUP BY orderno) rc ON rc.orderno = o.orderno";
	//echo $sql; die();
	if (!empty($wheres)) {
		$sql .= " WHERE " . implode(' AND ', $wheres);
	}
	$sql .= " GROUP BY o.orderno ORDER BY o.modifiedon DESC ";
	$result = $database->query($sql);
	$total=$result->num_rows;
	$sql .=" LIMIT {$startpoint} , {$limit}";
	$results = $database->query($sql);
	$alldata = array();
	$sub=array();
	while($field = $results->fetch_assoc())
	{
		$alldata[] = $field;
		$sub[]=$field['orderno'];
	}
	
	$url='?';
	
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
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="dist/js/html5shiv.min.js"></script>
        <script src="dist/js/respond.min.js"></script>
    <![endif]-->
	
	<style>
	.connecting_preference_checkbox{
		display:block !important; float:left; width:20px;
	}
	.connecting_preference_box{
		display: block;float: left;width: 25%;
	}
	.datepicker{z-index:1151 !important;}
	</style>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
 <?php if(isset($_SESSION['msgD']) and $_SESSION['msgD'] != ''){echo '<div id="message">'.$_SESSION['msgD'].'</div>';} unset($_SESSION['msgD']);?>
   <div class="wrapper">

		<?php $objord->psheader(); ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php $objord->pssidebar(); ?>

		<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Order Details
          </h1>
           
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Order</li>
            <li class="active">Manage Order Details</li>
          </ol>
        </section><!--CONTENT HEADER-->
        
        <section class="content">
            <div class="row">
			
            	<div class="col-md-12">
              		<div class="box box-warning">
						<div class="col-md-12">
							<form class="form-inline">
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon">Customer Name</div>
									<input type="text" class="form-control input-sm" id="customer" name="customer" placeholder="Customer Name" value="<?php if(isset($_GET['customer'])){echo $_GET['customer'];} ?>">
								</div>
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon">Order</div>
									<input type="text" class="form-control input-sm" id="order" name="order" placeholder="Order" value="<?php if(isset($_GET['order'])){echo $_GET['order'];} ?>">
								</div>
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<input type="submit" class="btn btn-primary btn-sm" id="Search" name="Search" value="Search">
								</div>
							</form>
						</div>
                        <div class='box-body table-responsive'>
				<table class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<!--<th></th>-->
                        <th>Order No</th>
						<th>Customer Name</th>
                        <th>Order Date</th>
						<th>Order Type</th>
						<th>Sales Person</th>
						<th>Total Amount</th>
						<th>Balance Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php for($i=0; $i<count($alldata); $i++){ ?>	
						<tr id="<?php print $alldata[$i]['orderno']; ?>">
                            <?php if($alldata[$i]['status']=='1'){$status='Active';}else{$status='Inactive';}
							$id= $alldata[$i]['id'];
							?>
							<td><?php print $alldata[$i]['orderno']; ?></td>
							<td><a href="#" data-toggle="modal" data-target="#getCutomerbyId" onclick='getCutomerbyId("<?php print $alldata[$i]['cust_id']; ?>")'><?php print $alldata[$i]['custname']; ?></a></td>
							<td><?php print $alldata[$i]['order_date']; ?></td>
							<td><?php 
							if($alldata[$i]['order_type'] == 'PD'){echo 'Stitching Only';}
							elseif($alldata[$i]['order_type'] == 'RMO'){echo 'Ready Made';}
							elseif($alldata[$i]['order_type'] == 'ALT'){echo 'Alteration Only';}
							?></td>
							<td><?php print $alldata[$i]['personname']; ?></td>
							<td><?php print $alldata[$i]['netamount']; ?></td>
							<td><?php print number_format(floatval($alldata[$i]['netamount']) - floatval($alldata[$i]['received_amount']),2,".",""); ?></td>
							<td><a href="vieworder.php?orderno=<?php print $alldata[$i]['orderno']; ?>">View</a>&nbsp;|&nbsp;<!--<a href="#" data-toggle="modal" data-target="#editorder" onclick='editorder("<?php print $alldata[$i]['orderno']; ?>")' >Edit</a>--><a href="order.php?action=edit&cust_id=<?php print $alldata[$i]['cust_id']; ?>&orderno=<?php print $alldata[$i]['orderno']; ?>">Edit</a>&nbsp;|&nbsp;
							<a href="#" data-toggle="modal" data-target="#suborder" onclick='getSuborderForm("<?php print $alldata[$i]['orderno']; ?>","<?php print $alldata[$i]['trial_date']; ?>","<?php print $alldata[$i]['delivery_due_date']; ?>")'>Create Suborder</a>&nbsp;|&nbsp;<a href="#" onclick='getDeleteOrderNo("<?php print $alldata[$i]['orderno']; ?>")'>Delete</a>
							</td>							
						</tr>
					<?php } ?>
                    </tbody>
                </table>
                           
                          </div><!-- /.box-body--> 
                     </div><!-- /.box--> 
                        
                </div><!-- /.col -->
              </div><!-- /.row -->
			  <div class="row">
					<?php  echo $objord->pagination($total,$limit,$page,$url); ?>
			  </div>
        </section><!--CONTENT-->
		
		
      </div><!-- /.content-wrapper -->
      
      
	  
	  
      <?php include('footer.php'); ?>

      <!-- Control Sidebar -->
      
    </div><!-- ./wrapper -->

<!-- Customer Popup Info-->
<div class="modal fade" id="editsuborder" tabindex="-1" role="dialog" aria-labelledby="orderdetailsLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Update Suborder</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-12" id="editNewSuborderMSG"></div>
				
				<div class="col-lg-12" id="editNewSuborder">
					
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
		<div class="modal-footer">
			<input type="button" class="btn btn-primary" name="editsuborderbutton" id="editsuborderbutton" onclick="updatesuborder();" value="Update" />
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	
	</div>	
	</div>
</div>

<div class="modal fade" id="editorder" tabindex="-1" role="dialog" aria-labelledby="editorderLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<form id="eo_editorder">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Edit Order</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-12" id="editorderMSG"></div>
				
				<div class="col-lg-12" id="editordercontent">
					
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
		<div class="modal-footer">
			<input type="button" class="btn btn-primary" name="editorderbutton" id="editorderbutton" onclick="updateorder();" value="Update" />
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
	</div>	
	</div>
</div>

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
									<label for="name">Sub-Order Detail</label>
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

<div class="modal fade" id="ordernotes" tabindex="-1" role="dialog" aria-labelledby="addMyPaymentLabel">
	<div class="modal-dialog" role="document">
	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Order Notes</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class='table table-bordered table-striped'>
							<div id='dordernotes' class='orderdiv'></div>
						</div>
					</div>
					
					<div class="col-lg-12" style="padding-top:20px;">
						<div class="form-group">
							<label for="name">Enter Notes</label>
							<textarea  class="form-control" id="order_note" name="order_note" placeholder="Enter Notes" required></textarea>
						</div> 						
					</div>
				</div><!-- /.col -->                             

			</div><!-- /.row -->
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="hidden" name="order_id"  id="order_id" class="btn btn-warning left-10" value="" />
			<input type="hidden" name="agent_id"  id="agent_id" class="btn btn-warning left-10" value="<?php echo $_SESSION['ADMIN_NAME']; ?>" />
			<input name="ipaddress" type="hidden" id="ipaddress" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
			<input type="button" class="btn btn-primary" name="savePayment" id="savePayment" value="Save" onclick='addOrdernotes();' />
		</div>
	
	</div>
</div>


<div class="modal fade" id="getCutomerbyId" tabindex="-1" role="dialog" aria-labelledby="getCutomerbyIdLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Customer Details </h4>
			</div>
			
			<div class="modal-body">
				<div class="row">
					<div id="getCustomer">

					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>		
		</div>
	</div>
</div>

<div class="modal fade" id="paymentorder" tabindex="-1" role="dialog" aria-labelledby="orderdetailsLabel">
	<div class="modal-dialog" role="document">	
	<div class="modal-content">
	
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Manage Payment</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-12" id="paymentdetails">
					
				</div><!-- /.col -->
				
				<div class="col-lg-12" id="paymentform" style="display:none;">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="name">Payment Date</label>
							<input type="text" tabindex="1" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Enter payment date" value="" />
							<input type="hidden" id="orderno" name="orderno" value="">
						</div>
						
						<div class="form-group">
						  <label for="name">Payment Mode</label>
						  <select name="payment_mode" tabindex="2" class="form-control" id="payment_mode">
						  <option value="">Select Payment Mode</option>
						  <option value="Cash">Cash</option>
						  <option value="CreditCard">CreditCard</option>
						  <option value="Cheque">Cheque</option>
						  <option value="MobileWallet">MobileWallet</option>
						  </select>
						</div>
						
						 <div class="form-group">
						  <label for="name">Received Amount</label>
						  <input type="text" class="form-control" tabindex="3" id="received_amount" onKeyPress="return isDecimalNumber(event,this);" name="received_amount" placeholder="Enter received amount">
						</div>
						
						<div class="form-group">
						  <label for="name">Remarks</label>
						  <input type="text" class="form-control" tabindex="4" id="remarks" name="remarks" placeholder="Enter remarks">
						</div>								
					</div><!-- /.col -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
		<div class="modal-footer">
			<input type="button" class="btn btn-primary" name="showpaymentform" id="showpaymentform" onclick="showpaymentform();" value="Add Payment" />
			<input type="button" class="btn btn-primary" name="addpayment" id="addpayment" onclick="addpayment();" style="display:none;" value="Submit" />
			<input type="button" class="btn btn-primary" name="updatepayment" id="updatepayment" onclick="updatepayment();" style="display:none;" value="Update" />
			<input type="button" class="btn btn-primary" name="showdetails" id="showdetails" onclick="showpaymentdetails();" style="display:none;" value="Show Details" />
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	
	</div>	
	</div>
</div>
	
<div class="modal fade" id="orderdetails" tabindex="-1" role="dialog" aria-labelledby="orderdetailsLabel">
	<div class="modal-dialog" role="document">	
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Order Details </h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-12" id="orderdata">


				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>	
	</div>
</div>

<div class="modal fade" id="subOrderNotes" tabindex="-1" role="dialog" aria-labelledby="addMySubOrderNotesLabel">
	<div class="modal-dialog" role="document">
	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Sub Order Notes</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class='table table-bordered table-striped'>
							<div id='dsubordernotes' class='orderdiv'></div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="name"><br>Enter Notes</label>
							<textarea class="form-control" id="suborder_note" name="suborder_note" placeholder="Enter Notes" required></textarea>
						</div> 
						
					</div>
				</div><!-- /.col -->                             

			</div><!-- /.row -->
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="hidden" name="order_id"  id="suborder_id" class="btn btn-warning left-10" value="" />
			<input type="hidden" name="agent_id"  id="suborderagent_id" class="btn btn-warning left-10" value="<?php echo  $_SESSION['ADMIN_NAME']; ?>" />
			<input name="ipaddress" type="hidden" id="suborderipaddress" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
			<input type="button" class="btn btn-primary" name="saveSuborderNote" id="saveSuborderNote" value="Save" onclick='addsubordernotes();' />
		</div>
	
	</div>
</div>

<div class="modal fade" id="ViewAgency" tabindex="-1" role="dialog" aria-labelledby="addMySubOrderNotesLabel">
	<div class="modal-dialog" role="document">
	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Sub Order Notes</h4>
			</div>
			<div class="modal-body" id="AgencyDetails">
				                            

			</div><!-- /.row -->
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
$(document).ready(function (){
	
	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true
	});
	
	var today = new Date();
	$('.datepicker input').val(today);
	
	
});	

$("#message").fadeIn('slow').delay(2000).fadeOut('slow');
</script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
function viewagency(suborderno){
	
	var task = 'ViewAgency';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,suborderno:suborderno},
		success: function(data){
			console.log(data);
			$("#AgencyDetails").html('');
			$("#AgencyDetails").html(data);			
			return false;
		}
	});
	return false;
}


function updatesuborderrow(suborderno){
	
	var task = 'updatesuborderrow';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,suborderno:suborderno},

		success: function(response){
			console.log(response);
			$("#"+suborderno).html('');
			$("#"+suborderno).html(response);
			return false;
		}
	});
	return false;
}

function updatesuborder(){
	//eo_editorder
	var editsuborderno = $("#editsuborderno").val();
	var editdetails = $("#editdetails").val();
	var editstyle_ref = $("#editstyle_ref").val();
	var editfabric = $("#editfabric").val();
	var editfabric_quatity = $("#editfabric_quatity").val();
	var editoriginal_amount = $("#editoriginal_amount").val();
	var editdiscount_amount = $("#editdiscount_amount").val();
	var editsale_amount = $("#editsale_amount").val();
	var editsubstatus = $("#editsubstatus").val();
	var edittrial_date = $("#edittrial_date").val();
	var editdelivery_due_date = $("#editdelivery_due_date").val();
	var submit = 'UPDATE';
	
	var task = 'UpdateSuborder';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,suborderno:editsuborderno,details:editdetails,style_ref:editstyle_ref,fabric:editfabric,fabric_quatity:editfabric_quatity,original_amount:editoriginal_amount,discount_amount:editdiscount_amount,sale_amount:editsale_amount,substatus:editsubstatus,trial_date:edittrial_date,delivery_due_date:editdelivery_due_date,submit:submit},

		success: function(data){
			console.log(data);
			$("#editsuborderbutton").fadeOut();
			$("#editNewSuborder").slideUp();
			$("#editNewSuborderMSG").html('');
			$("#editNewSuborderMSG").html(data);	
			updatesuborderrow(editsuborderno);
			return false;
		}
		
	});
	return false;
}

function editsuborder(suborderno){
	
	var task = 'EditSuborder';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,suborderno:suborderno},
		success: function(data){
			console.log(data);
			$("#editNewSuborder").html('');
			$("#editNewSuborder").html(data);
			$('.datepicker').datepicker({format: "yyyy-mm-dd",autoclose: true});
			return false;
		}
	});
	return false;
}


function getSuborderrow(orderno){
	
	var task = 'getSuborderrow';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,orderno:orderno},
		success: function(response){
			console.log(response);
			$("#packageDetails"+orderno).html('');
			$("#packageDetails"+orderno).html(response);
			return false;
		}
	});
	return false;
}

function updateorderrow(orderno){
	
	var task = 'updateorderrow';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,orderno:orderno},

		success: function(response){
			console.log(response);
			$("#"+orderno).html('');
			$("#"+orderno).html(response);
			return false;
		}
	});
	return false;
}

function updateorder(){
	//eo_editorder
	var eo_orderno = $("#eo_orderno").val();
	var eo_order_type = $("#eo_order_type").val();
	var eo_alt_order_no = $("#eo_alt_order_no").val();
	var eo_order_date = $("#eo_order_date").val();
	var eo_trial_date = $("#eo_trial_date").val();
	var eo_delivery_due_date = $("#eo_delivery_due_date").val();
	var eo_sale_person = $("#eo_sale_person").val();//
	var eo_order_detail = $("#eo_order_detail").val();
	var eo_status = $("#eo_status").val();
	
	var submit = 'UPDATE';
	
	var task = 'UpdateOrder';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task, orderno:eo_orderno, order_type:eo_order_type, alt_order_no:eo_alt_order_no, order_date:eo_order_date, trial_date:eo_trial_date, delivery_due_date:eo_delivery_due_date, sale_person:eo_sale_person, order_detail:eo_order_detail, orderstatus:eo_status, submit:submit},

		success: function(data){
			console.log(data);
			$("#editorderbutton").fadeOut();
			$("#editordercontent").html('');
			$("#editordercontent").html(data);	
			//updateorderrow(eo_orderno);
			window.location.reload(true);
			return false;
		}
		
	});
	return false;
}
function editorder(orderno){
	
	var task = 'EditOrder';
	$.ajax({
		type: "POST",
		url: "ajax_suborder.php",
		data:{task:task,orderno:orderno},
		success: function(data){
			console.log(data);
			$("#editordercontent").html('');
			$("#editordercontent").html(data);
			$('.datepicker').datepicker({format: "yyyy-mm-dd",autoclose: true});
			$("#eo_order_type").on("change", function () {
				if ($(this).val() == "ALT"){
					$('#eo_alt_order_no').prop('readonly',false);
				}else{
					$('#eo_alt_order_no').prop('readonly',true);
					$("#eo_alt_order_no").val('');
				}
			});
			return false;
		}
	});
	return false;
}


function getSuborderForm(orderno,trial_date,delivery_due_date){
	$("#sorderno").val(orderno);
	$("#trial_date").val(trial_date);
	$("#delivery_due_date").val(delivery_due_date);
	return false;
}

function addsubordernotes(){
	var suborder_id			= $("#suborder_id").val();
	var suborderagent_id	= $("#suborderagent_id").val();
	var suborderipaddress	= $("#suborderipaddress").val();
	var suborder_note 		= $("#suborder_note").val();
	
	if(suborder_note == ''){
		alert("Please enter note!");
		return false;
	}
	
	var task = 'addsubordernotes';
	$.ajax({
		type: "GET",
		url: "ajax.php",
		data: {task:task,suborder_note:suborder_note,suborder_id:suborder_id,suborderagent_id:suborderagent_id,suborderipaddress:suborderipaddress},
		success: function(data){
			console.log(data);
			$("#dsubordernotes").html('');
			$("#suborder_note").val('');
			$("#dsubordernotes").html(data);
			return false;
		}
	});
	
	return false;
}

function getSubOrderNotes(suborder_no){
	var suborder_id = suborder_no;
	$("#suborder_id").val(suborder_id);
	var task = 'getSubOrderNotes';
	$.ajax({
		type: "GET",
		url: "ajax.php",
		data: {task:task,suborder_id:suborder_id},

		success: function(data){
			console.log(data);
			$("#dsubordernotes").html('');
			$("#suborder_note").val('');
			$("#dsubordernotes").html(data);
			return false;
		}
	});
	return false;
}

function addOrdernotes(){
	var  order_id= $("#order_id").val();
	//var  status= $("#status").val();
	var agent_id = $("#agent_id").val();
	var  ipaddress= $("#ipaddress").val();
	var note = $("#order_note").val();
	if(note == ''){
		alert("Please enter note!");
		return false;
	}
	
	var task = 'addOrdernotes';
	$.ajax({
		type: "GET",
		url: "ajax.php",
		data: {order_note:note,task:task,order_id:order_id,agent_id:agent_id,ipaddress:ipaddress},
		success: function(data){
			console.log(data);
			$("#dordernotes").html('');
			$("#order_note").val('');
			$("#dordernotes").html(data);
			return false;
		}
	});	
	return false;
}


function getnotes(order_no){
	var  order_id = order_no;
	$("#order_id").val(order_id);
	var task = 'getnotes';
	$.ajax({
		type: "GET",
		url: "ajax.php",
		data: {task:task,order_id:order_id},

		success: function(data){
			console.log(data);
			$("#dordernotes").html('');
			$("#order_note").val('');
			$("#dordernotes").html(data);
			return false;
		}
	});
	return false;
}

function getOrderbyno(order_no){
	var order_id = order_no;
	var task = 'getOrderbyno';
	$.ajax({
		type: "GET",
		url: "ajax_suborder.php",
		data: {task:task,order_id:order_id},

		success: function(data){
			console.log(data);
			$("#orderdata").html('');
			$("#orderdata").html(data);
			return false;
		}
	});

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

function getCutomerbyId(cust_id){
	var task = 'getCustomer';
	$.ajax({
		type: "GET",
		url: "ajax_suborder.php",
		data: {task:task,cust_id:cust_id},
		success: function(data){
			console.log(data);
			$("#getCustomer").html('');
			$("#getCustomer").html(data);
			return false;
		}
	});
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
    
	<script>
	//$('#order_detail').wysihtml5();
	//$('#delivery_remarks').wysihtml5();
	</script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

<script>
function isDecimalNumber(evt, element) {
	evt = (evt) ? evt : window.event;
	var len = $(element).val().length;

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
</script>
  </body>
</html>