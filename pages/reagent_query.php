<?php
include("access.php");
?>
<?php
$keyword="";
if($_POST['reagent_name'] && $_POST['reagent_name']!=""){
	$keyword.=" AND name LIKE '%".$_POST['reagent_name']."%'";
}
if($_POST['cas_num'] && $_POST['cas_num']!=""){
	$keyword.=" AND cas_num LIKE '%".$_POST['cas_num']."%'";
}
if($_POST['storage'] && $_POST['storage']!=""){
	$keyword.=" AND storage LIKE '%".$_POST['storage']."%'";
}
if($_POST['classification'] && $_POST['classification']!=""){
	$keyword.=" AND class LIKE '%".$_POST['classification']."%'";
}
if($_POST['date'] && $_POST['date']!=""){
	$keyword.=" AND time LIKE '%".$_POST['date']."%'";
}

$sql="SELECT DISTINCT name,cas_num,storage,r_id FROM reagent r,reagent_buy_log b WHERE r.id=b.r_id".$keyword;

$errorInfo='';

//connect database
include('connDB.php');

if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}


?>
<?php 
include("template2.php");
showHead("query reagent"); ?>

<style type="text/css">
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
	border-right: 1px solid #a6997d;
	border-bottom: 1px solid #a6997d;
	border-top: 1px solid #a6997d;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #d4d0c8  no-repeat;
}
td {
	border-right: 1px solid #a6997d;
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
			      <ul>
			      <li><a href="reagent_index.php">Reagent Home</a></li>
					<li><a href="reagent_find.php">Find Reagent</a></li>
					<?php if($_SESSION['level']==1) echo "<li><a href=\"reagent_add.php\">Add Reagent </a></li>";
							//else echo "<li><span>Add Reagent </span></li>";
					?>
				  </ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			  
					<?php
						if(!$errorInfo) {
							$result=$db->query($sql);
							$num_results=$result->num_rows;
							if($num_results>1)
								echo "<header><h2><em>Find ".$num_results." entries:</em></h2></header>";
							else
								echo "<header><h2><em>Find ".$num_results." entry:</em></h2></header>";
					?>
					<table id="result_list" summary="" >
						<caption></caption>
						<tr>
	    					<th scope="col">id</th>
		 					<th scope="col">Name</th>
		 					<th scope="col">CAS number</th>
		 					<th scope="col">Storage Condition</th>
						</tr>
					<?php			
							for($i=0;$i<$num_results;$i++) {
								$row=$result->fetch_assoc();
								$id=$row{'r_id'};
								echo "<tr>\n";
								echo "<td class='row'>".($i+1)."</td>\n";
								foreach($row as $key=>$value){
									if($key=='r_id')
										continue;
									elseif($key=="name")
										echo "<td class='row'><a href='reagent_detail.php?id=".$id."'>".$value."</a></td>\n";
									else 
										echo "<td class='row'>".$value."</td>\n";
								}
								echo "</tr>\n";
							}
						}
						else {
							echo $errorInfo;
						}
					?>
					</table>
<?php endMainPane(); ?>

<?php showFooter(); ?>

