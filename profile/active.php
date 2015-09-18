<?php
session_start();
require_once("../Connections/eqom.php");
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
if(isset($_GET['job']))
{
	$act=$_GET['active'];
$query_last = sprintf("update ejobs_qom set active=$act WHERE number_job = %s", GetSQLValueString($_GET['job'], "int"));
$last = mysql_query($query_last) or die(mysql_error());
if($act==2)
{
	?>
<a  style="cursor:pointer;" onclick="update_a(<?php echo $_GET['job'];?>,1,<?php echo $_GET['index1'];?>)"> فعال کردن آگهی </a>
</br>( توجه: <?php echo $_SESSION['user_qom'];?> عزیز این آگهی را غیر فعال کرده اید )
<?php
}
else
{?>
<a  style="cursor:pointer;" onclick="update_a(<?php echo $_GET['job'];?>,2,<?php echo $_GET['index1'];?>)">غیر فعال کردن آگهی</a>
<?php
}
}
?>