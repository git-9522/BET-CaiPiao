<?
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
require ("../include/config.inc.php");
$str   = time();
$uid   = $_REQUEST['uid'];
$langx = $_REQUEST['langx'];
if ($langx==''){
	$langx="zh-cn";	
}
$sql = "select * from web_member_data where Oid='$uid' and Status<=1";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$msgsql = "select * from `web_member_msg` where `state`='0' and `receive`='".$row['UserName']."'";
$msgquery = mysql_db_query($dbname,$msgsql);
$msgnum = mysql_num_rows($msgquery);
if ($msgnum > 0)
{
	$msgtext = "<b><font color='#990000'>$msgnum</font></b>";
}
else
{
	$msgtext = "0";
}
echo $msgtext; 
mysql_close();
?>