<?php
include("access.php");
?>
<?php  
############### 更新protocol到数据库 ##########################################

if($_SESSION['level']!=1) {
	echo "You do not have permission to perform this operation!";
	exit();
}

$id=$_GET['id'];
$pid=$_GET['pid'];


//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

if(!$errorInfo) { 
	
	$sql="DELETE FROM p_discussion WHERE id=".$id;
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}

if(!$errorInfo) {
	echo "<script language=\"JavaScript\">";
	//echo " history.back();";
	echo "window.location.href='protocol_discussion.php?id=".$pid."';";
	echo "</script>";
	//header("location:".getenv("HTTP_REFERER"));//   返回其调用页面
}
else {
	echo $errorInfo;
}
?>