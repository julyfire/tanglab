<?php
session_start();

$user=$_POST['username'];
$passwd=$_POST['password'];
$email=$_POST['email'];
$permission=$_POST['permission'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

$sql="SELECT email FROM userlist WHERE username='".$user."'";
$result=$db->query($sql);
if($result->num_rows>0) {
	echo "<script language=\"JavaScript\">";
	echo " alert(\"Username \\\"".$user."\\\" has been used, please choose another one!\");";
	echo " history.back();";
	echo "</script>";
	exit;
}
$sql="SELECT username FROM userlist WHERE email='".$email."'";
$result=$db->query($sql);
if($result->num_rows>0) {
	echo "<script language=\"JavaScript\">";
	echo " alert(\"Email \\\"".$email."\\\" has been used, please choose another one!\");";
	echo " history.back();";
	echo "</script>";
	exit;
}

$sql="INSERT INTO userlist(username,password,email,level) VALUES('".$user."',MD5('".$passwd."'),'".$email."',".$permission.")";
$result=$db->query($sql);

$db->close();

//$_SESSION['user']=$user;
//header("Location: index.php");
echo "<script language=\"JavaScript\">";
echo " alert(\"Username \\\"".$user."\\\" has been created successfully!\");";
//echo " history.back();";
echo "window.location.href=\"user.php\";";
echo "</script>";
//header("location:".getenv("HTTP_REFERER"));
exit; 

?>