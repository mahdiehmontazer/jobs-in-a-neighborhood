<?php
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


if (isset($_GET['id_job'])) {
  $updateSQL = sprintf("UPDATE ejobs_qom SET like1=like1+1 where number_job=%s",
                       GetSQLValueString($_GET['id_job'], "int"));
  $Result1 = mysql_query($updateSQL, $eqom) or die(mysql_error());
  $q="select * from ejobs_qom where number_job=".$_GET['id_job'];
  $res=mysql_query($q);
  $f=mysql_fetch_array($res);
 ?> <img  src="image/star2.jpg" width="16" height="16"  >
تعداد پسندها: (<?php echo $f['like1'];?>)
<?php
}?>