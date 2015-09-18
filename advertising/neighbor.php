<?php
$query_Recordset1 = "select zone,id_zone,count(id_job) c from ejobs_qom right join amir_zone using(id_zone) group by(id_zone);";
$Recordset1 = mysql_query($query_Recordset1, $eqom) or die(mysql_error());
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<ul>
<?php
for($i=0;$i<$totalRows_Recordset1;$i++)
{
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>
<a dir="rtl"   href="index.php?page=neighbor&zone=<?php echo $row_Recordset1['id_zone'];?>&navy=<?php echo $row_Recordset1['zone'];?>" class="tooltip"><li id="a_test"><?php echo $row_Recordset1['zone']?><span dir="ltr">(<?php echo $row_Recordset1['c'];?> )تعداد مشاغل موجود</span></li></a>
<?php
}?>
</ul>
<?php
mysql_free_result($Recordset1);
?>