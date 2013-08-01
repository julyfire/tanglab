<?php
include("access.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>TangLab--</title>                  

<meta charset="utf-8">
<meta name="description" content="Handcrafted pixels and text by Dan Cederholm.">
<meta name="author" content="weibo" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<link rel="shortcut icon" type="image/ico" href="../img/icon.png"> <!--small icon on tag -->
<link rel="stylesheet" href="../css/overall2.css"></link>

<style type="text/css">
table {
	line-height: 1.5;
	width: 600;
	border: 1;
}
th {
	scope: row;
	vertical-align: top;
	width: 100px;
	border: 1px solid #a6997d;
	background: #fff;
	font-size:12px;
}
th em {
	color: #F63;
	line-height: 3;
}
td {
	width: 500px;
	border: 1px solid #a6997d;
	background: #fff;
	font-size:12px;
}
#p_add {
	margin: 20px 0 0 500px;
}
#detail {
	padding: 20px 10px;
}
#notice {
	borde: 1px solid #a6997d;
}
</style>
<link href="../css/1MKCHPG-e.css" rel="stylesheet">


<!-- enable HTML5 elements in IE7+8 -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<script type="text/javascript" src="../js/1MKCHPG.js"></script>
<script type="text/javascript" src="../js/jquery-1.js"></script>
</head>

<body class="home blog">


	<div id="wrap">

			<div id="header"><!-- header: logo and navigation -->
				<div id="over">
			
				<div id="logo">
					<a href="#"><img src="../img/logo.png" alt="nmr"></a>
				</div><!-- logo -->
				<div id="web_title">TANG BIOMOLECULAR NMR GROUP</div>
				<div id="info">
					<?php include('log_info.php'); ?>
				<div id="go">
					<form>
						<input type="text" class="text" name="keyword" value="find articals" onblur="if(!this.value) {this.value='find articals';this.style.color='#b2b2b2';}" onfocus="if(this.value=='find articals')this.value='';this.style.color='#ecd67a'">
						<input type="submit" class="submit" value="Go">
					</form>
				</div>
				</div><!-- end of info-->
				</div><!--end of over-->
	
				<div id="navigation">
					<ul class="group">
						<li id="home" class="active"><a href="index.php"><strong>Home</strong></a></li>
						<li id="vector"><a href="plasmid_index.php"><strong>Plasmid</strong></a></li>
						<li id="protocol"><a href="protocol_index.php"><strong>Protocol</strong></a></li>
						<li id="reagent"><a href="reagent_index.php"><strong>Reagent</strong></a></li>
					</ul>
				</div> <!-- navigation -->
			</div> <!-- header -->

			
              
			<div id="main" role="main">
			  <div id="aside">
			      <ul class="list_1">
					<li><span>Link</span></li>
					<li><a href="http://www.tanglab.org" target="_blank">Tang Biomolecular NMR Group</a></li>
					<li><a href="http://www.wipm.cas.cn" target="_blank">WIPM CAS </a></li>
				  </ul>
		     </div>
			  <!-- aside  -->
			  <div id="content">
			    <header>
			      <h2><a href="#">Welcome <?php echo $_SESSION['user']; ?>!</a></h2>
		        </header>
			  		<a href="notice_add.php">add new schedule</a><br>
				
		      </div>
			  <!-- content -->
		  </div>
			<!-- main -->
			
	</div> <!--wrap -->
		

<div id="footer">
		<p>Biomolecular NMR Group, WIPM, CAS © 2010</p>
		<p id="footer-logo"><a href="#"><img src="../img/logo_black.png" alt="nmr"></a></p>
	</div>



<!-- c(~) -->

</body>
</html>