<?php
include("access.php");
?>
<html>
<body>
<div id='path'>
<?php

$value=$_POST['newvalue'];
$key=$_POST['keyword'];
$id=$_POST['id'];

if($key=='map') {
//can upload gif,jpeg and png image file and file size <200kb
if ((($_FILES["newvalue"]["type"]=="image/gif")
|| ($_FILES["newvalue"]["type"]=="image/jpeg")
|| ($_FILES["newvalue"]["type"]=="image/pjpeg")
|| ($_FILES["newvalue"]["type"]=="image/png"))
&& ($_FILES["newvalue"]["size"]<200000)) {	

	if ($_FILES["newvalue"]["error"] > 0){
		$errorInfo.="Error code: ".$_FILES["newvalue"]["error"]."<br>";
	}
	else{
		
		$filename=$_FILES["newvalue"]["name"];
		//echo "Type: " . $_FILES["newvalue"]["type"] . "<br />";
		$filesize=$_FILES["newvalue"]["size"] / 1024;
		//echo "Temp file: " . $_FILES["newvalue"]["tmp_name"] . "<br />";
		
		$uploadDir="../uploads";
		$extension=substr($_FILES['newvalue']['type'],6);
		PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
		$newFilename=date("YmdHis").mt_rand(1000,9999).'.'.$extension;
		$uploadFilename=$uploadDir."/".$newFilename;


		if (file_exists($uploadFilename)){
      	$errorInfo.=$uploadFilename." already exists.<br> ";
   	}
   	else{
   		$uploadState=move_uploaded_file($_FILES["newvalue"]["tmp_name"], $uploadFilename);
      	if(!$uploadState){
				$errorInfo.="upload file ".$uploadFilename." failed!<br>";
			}	
		}
		
	}
	$value=$uploadFilename;
}
else{
  $uplaodError.="Invalid file<br>";
  $value=$uploadError;
}
}


///////////////////end of upload///////////////

// 连接到数据库
//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 echo "Error: Could not connect to database. please try again later.";
	 exit;
}

$sql="UPDATE plasmid SET ".$key."='".$value."' WHERE id='".$id."'";
$result=$db->query($sql);  

//echo $value;
?>
</div>
</body>
</html>
