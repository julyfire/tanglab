<?php
include("access.php");
?>
<?php
$errorInfo='';

$fields=array('reagent_name','cas_num','storage','reagent_use','reagent_notes');
$values='';
foreach($fields as $field){
	if(!get_magic_quotes_gpc()){
		$val=addslashes($_POST[$field]);
	}
	if($val=='') {
		 	$values.="null,";
	}
	else {
		$values.="'".$val."',";
	}
}
$values=rtrim($values,',');
			
//connect database
include('connDB.php');

if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
else {
	//get latest id
	$sql="SELECT MAX(id) AS id FROM reagent";
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$id=$row{'id'}+1;	
	
	$sql="INSERT INTO reagent VALUES(".$id.",".$values.")";
	
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}

$rID=$id;

if(!$errorInfo){
	
	$fields=array('date','quantity','unit','unit_price','specification','total_price','buyer','vendor');
	$values=$rID.",";
	foreach($fields as $field){
		if(!get_magic_quotes_gpc()){
			$val=addslashes($_POST[$field]);
		}
		if($val=='') {
			 	$values.="null,";
		}
		elseif($field=='quantity' || $field=='unit_price' || $field=='total_price') {
			$values.=$val.",";
		}
		else {
			$values.="'".$val."',";
		}
	}
	$values=rtrim($values,',');
			
	//get latest id
	$sql="SELECT MAX(id) AS id FROM reagent_buy_log";
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$id=$row{'id'}+1;	
	
	$sql="INSERT INTO reagent_buy_log VALUES(".$id.",".$values.")";
	
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}

?>
<?php 
include("template2.php");
showHead("new reagent"); ?>

<!--<link rel="stylesheet" href="../css/hover.css"></link>-->
<style type="text/css">
table {
	line-height: 2;
	width="660";
	border="0";
}
th {
	vertical-align: top;
	width: 282px;
}
th em {
	color: #F63;
	line-height: 3;
}
td {
	width: 368px;
}
.p_item {
	width: 300px;
}
#p_add {
	margin: 20px 0 0 450px;
}
</style>
<?php showHeader(); ?>

<?php startSidePane(); ?>
					<li><h4>Pages</h4>
			      <ul>
			      <li><a href="reagent_index.php">Reagent Home</a></li>
					<li><a href="reagent_find.php">Find Reagent</a></li>
					<li><span>Add Reagent </span></li>
				  </ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
		    <?php 
		    	if(!$errorInfo) 
		    		header("Location: reagent_detail.php?id=".$rID);
		    	else{
		    		echo "<header><h2>Add new reagent failed!</h2></header>\n";
		    		echo $errorInfo;
		    		echo '<p>&nbsp;</p><p style="text-align:center;"><br /><input type="button" value="back to submit again" onclick="javascript:history.back();" /></p>';
		    	}
		    		
		    ?>
 
<?php endMainPane(); ?>

<?php showFooter(); ?>
