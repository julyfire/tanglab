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
	
	$sql="DELETE FROM plasmid WHERE id=".$id;
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}

if(!$errorInfo) {
	//header("location:".getenv("HTTP_REFERER"));//   返回其调用页面
	header("location:plasmid_index.php");
}
else {
	echo $errorInfo;
}
?>