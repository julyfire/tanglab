<?php
include("access.php");
?>
<?php
if($_SESSION['level']!=1) {
	echo "You do not have permission to perform this operation!";
	exit();
} 
include("template2.php");
showHead("add reagent"); ?>

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
		      <header>
			      <h2><a href="#">Add new reagent</a></h2>
		        </header>
                <form id="reagent_form" name="reagent_form" method="post" action="reagent_new.php" onsubmit="javascript:return checkform();">
                <table>
                  <tr>
                    <th scope="row"><em>Reagent Information</em></th>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">Reagent Name *</th>
                    <td><label>
                      <input name="reagent_name" type="text" class="p_item" id="reagent_name" title="fill in the name">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">CAS Number</th>
                    <td><label>
                      <input name="cas_num" type="text" class="p_item" id="cas_num" title="fill in the CAS number">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Storage Condition</th>
                    <td><label>
                      <input name="storage" type="text" class="p_item" id="storage" title="like storage temperature etc.">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Classification</th>
                    <td><label>
                      <input name="reagent_use" type="text" class="p_item" id="reagent_use" title="the general use of the reagent">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Notes</th>
                    <td><label>
                      <textarea name="reagent_notes" cols="45" rows="3" class="p_item" id="reagent_notes" title="some addition information"></textarea>
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row"><em>Purchase Record</em></th>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">Date *</th>
                    <td><label>
                      <input name="date" type="text" class="p_item" id="date" title="the date format is like '2011-02-14'">
                    </label></td>
                  </tr>
                  <tr>
                    <th scope="row">Vendor</th>
                    <td><label>
                      <input name="vendor" type="text" class="p_item" id="vendor" title="the producer or vendor">
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
              </form>
                <p>&nbsp;</p>
                
<?php endMainPane(); ?>

<?php showFooter(); ?>

<script type="text/javascript">
    //<![CDATA[
//alert(md5("123456"));
function checkform() {
	var obj=document.getElementById('reagent_name');
	if(!obj.value){
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 此项必填,带星号为必填内容\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:300px;\' />';
			obj.parentNode.insertBefore(newNode,obj); 
			obj.style.display='none';
		} 
		return false;
	}
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
