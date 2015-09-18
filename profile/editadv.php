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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "insertjob")) {
  $updateSQL = sprintf("UPDATE ejobs_qom SET id_zone=%s, id_job=%s, title_job=%s, matn_job=%s, name_qom=%s, family_qom=%s, name_shoping=%s, tel_job=%s, address_job=%s, fax_job=%s, email_job=%s, mobile_job=%s, website=%s WHERE number_job=%s",
                       GetSQLValueString($_POST['state'], "int"),
                       GetSQLValueString($_POST['job'], "int"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['matn'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['family'], "text"),
                       GetSQLValueString($_POST['company'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['fax'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
					   GetSQLValueString($_POST['web'], "text"),
                       GetSQLValueString($_GET['job'], "int"));

  mysql_select_db($database_eqom, $eqom);
  $Result1 = mysql_query($updateSQL, $eqom) or die(mysql_error());

  $updateGoTo = "index.php?page=last&ok=1";
  header(sprintf("Location: %s", $updateGoTo));
}

if(isset($_SESSION['user_qom']))
{
	
mysql_select_db($database_eqom, $eqom);
$query_zone = "SELECT * FROM amir_zone";
$zone = mysql_query($query_zone, $eqom) or die(mysql_error());
$row_zone = mysql_fetch_assoc($zone);
$totalRows_zone = mysql_num_rows($zone);
mysql_select_db($database_eqom, $eqom);
$query_jobs = "SELECT * FROM category_jobs";
$jobs = mysql_query($query_jobs, $eqom) or die(mysql_error());
$row_jobs = mysql_fetch_assoc($jobs);
$totalRows_jobs = mysql_num_rows($jobs);

$colname_editquery = "-1";
if (isset($_GET['job'])) {
  $colname_editquery = $_GET['job'];
}
mysql_select_db($database_eqom, $eqom);
$query_editquery = sprintf("SELECT * FROM ejobs_qom WHERE number_job = %s", GetSQLValueString($colname_editquery, "int"));
$editquery = mysql_query($query_editquery, $eqom) or die(mysql_error());
$row_editquery = mysql_fetch_assoc($editquery);
$totalRows_editquery = mysql_num_rows($editquery);
?>

  <script src="js/jquery.js"></script>
<script src="js/script.js"></script>
  
  <!-- CSS code for IE Browser -->
  <!--[if lt IE 10]>
    <link href="css/form-style-ie.css" rel="stylesheet" type="text/css" />  
  <![endif]-->
  
    <!-- If you don't want a logo, delete all of these code -->
   
    <!-- Till here -->
    
    <div class='form'>
      <h1>فرم درج آگهی و مشاغل شما عزیزان</h1>
      <div class='line'></div>
      <a href="success"></a>
      
      
      <form action='<?php echo $editFormAction; ?>' method='POST' enctype="multipart/form-data" name="insertjob" class='input-form' id="insertjob" onsubmit="return check_f_all_jobs();">
        <span class='ie-placeholders'>:عنوان آگهی</span>
        <div id="title1" class="equal"></div><input type='text' name='title' placeholder='' id='title' value="<?php echo @$row_editquery['title_job'];?>" />
        <span class='ie-placeholders'>:متن آکهی</span><div id="matn1" class="equal"></div><textarea name="matn" id="matn" cols="" rows=""><?php echo @$row_editquery['matn_job'];?></textarea></br>
        <span class='ie-placeholders'>رده شغلی</span>
        <div id="job1" class="equal"></div><select id="job" name="job">
        <option value="9000">رده شغلی خود را مشخص نمایید</option>
          <?php
do {  
?>
          <option <?php if(@$row_editquery['id_job']==$row_jobs['id_job']) echo"selected";?> value="<?php echo $row_jobs['id_job']?>"><?php echo $row_jobs['name_cat']?></option>
          <?php
} while ($row_jobs = mysql_fetch_assoc($jobs));
  $rows = mysql_num_rows($jobs);
  if($rows > 0) {
      mysql_data_seek($jobs, 0);
	  $row_jobs = mysql_fetch_assoc($jobs);
  }
?>
        </select>
        <span class='ie-placeholders'>محله مورد نظر</span>
        <div id="province1" class="equal"></div><select id="province" name="state"><option value="9000">محله مورد نظر خود را انتخاب نمایید</option>
        <option <?php if(@$row_editquery['id_job']==8000) echo"selected";?> value="8000">بدون مشخص کردن محله</option>
          <?php
do {  
?>
          <option <?php if(@$row_editquery['id_zone']==$row_zone['id_zone']) echo"selected";?> value="<?php echo $row_zone['id_zone']?>">
		  <?php echo $row_zone['zone']?>
          </option>
<?php
} while ($row_zone = mysql_fetch_assoc($zone));
  $rows = mysql_num_rows($zone);
  if($rows > 0) {
      mysql_data_seek($zone, 0);
	  $row_zone = mysql_fetch_assoc($zone);
  }
?>
        </select><br />
        <span class='ie-placeholders'>نام آگهی دهنده</span><input type='text' name="name" placeholder='' value="<?php echo @$row_editquery['name_qom'];?>" id='ipt-repassword' /><br />
         <span class='ie-placeholders'>نام خانوادگی آگهی دهنده</span><input type='text' placeholder='' value="<?php echo @$row_editquery['family_qom'];?>" name="family" id='ipt-repassword' /><br />
        <span class='ie-placeholders'>نام شرکت یا مغازه</span><input type='text' name="company" placeholder='' value="<?php echo @$row_editquery['name_shoping'];?>" id='ipt-repassword' /><br />
        <span class='ie-placeholders'>تلفن</span><input type='text' name="tel" placeholder='' id='ipt-repassword' value="<?php echo @$row_editquery['tel_job'];?>" /><br />
        <span class='ie-placeholders'>موبایل</span><input type='text' name="mobile" placeholder='' value="<?php echo @$row_editquery['mobile_job'];?>" id='ipt-repassword' /><br />
        <span class='ie-placeholders'>فکس</span><input type='text' value="<?php echo @$row_editquery['fax_job'];?>" name="fax" placeholder='' id='ipt-repassword' /><br />
        <span class='ie-placeholders'>ایمیل</span><input type='text' name="email" placeholder='' value="<?php echo @$row_editquery['email_job'];?>" id='ipt-repassword' /><br />
         <span class='ie-placeholders'>آدرس وب سایت</span><input type='text' name="web" placeholder='' value="<?php echo @$row_editquery['website'];?>" id='ipt-repassword' /><br />
        <span class='ie-placeholders'>آدرس</span><textarea name="address" cols="" rows=""><?php echo @$row_editquery['address_job'];?></textarea><br />
        <br />
        
        
        <input type='submit' class='btn-register btn-orange'   value='ویرایش آگهی' />
        <input type="hidden" name="MM_insert" value="insertjob" />
        <input type="hidden" name="MM_update" value="insertjob">
      </form>
      
     
    
    <?php
mysql_free_result($zone);
mysql_free_result($jobs);
mysql_free_result($editquery);
}?>