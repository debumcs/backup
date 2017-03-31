<div style="height: 200px;"></div>
<div class="footer">
		<div class="brand1 clearfix">
		<div class="col-xs-6">
		<p>Designed and Developed By <a href="designdot.co.in">Designdot Technology</a></p>	
		</div>
		<div class="col-xs-6" align="right">
			<ul class="">
			<li><span class="fa fa-cog"></span> Contact Admin</li>
			<li><span class="fa fa-support"></span> Report Bug</li>
		</ul>
		</div>
		
	 	 			
	 	 			
	 	</div> 
</div>

	<!-- Loading Scripts -->
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/jquery.imgareaselect.js"></script>

    <script type="text/javascript" >
    $(document).ready(function(){
        $(".crop_set_preview").css("display", "none");
         $(".crop_set_preview1").css("display", "none");
          $(".crop_set_preview2").css("display", "none");
           $(".crop_set_preview3").css("display", "none");
            $(".crop_set_preview4").css("display", "none");
            $(".crop_set_preview5").css("display", "none");

        $('#craftcatimage').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse
            });
        });
        $('#product_singleimage').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse_singleproduct
            });
        });
        $('#product_images1').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse_productimages1
            });
        });
        $('#product_images2').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse_productimages2
            });
        });
         $('#product_images3').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse_productimages3
            });
        });
         $('#product_images4').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse_productimages4
            });
        });
         $('#product_images5').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse_productimages5
            });
        });
        $('#banner_singleimage').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('image', file);
            form.append('task', 'fileupload');
            $.ajax({
                url : "upload.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success:showResponse_banner
            });
        });
        
        $('#save_banner').click(function() {
            var x1 = $('#x1').val();
            var y1 = $('#y1').val();
            var x2 = $('#x2').val();
            var y2 = $('#y2').val();
            var w = $('#w').val();
            var h = $('#h').val();
            var filename = $('#filename').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("Please Make a Selection First");
                return false;
            }else{
                //$(".crop_set_preview").css("display", "none");
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {task:'cropbanner_single',x1:x1,y1:y1,x2:x2,y2:y2,w:w,h:h,filename:filename},
                    success: function(response){
                        console.log(response);
                        $(".resultimages").html('');
                        $(".resultimages").html(response);
                        $(".crop_set_preview").css("display", "none");
                        $('div[class^=imgareaselect-]').hide();
                       // $('#filename').val('1');
                        return false;
                    }
                });
                return false;
            }
        });

        /*for product----------------------*/
         $('#save_singleproductthumb').click(function() {
            var x1 = $('#x1').val();
            var y1 = $('#y1').val();
            var x2 = $('#x2').val();
            var y2 = $('#y2').val();
            var w = $('#w').val();
            var h = $('#h').val();
            var filename = $('#filename').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("Please Make a Selection First");
                return false;
            }else{
                //$(".crop_set_preview").css("display", "none");
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {task:'cropproduct_single',x1:x1,y1:y1,x2:x2,y2:y2,w:w,h:h,filename:filename},
                    success: function(response){
                        console.log(response);
                        $(".resultimages").html('');
                        $(".resultimages").html(response);
                        $('#thumbnail').imgAreaSelect( {remove: true} );
                        $(".crop_set_preview").css("display", "none");

                        return false;
                    }
                });
                return false;
            }
        });

        $('#save_productthumb1').click(function() {
            var x1 = $('#x11').val();
            var y1 = $('#y11').val();
            var x2 = $('#x21').val();
            var y2 = $('#y21').val();
            var w = $('#w1').val();
            var h = $('#h1').val();
            var filename = $('#filename1').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("Please Make a Selection First.");
                return false;
            }else{
                //$(".crop_set_preview").css("display", "none");
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {task:'cropproduct',x1:x1,y1:y1,x2:x2,y2:y2,w:w,h:h,filename:filename,flag:1},
                    success: function(response){
                        console.log(response);
                        $(".resultimages1").html('');
                        $(".resultimages1").html(response);
                        $('#thumbnail1').imgAreaSelect( {remove: true} );
                        $(".crop_set_preview1").css("display", "none");
                        
                      
                        return false;
                    }
                });
                return false;
            }
        });
        $('#save_productthumb2').click(function() {
            var x1 = $('#x12').val();
            var y1 = $('#y12').val();
            var x2 = $('#x22').val();
            var y2 = $('#y22').val();
            var w = $('#w2').val();
            var h = $('#h2').val();
            var filename = $('#filename2').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("Please Make a Selection First.");
                return false;
            }else{
                //$(".crop_set_preview").css("display", "none");
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {task:'cropproduct',x1:x1,y1:y1,x2:x2,y2:y2,w:w,h:h,filename:filename,flag:2},
                    success: function(response){
                        console.log(response);
                        $(".resultimages2").html('');
                        $(".resultimages2").html(response);
                        $('#thumbnail2').imgAreaSelect( {remove: true} );
                        $(".crop_set_preview2").css("display", "none");
                        return false;
                    }
                });
                return false;
            }
        });
        $('#save_productthumb3').click(function() {
            var x1 = $('#x13').val();
            var y1 = $('#y13').val();
            var x2 = $('#x23').val();
            var y2 = $('#y23').val();
            var w = $('#w3').val();
            var h = $('#h3').val();
            var filename = $('#filename3').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("Please Make a Selection First.");
                return false;
            }else{
                //$(".crop_set_preview").css("display", "none");
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {task:'cropproduct',x1:x1,y1:y1,x2:x2,y2:y2,w:w,h:h,filename:filename,flag:3},
                    success: function(response){
                        console.log(response);
                        $(".resultimages3").html('');
                        $(".resultimages3").html(response);
                       $('#thumbnail3').imgAreaSelect( {remove: true} );
                        $(".crop_set_preview3").css("display", "none");
                        return false;
                    }
                });
                return false;
            }
        });
        $('#save_productthumb4').click(function() {
            var x1 = $('#x14').val();
            var y1 = $('#y14').val();
            var x2 = $('#x24').val();
            var y2 = $('#y24').val();
            var w = $('#w4').val();
            var h = $('#h4').val();
            var filename = $('#filename4').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("Please Make a Selection First.");
                return false;
            }else{
                //$(".crop_set_preview").css("display", "none");
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {task:'cropproduct',x1:x1,y1:y1,x2:x2,y2:y2,w:w,h:h,filename:filename,flag:4},
                    success: function(response){
                        console.log(response);
                        $(".resultimages4").html('');
                        $(".resultimages4").html(response);
                        $('#thumbnail4').imgAreaSelect( {remove: true} );
                        $(".crop_set_preview4").css("display", "none");
                        return false;
                    }
                });
                return false;
            }
        });
        $('#save_productthumb5').click(function() {
            var x1 = $('#x15').val();
            var y1 = $('#y15').val();
            var x2 = $('#x25').val();
            var y2 = $('#y25').val();
            var w = $('#w5').val();
            var h = $('#h5').val();
            var filename = $('#filename5').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("Please Make a Selection First.");
                return false;
            }else{
                //$(".crop_set_preview").css("display", "none");
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: {task:'cropproduct',x1:x1,y1:y1,x2:x2,y2:y2,w:w,h:h,filename:filename,flag:5},
                    success: function(response){
                        console.log(response);
                        $(".resultimages5").html('');
                        $(".resultimages5").html(response);
                        $('#thumbnail5').imgAreaSelect( {remove: true} );
                        $(".crop_set_preview5").css("display", "none");
                        return false;
                    }
                });
                return false;
            }
        });

       
        
  
        
    });
    
    function showResponse(responseText, statusText, xhr, $form){
        $(".crop_set_preview").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"   id="thumbnail" />');
            $('#filename').val(responseText); 
            $('#thumbnail').imgAreaSelect({  aspectRatio: '5:3', handles: true  , onSelectChange: preview });
        }else{
            $('#viewimage').html(responseText);
        }
    }

    /*for products------------*/
    function showResponse_singleproduct(responseText, statusText, xhr, $form){
        $(".crop_set_preview").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"  id="thumbnail" />');
            $('#filename').val(responseText); 
            $('#thumbnail').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview });
        }else{
            $('#viewimage').html(responseText);
        }
    }
    function showResponse_productimages1(responseText, statusText, xhr, $form){
        $(".crop_set_preview1").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage1').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"  id="thumbnail1" />');
            $('#filename1').val(responseText); 
            $('#thumbnail1').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview1 });
        }else{
            $('#viewimage1').html(responseText);
        }
    }
     function showResponse_productimages2(responseText, statusText, xhr, $form){
        $(".crop_set_preview2").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage2').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"  id="thumbnail2" />');
            $('#filename2').val(responseText); 
            $('#thumbnail2').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview2 });
        }else{
            $('#viewimage2').html(responseText);
        }
    }
    function showResponse_productimages3(responseText, statusText, xhr, $form){
        $(".crop_set_preview3").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage3').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"  id="thumbnail3" />');
            $('#filename3').val(responseText); 
            $('#thumbnail3').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview3 });
        }else{
            $('#viewimage3').html(responseText);
        }
    }
    function showResponse_productimages4(responseText, statusText, xhr, $form){
        $(".crop_set_preview4").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage4').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"  id="thumbnail4" />');
            $('#filename4').val(responseText); 
            $('#thumbnail4').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview4 });
        }else{
            $('#viewimage4').html(responseText);
        }
    }
    function showResponse_productimages5(responseText, statusText, xhr, $form){
        $(".crop_set_preview5").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage5').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"  id="thumbnail5" />');
            $('#filename5').val(responseText); 
            $('#thumbnail5').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview5 });
        }else{
            $('#viewimage5').html(responseText);
        }
    }

    function showResponse_banner(responseText, statusText, xhr, $form){
        $(".crop_set_preview").css("display", "block");
        if(responseText.indexOf('.')>0){
            $('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"   id="thumbnail" />');
            $('#filename').val(responseText); 
            $('#thumbnail').imgAreaSelect({  aspectRatio: '8:3', handles: true  , onSelectChange: preview });
        }else{
            $('#viewimage').html(responseText);
        }
    }

    

function preview(img, selection) { 
    var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
    var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
    var x2 = Math.round(x1+selection.width);
    var y2 = Math.round(y1+selection.height);
    
    $('#x1').val(x1);
    $('#y1').val(y1);
    $('#x2').val(x2);
    $('#y2').val(y2);   
    
    $('#w').val(Math.round((img.naturalWidth/img.width)*selection.width));
    $('#h').val(Math.round((img.naturalHeight/img.height)*selection.height));
    
} 

function preview1(img, selection) { 
    var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
    var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
    var x2 = Math.round(x1+selection.width);
    var y2 = Math.round(y1+selection.height);
    
    $('#x11').val(x1);
    $('#y11').val(y1);
    $('#x21').val(x2);
    $('#y21').val(y2);   
    
    $('#w1').val(Math.round((img.naturalWidth/img.width)*selection.width));
    $('#h1').val(Math.round((img.naturalHeight/img.height)*selection.height));
    
} 
function preview2(img, selection) { 
    var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
    var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
    var x2 = Math.round(x1+selection.width);
    var y2 = Math.round(y1+selection.height);
    
    $('#x12').val(x1);
    $('#y12').val(y1);
    $('#x22').val(x2);
    $('#y22').val(y2);   
    
    $('#w2').val(Math.round((img.naturalWidth/img.width)*selection.width));
    $('#h2').val(Math.round((img.naturalHeight/img.height)*selection.height));
    
} 
function preview3(img, selection) { 
    var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
    var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
    var x2 = Math.round(x1+selection.width);
    var y2 = Math.round(y1+selection.height);
    
    $('#x13').val(x1);
    $('#y13').val(y1);
    $('#x23').val(x2);
    $('#y23').val(y2);   
    
    $('#w3').val(Math.round((img.naturalWidth/img.width)*selection.width));
    $('#h3').val(Math.round((img.naturalHeight/img.height)*selection.height));
    
} 
function preview4(img, selection) { 
    var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
    var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
    var x2 = Math.round(x1+selection.width);
    var y2 = Math.round(y1+selection.height);
    
    $('#x14').val(x1);
    $('#y14').val(y1);
    $('#x24').val(x2);
    $('#y24').val(y2);   
    
    $('#w4').val(Math.round((img.naturalWidth/img.width)*selection.width));
    $('#h4').val(Math.round((img.naturalHeight/img.height)*selection.height));
    
} 
function preview5(img, selection) { 
    var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
    var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
    var x2 = Math.round(x1+selection.width);
    var y2 = Math.round(y1+selection.height);
    
    $('#x15').val(x1);
    $('#y15').val(y1);
    $('#x25').val(x2);
    $('#y25').val(y2);   
    
    $('#w5').val(Math.round((img.naturalWidth/img.width)*selection.width));
    $('#h5').val(Math.round((img.naturalHeight/img.height)*selection.height));
    
} 





</script>


	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script src="js/moment.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/jquery.sparkline.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	 <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <script src="js/mycharts.js"></script>
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
	});
	</script>

<script>
var dd=1;
$(".editor").each(function(){
$(this).attr("id","editor"+dd);
CKEDITOR.replace( 'editor'+dd , {height: 140,uiColor: '#eeeeee'});
dd=dd+1;
});
</script>

<script type="text/javascript">
            $(function () {
                $('#dtp1').datetimepicker({
        		format: 'YYYY-MM-DD HH:mm:ss'
    		});
                $('#dtp2').datetimepicker({
        		format: 'YYYY-MM-DD HH:mm:ss'
    		});
            });

            
</script>

</body>

</html>
