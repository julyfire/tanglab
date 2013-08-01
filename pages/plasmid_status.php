<?php
session_start();
if(!$_SESSION['user'])
header("Location: ../index.html");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/php; charset=UTF-8">
<title>TangLab--</title>                  

<meta charset="utf-8">
<meta name="description" content="Handcrafted pixels and text by Dan Cederholm.">
<meta name="author" content="weibo" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<link rel="shortcut icon" type="image/ico" href="../img/icon.png"> <!--small icon on tag -->
<link rel="stylesheet" href="../css/overall2.css"></link>


<link href="../css/1MKCHPG-e.css" rel="stylesheet">
</head>

<body class="home blog">
	<div id="login_info">
		<?php if($_SESSION['user']){
					echo "<span>current user: <a href=\"user.php\">".$_SESSION['user']."</a></span>";
					echo "<span><a href='logout.php'>logout</a></span>";
				}
				else {
					echo "<span><a href='../index.html'>please login</a></span>";
				}
		
		 ?>
	</div>

	<div id="wrap">
			successful!
	</div> <!--wrap -->


<!-- c(~) -->

</body>
</html>
