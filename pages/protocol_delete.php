<?php
include("access.php");
?>
<?php  
############### 更新protocol到数据库 ##########################################

if($_SESSION['level']!=1) {
	echo "You do not have permission to perform this operation!";
	exit();
}

$h_id=$_GET['h_id'];



//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

if(!$errorInfo) { 
	
	
	$sql="SELECT address FROM p_history WHERE id=".$h_id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$path=$row{'address'};
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
	
	$sql="DELETE FROM p_history WHERE id=".$h_id;
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}
if (!$errorInfo && file_exists($path)){
		@unlink($path);
		if(file_exists($path))
      	$errorInfo.="delete ".$path." failed!<br>";
}

if(!$errorInfo) {
	header("location:".getenv("HTTP_REFERER"));//   返回其调用页面
}
else {
	echo $errorInfo;
}
?>