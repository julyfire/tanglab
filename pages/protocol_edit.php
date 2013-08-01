<?php
include("access.php");
?>
<?php
##################### protocol edtion page ####################



$id=$_GET['id'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
if(!$errorInfo) { 
	$sql="SELECT title,subject,content FROM protocol WHERE id=".$id;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$title=$row{'title'};
	$subject=$row{'subject'};
	$content=$row{'content'};


	// extract content
	include('simple_html_dom.php');
	$html=file_get_html($content);	
	$contentDiv = $html->find("div[id='new_protocol']", 0)->innertext; 
	$contentDiv=str_ireplace("<img src=\"images","<img src=\"protocols/images",$contentDiv); //修改内容中的图片文件路径
	$contentDiv=htmlspecialchars($contentDiv);
	

	echo <<< EOD
<script type="text/javascript">
	function init() {
		var ori=document.getElementById('newProtocol');
		ori.p_title.value="$title";
		ori.p_id.value="$id";
		ori.p_subject.value="$subject";
		/*
		var sub=ori.p_subject;
		for(var i=0;i<sub.options.length;i++)
			if(sub.options[i].value=="$subject")
				sub.options[i].selected=true;
		*/
	}
</script>
EOD;


}

?>



<?php 
include("template2.php");
showHead("edit protocol"); ?>
<link rel="stylesheet" href="../css/math.css"></link>
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
					<li><a href="protocol_add.php">Add protocol</a></li>
				  </ul>
					</li>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2>Protocol editing...</h2>
		        </header>
		        <div id="protocol_id" style="display:none"><?php echo $id; ?></div>
		        <div id="protocol_info">
		        <span>[<a href="<?php echo $content; ?>">article</a>]</span>
		        <span>[Edit]</span>
		        <span>[<a href="protocol_history.php?id=<?php echo $id; ?>">History</a>]</span>
		        <span>[<a href="protocol_discussion.php?id=<?php echo $id; ?>">Discussion</a>]</span>
		        </div>
                <form method="post" name="newProtocol" id="newProtocol" action="protocol_update.php">
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
		<span style="margin-left:573px;overflow:hidden;"> 
      <select name="subject_list" id="subject_list" style="width:590px;margin-left:-573px" onchange="document.getElementById('p_subject').value=this.value">
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
		<input type="text" id="p_subject" name="p_subject" style="height:23px;width:573px;position:absolute;left:0px;top:2px" /> 
	</div> 
    </td>
  </tr>
  <tr>
    <td colspan="2" scope="row" width="700">
    	<textarea id="p_content" name="p_content" rows="12" style="width: 100%">
 			<?php echo $contentDiv; ?>
		</textarea>
	</td>
  </tr>
</table>
<input type="hidden" name="p_id" id="p_id">
<div id="p_add"><span><input type="button" value="cancel" onclick="javascript:history.back();"></span>
					<span><input type="submit" value="ok" onclick="return checkForm('newProtocol')"></span>
                	<!--<span><input type="button" value="submit" onclick="checkForm('newProtocol')"></span>-->
                </div>
				</form>
<?php endMainPane(); ?>

<?php showFooter(); ?>
