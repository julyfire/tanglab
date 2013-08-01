<?php
/*
<!--webpage template 2.0
by weibo-->

<?php 
include("template2.php");
showHead("template"); ?>
insert css and javascript here 
<?php showHeader(); ?>

<?php startSidePane(); ?>
insert side pane list here
<?php endSidePane(); ?>

<?php startMainPane(); ?>
insert main pane content here
<?php endMainPane(); ?>

<?php showFooter(); ?>		

*/
function showHead($title) {
	echo <<< EOD
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>TangLab--$title</title>                  

<meta charset="utf-8">
<meta name="description" content="Tang NMR Lab.">
<meta name="author" content="weibo" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<link rel="shortcut icon" type="image/ico" href="../img/icon.png"> <!--small icon on tag -->

<link rel="stylesheet" href="../css/overall2.css"></link>
<link href="$path../css/1MKCHPG-e.css" rel="stylesheet">
<script type="text/javascript" src="../js/1MKCHPG.js"></script>
EOD;
}

function showHeader() {
	echo <<< EOD
</head>
<body class="home blog" onload="init()">
	<div id="wrap">
			<div id="header"><!-- header: logo and navigation -->
				<div id="over">
				  <div id="logo">
						<a href="#"><img src="../img/logo.png" alt="nmr"></a>
				  </div><!-- end of logo -->
                	<div id="web_title">
                		TANG BIOMOLECULAR NMR GROUP
                	</div>
                	<div id="info"> 
EOD;
              	
include('log_info.php');

echo <<< EOD
                  	<div id="go">
                        	<form name="search_all" mathod="get" action="search_all.php" >
                            <input type="text" id="keyword" class="text" name="keyword" value="search this site" onblur="if(!this.value) {this.value='search this site';this.style.color='#b2b2b2';}" onfocus="if(this.value=='search this site') this.value='';this.style.color='#ecd67a'">
                            <input type="button" class="submit" value="Go" onclick="var o=search_all.keyword;if(o.value!='search this site' && o.value.replace(/^\s+|\s+$/g,'')!='') search_all.submit();" >
                            </form>
                     </div>
                	</div><!-- end of info -->
				</div><!-- end of over -->
				<div id="navigation">
				  <ul class="group">
                  	<li id="home"><a href="index.php"><strong>Home</strong></a></li>
                    <li id="plasmid"><a href="plasmid_index.php"><strong>Plasmid</strong></a></li>
                    <li id="protocol"><a href="protocol_index.php"><strong>Protocol</strong></a></li>
                    <li id="reagent"><a href="reagent_index.php"><strong>Reagent</strong></a></li>
                  </ul>
				</div> 
				<!-- end of navigation -->
            </div> <!-- end of header -->    
      
EOD;
}

function startSidePane() {
	echo <<< EOD
			<div id="main" role="main">

			  <div id="aside">
			      <ul class="list_1">	
EOD;
}

function endSidePane() {
	echo <<< EOD
					<li><h4>Links</h4>
						<ul>
							<li><a href="http://www.tanglab.org" target="_blank">www.tanglab.org</a></li>
							<li><a href="http://www.wipm.cas.cn" target="_blank">www.wipm.cas.cn</a></li>
						</ul>					
					</li>
				  </ul>
		      </div><!-- end of aside  -->	

EOD;
}

function startMainPane() {
	echo <<< EOD
		      <div id="content">	
EOD;
}

function endMainPane() {
	echo <<< EOD
			  </div><!-- end of content -->
		  </div><!-- end of main -->			
</div> <!--end of wrap -->	
EOD;
}

function showFooter() {
	echo <<< EOD
	<div id="footer">
		<p>Biomolecular NMR Group, WIPM, CAS © 2010</p>
		<p id="footer-logo"><a href="#"><img src="../img/logo_black.png" alt="nmr"></a></p>
    </div>	
</body>
</html>
EOD;
}

?>
