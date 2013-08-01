<?php
include("access.php");
?>
<?php  
############### 更新protocol到数据库 ##########################################

$id=$_GET['id'];
$h_id=$_GET['h_id'];

$sql="UPDATE protocol SET title=(SELECT title FROM p_history WHERE id=".$h_id."), 
		subject=(SELECT subject FROM p_history WHERE id=".$h_id."),
		modified_date=(SELECT date FROM p_history WHERE id=".$h_id."),
		modified_by=(SELECT author FROM p_history WHERE id=".$h_id."),
		content=(SELECT address FROM p_history WHERE id=".$h_id.") WHERE id=".$id;

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

if(!$errorInfo) { 
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
	
	$sql="SELECT content FROM protocol WHERE id=".$id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$path=$row{'content'};
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}

if(!$errorInfo) {
	header("Location: ".$path);
}
else {
	echo $errorInfo;
}
?>