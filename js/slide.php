<?php
$query_Recordset1 = "SELECT number_job,title_job, img_slide FROM ejobs_qom where img_slide is not null";
$Recordset1 = mysql_query($query_Recordset1, $eqom) or die(mysql_error());
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<div class="slidemain"><div style="width:593px; height:310px;" id="meteor-slideshow" class="meteor-slides  navprevnext">
	
			
			
			<ul class="meteor-nav">
		
				<li id="meteor-prev" class="prev"><a href="#prev">Previous</a></li>
			
				<li id="meteor-next" class="next"><a href="#next">Next</a></li>
			
			</ul><!-- .meteor-nav -->
			
		<div class="meteor-clip">
			<!-- .mslide -->
            <?php
          for($i=0;$i<$totalRows_Recordset1;$i++)
			{
			$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	?>
			<div style="position: absolute; top: 0px; left: 0px; display: none; z-index: 4; width: 554px; height: 300px; opacity: 0;" class="mslide mslide-3">
					<a href="index.php?page=details&stringjob=<?php echo $row_Recordset1['number_job'];?>"><img src="<?php echo $row_Recordset1['img_slide'];?>" class="attachment-featured-slide wp-post-image" alt="" title="<?php echo $row_Recordset1['title_job'];?>" height="300" width="554"></a>					
			</div><!-- .mslide -->
            <?php
			}?>
			<!-- .mslide -->
		</div><!-- .meteor-clip -->
</div>
</div>
<?php
mysql_free_result($Recordset1);
?>
