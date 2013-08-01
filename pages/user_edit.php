<?php
session_start();

$user=$_POST['username_e'];
$email=$_POST['email_e'];
$permission=$_POST['permission_e'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

$sql="SELECT username FROM userlist";
$result=$db->query($sql);
$num_results=$result->num_rows;
$ul=array();
for($i=0;$i<$num_results;$i++) {
	$row=$result->fetch_assoc();
	$ul[$i]=$row{'username'};
}

$sql="UPDATE userlist SET email='".$email."',level=".$permission." WHERE username='".$ul[$user]."'"; 

$result=$db->query($sql);

$db->close();

//$_SESSION['user']=$user;
//header("Location: index.php");
echo "<script language=\"JavaScript\">";
echo " alert(\"Update user \\\"".$ul[$user]."\\\" successfully!\");";
//echo " history.back();";
echo "window.location.href=\"user.php\";";
echo "</script>";
//header("location:".getenv("HTTP_REFERER"));
exit; 

?>