<?php
session_start();
if(isset($_GET['keyword']) && isset($_SESSION['results'])) {
	unset($_SESSION['results']);
}
?>
<?php 
include("template2.php");
showHead("keyword"); 
showHeader(); 
startSidePane();
endSidePane();
startMainPane();


if(!isset($_SESSION['results'])){
	
	
	
	$keyword=$_GET['keyword']; 
	$keyword = chop($keyword);
	if(!$keyword){
		echo "please input a keyword!";
		exit;
	}
	$_SESSION['keyword']=$keyword;
	//connect database
	include('connDB.php');
	if(mysqli_connect_errno()){
	 	$errorInfo.="Error: Could not connect to database. please try again later.";
	}
	if(!$errorInfo) {	
		$sql="SELECT content FROM protocol";
		$result=$db->query($sql);
		if($result!=1) {
			$errorInfo.="searching database failed!<br>";
			exit;
		}
		$num_results=$result->num_rows;
		for($i=0;$i<$num_results;$i++) {
			$row=$result->fetch_assoc();
			$paths[$i]=$row{'content'};
		}
	}

	$results=array();
	$i=0;	
	//$results_num = get_msg("./protocols");
	$results_num=get_msg2($paths);
	$_SESSION['results']=$results;
}


$num_per_page=5;//results number each page

//total pages number
$results_num=count($_SESSION['results']);
if ($results_num%$num_per_page==0) 
	$page_num=$results_num/$num_per_page;
else 
	$page_num=floor($results_num/$num_per_page)+1;
	
//current page		
$page=1;
if(isset($_GET['page'])) {
	$page=$_GET['page'];
}

if($page>$page_num) $page=$page_num;
if($page<1) $page=1;

//the results range in the current page 
$pagemin=($page-1)*$num_per_page+1; 
$pagemax=min($results_num,$page*$num_per_page);

echo "<em>Found ".$results_num." results about '".$_SESSION['keyword']."'</em><p></p>";

for($i=$pagemin-1;$i<$pagemax;$i++) {
	echo $_SESSION['results'][$i]."<hr>";
}
echo "<div id='paging' style='margin:30px auto 5px auto;text-align:center'>";
if($page>1) {
echo "[<a href=\"search_all.php?page=".($page-1)."\" target=\"_self\">previous</a>]";
}
echo "[".$page."]";
if($page<$page_num) {
echo "[<a href=\"search_all.php?page=".($page+1)."\" target=\"_self\">next</a>]";
}
echo "</div>";

endMainPane();

showFooter(); 
?>		


<?php
///////////////////////////////////////////////////////////////////////////////////
function get_msg($path) {
	global $i,$keyword;
	$handle = opendir($path);
	while ($filename = readdir($handle)) {
		//echo $path."/".$filename."<br>";
		$newpath = $path."/".$filename;
		if (is_file($newpath)) {
			//check file type, should be *.html file
			$check_type = preg_match("/\.html?$|\.php$/", $filename);
			if(!$check_type) continue;
			$fp = fopen($newpath, "r");
			$msg = fread($fp, filesize($newpath));
			fclose($fp);
			match_show($keyword, $msg, $newpath, $filename);
		}
		if (is_dir($newpath) && ($filename != ".") &&  ($filename != "..")) {
			get_msg($path."/".$filename);
		}
	}
	closedir($handle);
	return $i;
}

function get_msg2($paths) {
	global $i,$keyword;
	foreach($paths as $path){
		$fp = fopen($path, "r");
		$msg = fread($fp, filesize($path));
		fclose($fp);
		match_show($keyword, $msg, $path, basename($path));
	}
	return $i;
}

function match_show($keyword, $msg, $newpath, $filename) {
		global $results,$i;
		$title = getHtmlTitle($msg);
	
		$msg = preg_replace("/<head>.+<\/head>/is", "", $msg);
    	$msg = preg_replace("/<style>.+<\/style>/is", "", $msg);
		$msg = preg_replace("/<script>.+<\/script>/is", "", $msg);
		$msg = preg_replace("/<?php.+\?>/is", "", $msg);
    	$msg = preg_replace("/<[^>]+>/", "", $msg);

		$value = preg_match("/.*$keyword.*/i", $msg, $res);
		if($value) {
			$hit=$res[0];

			$pos=stripos($hit,$keyword);
			$lpos=max(0,$pos-90);
			$rpos=min($pos+strlen($keyword)+90,strlen($hit));
			//retain 25 letter at two sides of the keyword
			$hit=substr($hit,$lpos,$rpos-$lpos)."...";
			//highlight the keywords
			$hit=preg_replace("/$keyword/i", "<span style='background-color: #ddf55c'>$keyword</span>", $hit);

			if(!$title) {$title = $filename;}
			
			$link = $newpath;
			$results[$i] = "<a href=\"$link\">$title</a><br />" .$hit;
			$i++;
	}


}

function getHtmlTitle($msg) {

        /* Locate where <TITLE> is located in html file. */
        $lBound = strpos($msg, '<title>') + 7; //7 is the lengh of <TITLE>.

        if ($lBound < 1)
                return;

        /* Locate where </TITLE> is located in html file. */
        $uBound = strpos($msg, '</title>', $lBound);

        if ($uBound < $lBound)
                return;

        /* Clean HTML and PHP tags out of $title with the madness below. */
        $title = ereg_replace("[\t\n\r]", '', substr($msg, $lBound, $uBound - $lBound));
        $title = trim(strip_tags($title));

        if (strlen($title) < 1) //A blank title is worthless.
                return;
        return $title;
}
/////////////////////////////////////////////////////////////////////////////////////////////
?> 