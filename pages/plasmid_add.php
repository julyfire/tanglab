<?php
include("access.php");
?>
<?php 
if($_SESSION['level']!=1) {
	echo "You do not have permission to perform this operation!";
	exit();
}
include("template2.php");
showHead("add plasmid"); ?>

<style type="text/css">
table {
	line-height: 2;
	width="660";
	border="0";
}
.p_item {
	width: 300px;
}
select {
	width: 300px;
}
#p_add {
	margin: 20px 0 0 450px;
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
#addition {
	display: none;
}
</style>

<script type"text/javascript">
	function display(){
		var showMore = document.getElementById("show_more");
		var hideMore = document.getElementById("addition");
		if(showMore.style.display!="none"){
			showMore.style.display="none";
			hideMore.style.display="block";
		}
		else{
			showMore.style.display="block";
			hideMore.style.display="none";
		}
	}

 	function checkForm(){
 		
 		//window.open("about:blank","update state","width=300,height=100,toolbar=no,location=no,menubar=no,scrollbars=no,marginheight=0 marginwdith=0,directories=no,title=no,status=no,resizable=yes");
 		//oForm = document.getElementById(formId);
 		//oForm.target="_blank";
 		//oForm.submit(); 
 	}

</script>
<?php showHeader(); ?>

<?php startSidePane(); ?>
					<li><h4>Pages</h4>
						<ul>
                  	<li><a href="plasmid_index.php">Plasmid Page</a></li>
							<li><a href="plasmid_search.php">Find Plasmid</a></li>
							<li><span>Add New Plasmid</span></li>
				  		</ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2>Add new plasmid here</h2>
		        </header>
                 <!--<form method="post" enctype="multipart/form-data" name="plasmid_add" id="plasmid_add"  onsubmit="javascript:return checkform();" target="update state" action="plasmid_new.php">-->
                <form method="post" enctype="multipart/form-data" name="plasmid_add" id="plasmid_add"  onsubmit="javascript:return checkform();" action="plasmid_new.php">
			    <table>
			      <tr>
			        <th scope="row"><em>Basic information</em></th>
			        <td>&nbsp;</td>
		          </tr>
			      <tr>
			        <th scope="row">Plasmid name *</th>
			        <td><label>
			          <input type="text" name="name" id="name" class="p_item">
			        </label></td>
		          </tr>
			      <tr>
			        <th scope="row">Vector</th>
			        <td><input type="text" name="vector" class="p_item"></td>
		          </tr>
			      <tr>
			        <th scope="row">Inserted fragment</th>
			        <td><input type="text" name="gene" class="p_item"></td>
		          </tr>
                  <tr>
                    <th scope="row">Sequence</th>
                    <td><label>
                      <textarea name="plasmid_seq" id="plasmid_seq" rows="5" class="p_item"></textarea>
                    </label></td>
                  </tr>
                  </table>
                  <div id="show_more" onclick="display()" style="cursor: hand">
                  <table>
                  <tr>
                    <th scope="row"><em>add more information...</em></th>
                    <td>&nbsp;</td>
                  </tr>
                  </table>
                  </div>
                  <div id="addition">
                  <div id="hide_more" onclick="display()" style="cursor: hand">
                  <table>
                  <tr>
                    <th scope="row"><em>Additional information</em></th>
                    <td>&nbsp;</td>
                  </tr>
                  </table>
                  </div>
                  <table>
                  <tr>
			        <th scope="row">Host</th>
			        <td><input type="text" name="host" class="p_item"></td>
		          </tr>
			      <tr>
			        <th scope="row">Source &amp; Vendor</th>
			        <td><input type="text" name="source" class="p_item"></td>
		          </tr>
			      <tr>
			        <th scope="row">Size</th>
			        <td><input type="text" name="size" class="p_item"></td>
		          </tr>
			      <tr>
			        <th scope="row">Promoter</th>
			        <td><input type="text" name="promoter" class="p_item"></td>
		          </tr>
			      <tr>
			        <th scope="row">Protein tags</th>
			        <td><input type="text" name="tags" class="p_item"></td>
		          </tr>
			      <tr>
			        <th scope="row">Resistance &amp; Selection</th>
			        <td><input type="text" name="resistance" class="p_item"></td>
		          </tr>
			      
			      
			      <tr>
			        <th scope="row">Restriction enzyme cutting site</th>
			        <td><input type="text" name="sites" class="p_item"></td>
		          </tr>
                  <tr>
			        <th scope="row">Sequencing primer</th>
			        <td><input type="text" name="primer" class="p_item"></td>
		          </tr>
                  <tr>
			        <th scope="row">Primer sequence</th>
			        <td><textarea name="primer_seq" id="primer_seq" rows="5" class="p_item"></textarea></td>
		          </tr>
                  <tr>
			        <th scope="row">Target protein sequence</th>
			        <td><textarea name="gene_seq" id="protein_seq" rows="5" class="p_item"></textarea></td>
		          </tr>
                  <tr>
			        <th scope="row">Viral/Non-Viral</th>
			        <td>
			          <label>
			            <input type="radio" name="viral" value="viral" id="viral_0">
			            viral</label>
			          <label>
			            <input type="radio" name="viral" value="nonviral" id="viral_1">
			            non-viral</label>
		            </td>
		          </tr>
                  <tr>
			        <th scope="row">Stable/Transient</th>
			        <td>
			          <label>
			            <input type="radio" name="stable" value="stable" id="stable_0">
			            stable</label>
			          <label>
			            <input type="radio" name="stable" value="transient" id="stable_1">
			            transient</label>
		            </td>
		          </tr>
                  <tr>
			        <th scope="row">Constitutive/Inducible</th>
			        <td>
			          <label>
			            <input type="radio" name="constitutive" value="constitutive" id="constitutive_0">
			            constitutive</label>
			          <label>
			            <input type="radio" name="constitutive" value="inducible" id="constitutive_1">
			            inducible</label>
		            </td>
		          </tr>
                  <tr>
			        <th scope="row">Notes</th>
			        <td><input type="text" name="notes" class="p_item"></td>
		          </tr>
                  <tr>
			        <th scope="row">Plasmid map</th>
			        <td><input type="file" name="map" id="map" class="p_item"></td>
		          </tr>
                  </table>
                  </div>
				<div id="p_add"><span><input type="reset" value="Clear"></span>
                	<span><input type="submit" value="Add"></span>
                </div>
				</form>
<?php endMainPane(); ?>

<?php showFooter(); ?>

<script type="text/javascript">
    //<![CDATA[
//alert(md5("123456"));
function checkform() {
	var obj=document.getElementById('name');
	if(!obj.value){
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 此项必填\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:300px;\' />';
			obj.parentNode.insertBefore(newNode,obj); 
			obj.style.display='none';
		} 
		return false;
	}
	checkForm();
}
function backinput(obj){
	obj.parentNode.nextSibling.style.display='block';
	obj.parentNode.parentNode.removeChild(obj.parentNode);
	}    //]]>
</script>