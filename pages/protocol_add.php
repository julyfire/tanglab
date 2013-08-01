<?php
include("access.php");
?>
<?php 
include("template2.php");
showHead("add new protocol"); ?>
<link rel="stylesheet" href="../css/math.css"></link>
<style type="text/css">
table {
	width: 100%;
	line-height: 2;
	border: 0;
}
th {
	vertical-align: top;
	width: 15%;
}
th em {
	color: #F63;
	line-height: 3;
}
td {
	width: 85%;
}
#p_add {
	float: right;
}
</style>

<script type="text/javascript" src="../js/xheditor/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/xheditor/xheditor-1.1.9-zh-cn.min.js"></script>
<script type="text/javascript">
$(pageInit); //xheditor init
function pageInit()
{
	$('#p_content').xheditor({upImgUrl:"protocol_image_upload.php",upImgExt:"jpg,jpeg,gif,png"});
}

function checkForm(formID){
		var form=document.getElementById(formID);
		var title=form.p_title.value;
		if(!title){
			alert("Need a title!");
			return false;
		}
		//form.target="update state";
		//window.open("about:blank","update state","width=800,height=500,toolbar=no,location=no,menubar=no,scrollbars=yes,marginheight=0 marginwdith=0,directories=no,title=no,status=no,resizable=yes");
 		return true;
		//form.submit();		
 	}
</script>
<?php showHeader(); ?>

<?php startSidePane(); ?>
					<li><h4>Pages</h4>
			      <ul>
					<li><a href="protocol_index.php">Protocol page</a></li>
					<li><span>Add protocol</span></li>
				  </ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2>Add new protocol here</h2>
		        </header>
                <form method="post" name="newProtocol" id="newProtocol" action="protocol_new.php">
                <table>
  <tr>
    <th scope="row">Title</th>
    <td>
      <input type="text" name="p_title" id="p_title" style="width: 590px">
    </td>
  </tr>
  <tr>
    <th scope="row">Subject</th>
    <td>
    <div style="position:relative;"> 
		<span style="margin-left:565px;overflow:hidden;"> 
      <select name="subject_list" id="subject_list" style="width:590px;margin-left:-565px" onchange="document.getElementById('p_subject').value=this.value">
      	<?php
      		//connect database
				include('connDB.php');
				//show the entry from the last two hours
				$sql="SELECT DISTINCT subject FROM protocol";
				$result=$db->query($sql);
				$num_results=$result->num_rows;
				for($i=0;$i<$num_results;$i++) {
					$row=$result->fetch_assoc();
					echo "<option value='".$row{'subject'}."'>".$row{'subject'}."</option>\n";
				}
      	?>
      </select>
      </span>
		<input type="text" id="p_subject" name="p_subject" style="height:20px;width:565px;position:absolute;left:0px;top:2px" /> 
	</div> 
    </td>
  </tr>
  <tr>
    <td colspan="2" scope="row" width="700">
    	<textarea id="p_content" name="p_content" rows="12" style="width: 100%">

		</textarea>
	</td>
  </tr>
</table>
<div id="p_add"><span><input type="reset" value="clear"></span>
					<span><input type="submit" value="ok" onclick="return checkForm('newProtocol')"></span>
                	<!--<span><input type="button" value="submit" onclick="checkForm('newProtocol')"></span>-->
                </div>
				</form>
		      </div>
<?php endMainPane(); ?>

<?php showFooter(); ?>