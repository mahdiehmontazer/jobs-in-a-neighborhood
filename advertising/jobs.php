<?php
$query_Recordset1 = "select name_cat,id_job,count(number_job) c from ejobs_qom right join category_jobs  using(id_job)  group by(id_job) ;";
$Recordset1 = mysql_query($query_Recordset1, $eqom) or die(mysql_error());
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<ul>
<?php
for($i=0;$i<$totalRows_Recordset1;$i++)
{
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>
<a dir="rtl" href="index.php?page=show&cat=<?php echo $row_Recordset1['id_job'];?>&navy2=<?php echo $row_Recordset1['name_cat'];?>"><li><?php echo $row_Recordset1['name_cat']."(".$row_Recordset1['c'].")";?></li></a>
<?php
}?>
</ul>
<?php
mysql_free_result($Recordset1);
?>