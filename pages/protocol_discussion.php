<?php
include("access.php");
?>
<?php 
include("template2.php");
showHead("protocol discussion"); ?>
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
.comment{
	border-right: 1px solid #a6997d;
	border-bottom: 1px solid #a6997d;
	margin: 10px 20px;
	padding: 10px;
	background-color: #f6ebd5;
}
.comment span{
	float: left;
	padding-right: 20px;
}
.comment a{
	float: right;
	text-align: center;
	padding: 0 7px;
}
.comment a:hover{
	background-color: #e5dac4;
	cursor: pointer;
	color: red;
}
.comment .content{
	clear: both;
	border-top: 1px dashed #a6997d;
	padding-top: 10px;
}
#newComment{
	padding-top: 50px;
	margin: 10px 20px;
</style>
<script type="text/javascript" src="../js/xheditor/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/xheditor/xheditor-1.1.9-zh-cn.min.js"></script>
<script type="text/javascript">
$(pageInit); //xheditor init
function pageInit()
{
	$('#discuss').xheditor({upImgUrl:"protocol_image_upload.php",upImgExt:"jpg,jpeg,gif,png"});
}
</script>
<?php showHeader(); ?>

<?php startSidePane(); ?>

<?php endSidePane(); ?>

<?php startMainPane(); ?>
				
<?php

$id=$_GET['id'];
if($id) $_SESSION['refresh']=0;
if($_SESSION['refresh']==1) $_POST['discuss']='';
if($_POST['discuss'] && $_POST['discuss']!='') $content=$_POST['discuss'];
if($_POST['pid'] && $_POST['pid']!='') $pid=$_POST['pid'];
if(!$id) $id=$pid;
//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
if(!$errorInfo) { 

	$sql="SELECT title,content FROM protocol where id=".$id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$ptitle=$row{'title'};
	$pcontent=$row{'content'};
}
?>
<header>
			      <h2>Comments for the protocol "<?php echo $ptitle; ?>"</h2>
		        </header>
<div id="protocol_info">
		        <span>[<a href="<?php echo $pcontent; ?>">article</a>]</span>
		        <span>[<a href="protocol_edit.php?id=<?php echo $id; ?>">Edit</a>]</span>
		        <span>[<a href="protocol_history.php?id=<?php echo $id; ?>">History]</a></span>
		        <span>[Discussion]</span>
		        </div>
<?php


if($content && !get_magic_quotes_gpc()){
	 $content=addslashes($content);
}
if(!$errorInfo && $content) {
	$time=date("Y-m-d H:i:s");
	$sql="INSERT INTO p_discussion(p_id,author,date,talk) VALUES(".$pid.",'".$_SESSION['user']."','".$time."','".$content."')";
	$result=$db->query($sql);
	$_SESSION['refresh']=1;  //禁止重复提交
}

if(!$errorInfo) { 
	
	$sql="SELECT * FROM p_discussion WHERE p_id=".$id." ORDER BY date DESC";
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}
if(!$errorInfo) {
	$num_results=$result->num_rows;
	for($i=0;$i<$num_results;$i++) {
		$row=$result->fetch_assoc();
		echo "<div id='comment_".$row{'id'}."' class='comment'>\n";
		echo "<span>".$row{'author'}."</span><span>".$row{'date'}."</span>\n";
		if($_SESSION['level']==1)
			echo "<a href='protocol_delete_comment.php?id=".$row{'id'}."&pid=".$id."'>&times;</a>\n";
		echo "<div class='content'>".$row{'talk'}."</div>\n";
		echo "</div>\n";
	}
}
?>
<div id='newComment'>
<form id="commentForm" method="post" action="protocol_discussion.php">
<textarea id="discuss" name="discuss" rows="12" style="width: 100%">
</textarea>
<input type="hidden" name="pid" value="<?php echo $id; ?>" >
<div id="p_add">
<span><input type="reset" value="cancel"></span>
<?php
 if($_SESSION['refresh']==1)
	echo "<span><input type=\"button\" value=\"comment\" disabled='disabled' style=\"color: #909090\"></span>\n";
 else 
 	echo "<span><input type=\"submit\" value=\"comment\"></span>\n";
?>
</div>
</form>
</div>
<?php endMainPane(); ?>

<?php showFooter(); ?>		