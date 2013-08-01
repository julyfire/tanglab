<?php
session_start();

$user=$_POST['username'];
$passwd=$_POST['password'];

if(!get_magic_quotes_gpc()){
	 $user=addslashes($user);
	 $passwd=addslashes($passwd);
}
$email=$user;

$db=new mysqli("localhost","guest","9ue57");
$db->select_db("tanglab");


$sql="SELECT password,level FROM userlist WHERE username='".$user."' OR email='".$email."'";

$result=$db->query($sql);

$num_results=$result->num_rows;

if($num_results!=0) {
	$row=$result->fetch_assoc();
	$pass=$row{'password'};
	$level=$row{'level'};

	$sql="SELECT MD5('".$passwd."') AS password";
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$passwd=$row{'password'};

}
else {
	$pass='';
}

$result->free();
$db->close();

if($num_results!=0 && $pass==$passwd) {
	$_SESSION['user']=$user;
	$_SESSION['level']=$level;
	header("Location: index.php"); 
}
else {
	echo "<script language=\"JavaScript\">";
	echo " alert(\"username do not exists or password error!\");";
	echo " history.back();";
	echo "</script>";
	exit; 
	
}
?>