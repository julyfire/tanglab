<?php
include("access.php");
?>
<?php  

if($_SESSION['level']!=1) {
	echo "You do not have permission to perform this operation!";
	exit();
}

$id=$_GET['id'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

if(!$errorInfo) { 
	
	$sql="DELETE FROM notice WHERE id=".$id;
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}
if(!$errorInfo) {
	$sql="SELECT path FROM attachment WHERE n_id=".$id;
	$result=$db->query($sql);
	$num_r=$result->num_rows;
	for($j=0;$j<$num_r;$j++) {
		$row=$result->fetch_assoc();
		$path=$row{'path'};
		if (file_exists($path)){
			@unlink($path);
			if(file_exists($path))
      		$errorInfo.="delete ".$path." failed!<br>";
      }
	}		
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
	
	if(!$errorInfo) {
		$sql="DELETE FROM attachment WHERE n_id=".$id;
		$result=$db->query($sql);
		if($result!=1) {
			$errorInfo.="Update database failed!<br>";
		}
	}
}

if(!$errorInfo) {
	header("location:".getenv("HTTP_REFERER"));//   返回其调用页面
}
else {
	echo $errorInfo;
}
?>