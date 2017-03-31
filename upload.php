<?php
include('model/dbconnection.php');
$upload_path = "../upload_images/";				
						
$thumb_width1 = "400";						
$thumb_height1 = "150";

if (isset($_POST["task"]) and ($_POST["task"] == 'fileupload')) {
	$file = $_FILES['image'];
	/* Allowed file extension */
	$allowedExtensions = ["gif", "jpeg", "jpg", "png", "svg"];
	$fileExtension = explode(".", $file["name"]);
	/* Contains file extension */
	$extension = end($fileExtension);
	/* Allowed Image types */
	$types = ['image/gif', 'image/png', 'image/x-png', 'image/pjpeg', 'image/jpg', 'image/jpeg','image/svg+xml'];
	if(in_array(strtolower($file['type']), $types) 
		// Checking for valid image type
		&& in_array(strtolower($extension), $allowedExtensions) 
		// Checking for valid file extension
		&& !$file["error"] > 0)
		// Checking for errors if any
		{ 
		
		if(move_uploaded_file($file["tmp_name"], '../upload_images/'.$file['name'])){
			echo $file['name'];
			//header('Content-Type: application/json');
			//echo json_encode(['html' => 'File Upload successfull.']);    
		}else{
			//header('Content-Type: application/json');
			//echo json_encode(['html' => 'Unable to move image. Is folder writable?']);    
		}
	}else{    
		header('Content-Type: application/json');
		echo json_encode(['html' => 'Please upload only png, jpg images']);
	}
}

function getExtension($str)
{
	$i = strrpos($str,".");
	if (!$i)
	{
		return "";
	}
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

function compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth)
{

	if($ext=="jpg" || $ext=="jpeg" ){
		$src = imagecreatefromjpeg($uploadedfile);
	}
	else if($ext=="png"){
		$src = imagecreatefrompng($uploadedfile);
	}
	else if($ext=="gif"){
		$src = imagecreatefromgif($uploadedfile);
	}
	else{
		$src = imagecreatefrombmp($uploadedfile);
	}	

	list($width,$height)=getimagesize($uploadedfile);
	$newheight=($height/$width)*$newwidth;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	//$filename = $path.$newwidth.'_'.$actual_image_name; //PixelSize_TimeStamp.jpg
	$filename = $path.date('YmdHis').'_'.$newwidth.'_'.$actual_image_name; //PixelSize_TimeStamp.jpg
	imagejpeg($tmp,$filename,90);
	imagedestroy($tmp);
	return $filename;
}

function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,100); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}


/*for category images------------------------*/

if (isset($_POST["task"]) and ($_POST["task"] == 'crop')) {
	$filename = $_POST['filename'];
	$ext = strtolower(getExtension($filename));

	$large_image_location = $upload_path.$_POST['filename'];
	$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
	$data = getimagesize($large_image_location);
	$thumb_width = $data[0];
	$thumb_height = $data[1];

	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	
	$filename1 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'600');
	/*$filename2 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'400');
	$filename3 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'200');*/
	//echo $cropped;die();
	unlink($thumb_image_location); unlink($large_image_location);
	//echo "<img src='".$filename1."' /><br><img src='".$filename2."' /><br><img src='".$filename3."' />";
	echo "Image Preview : <br>
	<img src='".$filename1."' class='img-responsive' /><br>
	<input type='hidden' name='catimage1' value='".$filename1."'>";
	//header("location:".$_SERVER["PHP_SELF"]);
	exit();
	
}




/*for product images-----------------------------------*/

if (isset($_POST["task"]) and ($_POST["task"] == 'cropproduct')) {
	$filename = $_POST['filename'];
	$flag = $_POST['flag'];
	$ext = strtolower(getExtension($filename));

	$large_image_location = $upload_path.$_POST['filename'];
	$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
	$data = getimagesize($large_image_location);
	$thumb_width = $data[0];
	$thumb_height = $data[1];

	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	
	$filename1 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'800');
	$filename2 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'300');
	$filename3 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'60');
	//echo $cropped;die();
	unlink($thumb_image_location); unlink($large_image_location);
	//echo "<img src='".$filename1."' /><br><img src='".$filename2."' /><br><img src='".$filename3."' />";
	echo "Image Preview : <br>
	<img src='".$filename1."'  width='150px'/>
	<img src='".$filename2."'  width='120px'/>
	<img src='".$filename3."'  width='80px'/>
	<input type='hidden' name='image1".$flag."' value='".$filename1."'>
	<input type='hidden' name='image2".$flag."' value='".$filename2."'>
	<input type='hidden' name='image3".$flag."' value='".$filename3."'>";

	//header("location:".$_SERVER["PHP_SELF"]);
	exit();
	
}

if (isset($_POST["task"]) and ($_POST["task"] == 'cropproduct_single')) {
	$filename = $_POST['filename'];
	$ext = strtolower(getExtension($filename));

	$large_image_location = $upload_path.$_POST['filename'];
	$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
	$data = getimagesize($large_image_location);
	$thumb_width = $data[0];
	$thumb_height = $data[1];

	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	
	$filename1 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'250');
	
	//echo $cropped;die();
	unlink($thumb_image_location); unlink($large_image_location);
	//echo "<img src='".$filename1."' /><br><img src='".$filename2."' /><br><img src='".$filename3."' />";
	echo "Image Preview : <br>
	<img src='".$filename1."' class='img-responsive' /><br>
	<input type='hidden' name='singleimage' value='".$filename1."'>";

	//header("location:".$_SERVER["PHP_SELF"]);
	exit();
	
}


if (isset($_POST["task"]) and ($_POST["task"] == 'getsubcategory')) {
	

	$catid = $_POST['catid'];
	
	$database = new Database();
		$sql = "SELECT category_id,name FROM categories where status = 1 and parent_id = $catid ";
		
		$res = $database->query($sql);
		while($field = $res->fetch_assoc())
		{
			$alldata[] = $field;
		}
		$database->close();
		echo json_encode($alldata);
		


}

if (isset($_POST["task"]) and ($_POST["task"] == 'getorder')) {
	
	$id = $_POST['txnid'];
	
	$database = new Database();
		$sql = "SELECT * FROM orderedproduct where txnid = '".$id."'";
		$alldata = array();
		$res = $database->query($sql);
		while($field = $res->fetch_assoc())
		{
			$alldata[] = $field;
		}
		$database->close();
		echo json_encode($alldata);


}

if (isset($_POST["task"]) and ($_POST["task"] == 'removeimage')) {
	
	$id = $_POST['id'];
	
	$database = new Database();
		$sql = "DELETE FROM product_image where product_image_id = '".$id."'";
		$res = $database->prepare($sql);
		if($res->execute()){
			return true;
		}
		else{return false;}
		$res->close();
		$database->close();
		
}

if (isset($_POST["task"]) and ($_POST["task"] == 'updatefeatured')) {
	
	$id = $_POST['id'];
	$value = $_POST['featured'];
	
	$database = new Database();
		$sql = "UPDATE product set featured = '$value' where product_id = '".$id."'";
		$res = $database->prepare($sql);
		$res->execute();
		echo "success";
		$res->close();
		$database->close();
}

if (isset($_POST["task"]) and ($_POST["task"] == 'cropbanner_single')) {
	$filename = $_POST['filename'];
	$ext = strtolower(getExtension($filename));

	$large_image_location = $upload_path.$_POST['filename'];
	$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
	$data = getimagesize($large_image_location);
	$thumb_width = $data[0];
	$thumb_height = $data[1];

	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	
	$filename1 = compressImage($ext,$thumb_image_location,$upload_path,$filename,'1200');
	
	//echo $cropped;die();
	unlink($thumb_image_location); unlink($large_image_location);
	//echo "<img src='".$filename1."' /><br><img src='".$filename2."' /><br><img src='".$filename3."' />";
	echo "Image Preview : <br>
	<img src='".$filename1."' class='img-responsive' /><br>
	<input type='hidden' name='singleimage' value='".$filename1."'>";

	//header("location:".$_SERVER["PHP_SELF"]);
	exit();
	
}

?>