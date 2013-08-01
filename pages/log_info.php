<?php 
echo "<div id='login_info'>\n";
echo "<span><a href=\"help.php\">help</a></span>\n";
if($_SESSION['user']){
					
					echo "<span><a href=\"user.php\">".$_SESSION['user']."</a></span>";
					echo "<span><a href='logout.php'>logout</a></span>";
}
else {
					echo "<span><a href='../index.php'>please login</a></span>";
}
echo "</div><!--end of login_info-->\n";
?>