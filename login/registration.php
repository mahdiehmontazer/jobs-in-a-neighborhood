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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "registration-form")) {
	
	/*if($_POST['checkbox']!=1)
	{
	header("location:index.php?page=register&fail1=1");
	}*/
	//check_user
	if(strcmp(strtolower($_POST['secure']),strtolower($_SESSION['code']))!=0)
	{
		$failcode=1;
	}
	else
	{
		if(!$_POST['user'] or !$_POST['password'])
				$failfull=1;

else
{
	if(isset($_SESSION['user_qom']))
	{
		unset($_SESSION['user_qom']);
        unset($_SESSION['id_qom']);
		session_destroy();
		session_start();
	}
$query_Recordset1 = sprintf("SELECT username_qom FROM user_qom WHERE username_qom = %s", GetSQLValueString($_POST['user'], "text"));
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
if($totalRows_Recordset1==1)
{
header("location:index.php?page=register&fail=1");
}
else
{
//check_user end
$pass=GetSQLValueString($_POST['password'], "text");
$pass=md5($pass);
$user=GetSQLValueString($_POST['user'], "text");
$email=GetSQLValueString($_POST['email'], "text");
  $insertSQL ="INSERT INTO user_qom(username_qom,password_qom,email) VALUES ($user, '$pass',$email)";
  echo $insertSQL;
  $Result1 = mysql_query($insertSQL) or die(mysql_error());
  $_SESSION['user_qom']=$_POST['user'];
  $insertGoTo = "index.php?report=success";
  /*if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }*/
  if($Result1)
  header(sprintf("Location: %s", $insertGoTo));
  else
  header("location:index.php?page=register?failreg");
}
}}
}
?>
  
  
    
    <div class='form'>
      <h1>عضویت رایگان در سایت</br>
      <?php
	  if(isset($failcode))
	  echo"کد امنیتی وارد شده اشتباه است";
	  if(isset($failfull))
	  echo"لطفا فیلد های ستاره دار را پر کنید";
	  ?>
     </h1>
      <div class='line'></div>
      <form name="registration-form" class='input-form' id='registration-form' method='POST' action='<?php echo $editFormAction; ?>' onsubmit="return check_f_all();">
        <span class='ie-placeholders'>نام کاربری:</span><div id="login_repeat" class="equal"><?php if(isset($_GET['fail'])) print "این نام کاربری قبلا ثبت شده است";
 ;?></div><input type='text' name='user' value="<?php if(isset($_POST['user'])) echo $_POST['user'];?>" placeholder='' id='ipt-login' onblur="check_login_parametr(this.value)" />
 <span class='ie-placeholders'>رمز عبور:<div id="equal" class="equal"></div><div id="equal2" class="equal"></div></span><input type='password' name='password' placeholder='' id='ipt-password' />
        <span class='ie-placeholders'>تکرار رمز عبور:</span><div id="equal1" class="equal"></div><input type='password' placeholder='' id='ipt-repassword' onblur="return check_equal()" />
        <span class='ie-placeholders'>(ایمیل (پرکردن این فیلد اختیاری می باشد:</span><input type='text' name='email' value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" id="email" placeholder=''  />
        <br />
        <span class='ie-placeholders'>قوانین سایت:</span><div id="ghavanin" class="equal"></div><div id="over_flow" class="over_flow"><ul><li>قوانین به شرح زیر می باشد</li><li>تمامی کاربران می بایست به هنگام ثبت نام در سایت، کلمات مناسبی به عنوان نام کاربری خود انتخاب نمایند. استفاده از نام های سیاسی نیز ممنوع می باشد.</li>
        <li>مطرح کردن  مسائلی که باعث آزار و اذیت دیگران شود اکیداً ممنوع است.</li>
        <li>مسئولیت مطالب ارسال شده توسط کاربران به عهده خود ایشان بوده و لزوماً مورد تایید مسئولین سایت نمی باشد.</li><li>از ارسال مطالب سیاسی و همچنین توهین به قشر یا فردی خاص خودداری کنید.</li><li>انتشار آگهی های - شایعات - یا اخبار غیر موثق  ممنوع است.
</li><li>با خواندن این قوانین شما مسئولیت رفتار و  آگهی های خود را در سایت به عهده خواهید گرفت. در صورتی که از قوانین مذکور حمایت نکنید با شما برخورد خواهد شد. اجرای این قوانین به خواست بسیاری از افراد و به خصوص به لحاظ راحتی تمامی کاربران ملزوم می باشد.
با امید به اینکه با به کارگیری قوانین سایت و دستورالعملهایی که در آینده به آنها اضافه خواهد شد بتوانیم رضایت شما کاربر گرامی را جلب کنیم. به امید ساعات خوش در هنگام مشاهده این سایت برای شما. </li></ul></div><br/>
        <input type='checkbox'  disabled="disabled"  checked="checked" id='tac-checkbox' name="checkbox"  value='1'/><label class="label" for='tac-checkbox'>من با شرایط و قوانین سایت موافقت می کنم</label>
        <br />
        <span class='ie-placeholders'>کد امنیتی: <img src="advertising/SecurityCode.php" /></span><input type='text' name='secure' id="secure" placeholder=''  />
        <br />
        <input type="submit" class="btn-register btn-orange"  name="register" value='ثبت نام' />
        <input type="hidden" name="MM_insert" value="registration-form" />
      </form>
      
      <!-- ERROR STATE -->

      
    </div>
    
 