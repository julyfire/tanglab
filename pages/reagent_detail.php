<?php
include("access.php");
?>
<?php
$errorInfo='';

$id=$_GET['id'];

//connect database
include('connDB.php');

if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
else {

	$sql="SELECT * FROM reagent WHERE id=".$id;	
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	
	$id=$row{'id'};
	$name=$row{'name'};
	$cas=$row{'cas_num'};
	$storage=$row{'storage'};
	$class=$row{'class'};
	$notes=$row{'notes'};
	
	$sql="SELECT * FROM reagent_buy_log WHERE r_id=".$id;
	$result=$db->query($sql);
	$num_results=$result->num_rows;
}

?>
<?php 
include("template2.php");
showHead("reagent detail"); ?>

<!--<link rel="stylesheet" href="../css/hover.css"></link>-->
<style type="text/css">
table {
	line-height: 2;
	width: 660;
	border: 0;
	background-color: #ebe0ca;
	border-bottom: 1px solid #a6997d;
	border-right: 1px solid #a6997d;
	
}
th {
	vertical-align: top;
	width: 160px;
	padding: 10px;
}
.title {
	color: #F63;
	line-height: 3;
	cursor:pointer;
}
td {
	width: 500px;
}
.p_item {
	width: 300px;
}
#p_add {
	margin: 20px 0 0 450px;
}
dl {
	margin: 20px 0;
	padding: 10px;
	width: 660px;
	background-color: #ebe0ca;
	border-bottom: 1px solid #a6997d;
	border-right: 1px solid #a6997d;
}
dt { 
	border-bottom: 1px solid #a6997d;
}
dt span{
	float: right;
	font-size: 0.8em;
}
.expand  { overflow:visible;}
.collapse  { height:0px;overflow:hidden;}

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

<!--<script type="text/javascript" src="../js/nicetitle.js"></script>-->
<script type="text/javascript" >
function toggle(o){
var o=document.getElementById(o);
if("collapse"==o.className) o.className="expand";
else o.className="collapse";
}
</script>
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
		    <header><h2>Detail information of reagent <em><?php echo $row{'name'}; ?></em></h2></header>
		    <?php if($_SESSION['level']==1){ 
		        	echo "<div id=\"notice_info\">\n";
					echo "	<span><a href=\"reagent_delete.php?id=".$id."\" onclick='return window.confirm(\"Are you sure to delete this entry?\")'>delete</a></span>\n";
		        	echo "</div>\n";
		        	}
		        ?>
		    	  <?php
		    	  	//echo $name.",".$cas.",".$storage.",".$class.",".$notes;
		    	  	echo "<table>\n";
		    	  	echo "<tr><th>Reagent Name: </th><td>".$name."</td></tr>\n";
		    	  	echo "<tr><th>CAS Number: </th><td>".$cas."</td></tr>\n";
		    	  	echo "<tr><th>Notes: </th><td>".$storage."<br>".$class."<br>".$notes."</td></tr>";
		    	  	echo "</table>\n";
		    	  	?>
		    	  	<p></p><em class='title' onclick='toggle("buy_log")'>Purchase Record</em>
		    	  	<div id='buy_log' class='expand'>
		    	  	<?php
		    	  	
		    	  	for($i=0;$i<$num_results;$i++) {
		    	  		$row=$result->fetch_assoc();
		    	  		if($_SESSION['level']!=1) 
		    	  			echo "<dl><dt>".$row{'time'}."</dt>\n";
		    	  		else
		    	  			echo "<dl><dt>".$row{'time'}."<span><a href=\"reagent_delete.php?b_id=".$row{'id'}."\">delete</a></span></dt>\n";
		    	  		echo "<dd>".$row{'price'}."元/".$row{'unit'}." ".$row{'specification'}."/".$row{'unit'}." 购".$row{'quantity'}.$row{'unit'}.", 花费".$row{'total'}."元</dd>\n";
		    	  		echo "<dd>buyer: ".$row{'buyer'}.", vendor: ".$row{'vendor'}."</dd></dl>\n";
		    	   }
		    	   
		    	  ?>
 					</div>
 					<?php
 					if($_SESSION['level']==1)
 						echo "<p></p><em class='title' onclick='toggle(\"add_log\")'>Add new purchase record</em>\n";
 					?>
		    	  	<div id='add_log' class='collapse'>
		    	  	<form name="new_buy_log" id="new_buy_log" method="post" action="reagent_new_buy_log.php" onsubmit="javascript:return checkform();">
		    	  	<table>
		    	  		<tr>
                    <th scope="row">Vendor</th>
                    <td><label>
                      <input name="vendor" type="text" class="p_item" id="vendor" title="the producer or vendor">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Date</th>
                    <td><label>
                      <input name="date" type="text" class="p_item" id="date" title="the date format is like '2011-02-14'">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Buyer</th>
                    <td><label>
                      <input name="buyer" type="text" class="p_item" id="buyer" title="who buys it?">
                    </label></td>
                  </tr>
		    	  		<tr>
                    <th scope="row">Unit Price</th>
                    <td><label>
                      <input name="unit_price" type="text" class="p_item" id="unit_price" title="how much does it cost? (元)">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Unit</th>
                    <td><label>
                      <input name="unit" type="text" class="p_item" id="unit" title="like 瓶，盒，支，g，kg，ml，U...">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Specification</th>
                    <td><label>
                      <input name="specification" type="text" class="p_item" id="specification" title="e.g. 500g">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Quantity</th>
                    <td><label>
                      <input name="quantity" type="text" class="p_item" id="quantity" title="e.g. how many bottles have you bought?">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Total Price</th>
                    <td><label>
                      <input name="total_price" type="text" class="p_item" id="total_price" title="the total cost">
                    </label></td>
                  </tr>
                  
                </table>
                <div id="p_add"><span><input type="reset" value="Clear"></span>
                	<span><input type="submit" value="Add"></span>
                </div>
                <input type="hidden" name="r_id" value="<?php echo $id; ?>">
              </form>
		    	  	</div>
 					
<?php endMainPane(); ?>

<?php showFooter(); ?>

<script type="text/javascript">
    //<![CDATA[
//alert(md5("123456"));
function checkform() {
	var obj=document.getElementById('date');
	if(!obj.value){
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 此项必填 格式yyyy-mm-dd\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:300px;\' />';
			obj.parentNode.insertBefore(newNode,obj); 
			obj.style.display='none';
		} 
		return false;
	}
}
function backinput(obj){
	obj.parentNode.nextSibling.style.display='block';
	obj.parentNode.parentNode.removeChild(obj.parentNode);
	}    //]]>
</script>