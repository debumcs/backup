<?php

function xss_clean( $data ) {
  // Fix &entity\n;
  $data = str_replace( array( '&amp;', '&lt;', '&gt;' ), array( '&amp;amp;', '&amp;lt;', '&amp;gt;' ), $data );
  $data = preg_replace( '/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data );
  $data = preg_replace( '/(&#x*[0-9A-F]+);*/iu', '$1;', $data );
  $data = html_entity_decode( $data, ENT_COMPAT, 'UTF-8' );

  // Remove any attribute starting with "on" or xmlns
  $data = preg_replace( '#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data );

  // Remove javascript: and vbscript: protocols
  $data = preg_replace( '#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data );
  $data = preg_replace( '#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data );
  $data = preg_replace( '#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data );

  // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
  $data = preg_replace( '#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data );
  $data = preg_replace( '#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data );
  $data = preg_replace( '#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data );

  // Remove namespaced elements (we do not need them)
  $data = preg_replace( '#</*\w+:\w[^>]*+>#i', '', $data );

  do {
    // Remove really unwanted tags
    $old_data = $data;
    $data = preg_replace( '#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data );
  } while ( $old_data !== $data );

  // we are done...
  return $data;
}

function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
	'@<iframe[^>]*?>.*?</iframe>@si',
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
  }
?>

<?php
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = xss_clean($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}
?>

<?php
  $bad_string = "Hi! <script src='http://www.evilsite.com/bad_script.js'></script> It's a good day!";
  
  $comment = "Hi kjsdhf <iframe src='http://bad-dude-hacker-mafia.com/xss-injection.php' height=100 width=100 /> its a good day";
  
  echo htmlentities ( trim ( $comment ) , ENT_NOQUOTES );
  
  $good_string = sanitize($bad_string);
  echo '<br>';
  echo $good_string;
  echo '<br>';
  echo sanitize($comment);
  // $good_string returns "Hi! It\'s a good day!"

  // Also use for getting POST/GET variables
  /*$_POST = sanitize($_POST);
  $_GET  = sanitize($_GET);*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Test</title>
	<script src="jquery-3.1.1.js" type="text/javascript"></script>
	<script src="jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#signup').validate({ 		
			rules: {
				email: {
					required: true,
					email: true,
					remote: {
						url: "index.php",
						type: "post",
						data:
						{
							emailid: function()
							{
								return $('#signup :input[name="email"]').val();
							}
						}
					}				
				}
			},
			messages: {
				email: {
					required: "Please enter your email address.",
					email: "Please enter a valid email address.",
					remote: "Email already in use!"
				}
			},
			submitHandler: function(form) {
				form.submit();
			}
		});
	});
	/**/
	</script>
</head>
<body>
<form method="post" id="signup" action="index.php" >
    <div class="form-group">
    <label for="email">Email address:</label>
        <input type="text" name="email" id="email">
    </div>
	<div class="form-group">
        <input type="submit" name="submit" id="submit" value="Submit">
    </div>
</form>
<?php 
$a_data = array();
try {
	$sql = 'SELECT * FROM adminuser WHERE roleasdsa = ?';
	$stmt = $conn->prepare($sql);
	if($stmt === false) {
		throw new Exception('Wrong SQL: (' . $sql . ') Error: ' . $conn->errno . ' ' . $conn->error);
	}
	$category_id = 2;
	$stmt->bind_param('i', $category_id);
	$stmt->execute();
	$rs=$stmt->get_result();
	$a_data = $rs->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
   echo $e->getMessage().'lkdjfgkj';
}
echo '<pre>';
print_r($a_data);
echo '</pre>';
?>
</body>
</html>
