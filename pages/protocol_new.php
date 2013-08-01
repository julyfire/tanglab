<?php
include("access.php");
?>
<?php  
############### 添加新protocol到数据库 ##########################################

//header('Content-Type: text/php; charset=utf-8');
$title="";
$subject="";
$content="";
$time="";
$author=$_SESSION['user'];
$lasttime="";
$lastauthor=$author;

$date=getdate();
$time=$date{'year'}."-".$date{'mon'}."-".$date{'mday'}." ".$date{'hours'}.":".$date{'minutes'}.":".$date{'seconds'};
$lasttime=$time;

$time2=$date{'year'}.$date{'mon'}.$date{'mday'}.$date{'hours'}.$date{'minutes'}.$date{'seconds'};
$filename="./protocols/".$time2.".php";

$subject="uncategorized";
if($_POST['p_title'] && $_POST['p_title']!='') $title=$_POST['p_title'];
if($_POST['p_subject'] && $_POST['p_subject']!="") $subject=$_POST['p_subject'];
if($_POST['p_content'] && $_POST['p_content']!='') $content=$_POST['p_content'];

include("htmlstrip.php");
$brief=htmlSubString($content,300);

$content=str_ireplace("<img src=\"protocols/","<img src=\"",$content); //修改内容中的图片文件路径



/*
//前端显示时要stripslashes();
if(get_magic_quotes_gpc()){
	 $title=stripslashes($title);
	 $content=stripslashes($content);
}
*/
//字段导入数据库时用addslashes();
if(!get_magic_quotes_gpc()){
	 $title_db=addslashes($title);
	 $content_db=addslashes($filename);
}

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}




if(!$errorInfo) { 
	
	//get latest id
	$sql="SELECT MAX(id) AS id FROM protocol";
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$id=$row{'id'}+1;

	//add new data
	$sql="INSERT INTO protocol VALUES(".$id.",'".$title_db."','".$subject."','".$author."','".$time."','".$lasttime."','".$lastauthor."','".$brief."','".$content_db."'".")";
	//echo $sql."<br>";
	$result=$db->query($sql);
	$sql="INSERT INTO p_history(p_id,author,date,title,subject,address) VALUES(".$id.",'".$author."','".$time."','".$title_db."','".$subject."','".$content_db."')";
	//echo $sql."<br>";
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}
?>



<?php

$html1="<?php include('../access.php'); ?>\n";
$html2=<<< EOD
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/php; charset=UTF-8">
<title>TangLab--$title</title>                  

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

	
EOD;

$html3=<<< EOD
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
						<ul>
EOD;

						$sql="SELECT subject,count(subject) num FROM protocol GROUP BY subject";
						if(!$errorInfo) {
							$result=$db->query($sql);
							if($result!=1) {
								$errorInfo.="Query database failed!<br>";
							}
							$num_results=$result->num_rows;
							for($i=0;$i<$num_results;$i++) {
								$row=$result->fetch_assoc(); //fetch one entry
								$html3.= "<li><a href='../protocol_more.php?subject=".$row{'subject'}."'>".$row{'subject'}."</a>(".$row{'num'}.")</li>";
							}
						}

$html4=<<< EOD
						</ul>		
					</li>
					<li><h4>Archives</h4>
						<ul>
EOD;

						$sql="SELECT YEAR(created_date) year,MONTH(created_date) month,COUNT(*) num FROM protocol GROUP BY MONTH(created_date)";
						if(!$errorInfo) {
							$result=$db->query($sql);
							if($result!=1) {
								$errorInfo.="Query database failed!<br>";
							}
							$num_results=$result->num_rows;
							for($i=0;$i<$num_results;$i++) {
								$row=$result->fetch_assoc(); //fetch one entry
								$html4.= "<li><a href='../protocol_more.php?subject=".$row{'year'}."-".$row{'month'}."'>".$row{'year'}."-".$row{'month'}."</a>(".$row{'num'}.")</li>";
							}
						}

$html5=<<< EOD
						</ul>					
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
			      <h2><a href="#">$title</a></h2>
		        </header>
		        <div id="protocol_id" style="display:none">$id</div>
		        <div id="protocol_info">
		        <!--<span>time</span>
		        <span>Categories</span>	-->
		        <span>[article]</span>
		        <span>[<a href="../protocol_edit.php?id=$id">Edit</a>]</span>
		        <span>[<a href="../protocol_history.php?id=$id">History</a>]</span>
		        <span>[<a href="../protocol_discussion.php?id=$id">Discussion</a>]</span>
		        </div>
		        <div id="new_protocol">
		        $content
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

EOD;

$html=$html1.$html2.$html3.$html4.$html5;

?>


<?php


if(!$errorInfo) {
	file_put_contents($filename,$html,FILE_APPEND);
	
	header("Location: ".$filename); 
}
else {
	echo $errorInfo;
}

?>

