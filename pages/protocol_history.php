<?php
include("access.php");
?>
<?php

$id=$_GET['id'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
if(!$errorInfo) { 

	$sql="SELECT title,content FROM protocol where id=".$id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$title=$row{'title'};
	$content=$row{'content'};
	
	$sql="SELECT * FROM p_history WHERE p_id=".$id;
	$result=$db->query($sql);
	$num_results=$result->num_rows;
}	

?>

<?php 
include("template2.php");
showHead("protocol history"); ?>
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

a.handle {
	text_align: right;
	margin: 2px 10px;
	text-decoration: none;
}

#result_list {
	width: 660px;
	padding: 0;
	margin: 0;
}
caption {
	padding: 0 0 5px 0;
	width: 660px;
	font: italic 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	text-align: right;
}
th {
	font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #55441d;
	border-bottom: 1px solid #a6997d;
	border-top: 1px solid #a6997d;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #d4d0c8  no-repeat;
}
td {
	border-bottom: 1px solid #a6997d;
	background: #fff;
	font-size:11px;
	padding: 6px 6px 6px 12px;
	color: #55441d;
}
</style>
<?php showHeader(); ?>

<?php startSidePane(); ?>
					<li><h4>Pages</h4>
			      <ul class="list_1">
					<li><a href="protocol_index.php">Protocol page</a></li>
					<li><span>Add protocol</span>
				  </ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2>The revision history of protocol "<?php echo $title; ?>"</h2>
		        </header>
		        <div id="protocol_id" style="display:none"><?php echo $id; ?></div>
		        <div id="protocol_info">
		        <span>[<a href="<?php echo $content; ?>">article</a>]</span>
		        <span>[<a href="protocol_edit.php?id=<?php echo $id; ?>">Edit</a>]</span>
		        <span>[History]</span>
		        <span>[<a href="protocol_discussion.php?id=<?php echo $id; ?>">Discussion</a>]</span>
		        </div>
		        		<table id='result_list'>
		        			<tr><th>author</th><th>time</th><th>operation</th></tr>
		        <?php
		        		for($i=0;$i<$num_results;$i++) {
							$row=$result->fetch_assoc(); 
							$h_id=$row{'id'};
							$author=$row{'author'};
							$date=$row{'date'};
							$path=$row{'address'};
							echo "<tr><td>".$author."</td><td>".$date."</td>";
							if($_SESSION['level']==1) echo "<td><a class='handle' href='".$path."'>detail</a><a class='handle' href='protocol_restore.php?id=".$id."&h_id=".$h_id."'>restore</a><a class='handle' href='protocol_delete.php?h_id=".$h_id."'>delete</a></td></tr>\n";
							else echo "<td><a class='handle' href='".$path."'>detail</a>";
						}	
				  ?>
                </table>             
                
                
<?php endMainPane(); ?>

<?php showFooter(); ?>