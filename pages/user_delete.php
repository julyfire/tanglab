<?php
session_start();

$user=$_POST['username_d'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
$sql="DELETE FROM userlist WHERE username='".$user."'";

$result=$db->query($sql);

$db->close();

//$_SESSION['user']=$user;
//header("Location: index.php");
echo "<script language=\"JavaScript\">";
echo " alert(\"user \\\"".$user."\\\" has been deleted successfully!\");";
//echo " history.back();";
echo "window.location.href=\"user.php\";";
echo "</script>";
//header("location:".getenv("HTTP_REFERER"));
exit; 

?>