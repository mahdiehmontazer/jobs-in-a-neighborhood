<?php
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
?>
</br>
<?php
$colname_details_ostan = "-1";
if (isset($_GET['zone'])) {
$colname_details_ostan = $_GET['zone'];
}
mysql_select_db($database_eqom, $eqom);
$query_details_ostan = sprintf("SELECT name_cat,id_job,count(id_job) c FROM ejobs_qom  right join category_jobs using(id_job)  where active=1 and id_zone=".$colname_details_ostan." group by(name_cat) ", GetSQLValueString($colname_details_ostan, "int"));
$details_ostan = mysql_query($query_details_ostan, $eqom) or die(mysql_error());
$totalRows_details_ostan = mysql_num_rows($details_ostan);
if($totalRows_details_ostan==0)
{?>
<h4 dir="rtl" style="text-align:center;border:#900 1px dashed;border-radius:">در این محله آگهی ثبت نشده است یا توسط آگهی دهنده غیرفعال شده است</h4>
<?php
}?>
<div id="jobs_neighbor">
<ul>
<?php
for($i=0;$i<$totalRows_details_ostan;$i++)
{
$row_details_ostan = mysql_fetch_assoc($details_ostan);
?>
<li dir="rtl">
<a href="index.php?page=show&zone=<?php echo $colname_details_ostan;?>&cat=<?php echo $row_details_ostan['id_job'];?>&navy=<?php echo $_GET['navy'];?>&navy2=<?php echo $row_details_ostan['name_cat'];?>"><?php echo $row_details_ostan['name_cat'].'('.$row_details_ostan['c'].')';?></a></li> 
<?php }?>
</ul>
</div>
<?php
mysql_free_result($details_ostan);
?>
