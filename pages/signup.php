<?php 
include("template2.php");
showHead("template"); ?>

<?php showHeader(); ?>

<?php startSidePane(); ?>

<?php endSidePane(); ?>

<?php startMainPane(); ?>
			    <header>
			      <h2><a href="#">Welcome guest!</a></h2>
		        </header>
			    	
			    	<div class="form" style="float:left;">
						<form id="userForm" enctype="multipart/form-data" class="user_form" onsubmit="javascript:return checkform();" method="post" action="register.php">
							<dl class="zend_form">
								<dt id="email-label"><label for="email" class="required">邮箱</label></dt>
									<dd id="email-element">
										<input type="text" name="email" id="email" value="" trim="1" lowercase="1" />
										<p class="description"><!--激活邮件将发送到这个邮箱里。--></p></dd>
								<dt id="username-label"><label for="username" class="required">用户名</label></dt>
									<dd id="username-element">
										<input type="text" name="username" id="username" value="" trim="1" />
										<p class="description">其他人看到的您的名号</p></dd>
								<dt id="password-label"><label for="password" class="optional">密码</label></dt>
									<dd id="password-element">
										<input type="password" name="password" id="password" value="" trim="1" />
										<p class="description">6到20个英文字符、数字或下划线</p></dd>
								<dt id="submit-label">&#160;</dt>	
									<dd id="submit-element">
										<input type="submit" name="submit" id="submit" value="提交" /></dd></dl>
						</form>	
						<div class="errors"></div>
						<div class="messages"></div>
				</div>
			    	
			    	
		      <?php endMainPane(); ?>

<?php showFooter(); ?>		
<script type="text/javascript">
    //<![CDATA[

function checkform() {
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