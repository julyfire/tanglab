<?php
include("access.php");
?>
<?php  

if($_SESSION['level']!=1) {
	echo "You do not have permission to perform this operation!";
	exit();
}

$b_id=$_GET['b_id'];
$id=$_GET['id'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

if(!$errorInfo && $b_id) { 

	$sql="DELETE FROM reagent_buy_log WHERE id=".$b_id;
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
	if(!$errorInfo) {
		header("location:".getenv("HTTP_REFERER"));//   返回其调用页面
	}
	else {
		echo $errorInfo;
	}
}
elseif(!$errorInfo && $id) {

	$sql="DELETE FROM reagent WHERE id=".$id;
	echo $sql."<br>";
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
	$sql="DELETE FROM reagent_buy_log WHERE r_id=".$id;
	echo $sql."<br>";
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
	if(!$errorInfo) {
		header("location:reagent_index.php");
	}
	else {
		echo $errorInfo;
	}	 
}
else {
	if(!$errorInfo) {
		header("location:reagent_index.php");
	}
	else {
		echo $errorInfo;
	}
} 


?>