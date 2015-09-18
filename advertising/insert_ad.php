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


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "insertjob")) {
	$date=pdate('Y/m/d');
	/*if($_FILES['img']['size']>10240)
	echo '<script type="text/javascript">alert("عکس کنار آگهی بیشتر از 10کیلو بایت می باشد");</script>';
	if($_FILES['imgslide']['size']>71680)
	echo '<script type="text/javascript">alert("عکس مربوط به صفحه اول برای اسلاید شو بیشتر از 70کیلو بایت می باشد");</script>';*/
	if($_FILES['img']['name'])
{
	
$img=$_FILES['img']['tmp_name'];
$name_img=$_POST['job'].$_POST['state'].substr(md5(time().$_SERVER['REMOTE_ADDR'].rand(1,9999)),0,5).'.jpg';
copy($img,'imagejob/'.$name_img);
$name_img='imagejob/'.$name_img;
}
else
$name_img="";
if($_FILES['imgslide']['name'])
{
$img=$_FILES['imgslide']['tmp_name'];
$name_imgs='s'.$_POST['job'].$_POST['state'].substr(md5(time().$_SERVER['REMOTE_ADDR'].rand(1,9999)),0,5).'.jpg';
copy($img,'imagejobslide/'.$name_imgs);
$name_imgs='imagejobslide/'.$name_imgs;	
}
else
$name_imgs="";

  $insertSQL = sprintf("INSERT INTO ejobs_qom (id_zone, id_job, title_job, matn_job, name_qom, family_qom, name_shoping, tel_job, address_job, fax_job, mobile_job, expire_job,email_job,id_user,img_job,img_slide,date_insert,pay_variz,resid_pay,number_hesab,active)VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s,%s,'$name_img','$name_imgs','$date',%s,%s,%s,1)",
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
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['expire'], "text"),
					   GetSQLValueString($_POST['email'], "text"),
					   GetSQLValueString($_SESSION['id_qom'], "int"),
					   GetSQLValueString($_POST['cash_v'], "text"),
					   GetSQLValueString($_POST['number_v'], "text"),
					   GetSQLValueString($_POST['cash_number_v'], "text")
					   );
					   //echo $insertSQL;
  mysql_select_db($database_eqom, $eqom);
  $Result1 = mysql_query($insertSQL, $eqom) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo.'&action=success#success'));
  
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
      <h1>فرم درج آگهی و مشاغل شما </h1>
      <div class='line'></div>
      <a href="success"></a>
      <?php
	  if(@$_GET['action']=="success")
	  {
		  ?>
       <h4 dir="rtl" style="text-align:center;border:#900 1px dashed;border-radius:"><?php echo $_SESSION['user_qom']."&nbsp;عزیز ,آگهی شما با موفقیت ثبت شد </br>
	   به امید کسب درآمد
	    ایده ال برای شما </br> آگهی شما بعد از تایید حداکثر از یک ساعت تا 12 ساعت آینده فعال می شود";?></h4>
       <?php
	  }?>
      
      
      <form action='<?php echo $editFormAction; ?>' method='POST' enctype="multipart/form-data" name="insertjob" class='input-form' id="insertjob" onsubmit="return check_f_all_jobs();">
        <span class='ie-placeholders'>:عنوان آگهی *</span>
        <div id="title1" class="equal"></div><input type='text' name='title' placeholder='' id='title' />
        <span class='ie-placeholders'>:متن آکهی *</span><div id="matn1" class="equal"></div><textarea name="matn" id="matn" cols="" rows=""></textarea></br>
        <span class='ie-placeholders'>:رده شغلی *</span>
        <div id="job1" class="equal"></div><select id="job" name="job">
        <option value="9000">رده شغلی خود را مشخص نمایید</option>
          <?php
do {  
?>
          <option value="<?php echo $row_jobs['id_job']?>"><?php echo $row_jobs['name_cat']?></option>
          <?php
} while ($row_jobs = mysql_fetch_assoc($jobs));
  $rows = mysql_num_rows($jobs);
  if($rows > 0) {
      mysql_data_seek($jobs, 0);
	  $row_jobs = mysql_fetch_assoc($jobs);
  }
?>
        </select>
        <span class='ie-placeholders'> :محله مورد نظر *</span>
        <div id="province1" class="equal"></div><select id="province" name="state"><option value="9000">محله مورد نظر خود را انتخاب نمایید</option>
        <option value="69">بدون در نظر گرفتن محله</option>
          <?php
do {  
?>
          <option value="<?php echo $row_zone['id_zone']?>">
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
        <span class='ie-placeholders'>نام آگهی دهنده:</span><input type='text' name="name" placeholder='' id='ipt-repassword' /><br />
         <span class='ie-placeholders'>نام خانوادگی آگهی دهنده:</span><input type='text' placeholder='' name="family" id='ipt-repassword' /><br />
        <span class='ie-placeholders'>نام شرکت یا مغازه:</span><input type='text' name="company" placeholder='' id='ipt-repassword' /><br />
        <span class='ie-placeholders'>تلفن:</span><input type='text' name="tel" placeholder='' id='ipt-repassword' /><br />
        <span class='ie-placeholders'>موبایل:</span><input type='text' name="mobile" placeholder='' id='ipt-repassword' /><br />
        <span class='ie-placeholders'>فکس:</span><input type='text' name="fax" placeholder='' id='ipt-repassword' /><br />
        <span class='ie-placeholders'>ایمیل:</span><input type='text' name="email" placeholder='' id='ipt-repassword' /><br />
        <span class='ie-placeholders'>آدرس:</span><textarea name="address" cols="" rows=""></textarea><br />
        <span class='ie-placeholders'>عکس مورد نظر : حداکثر 15 کیلو بایت<br />  سایز عکس (180*180)</span><input name="img" type="file"><br />
        <span class='ie-placeholders'>عکس مورد نظر در صفحه اول سایت: حداکثر 80 کیلو بایت<br />(هزینه این قسمت 10,000 تومان می باشد)<br />سایز عکس (300*600)<!--<input id="file_ch" type="checkbox" onclick="file_check();" value="" />خالی کردن فیلد عکس!--></span><input id="slidefile"  onchange="check();" name="imgslide" type="file"><br />
        <span class='ie-placeholders'>زمان انقضاء آگهی:</span><select onchange="check();" id="expire" name="expire">
        <option value="1">یک ماه</option>
        <option value="3">سه ماه</option>
        <option value="6">شش ماه</option>
        <option value="24">یک سال</option>
        
        </select>
        
        <span class="ie-placeholders">
            <input type="radio"   disabled="disabled" name="type_pay"  id="type_pay1" onclick="check();"  value="1" />
            پرداخت اینترنتی با کارت های عضو شتاب 
          <br />
       <input type="radio" name="type_pay" id="type_pay2" onclick="check();" value="2"/>
            پرداخت کارت به کارت 
        </span>
       <div id="cart">
       <span class='ie-placeholders'>مبلغ واریز شده:</span><input readonly="readonly" type='text' name="cash_v" placeholder='' id='cash_v' /><br />
       <span class='ie-placeholders'>شماره رسید/ارجاع بانک: *</span> <div id="number_v1" class="equal"></div><input type='text' name="number_v" placeholder='' id='number_v' /><br />
       <span class='ie-placeholders'>واریز به حساب:</span><select name="cash_number_v">
       <option value="6037 9914 5194 0112">6037 9914 5194 0112 بانک ملی</option>
       <option value="6037 6917 1200 8630">6037 6917 1200 8630 بانک صادرات</option>
       <option value="6104 3370 9022 2454">6104 3370 9022 2454 بانک ملت</option>
       </select><br />
       </div>
<span class='ie-placeholders'>قوانین درج آگهی:</span><div id="ghavanin" class="equal"></div><div id="over_flow" class="over_flow"><ul><li>قوانین به شرح زیر می باشد</li><li>هرگونه محتوایی که برای استهزا و تمسخر اعتقادات ، باورها و موازین اسلامی ارسال شود به
هر نحوی ممنوع است.</li>
<li>انتشار و یا ترویج دور زدن فیلترینگ ، معرفی VPN و یا سرویس هایی که جهت دور زدن سیستم
فیلترینگ مورد استفاده قرار میگیرد ممنوع میباشد و در صورت مشاهده مطالب مربوط حذف و
به کاربر اخطار داده میشود.</li>
        <li>مطرح کردن  مسائلی که باعث آزار و اذیت دیگران شود اکیداً ممنوع است.</li>
        <li>مسئولیت مطالب ارسال شده توسط کاربران به عهده خود ایشان بوده و لزوماً مورد تایید مسئولین سایت نمی باشد.</li><li>از ارسال مطالب سیاسی و همچنین توهین به قشر یا فردی خاص خودداری کنید.</li><li>انتشار آگهی های - شایعات - یا اخبار غیر موثق  ممنوع است.
</li><li>با خواندن این قوانین شما مسئولیت رفتار و  آگهی های خود را در سایت به عهده خواهید گرفت. در صورتی که از قوانین مذکور حمایت نکنید با شما برخورد خواهد شد. اجرای این قوانین به خواست بسیاری از افراد و به خصوص به لحاظ راحتی تمامی کاربران ملزوم می باشد.
با امید به اینکه با به کارگیری قوانین سایت و دستورالعملهایی که در آینده به آنها اضافه خواهد شد بتوانیم رضایت شما کاربر گرامی را جلب کنیم. به امید ساعات خوش در هنگام مشاهده این سایت برای شما. </li></ul></div><br/>
        <input type='checkbox'  disabled="disabled"  checked="checked" id='tac-checkbox' name="checkbox"  value='1'/><label class="label" for='tac-checkbox'>من با شرایط و قوانین سایت موافقت می کنم</label>
        <input type='submit' class='btn-register btn-orange'   value='درج آگهی' />
        <input type="hidden" name="MM_insert" value="insertjob" />
        <input name="Reset" type='reset' class='btn-register btn-orange'   value='پاک کردن فرم' />
      </form>
      
      <!-- ERROR STATE -->
      
    </div>
    
    <?php
mysql_free_result($zone);

mysql_free_result($jobs);
}
else
{
	?>
    <h3> کاربر گرامی جهت درج آگهی و مشاغل ابتدا باید در سایت عضو شوید.
        برای ورود یا عضویت سریع از لینک های زیر استفاده نمایید. 
        .عضویت در سایت بسیار سریع و بدون اتلاف وقت شما کاربر گرامی در نظر گرفته شده است</h3>
    <?php
	require("login/signin.php");
}
?>
