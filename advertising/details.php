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


$colname_Recordset1 = "-1";
if (isset($_GET['stringjob'])) {
  $colname_Recordset1 = $_GET['stringjob'];
}
//باردید کنندگان
$q=sprintf("update ejobs_qom set count_viewer=count_viewer+1 where number_job=%s", GetSQLValueString($colname_Recordset1, "int"));
mysql_query($q) or die(mysql_error());
$query_Recordset1 = sprintf("SELECT * FROM ejobs_qom join amir_zone using(id_zone) WHERE number_job = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $eqom) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<div id="detail_job">
<div class="left">
<div class="img">
<?php if(!$row_Recordset1['img_job'])
{
	?>
<img src="image/nothing.jpg" width="160" height="160">
<?php
}
else
{
	?>
    <img src="<?php echo  $row_Recordset1['img_job'];?>" width="180" height="180"/>
    <?php
}?>
</div>

</div>
<div class="right">
<div class="title"><?php echo $row_Recordset1['title_job'];?></div>
<div class="matn"><?php echo $row_Recordset1['matn_job'];?></div>
<div class="property"><span> نام آگهی دهنده:</span><?php if(!$row_Recordset1['name_qom']) echo'----';else echo $row_Recordset1['name_qom'];?></div>
<div class="property"><span> عنوان مغازه یا شرکت: </span><?php if(!$row_Recordset1['name_shoping']) echo'----';else echo $row_Recordset1['name_shoping'];?></div>
<div class="property"><span> تلفن: </span><?php if(!$row_Recordset1['tel_job']) echo'----';else echo $row_Recordset1['tel_job'];?></div>
<div class="property"><span>فكسي: </span><?php if(!$row_Recordset1['fax_job']) echo'----';else echo $row_Recordset1['fax_job'];?></div>
<div class="property"><span> تلفن همراه:</span><?php if(!$row_Recordset1['mobile_job']) echo'----';else echo $row_Recordset1['mobile_job'];?></div>
<div class="property"><span> آدرس وب سایت</span><?php if(!$row_Recordset1['website']) echo'----';else echo $row_Recordset1['website'];?></div>
<div class="property"><span> آدرس:</span><?php if(!$row_Recordset1['address_job']) echo'----';else echo $row_Recordset1['address_job'];?></div>
<div class="property"><span>نام محله: </span><?php echo $row_Recordset1['zone'];?></div>
<br /><div class="favorite"><div id="like"><img style="cursor:pointer;" src="image/star2.jpg" width="16" height="16" onClick="like_job(<?php echo  $row_Recordset1['number_job'];?>);" >
<span style="cursor:pointer;margin-right:4px;" onClick="like_job(<?php echo  $row_Recordset1['number_job'];?>);">پسندیدم</span></div></div>
<div class="favorite"><img src="image/b_usradd.png" width="16" height="16"><span style="margin-right:5px;">تعداد بازید:(<?php echo $row_Recordset1['count_viewer'];?>)</span></div>
</div>
</div>
<div class="relation">آگهی های مرتبط</div>
<?php require("advertising/advertising.php");?>
