<?php
include("access.php");
?>
<?php
if($_SESSION['level']!=1) {
	echo "You do not have permission to perform this operation!";
	exit();
}
include("template2.php");
showHead("add notice");
?>

<style type="text/css">
table {
	line-height: 2;
	width: 660;
	border: 0;
}
th {
	vertical-align: top;
	width: 100px;
	padding: 5px;
}
th em {
	color: #F63;
	line-height: 3;
}
td {
	width: 500px;
	padding: 5px;
}
#p_add {
	margin: 20px 0 0 500px;
}
</style>
<script language="javascript" src="../js/protoplasm-0.2b2/protoplasm.js"></script>
<script language="javascript"> 
// transform() calls can be chained together 
Protoplasm.use('datepicker').transform('input.time', { 'timePicker': true, 'use24hrs': true, 'locale': 'cn_CN' });
Protoplasm.use('rte').transform('textarea.detail');
Protoplasm.use('upload').transform('input.upload', {'multiple': true});
</script>

<!--<script type="text/javascript" src="../js/meteora-0.7.1/src/meteora.js"></script>
<script language="javascript">
Meteora.uses('Meteora.Calendar');
Meteora.onStart(
  function () {
    new Calendar(
      'time_picker',
      {
        format: '%Y-%m-%d %H:%i',
        minYear: 2000,
        maxYear: 2020,
        showHour: true,
        showMinute: true,
        showMeridiem: true
    });
  }
);
</script>-->

<?php showHeader(); ?>
<?php startSidePane(); ?>
<?php endSidePane(); ?>
<?php startMainPane(); ?>

			    <header>
			      <h2>New Schedule</h2>
		        </header>
		        <form method="post" name="newNotice" id="newNotice" enctype="multipart/form-data" action="notice_new.php">
                <table>
  <tr>
    <th scope="row">Title</th>
    <td><label>
      <input type="text" name="n_title" id="n_title"  style="width: 500px">
    </label></td>
  </tr>
  <tr>
    <th scope="row">Time</th>
    <td><label>
      <input type="text" name="time" class="time">
      <!--<input type="text" id="time_picker" />-->
    </label></td>
  </tr>
  <tr>
    <td colspan="2" scope="row" width="660">
    	<textarea id="detail" name="detail" class="detail" rows="12" style="width: 620px">
		</textarea>
	</td>
  </tr>
  <tr>
  	<th scope="row">Attachments</th>
  	<td>
  		<input type="file" name="attachments[]" id="map" class="upload">
	
  	</td>
  </tr>
</table>
<div id="p_add"><span><input type="reset" value="clear"></span>
					<span><input type="submit" value="ok" onclick="return true"></span>
                	<!--<span><input type="button" value="submit" onclick="checkForm('newProtocol')"></span>-->
                </div>
				</form>
			    
<?php endMainPane(); ?>
<?php showFooter(); ?>

