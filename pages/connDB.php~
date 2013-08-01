<?php
include("access.php");
?>
<?php
if($_SESSION['level']==1){
$server="localhost"; //数据库服务器名称
$username="admin"; // 连接数据库用户名
$password="a4m1n"; // 连接数据库密码
$database="tanglab"; // 数据库的名字
}
if($_SESSION['level']==2){
$server="localhost"; //数据库服务器名称
$username="labmember"; // 连接数据库用户名
$password="u5e7s"; // 连接数据库密码
$database="tanglab"; // 数据库的名字
}

// 连接到数据库
$db=new mysqli($server,$username,$password);
$db->select_db($database);

?>