<?php
include("access.php");
?>
<?php 
include("template2.php");
showHead("reagent home"); ?>

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
			      <li><span>Reagent Home</span></li>
					<li><a href="reagent_find.php">Find Reagent</a></li>
					<?php if($_SESSION['level']==1) echo "<li><a href=\"reagent_add.php\">Add Reagent </a></li>";
							//else echo "<li><span>Add Reagent </span></li>";
					?>
				  </ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2><a href="#">Reagent</a></h2>
		        </header>
		
			    <p></p>




<?php
$sql="SELECT DISTINCT name,cas_num,storage,r_id FROM reagent r,reagent_buy_log b WHERE r.id=b.r_id";

$errorInfo='';

//connect database
include('connDB.php');

if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
if(!$errorInfo) {
							$result=$db->query($sql);
							$num_results=$result->num_rows;
							if($num_results>1)
								echo "<header><h2><em>Total ".$num_results." entries:</em></h2></header>";
							else
								echo "<header><h2><em>Total ".$num_results." entry:</em></h2></header>";
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
