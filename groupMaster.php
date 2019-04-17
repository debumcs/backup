<?php 
	require_once('include/auth.php');	
	require_once('class/class.group.php');
	
	$objgroup = new Group();

	$action = $_GET["action"];
	$id = $_GET["id"];
	 	
	if(isset($_POST['submit']))
	{
		$objgroup->save();	
		exit();
	}
	
	if($action=="edit")
	{        
		$data = $objgroup->getById($id);
	
		$menua=array();
		$menua=explode(",",$data['menu']);
		
		$btnvalue = "UPDATE";
	}
	else
	{
		$btnvalue = "SAVE";
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $PRO_TITLE;?> | Group Master</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <link rel="stylesheet" type="text/css" href="dist/css/jquery.multiselect.css" />

<link rel="stylesheet" type="text/css" href="dist/css/prettify.css" />
<link rel="stylesheet" type="text/css" href="dist/css/jquery-ui1.10.4.css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    
    <link rel="stylesheet/less" type="text/css" href="side.less" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
         <script src="dist/js/html5shiv.min.js"></script>
        <script src="dist/js/respond.min.js"></script>
    <![endif]-->
    
    <style>
		.ui-multiselect-checkboxes input[type=checkbox]{
			display:inline-block;
		}
	</style>
	
	<script type="text/javascript" language="javascript">
	
		function validateGroupMaster(){
                 var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                         if(document.getElementById('groupname').value =='' )
                         {
				alert('Please enter Group Name!');
				document.getElementById('groupname').focus();
				return false;
			 }
                         /*if(!document.getElementById('parent').checked) {
                              alert("Please select atleast one menu.");
                              document.getElementById('parent').focus();
                              return false;
                         }*/
			else{
				return true;
			}
      	}
	
	</script>
	
        <script type="text/javascript" language="javascript" src="JScripts/jsGroupMaster.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini" onload="prettyPrint();startTime();">
  <?php if(isset($_SESSION['msgD']) and $_SESSION['msgD'] != ''){echo '<div id="message">'.$_SESSION['msgD'].'</div>';} unset($_SESSION['msgD']);?>
    <div class="wrapper">

		<?php $objgroup->psheader(); ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php $objgroup->pssidebar(); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Group 
           </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Control Panel</li>
            <li class="active">Group Master</li>  
          </ol>
		  
		  
        </section><!--CONTENT HEADER-->
        
          <!-- Main content -->
        <section class="content">
		<form name="groupMaster" id="groupMaster" action="groupMaster.php" method="post">
            <div class="row">
            	<div class="col-md-12">
              		<div class="box box-warning">
                        <div class='box-header with-border'>
                          <h3 class="box-title"></h3> <?php echo $MAND_INSTRUCTION;?>
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                            <div class="row">
                              <div class="col-lg-6">
                              		<div class="form-group">
                                      <label for="name">Group Name <?php echo $MANDATORY; ?></label>
                                      <input type="text" class="form-control" id="groupname" name="groupname" value="<?php echo $data['groupname']; ?>" placeholder="Enter Group Name">
									  <input type="hidden" id="groupid" name="groupid" value="<?php echo $data['groupid']; ?>" />
                                    </div>
                                    
                                    
                                  <div class="form-group">
                                          <label>Description</label>
                                          <textarea class="form-control" rows="2" id="groupdesc" name="groupdesc" placeholder="Enter Description..."><?php echo $data['groupdesc']; ?></textarea>
                    			  </div> 
                                    
                              </div><!-- /.col -->
                              
                              <div class="col-lg-6">
                              	<?php if($action=="edit") { ?>	
                                    <div class="form-group">
                                      	<label>User Visibility</label>
                                          <ul class="columns">
                                            <li>
                                            <input type="checkbox" id="u1" name="activestatus" <?php if($data['activestatus'] == 1){echo 'checked';}else{echo '';} ?> value="1" />
                                            <label class="toggle <?php if($data['activestatus'] == 1){echo 'custom-checked';}else{echo '';} ?>" for="u1"></label>
                                            Active
                                            </li>
                                          </ul>
                                       </div><!-- /.form-group -->
                                <?php } ?>
                               </div><!-- /.col -->
                              
                           </div><!-- /.row -->
                           
                        </div><!-- /.box-body--> 
                     </div><!-- /.box--> 
                        
                </div><!-- /.col -->
              </div><!-- /.row -->

            <div class="row">
            	<div class="col-md-12">
              		<div class="box box-warning">
                        <div class='box-header with-border'>
                          <h3 class="box-title">Choose Menu(s)</h3><?php echo $MANDATORY; ?>
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                            <div class="row">
                              <div class="col-lg-6">
							  
                              		<ul class="treeview lis">
										<li>
											<input type="checkbox" name="parent" id="parent">
											<label for="parent" class="custom-unchecked"><?php echo $PRO_TITLE;?></label>
											<?php    
                                                $all_menu_list = $objgroup->all_menu_list();
												echo $objgroup->create_all_menu_list( $all_menu_list, $menua );
											?>
											
										</li>
									   
									</ul><!--treeview-->
                              </div><!-- /.col -->
                              
                             </div><!-- /.row -->
                           
                        </div><!-- /.box-body--> 
                     </div><!-- /.box--> 
                        
                </div><!-- /.col -->
              </div><!-- /.row -->         
              <div class="row">
					<div class="col-lg-12">
						<div class="form-group center">
						<input type="submit" name="submit" id="submit" class="btn btn-warning left-10" value="<?php echo $btnvalue; ?>" onclick="return validateGroupMaster();" />
						<a href="manageGroupMaster.php" class="btn btn-warning left-10">View All</a>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</form>
              </section><!--CONTENT-->
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
    <!--css tree-->
    <script>
$(function() {

$('input[type="checkbox"]').change(checkboxChanged);

function checkboxChanged() {
	var $this = $(this),
	checked = $this.prop("checked"),
	container = $this.parent(),
	siblings = container.siblings();

container.find('input[type="checkbox"]')
.prop({
indeterminate: false,
checked: checked
})
.siblings('label')
.removeClass('custom-checked custom-unchecked custom-indeterminate')
.addClass(checked ? 'custom-checked' : 'custom-unchecked');

checkSiblings(container, checked);
}

  function checkSiblings($el, checked) {
    var parent = $el.parent().parent(),
        all = true,
        indeterminate = false;

    $el.siblings().each(function() {
      return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
    });

    if (all && checked) {
      parent.children('input[type="checkbox"]')
      .prop({
          indeterminate: false,
          checked: checked
      })
      .siblings('label')
      .removeClass('custom-checked custom-unchecked custom-indeterminate')
      .addClass(checked ? 'custom-checked' : 'custom-unchecked');

      checkSiblings(parent, checked);
    } 
    else if (all && !checked) {
      indeterminate = parent.find('input[type="checkbox"]:checked').length > 0;

      parent.children('input[type="checkbox"]')
      .prop("checked", checked)
      .prop("indeterminate", indeterminate)
      .siblings('label')
      .removeClass('custom-checked custom-unchecked custom-indeterminate')
      .addClass(indeterminate ? 'custom-indeterminate' : (checked ? 'custom-checked' : 'custom-unchecked'));

      checkSiblings(parent, checked);
    } 
    else {
      $el.parents("li").children('input[type="checkbox"]')
      .prop({
          indeterminate: true,
          checked: true
      })
      .siblings('label')
      //.removeClass('custom-checked custom-unchecked custom-indeterminate') false
      //.addClass('custom-indeterminate');
	  .removeClass('custom-checked custom-unchecked custom-indeterminate')
      .addClass('custom-checked');
    }
  }
  
  
  
});
	</script>
     
    <script type="text/javascript" src="dist/js/jquery1.11.1.js"></script>
<script type="text/javascript" src="dist/js/jquery-ui.min1.10.4.js"></script>
<script type="text/javascript" src="dist/js/jquery.multiselect.js"></script>
<script type="text/javascript" src="dist/js/prettify.js"></script>
<script type="text/javascript">
$(function(){
	$(".mul").multiselect();
});
</script>
    <script src="plugins/select2/select2.js"></script>
    
    <!-- daterangepicker -->
    <script src="dist/js/moment.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    
    <script type="text/javascript" src="plugins/datepicker/bootstrap-clockpicker.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
    //check all
		$("#message").fadeIn('slow').delay(5000).fadeOut('slow');
		$("#id_0").click(function () {
        if ($("#id_0").is(':checked')) {
            $("input:checkbox[id^=id_]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("input:checkbox[id^=id_]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    </script>
    
    
    
  </body>
</html>