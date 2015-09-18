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


if (isset($_GET['zone'])) {
  $colname_showjobs = $_GET['cat'];
  $zone_showjobs = $_GET['zone'];
  $query_showjobs = sprintf("SELECT * FROM ejobs_qom join amir_zone using(id_zone) WHERE active=1 and id_job = %s and id_zone=%s ORDER BY date_insert ASC", GetSQLValueString($colname_showjobs, "int"),GetSQLValueString($zone_showjobs, "int"));
$qok=1;
}
else if (isset($_GET['cat'])) {
  $colname_showjobs = $_GET['cat'];
  $query_showjobs = sprintf("SELECT * FROM ejobs_qom join amir_zone using(id_zone) WHERE  active=1 and id_job = %s ORDER BY date_insert ASC", GetSQLValueString($colname_showjobs, "int"));
$qok=1;
$s=1;
}
if(isset($qok))
$showjobs = mysql_query($query_showjobs) or die(mysql_error());
//$row_showjobs = mysql_fetch_assoc($showjobs);
$totalRows_showjobs=mysql_num_rows($showjobs);
if(@$totalRows_showjobs==0)
echo'</br><h4 dir="rtl" style="text-align:center;border:#900 1px dashed;border-radius:">در این گروه شغلی آگهی ثبت نشده است یا توسط آگهی دهنده غیر فعال شده است</h4>';
?>
 <div id="advertising_qom">
<ul>
    <?php
	for($j=0;$j<$totalRows_showjobs;$j++)
	{
    $row_showjobs = mysql_fetch_assoc($showjobs);
   ?>
      <li>
      <a class="tooltip1"
       <?php if(@$_GET['navy']){
		  ?>
          href="index.php?page=details&zone=<?php echo $_GET['zone'];?>&navy=<?php echo $_GET['navy'];?>&navy2=<?php echo $_GET['navy2'];?>&cat=<?php echo $_GET['cat'];?>&stringjob=<?php echo $row_showjobs['number_job'];?>"
		  <?php } 
		  else{
          ?>
          href="index.php?page=details&navy2=<?php echo $_GET['navy2'];?>&cat=<?php echo $_GET['cat'];?>&stringjob=<?php echo $row_showjobs['number_job'];?>"<?php }?>>
		  <?php echo'<span><div class="content">'.$row_showjobs['title_job'].'<br>محله '.$row_showjobs['zone'].'....</div></span>';?>
	  <?php if(@!$row_showjobs['img_job'])
	  echo'<img  src="image/nothing.jpg" width="180" height="180" />';
	  else echo'<img  width="180" height="180" src="'.$row_showjobs['img_job'].'"/>';?>
	  </a></li>
	  <?php }  ?>
</ul></div>
<p>&nbsp;
</p>
<?php
mysql_free_result($showjobs);
?>
