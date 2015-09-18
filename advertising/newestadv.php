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
if(isset($_GET['search_job']))
{
$search=explode(" ",$_GET['search_job']);
$like="";
foreach($search as $k=>$v)
$like.=" '%$v%' or ";
$pos=strripos($like,'o');
$like[$pos]="a";
$pos=strripos($like,'r');
$like[$pos]="n";
$pos=strripos($like,' ');
$like[$pos]="d";
$like.=" 1=1";

//empty($like[$pos]);
//echo $like;
//echo str_replace('or','and',$like);

//str_replace('or','and',strrchr($like,'or'));
//echo $like;
//$pos=strrpos($like,'r');
//$like[$pos]="";
//$pos=strrpos($like,'o');
//$like[$pos]="";
//$like=sprintf('%s',$like);
//$like=addslashes($like);
//$like=stripslashes($like);
//echo $like.'<br>';
$query_showjobs ="SELECT * FROM ejobs_qom join category_jobs using(id_job) join amir_zone using(id_zone)  where (title_job like ".$like.") 
or (matn_job like ".$like.")  or (zone  like  ".$like.") or (name_shoping like ".$like.") or (address_job like  ".$like.") or (tel_job  like ".$like.")";
}
else
$query_showjobs = sprintf("SELECT * FROM ejobs_qom join category_jobs using(id_job) join amir_zone using(id_zone) order by count_viewer desc limit 0,30");
//echo $query_showjobs;
$showjobs = mysql_query($query_showjobs) or die(mysql_error());
$totalRows_showjobs=mysql_num_rows($showjobs);
//echo $totalRows_showjobs;
?>

 <div id="advertising_qom">
<ul><?php
 
	for($j=0;$j<$totalRows_showjobs;$j++)
	{
		$row_showjobs = mysql_fetch_assoc($showjobs);
 ?>
      <li><a class="tooltip1" href="index.php?page=details&cat=<?php echo $row_showjobs['id_job'];?>&navy2=<?php echo $row_showjobs['name_cat'];?>&stringjob=<?php echo $row_showjobs['number_job'];?>">
      <?php echo'<span><div class="content">'.$row_showjobs['title_job'].'<br>'.$row_showjobs['zone'].'....</div></span>';?>
	  <?php if(@!$row_showjobs['img_job'])
	  echo'<img src="image/nothing.jpg" width="180" height="180" />';
	  else echo'<img width="180" height="180" src="'.$row_showjobs['img_job'].'"/>';?></a></li>
	  <?php }  ?>
</ul></div>



<?php
mysql_free_result($showjobs);
?>
