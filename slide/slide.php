<?php
$query_Recordset1 = "SELECT number_job,title_job, img_slide FROM ejobs_qom where img_slide is not null";
$Recordset1 = mysql_query($query_Recordset1, $eqom) or die(mysql_error());
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
    
    <!-- Insert to your webpage before the </head> -->
    <!--<script src="slide/sliderengine/jquery.js"></script>-->
    <script src="slide/sliderengine/amazingslider.js"></script>
    <script src="slide/sliderengine/initslider-1.js"></script>
    <!-- End of head section HTML codes -->

<div style="margin:24px auto;max-width:600px;">
    
    <!-- Insert to your webpage where you want to display the slider -->
    <div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 8px;">
        <ul class="amazingslider-slides" style="display:none;">
        <?php
          for($i=0;$i<$totalRows_Recordset1;$i++)
			{
			$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	?>
            <li><img src="<?php echo $row_Recordset1['img_slide'];?>" alt="<?php echo $row_Recordset1['title_job'];?> " width="544" height="300"  data-description="<?php echo $row_Recordset1['title_job'];?> " /></li>
            <?php
			}?>
            
        </ul>
        <div class="amazingslider-engine" style="display:none;"><a href="http://amazingslider.com">jQuery Slideshow</a></div>
    </div>
    <!-- End of body section HTML codes -->
    
</div>
