<?php
include("access.php");
?>

<?php
$title=$_POST['n_title'];
$time=$_POST['time'];
$detail=$_POST['detail'];
//print_r($_FILES);

$errorInfo='';
$uploads=array();
$filename=array();
$filesize=array();
for($i=1;$i<count($_FILES['attachments']['name']);$i++){
	$name=$_FILES['attachments']['name'][$i];
	$size=$_FILES['attachments']['size'][$i];
	if($size>10000000) { //less than 10M
		$errorInfo.="The size of file '".$name."' is more than 10M limit!\n"; 
		break;
	}
	$uploadDir="../uploads";
	$extension=strrchr($name,'.');

	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	$newFilename=date("YmdHis").mt_rand(1000,9999).$extension;
	$uploadFilename=$uploadDir."/".$newFilename;

	if (file_exists($uploadFilename)){
      $errorInfo.=$uploadFilename." already exists.<br> ";
   }
   else{
   	$uploadState=move_uploaded_file($_FILES["attachments"]["tmp_name"][$i], $uploadFilename);
      if(!$uploadState){
			$errorInfo.="upload file ".$uploadFilename." failed!<br>";
		}	
	}
	$filename[$i-1]=$name;
	$filesize[$i-1]=$size;
	$uploads[$i-1]=$uploadFilename;
	
}

//connect database
include('connDB.php');

if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
else {
	
	$sql="INSERT INTO notice(title,time,content) VALUES('".$title."','".$time."','".$detail."')";
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
	$num=count($uploads);
	if(!$errorInfo && $num!=0 ) {
		$sql="SELECT MAX(id) AS id FROM notice";
		$result=$db->query($sql);
		$row=$result->fetch_assoc();
		$id=$row{'id'};
		for($i=0;$i<$num;$i++) {
			$name=$filename[$i];
			$size=$filesize[$i];
			$path=$uploads[$i];
			$sql="INSERT INTO attachment(n_id,filename,filesize,path) VALUES('".$id."','".$name."','".$size."','".$path."')";
			$result=$db->query($sql);
			if($result!=1) {
				$errorInfo.="Update database failed!<br>";
			}
		}
	}
	
}


?>
<?php 
include("template2.php");
showHead("new notice"); ?>

<?php showHeader(); ?>

<style type="text/css">
table {
	line-height: 1.5;
	width: 600;
	border: 1;
}
th {
	scope: row;
	vertical-align: top;
	width: 100px;
	border: 1px solid #a6997d;
	background: #fff;
	font-size:12px;
}
th em {
	color: #F63;
	line-height: 3;
}
td {
	width: 500px;
	border: 1px solid #a6997d;
	background: #fff;
	font-size:12px;
}
#p_add {
	margin: 20px 0 0 500px;
}
#detail {
	padding: 20px 10px;
}
</style>
<?php startSidePane(); ?>

<?php endSidePane(); ?>

<?php startMainPane(); ?>
			  <?php
			  	if(!$errorInfo) {
			  		echo "<table>\n";
					echo "<tr><th>Subject</th><td>".$title."</td></tr>\n";
					echo "<tr><th>Time</th><td>".$time."</td></tr>\n";
					if($num>0) {
						echo "<tr><th>Attachments</th><td>";
						for($i=0;$i<$num;$i++) {							
							echo "<a href='".$uploads[$i]."'>".$filename[$i]."(".($filesize[$i]/1024)."K)</a><br>";
						}
						echo "</td></tr>\n";
					}
					echo "</table>\n";
					echo "<div id='detail'>".$detail."</div>\n";
					
				}
				else {
					echo $errorInfo;
				}
			  ?>
		      <?php endMainPane(); ?>

<?php showFooter(); ?>
