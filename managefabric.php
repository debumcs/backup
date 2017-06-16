<?php 
	require_once('class/class.fabric.php');
	$objfabric 		= new Fabric();
	
	$action = "";
	$action = $_GET["action"];
	$id = $_GET["id"];
	$msgD = '';
	
		
	if($action=="Edit")
	{
	    $btnvalue = "UPDATE";
	    $allgroupdata = $objfabric->getAllgroup();
		$data = $objfabric->getById($id);
		
	}elseif($action=="Add")
	{
		$allgroupdata = $objfabric->getAllgroup();
		$btnvalue = "SAVE";
	}else{
		$btnvalue = "";
		$alldata = $objfabric->getAll();
	}
	
	if(isset($_POST['submit']))
	{
		$objfabric->save();
		exit();
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $PRO_TITLE;?> | Add Category</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/minimal/orange.css">
   
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   
    <link rel="stylesheet/less" type="text/css" href="side.less" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="dist/js/html5shiv.min.js"></script>
        <script src="dist/js/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" language="javascript">
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
		
		function validatefabric(){
            
            if(document.getElementById('fabricname').value =='' ){
				alert('Please enter fabric name!');
				document.getElementById('fabricname').focus();
				return false;
			}else if(document.getElementById('preferred_vendor_name').value =='' ){
				alert('Please enter preferred vendor name!');
				document.getElementById('preferred_vendor_name').focus();
				return false;
			}else if((document.getElementById('last_price').value =='0') || (document.getElementById('last_price').value =='')) {
				alert('Please enter last price !');
				document.getElementById('last_price').focus();
				return false;
			}else if((document.getElementById('flagedit').value != 'edit') && (document.getElementById('fabric_image').value =='')){
				alert('Please select fabric image!');
				document.getElementById('fabric_image').focus();
				return false;
			}else if(document.getElementById('description').value =='' ){
				alert('Please enter description!');
				document.getElementById('description').focus();
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

		<?php $objfabric->psheader(); ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php $objfabric->pssidebar(); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Fabric Master</h1>
             <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Control Panel</li>
            <li class="active">Fabric Master</li><li class="active"><?php echo $action; ?></li>
          </ol>
        </section><!--CONTENT HEADER-->
        <?php if($action == 'Add' || $action == 'Edit'){?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
            	<div class="col-md-12">
              		<div class="box box-warning">
                        <div class='box-header with-border'>
                          <h3 class="box-title"><?php echo $action; ?> Fabric Master</h3><span style='float:right'>Fields marked with a asterisk (<font color='red'>*</font>) are mandatory.</span>
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                            <form action="" name="agencymaster" id="agencymaster" enctype="multipart/form-data" method="post" >
							<div class="row">
								<div class="col-lg-12">	

									<div class="col-lg-6">										
										<div class="form-group">
										  <label for="name">Fabric Group</label><?php echo $MANDATORY;?>
											<select class="form-control select2" id="group_id" name="group_id" tabindex="2"  style="width:100%;">
											<option value="" <?php if($data['group_id']=="") echo "selected";?>>Select</option>
											<?php 				
											for($sli=0; $sli<count($allgroupdata); $sli++) {
												if($data['group_id'] == $allgroupdata[$sli]['id']){$selected="selected";}else{$selected="";} 				 
												echo "<option value='".$allgroupdata[$sli]['id']."' $selected >".$allgroupdata[$sli]['groupname']."</option>"; 
											}
											?>
											</select>
										</div>										  
									</div><!-- /.col -->

									<div class="col-lg-6">
										<div class="form-group">
											<label for="name">Fabric Name<font color='red'>*</font> </label>
											<input type="text" class="form-control" id="fabricname" name="fabricname" placeholder="Enter fabric name" value="<?php echo $data['fabricname']; ?>">
											<input type="hidden" id="id" name="id" value="<?php echo $data['id']; ?>" />
										</div>										
									</div><!-- /.col -->
									
								</div><!-- /.col -->
								
								<div class="col-lg-12">	
									<div class="col-lg-6">
										<div class="form-group">
											<label for="name">Fabric ID<font color='red'>*</font> </label>
											<input type="text" class="form-control" id="fabricid" name="fabricid" placeholder="Enter fabric id" value="<?php echo $data['fabricid']; ?>">
										</div>										
									</div><!-- /.col -->

									<div class="col-lg-6">
										<div class="form-group">
											<label for="name">Last Price<font color='red'>*</font> </label>
											<input type="text" class="form-control" id="last_price" name="last_price" placeholder="Enter last price"  onKeyPress="return isDecimalNumber(event,this);" onfocus="if(this.value=='0' || this.value=='0.00') this.value = ''" onblur="if(this.value=='')this.value = '0'" value="<?php if($data['last_price']){echo $data['last_price'];}else{echo '0';} ?>">
										</div>										
									</div><!-- /.col -->
									
									
								</div><!-- /.col -->
								
								<div class="col-lg-12">	
									<div class="col-lg-6">
										<?php if($action!="Edit") { ?>
											<input type="hidden" id="flagedit" name="flagedit" value="<?php echo 'Edit'; ?>" />	
											<div class="form-group">
												<label for="name">Fabric Image<font color='red'>*</font> </label>
												<input type="file" class="form-control" id="fabric_image" name="fabric_image" placeholder="Enter fabric image">
											</div>
										<?php }
											if($action=="Edit") { ?>	
											<input type="hidden"  name="fabric_image_hidden" value="<?php echo $data['fabric_image']; ?>" />

											<div class="form-group">
												<label for="name">Image</label><br/>
												<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<img id='image' style='width:150px;height:100px;border-radius:10px;' width='120px'  height='80px' src="<?php echo $data['fabric_image']; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="name">Upload New Image</label>&nbsp;<font color='red'>(Allowed image formate : gif, jpeg, jpg, png)</font>
												<input type="file" class="form-control" id="fabric_image" name="fabric_image" placeholder="Enter fabric image">
											</div>
										<?php } ?>
										
									</div><!-- /.col -->
									
									<div class="col-lg-6">
										<div class="form-group">
											<label for="name">Preferred Vendor Name<font color='red'>*</font> </label>
											<input type="text" class="form-control" id="preferred_vendor_name" name="preferred_vendor_name" placeholder="Enter preferred vendor name" value="<?php echo $data['preferred_vendor_name']; ?>">
										</div>										
									</div><!-- /.col -->

								</div><!-- /.col -->
								
								
								<div class="col-lg-12">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Units<font color='red'>*</font></label>
											<div style="width:100%;">
												<input type="radio" id="units1" name="units" <?php if($data['units'] == 'Length'){echo 'checked';}else{echo '';} ?> value="Length">Length
												<input type="radio" id="units2" name="units" <?php if($data['units'] == 'Quantity'){echo 'checked';}else{echo '';} ?> value="Quantity">Quantity
											</div>
										</div><!-- /.form-group -->
									</div><!-- /.col -->
									<?php if($action=="Edit"){ ?>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Status</label>
											<div style="width:100%;">
												<input type="radio" id="fabstatus" name="fabstatus" <?php if($data['fabstatus'] == '1'){echo 'checked';}else{echo '';} ?> value="1">Active
												<input type="radio" id="fabstatus" name="fabstatus" <?php if($data['fabstatus'] == '0'){echo 'checked';}else{echo '';} ?> value="0">In-Active
											</div>											
										</div><!-- /.form-group -->
									</div><!-- /.col -->
									<?php } ?>
								</div><!-- /.col -->	
								
                           </div><!-- /.row -->
                           
                           <div class="row">
                              <div class="col-lg-12">
                                   <div class="form-group center">
                                      <input type="submit" name="submit" id="submit" class="btn btn-warning left-10" value="<?php echo $btnvalue; ?>" onclick="return validatefabric();" />
									  <a href="managefabric.php" class="btn btn-warning left-10">View All</a>
                                   </div>
                               </div><!-- /.col -->
             				 </div><!-- /.row -->
                           </form>
                        </div><!-- /.box-body--> 
                     </div><!-- /.box--> 
                        
                </div><!-- /.col -->
              </div><!-- /.row -->
        </section><!--CONTENT-->
		<?php }else{ ?>
		
		<section class="content">
            <div class="row">
            	<div class="col-md-12">
              		<div class="box box-warning">
                        <div class='box-header with-border'>
                          <h3 class="box-title pull-right"><a href="managefabric.php?action=Add&id=">Add New</a></h3>
                        </div><!-- /.box-header -->
                        <div class='box-body table-responsive'>
                            <table id="example111" class="table table-bordered table-striped">
							<thead>
							  <tr>
								<th>Fabric</th>
								<th>FabricID</th>
								<th>Preferred Vendor Name</th>
								<th>Last Price</th>
								<th>Uploaded Image</th>
								<th>Action</th>							
							  </tr>
							</thead>
                    <tbody>
					<?php for($i=0; $i<count($alldata); $i++) { ?>	
						<tr>
                            <td><?php print $alldata[$i]['fabricname']; ?></td>
							<td><?php print $alldata[$i]['fabricid']; ?></td>
							<td><?php print $alldata[$i]['preferred_vendor_name']; ?></td>
							<td><?php print $alldata[$i]['last_price']; ?></td>
							<td><img id='image'  data-toggle="modal" style='width:100px;border-radius:1px;' src="<?php echo  $alldata[$i]['fabric_image']; ?>"/></td>
							<td><a href="managefabric.php?action=Edit&id=<?php print $alldata[$i]['id']; ?>">Edit</a></td>
				        </tr>
                    <?php } ?>						
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

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="dist/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/select2/select2.js"></script>
    
    <!-- daterangepicker -->
    <script src="dist/js/moment.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script type="text/javascript" src="dist/js/date.js"></script>
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
		$("#message").fadeIn('slow').delay(1000).fadeOut('slow');
		$(".select2").select2();
		  //Date range picker
	</script>
  </body>
</html>