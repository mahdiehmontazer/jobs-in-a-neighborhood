
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

/* {
$query_last = sprintf("delete FROM ejobs_qom WHERE number_job = %s ", GetSQLValueString($_GET['job'], "int"));
$last = mysql_query($query_last, $eqom) or die(mysql_error());
header("location:index.php?page=last&okdel=1");
}
*/
$colname_last = "-1";
if (isset($_SESSION['id_qom'])) {
  $colname_last = $_SESSION['id_qom'];
}
mysql_select_db($database_eqom, $eqom);
$query_last = sprintf("SELECT * FROM ejobs_qom join amir_zone using(id_zone) WHERE id_user = %s ORDER BY date_insert DESC", GetSQLValueString($colname_last, "int"));
$last = mysql_query($query_last, $eqom) or die(mysql_error());
$totalRows_last = mysql_num_rows($last);
if($totalRows_last>0)
{
	?>
    <?php
	$i=0;
while($row_last = mysql_fetch_assoc($last))
{
	$i++;
?>
    
    
<div id="last_qom">
<div class="right"><?php if(@!$row_last['img_job'])
	  echo'<img  src="image/nothing.jpg" width="150" height="150" />';
	  else echo'<img width="150" height="150" src="'.$row_last['img_job'].'" />';?>
      </div>
<div class="left">
<div class="option_jobs">عنوان آگهی:<?php echo $row_last['title_job'];?></div>
<div class="option_jobs">متن آگهی:<?php echo $row_last['matn_job'];?></div>
<div class="option_jobs">تاریخ درج:<?php echo $row_last['date_insert'];?></div>
<div class="option_jobs"> محله: <?php echo $row_last['zone'];?> </div>
<div class="option_jobs1"><a href="index.php?page=edit&job=<?php echo $row_last['number_job'];?>">  مشاهده جزئیات و ویرایش آگهی </a></div>
<?php
if($row_last['active']==1)
{
	?>
<div class="option_jobs1" id="active_a<?php echo $i;?>"><a  style="cursor:pointer;" onclick="update_a(<?php echo $row_last['number_job'];?>,2,<?php echo $i;?>)">غیر فعال کردن آگهی</a></div>
<?php
}
else
{
	?>
    <div class="option_jobs1" id="active_a<?php echo $i;?>">
    <a  style="cursor:pointer;" onclick="update_a(<?php echo $row_last['number_job'];?>,1,<?php echo $i;?>)"> فعال کردن آگهی</a></br>( توجه: <?php echo $_SESSION['user_qom'];?> عزیز این آگهی را غیر فعال کرده اید )</div>
<?php
}
?>
</div>
</div>
<?php
}?>

<?php

}
else
echo'</br><h4 dir="ltr" style="text-align:center;border:#900 1px dashed;border-radius:">آگهی وجود ندارد</h4>';
mysql_free_result($last);
if(isset($_GET['ok']))
echo'<script>alert("ویرایش با موفقیت انجام شد");</script>';
if(isset($_GET['okdel']))
echo'<script>alert("حذف با موفقیت انجام شد");</script>';
?>
