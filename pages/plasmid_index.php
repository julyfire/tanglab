<?php
include("access.php");
?>
<?php 
include("template2.php");
showHead("plasmid home"); ?>

<style type="text/css">
table {
	line-height: 1;
}
#name{
	width: 250px;
}
select {
	width: 250px;
}
#p_search {
	margin: 10px 0 0 400px;
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
			      <ul class="list_1">
                  	<li><span>Plasmid Page</span></li>
					<li><a href="plasmid_search.php">Find Plasmid</a></li>
					<?php if($_SESSION['level']==1) echo "<li><a href=\"plasmid_add.php\">Add New Plasmid </a></li>";
							//else echo "<li><span>Add New Plasmid </span></li>";
					?>
				  	</ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2>Plasmids List</h2>
		        </header>
                               
                
<?php
include('connDB.php');
if(mysqli_connect_errno()){
	 echo "Error: Could not connect to database. please try again later.";
	 exit;
}

$sql="SELECT id,name,gene,vector,size FROM plasmid";

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
		 <th scope="col">name</th>
		 <th scope="col">target</th>
		 <th scope="col">vector</th>
		 <th scope="col">size</th>	
	</tr>
<?php
for($i=0;$i<$num_results;$i++) {
	$row=$result->fetch_assoc(); //fetch one entry
	$id=$row{'id'};
	echo "<tr>\n";
	echo "<td class='row'>".($i+1)."</td>\n";
	foreach($row as $key=>$value){
		if($key=='id')
			continue;
		elseif($key=="name")
			echo "<td class='row'><a href='plasmid_detail.php?id=".$id."'>".$value."</a></td>\n";
		else 
			echo "<td class='row'>".$value."</td>\n";
	}
	echo "</tr>\n";
}

?>	
</table>



<?php endMainPane(); ?>

<?php showFooter(); ?>