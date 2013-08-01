<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>TangLab</title>                  

<meta charset="utf-8">
<meta name="description" content="Handcrafted pixels and text by Dan Cederholm.">
<meta name="author" content="weibo" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<link rel="shortcut icon" type="image/ico" href="img/icon.png"> <!--small icon on tag -->

<link rel="stylesheet" href="css/overall2.css"></link>
<style type="text/css">

</style>
<link href="css/1MKCHPG-e.css" rel="stylesheet">


<!-- enable HTML5 elements in IE7+8 -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<script type="text/javascript" src="js/1MKCHPG.js"></script>
</head>

<body class="home blog">

	<div id="wrap">

			<div id="header"><!-- header: logo and navigation -->
				<div id="over">
				<div id="logo">
					<a href="#"><img src="img/logo.png" alt="nmr"></a>
				</div><!-- end of logo -->
				<div id="web_title">TANG BIOMOLECULAR NMR GROUP</div>
				<div id="info">
					<?php 
						echo "<div id='login_info'>\n";
						echo "<span><a href=\"pages/help.php\">help</a></span>\n";
						if($_SESSION['user']){
							echo "<span><a href=\"user.php\">".$_SESSION['user']."</a></span>";
							echo "<span><a href='logout.php'>logout</a></span>";
						}
						else {
							echo "<span><a href='index.php'>please login</a></span>";
						}
						echo "</div><!--end of login_info-->\n";					
					 ?>
				<div id="go">
					<form>
                            <input type="text" class="text" name="keyword" value="find articals" onblur="if(!this.value) {this.value='find articals';this.style.color='#b2b2b2';}" onfocus="if(this.value=='find articals') this.value='';this.style.color='#ecd67a'">
                            <input type="submit" class="submit" value="Go">
               </form>
				</div>
				</div><!-- end of info-->
				</div><!--end of over-->
				<div id="navigation">
					<ul class="group">
						<li id="home" class="active"><a href="pages/index.php"><strong>Home</strong></a></li>
						<li id="plasmid"><a href="pages/plasmid_index.php"><strong>Plasmid</strong></a></li>
						<li id="protocol"><a href="pages/protocol_index.php"><strong>Protocol</strong></a></li>
						<li id="reagent"><a href="pages/reagent_index.php"><strong>News </strong></a></li>
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
			      <h2><a href="#">麻烦登录先</a></h2>
		        </header>
			    	
			    	<form id="userForm" enctype="multipart/form-data" class="user_form" action="pages/login.php" method="post">
			    		<dl class="zend_form">
						<input type="hidden" name="id" value="" id="id" />
							<dt id="username-label"><label for="username" class="required">username</label></dt>
								<dd id="username-element">
									<input type="text" name="username" id="username" value="" trim="1" />
									<p class="description">username or email</p></dd>
							<dt id="password-label"><label for="password" class="optional">password</label></dt>
								<dd id="password-element">
									<input type="password" name="password" id="password" value="" trim="1" /></dd>
							<dt id="submit-label">&#160;</dt>
								<dd id="submit-element">
									<input type="submit" name="submit" id="submit" value="login" /></dd>
					</dl>
				</form>
				<p></p>
 	<p class="blue">还没有账户，现在就去 <a href="pages/signup.php">注册</a> 一个吧。</p>
		      </div>
			  <!-- content -->
		  </div>
			<!-- main -->

	</div> <!--wrap -->
		

	<div id="footer">
		<p>Biomolecular NMR Group, WIPM, CAS © 2010</p>
		<p id="footer-logo"><a href="#"><img src="img/logo_black.png" alt="nmr"></a></p>
	</div>



<!-- c(~) -->

</body>
</html>
