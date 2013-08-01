<?php include('../access.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/php; charset=UTF-8">
<title>TangLab--tt</title>                  

<meta charset="utf-8">
<meta name="description" content="Handcrafted pixels and text by Dan Cederholm.">
<meta name="author" content="weibo" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<link rel="shortcut icon" type="image/ico" href="../../img/icon.png"> <!--small icon on tag -->
<link rel="stylesheet" href="../../css/overall2.css"></link>
<link rel="stylesheet" href="../../css/math.css"></link>
<style type="text/css">
#protocol_info {
	text-align: right;
	font-size: 0.7em;
	border-bottom: 1px dotted rgba(252, 107, 53, 0.5);
	margin: 20px 0 20px 0;
}
#protocol_info span {
	text_align: right;
	margin: 2px 5px;
}
</style>
<link href="../../css/1MKCHPG-e.css" rel="stylesheet">


<!-- enable HTML5 elements in IE7+8 -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<script type="text/javascript" src="../../js/1MKCHPG.js"></script>
<script type="text/javascript" src="../../js/xheditor/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../js/xheditor/xheditor-1.1.9-zh-cn.min.js"></script>
</head>

<body class="home blog">

		<div id="wrap">

			<div id="header"><!-- header: logo and navigation -->
				<div id="over">
			
				<div id="logo">
					<a href="#"><img src="../../img/logo.png" alt="nmr"></a>
				</div><!-- logo -->
				<div id="web_title">TANG BIOMOLECULAR NMR GROUP</div>
				<div id="info">
					<?php include('../log_info.php'); ?>
				<div id="go">
					<form name="search_all" mathod="get" action="../search_all.php" >
                            <input type="text" id="keyword" class="text" name="keyword" value="search this site" onblur="if(!this.value) {this.value='search this site';this.style.color='#b2b2b2';}" onfocus="if(this.value=='search this site') this.value='';this.style.color='#ecd67a'">
                            <input type="button" class="submit" value="Go" onclick="var o=search_all.keyword;if(o.value!='search this site' && o.value.replace(/^\s+|\s+$/g,'')!='') search_all.submit();" >
                            </form>
				</div>
				</div><!-- end of info-->
				</div><!--end of over-->
	
				<div id="navigation">
					<ul class="group">
						<li id="home" class="active"><a href="../index.php"><strong>Home</strong></a></li>
						<li id="plasmid"><a href="../plasmid_index.php"><strong>Plasmid</strong></a></li>
						<li id="protocol"><a href="../protocol_index.php"><strong>Protocol</strong></a></li>
						<li id="reagent"><a href="../reagent_index.php"><strong>Reagent </strong></a></li>
					</ul>
				</div> <!-- navigation -->
			</div> <!-- header -->

			
              
			<div id="main" role="main">
			  <div id="aside">
			      <ul class="list_1">
			      <li><h4>Pages</h4>
			      	<ul>
			      	<li><a href="../protocol_index.php">Home</a></li>
						<li><a href="../protocol_add.php">Add protocol</a></li>
						</ul>
			      </li>
					<li><h4>Categories</h4>
						<ul><li><a href='../protocol_more.php?subject=aflasf'>aflasf</a>(1)</li><li><a href='../protocol_more.php?subject=Biochemistry'>Biochemistry</a>(1)</li><li><a href='../protocol_more.php?subject=bioinformation'>bioinformation</a>(1)</li><li><a href='../protocol_more.php?subject=Computer application'>Computer application</a>(1)</li><li><a href='../protocol_more.php?subject=math'>math</a>(1)</li><li><a href='../protocol_more.php?subject=nmr'>nmr</a>(1)</li><li><a href='../protocol_more.php?subject=uncategorized'>uncategorized</a>(3)</li>						</ul>		
					</li>
					<li><h4>Archives</h4>
						<ul><li><a href='../protocol_more.php?subject=2011-9'>2011-9</a>(8)</li><li><a href='../protocol_more.php?subject=2011-10'>2011-10</a>(1)</li>						</ul>					
					</li>
					<li><h4>Links</h4>
						<ul>
							<li><a href="http://www.tanglab.org" target="_blank">www.tanglab.org</a></li>
							<li><a href="http://www.wipm.cas.cn" target="_blank">www.wipm.cas.cn</a></li>
						</ul>					
					</li>
					</ul>
		     </div>
			  <!-- aside  -->
			  <div id="content">
			    <header>
			      <h2><a href="#">tt</a></h2>
		        </header>
		        <div id="protocol_id" style="display:none">9</div>
		        <div id="protocol_info">
		        <!--<span>time</span>
		        <span>Categories</span>	-->
		        <span>[article]</span>
		        <span>[<a href="../protocol_edit.php?id=9">Edit</a>]</span>
		        <span>[<a href="../protocol_history.php?id=9">History</a>]</span>
		        <span>[<a href="../protocol_discussion.php?id=9">Discussion</a>]</span>
		        </div>
		        <div id="new_protocol">
		        alkdsjfaldjfalkdfjalkdjlk<br />
		        </div>
			  </div>
			  <!-- content -->
		  </div>
			<!-- main -->
			
	</div> <!--wrap -->
		

	<div id="footer">
		<p>Biomolecular NMR Group, WIPM, CAS © 2010</p>
		<p id="footer-logo"><a href="#"><img src="../../img/logo_black.png" alt="nmr"></a></p>
	</div>



<!-- c(~) -->

</body>
</html>
