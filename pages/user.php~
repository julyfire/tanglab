<?php
include("access.php");
?>
<?php
$user=$_SESSION['user'];
$passwd=$_POST['password'];

//connect database
include('connDB.php');
if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}

$sql="SELECT password,email,level FROM userlist WHERE username='".$user."'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
$passwd=$row{'password'};
$email=$row{'email'};
$level=$row{'level'};

$newpw=$_POST['newpw2'];
if($newpw){ 
	$sql="UPDATE userlist SET password=MD5('".$newpw."') WHERE username='".$user."'";
	$result=$db->query($sql);
}
?>
<?php 
include("template2.php");
showHead("user center"); ?>

<style type="text/css">
.expand  { overflow:visible;}
.collapse  { height:0px;overflow:hidden;}
</style>
<script type="text/javascript" >
function toggle(o){
var o=document.getElementById(o);
if("collapse"==o.className) o.className="expand";
else o.className="collapse";
}

function autofill(n){
	document.getElementById('email_e').value=userlist[n][1];
	var c=userlist[n][2]-1;
	document.getElementsByName("permission_e")[c].checked=true;
}

function ifDelete(){		
	return window.confirm("Are you sure to delete this user?");
}
</script>
<?php showHeader(); ?>

<?php startSidePane(); ?>
<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2><a href="#"><?php echo $_SESSION['user']; ?>'s Home</a></h2>
		        </header>
			  
			    <strong>Username:</strong> <?php echo $_SESSION['user']; ?><br />
			    <strong>Email:</strong> <?php echo $email; ?><br />
			    <strong>Privilege:</strong> <?php if($level==1) echo "administrator"; if($level==2) echo "common user"; ?><br />
			    <p></p>
			    <a href='#' onclick="toggle('change_pw')">Change password here</a><br />
			    <div id="change_pw" class='collapse'>
						<form id="pwForm" enctype="multipart/form-data" class="user_form" onsubmit="javascript:return checkform();" method="post" action="user.php">
							<dl class="zend_form">
								<dt id="oldpw-label"><label for="oldpw" class="required">old password</label></dt>
									<dd id="oldpw-element">
										<input type="password" name="oldpw" id="oldpw" value="" trim="1" />
									</dd>
								<dt id="newpw-label"><label for="newpw" class="required">new password</label></dt>
									<dd id="username-element">
										<input type="password" name="newpw" id="newpw" value="" trim="1" />
									</dd>
								<dt id="newpw2-label"><label for="newpw2" class="required">new password again</label></dt>
									<dd id="password-element">
										<input type="password" name="newpw2" id="newpw2" value="" trim="1" />
									</dd>
								<dt id="submit-label">&#160;</dt>	
									<dd id="submit-element">
										<input type="submit" name="submit" id="submit" value="submit" />
									</dd>
						  </dl>						
						</form>			    
			    </div>
			    <p></p>
			    <?php if($_SESSION['level']==1) echo "<a href='#' onclick=\"toggle('add_user')\">Add user here</a><br />\n";?>
			    <div id="add_user" class='collapse'>	
						<form id="useraddForm" enctype="multipart/form-data" class="user_form" onsubmit="javascript:return checkform2();" method="post" action="user_add.php">
							<dl class="zend_form">
								<dt id="email-label"><label for="email" class="required">邮箱</label></dt>
									<dd id="email-element">
										<input type="text" name="email" id="email" value="" trim="1" lowercase="1" />
									</dd>
								<dt id="username-label"><label for="username" class="required">用户名</label></dt>
									<dd id="username-element">
										<input type="text" name="username" id="username" value="" trim="1" />
									</dd>
								<dt id="password-label"><label for="password" class="optional">密码</label></dt>
									<dd id="password-element">
										<input type="password" name="password" id="password" value="" trim="1" />
									</dd>
								<dt id="permission-label"><label for="permission" class="optional">用户权限</label></dt>
									<dd id="permission=element">
			            			<input type="radio" name="permission" value="2" id="permission_0" checked>普通用户
			            			<input type="radio" name="permission" value="1" id="permission_1">管理员
									</dd> 
								<dt id="submit-label">&#160;</dt>	
									<dd id="submit-element">
										<input type="submit" name="submit" id="submit" value="提交" /></dd></dl>
						</form>	
						<div class="errors"></div>
						<div class="messages"></div>			    
			    </div>
			    <p></p>
			     <?php if($_SESSION['level']==1) echo "<a href='#' onclick=\"toggle('edit_user')\">edit user here</a><br />\n";?>
			    <div id="edit_user" class='collapse'>	
			    		<?php
      					//connect database
							include('connDB.php');
							//show the entry from the last two hours
							$sql="SELECT * FROM userlist";
							$result=$db->query($sql);
							$num_results=$result->num_rows;
							
							echo "<script type=\"text/javascript\">\n";
							echo "var userlist=new Array();\n";
							for($i=0;$i<$num_results;$i++){
								$row=$result->fetch_assoc();
								echo "userlist[".$i."]=new Array('".$row{'username'}."','".$row{'email'}."',".$row{'level'}.");\n";
							}
							echo "</script>\n";
						?>
						<form id="usereditForm" class="user_form" method="post" action="user_edit.php">
							<select name="username_e" id="username_e" onchange="autofill(this.value)">
								<option value=''> </option>
								<script type="text/javascript" >
									var se=document.getElementById("username_e");
									for(i=0;i<userlist.length;i++)
										se.options.add(new Option(userlist[i][0],i)); 
								</script>
      					</select>
      					<input type="text" name="email_e" id="email_e" value="" trim="1" lowercase="1" />
      					<input type="radio" name="permission_e" value="1" id="permission_0e" checked>管理员
			            <input type="radio" name="permission_e" value="2" id="permission_1e">普通用户
			            <input type="submit" name="submit" id="submit" value="提交" />
						</form>	
			    
			    </div>
			    <p></p>
			     <?php if($_SESSION['level']==1) echo "<a href='#' onclick=\"toggle('delete_user')\">delete user here</a><br />\n";?>
			    <div id="delete_user" class='collapse'>	
						<form id="userdeleteForm" class="user_form" method="post" action="user_delete.php" onsubmit="return ifDelete();">
							<select name="username_d" id="username_d">
								<script type="text/javascript" >
									var se=document.getElementById("username_d");
									for(i=0;i<userlist.length;i++)
										se.options.add(new Option(userlist[i][0],userlist[i][0])); 
								</script>
      					</select>
			            <input type="submit" name="submit" id="submit" value="Delete" />
						</form>	
			    
			    </div>
<?php endMainPane(); ?>

<?php showFooter(); ?>
<script type="text/javascript" src="../js/md5.js"></script>
<script type="text/javascript">
    //<![CDATA[
//alert(md5("123456"));
function checkform() {

	var obj=document.getElementById('oldpw');
	var pw="<?php echo $passwd; ?>";
	if(md5(obj.value).toUpperCase()!=pw.toUpperCase()){
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 密码错误\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:200px;\' />';
			obj.parentNode.insertBefore(newNode,obj); 
			obj.style.display='none';
		} 
		return false;
	}

	var obj=document.getElementById('newpw');
	var password=obj.value;
	var result=/^[A-Za-z0-9_]{6,20}$/.test(password);
	if(!result || password=='') {
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 6-20位字母数字下划线\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:200px;\' />';
			obj.parentNode.insertBefore(newNode,obj); 
			obj.style.display='none';
		} 
		return false;
	}
	
	var obj=document.getElementById('newpw2');
	var password2=obj.value;

	if(password2!=password || password2=='') {
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 两次输入密码不一致\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:200px;\' />';
			obj.parentNode.insertBefore(newNode,obj); 
			obj.style.display='none';
		} 
		return false;
	}
}
function checkform2(){	
	if(document.getElementById('username')) document.getElementById('username').value=document.getElementById('username').value.replace(/<[^>]+>/g, '');
	var obj=document.getElementById('email');
	var email=obj.value;
	var result=/(\S)+[@]{1}(\S)+[.]{1}(\w)+/.test(email);
	if(!result){
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 请输入正确的email地址\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:200px;\' />';
			obj.parentNode.insertBefore(newNode,obj); 
			obj.style.display='none';
		} 
		return false;
	}
	var obj=document.getElementById('password');
	var password=obj.value;
	var result=/^[A-Za-z0-9_]{6,20}$/.test(password);
	if(!result || password=='') {
		if(!document.getElementById('error_msg')){
			var newNode = document.createElement('span');
			newNode.id='error_msg';
			newNode.innerHTML = '<input onfocus=\'backinput(this)\' type=\'text\' value=\' 6-20位字母数字下划线\' style=\'background:red;font-size:12px;border:1px solid #ccc;height:27px;line-height:25px;width:200px;\' />';
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
