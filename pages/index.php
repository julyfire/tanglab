<?php
include("access.php");

//connect database
include('connDB.php');

if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
else {
	//show the entry from the last two hours
	$sql="SELECT * FROM notice WHERE time>DATE_SUB(NOW(),INTERVAL 2 HOUR) ORDER BY time";
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="searching database failed!<br>";
	}
}

		

?>
<?php
include("template2.php");
echo showHead("index");
?>
<style type="text/css">
table {
	line-height: 1.5;
	border: 1px solid #a6997d;
	margin: 0 20px 10px 20px;
   font-size: 0.7em;
}
th {
	scope: row;
	vertical-align: top;
	width: 100px;
	
}
td {
}
#detail {
	padding: 20px 20px 10px 20px;
}
.notice {
	border: 1px solid #a6997d;
	border-top: 20px solid #efe7d5;
	padding: 10px 20px;
	margin: 10px 50px 0 50px;
	/*阴影*/
	-webkit-box-shadow: 0 2px 3px rgba(78, 68, 60, 0.3);
	-moz-box-shadow: 0 2px 3px rgba(78, 68, 60, 0.3);
	box-shadow: 0 2px 3px rgba(78, 68, 60, 0.3);
}
.notice h2, .notice h3 {
	text-align: center;
}
.notice #dd{
	position: relative;
	top: -32px;
	left: 610px;
	padding: 0 5px;	
}
.notice #dd:hover{
	background-color: #ded6c4;
}
#notice_info {
	text-align: right;
	font-size: 0.8em;
	border-bottom: 1px dotted rgba(252, 107, 53, 0.5);
	margin: 20px 0 20px 0;
}
#notice_info span {
	text_align: right;
	margin: 2px 5px;
}
</style>
<?php echo showHeader(); ?>
<?php startSidePane(); ?>
<?php endSidePane(); ?>
<?php startMainPane(); ?>

			    <header>
			      <h2><a href="#">Welcome <?php echo $_SESSION['user']; ?>!</a></h2>
		        </header>
		        <p></p>
		        <div id="notice_info">
						<span><a href="notice.php">show all events</a></span>
						<?php if($_SESSION['level']==1) echo "<span><a href=\"notice_add\">add events</a></span>";
							//else echo "<span>Add New Plasmid </span>";
						?>		        
		        </div>

			  		<?php
			  			if(!$errorInfo) {
							$num_results=$result->num_rows;
							for($i=0;$i<$num_results;$i++) {
								$row=$result->fetch_assoc(); //fetch one entry
								$id=$row{'id'};
								$title=$row{'title'};
								$time=$row{'time'};
								$content=$row{'content'};
								$filename=array();
								$filesize=array();
								$path=array();
								$sql="SELECT * FROM attachment WHERE n_id=".$id;
								$r=$db->query($sql);
								if($r!=1) {
									$errorInfo.="searching database failed!<br>";
								}
								else {
									$num_r=$r->num_rows;
									for($j=0;$j<$num_r;$j++) {
										$row=$r->fetch_assoc(); //fetch one entry	
										$filename[$j]=$row{'filename'};
										$filesize[$j]=$row{'filesize'};
										$path[$j]=$row{'path'};
									}
								}
								
								echo "<div class='notice'>\n";
								if($_SESSION['level']==1)
									echo "<a id='dd' href='notice_delete.php?id=".$id."'>&times;</a>\n";
								echo "<h2>".$title."</h2>\n";
								echo "<h3><em>".$time."</em></h3>\n";
								echo "<div id='detail'>".$content."</div>\n";
								if($num_r>0) {
									echo "<table><tr><th>Attachments</th><td>";
									for($j=0;$j<$num_r;$j++) {		
										$size=$filesize[$j];
										
										if($size<=512){
											$unit="B";
										}
										else if($size/1024<=512) {
											$size=round($size/1024,1);
											$unit="K";
										}
										else {
											$size=round($size/1024/1024,1);
											$unit="M";
										}
																
										echo "<a href='".$path[$j]."'>".$filename[$j]."(".$size.$unit.")</a><br>";
									}
								echo "</td></tr></table>\n";
								}								
								echo "</div>\n";								
								
								
								
							}
						}
			  		
			  		?>
<?php endMainPane(); ?>
<?php showFooter(); ?>				
