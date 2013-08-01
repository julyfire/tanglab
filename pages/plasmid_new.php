<?php
include("access.php");
?>
<?php
//get date
$date=getdate();
$time=$date{'year'}.$date{'mon'}.$date{'mday'}.$date{'hours'}.$date{'minutes'}.$date{'seconds'};
//echo $time;
/*
$fields[0]="'".$_POST['name']."'";
$fields[1]="'".$_POST['source']."'";
$fields[2]="'".$_POST['host']."'";
$fields[3]=$_POST['size'];
$fields[4]="'".$_POST['viral']."'";
$fields[5]="'".$_POST['stable']."'";
$fields[6]="'".$_POST['constitutive']."'";
$fields[7]="'".$_POST['promoter']."'";
$fields[8]="'".$_POST['tags']."'";
$fields[9]="'".$_POST['resistance']."'";
$fields[10]="'".$_POST['sites']."'";
$fields[11]="'".$_POST['primer']."'";
$fields[12]="'".$_POST['primer_seq']."'";
$fields[13]="'".$_POST['gene']."'";
$fields[14]="'".$_POST['gene_seq']."'";
$fields[15]="'".$_POST['vector']."'";
$fields[16]="'".$_POST['vector_seq']."'";
$fields[17]="'".$_POST['plasmid_seq']."'";
$fields[18]="'".$_POST['notes']."'";
//$fields[19]="'".$_POST['map']."'";
*/
/////////////////// upload file /////////////
$errorInfo="";
$uploadFilename="";
$uploadState=0;
$filename="";
$filesize="";

$fields=array('name','source','host','size','viral','stable','constitutive','promoter','tags','resistance','site','primer',
					'primer_seq','gene','gene_seq','vector','vector_seq','plasmid_seq','notes');
					
while (list($key, $val) = each($_POST)){
    if(!get_magic_quotes_gpc()){
		$val=addslashes($val);
	 }
	 if($key!='size'){
	 	$val="'".$val."'";
	 }
	 $_POST[$key]=$val;
}


//can upload gif,jpeg and png image file and file size <200kb
if ((($_FILES["map"]["type"]=="image/gif")
|| ($_FILES["map"]["type"]=="image/jpeg")
|| ($_FILES["map"]["type"]=="image/pjpeg")
|| ($_FILES["map"]["type"]=="image/png"))
&& ($_FILES["map"]["size"]<200000)) {
	if ($_FILES["map"]["error"] > 0){
		$errorInfo.="Error code: ".$_FILES["map"]["error"]."<br>";
	}
	else{
		$filename=$_FILES["map"]["name"];
		//echo "Type: " . $_FILES["map"]["type"] . "<br />";
		$filesize=$_FILES["map"]["size"] / 1024;
		//echo "Temp file: " . $_FILES["map"]["tmp_name"] . "<br />";
		
		$uploadDir="../uploads";
		$extension=substr($_FILES['map']['type'],6);
		PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
		$newFilename=date("YmdHis").mt_rand(1000,9999).'.'.$extension;
		$uploadFilename=$uploadDir."/".$newFilename;
		
		if (file_exists($uploadFilename)){
      	$errorInfo.=$uploadFilename." already exists.<br> ";
   	}
   	else{
   		$uploadState=move_uploaded_file($_FILES["map"]["tmp_name"], $uploadFilename);
      	if(!$uploadState){
				$errorInfo.="upload file ".$uploadFilename." failed!<br>";
			}	
		}
	}
}
else{
  $uplaodError.="Invalid file<br>";
}
///////////////////end of upload///////////////

$values="";
foreach($fields as $field){
	if($_POST[$field]=="''" || $_POST[$field]=='') {
		$values=$values."null,";
	}
	else {
		$values=$values.$_POST[$field].",";
	}
}
//$values=rtrim($values,',');
$values.="'".$uploadFilename."'";

//echo $sql;

//connect database
include('connDB.php');

if(mysqli_connect_errno()){
	 $errorInfo.="Error: Could not connect to database. please try again later.";
}
else {
	//get latest id
	$sql="SELECT MAX(id) AS id FROM plasmid";
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
	$id=$row{'id'}+1;	
	
	$sql="INSERT INTO plasmid VALUES(".$id.",".$values.")";
	
	$result=$db->query($sql);
	if($result!=1) {
		$errorInfo.="Update database failed!<br>";
	}
}
?>
<!--<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/php; charset=UTF-8">
<title>TangLab--new plasmid</title>                  

<meta charset="utf-8">
<meta name="description" content="Handcrafted pixels and text by Dan Cederholm.">
<meta name="author" content="weibo" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<link rel="shortcut icon" type="image/ico" href="../img/icon.png"> 
<link rel="stylesheet" href="../css/overall2.css"></link>


<link href="../css/1MKCHPG-e.css" rel="stylesheet">
</head>

<body class="home blog">

	<div id="wrap">-->
	
	
			<?php
				if($errorInfo) {
					echo "<script language=\"JavaScript\">";
					echo " alert(\"Add new plasmid failed!\\nThe error information is as follow:\\n".$errorInfo."\");";
					echo " history.back();";
					echo "</script>";
					exit; 					
				}
				else {
					echo "<script language=\"JavaScript\">";
					echo "alert(\"Add plasmid ".$_POST['name']." successfully!\");";
					echo "window.location.href=\"plasmid_detail.php?id=".$id."\";";
					echo "</script>";
					exit;
				}  
			?>
			
			
<!--	</div> 




</body>
</html>-->