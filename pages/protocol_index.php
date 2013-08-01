<?php
include("access.php");
//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
?>

<?php
include("template2.php");
showHead("protocol home");
?>
<link rel="stylesheet" href="../css/math.css"></link>
<style type="text/css">
.post {
	margin-top: 10px;
	padding-bottom:5px !important;
	padding-bottom:15px;
}
.post h2 {
	display:block;
	margin-top:10px;
	border-bottom:1px solid #CCC;
	padding:0 5px 3px;
	font-size:16px;
	font-family:Verdana,"BitStream vera Sans";
}
.post .post_info {
	margin:5px;
}
.post .post_date, 
.post .post_author,
.post .post_categories {
	padding-right:22px;
	height:16px;
	line-height:16px;
	display:block;
	font-size:11px;
}
.post .post_date {
	float:left;
}
.post .post_author {
	float:left;
}
.post .post_categories {
	padding-left:22px;
	float: right;
	
.post .post_content {
	padding:5px 0 0 5px;
	line-height:145%;
	overflow:hidden;
}
.post .post_content p {
	margin-bottom:10px;
}
</style>
<script type="text/javascript" src="../js/xheditor/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/xheditor/xheditor-1.1.9-zh-cn.min.js"></script>

<?php showHeader(); ?>
<?php startSidePane(); ?>

			      <li><h4>Pages</h4>
			      	<ul>
			      	<li><span>Home</span></li>
						<li><a href="protocol_add.php">Add protocol</a></li>
						</ul>
			      </li>
					<li><h4>Categories</h4>
						<ul>
						<?php
						$sql="SELECT subject,count(subject) num FROM protocol GROUP BY subject";
						if(!$errorInfo) {
							$result=$db->query($sql);
							if($result!=1) {
								$errorInfo.="Query database failed!<br>";
							}
							$num_results=$result->num_rows;
							for($i=0;$i<$num_results;$i++) {
								$row=$result->fetch_assoc(); //fetch one entry
								echo "<li><a href='protocol_more.php?subject=".$row{'subject'}."'>".$row{'subject'}."</a>(".$row{'num'}.")</li>";
							}
						}
						?>	
						</ul>		
					</li>
					<li><h4>Archives</h4>
						<ul>
						<?php
						$sql="SELECT YEAR(created_date) year,MONTH(created_date) month,COUNT(*) num FROM protocol GROUP BY MONTH(created_date)";
						if(!$errorInfo) {
							$result=$db->query($sql);
							if($result!=1) {
								$errorInfo.="Query database failed!<br>";
							}
							$num_results=$result->num_rows;
							for($i=0;$i<$num_results;$i++) {
								$row=$result->fetch_assoc(); //fetch one entry
								echo "<li><a href='protocol_more.php?=date".$row{'year'}."-".$row{'month'}."'>".$row{'year'}."-".$row{'month'}."</a>(".$row{'num'}.")</li>";
							}
						}
						?>
						</ul>					
					</li>
<?php endSidePane(); ?>
<?php startMainPane(); ?>

			    <!--<header>
			      <h2><a href="#">The Latest 10 Protocols</a></h2>
		        </header>-->
    
					<?php
						$sql="SELECT * FROM protocol ORDER BY id DESC LIMIT 5";
						if(!$errorInfo) {
							$result=$db->query($sql);
							if($result!=1) {
								$errorInfo.="Query database failed!<br>";
							}
							$num_results=$result->num_rows;
							for($i=0;$i<$num_results;$i++) {
								$row=$result->fetch_assoc(); //fetch one entry
								echo "<div class='post'>\n";
								echo "<h2><a class='title' href='".$row{'content'}."' rel='bookmark'>".$row{'title'}."</a></h2>\n";
								echo "<div class='post_info'>\n";
								echo "<span class='post_date'>".$row{'created_date'}."</span>\n";
								echo "<span class='post_author'><a href='protocol_more.php?author=".$row{'created_by'}."'>".$row{'created_by'}."</a></span>\n";
								echo "<span class='post_categories'><a href='protocol_more.php?subject=".$row{'subject'}."'>".$row{'subject'}."</a></span>\n";
								echo "<div class='fixed'></div>\n";
								echo "</div><!--end of post_info-->\n";
								echo "<div class='post_content'>\n";
								echo $row{'abstract'};
								echo "<a href='".$row{'content'}."'>more...</a><br>\n";
								echo "<div class='fixed'></div>\n";
								echo "</div><!--end of post_content-->\n";	
								echo "</div><!--end of post-->\n";
							}
						}
					?>              
              
<?php endMainPane(); ?>
<?php showFooter(); ?>	
