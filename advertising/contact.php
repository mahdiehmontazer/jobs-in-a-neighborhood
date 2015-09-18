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
	if(!$_POST['title'] or !$_POST['matn'])
	$fail=123;
	else
	{
  $insertSQL = sprintf("INSERT INTO contact_qom (title, matn, name, email) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['matn'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_eqom, $eqom);
  $Result1 = mysql_query($insertSQL, $eqom) or die(mysql_error());
  if($Result1)
  header("location:index.php?page=contact&me=1");
}}
?>
<div id="contact_qom">
<div class='form'>
      <h3>برای ارتباط با ما و پشتیبانی میتوانید از شماره تماس های زیر و یا فرم زیر استفاده فرمایید</h3>
      <?php if(isset($_GET['me'])) echo'<h5 style="text-align:center;">پیام شما ثبت کردید با تشکر از شما</h5>';?>
      <?php if(isset($fail)) echo'<h5 style="text-align:center;">لطفا تمامی فیلد های ستاره دار را پر نمایید</h5>';?>
      
      <div class='line'></div>
      
      <form name="registration-form" class='input-form' id='registration-form' method='POST' action='index.php?page=contact'>
        <span class='ie-placeholders'>:ایمیل</span><div id="login_repeat" class="equal"></div><input type='text' name='email' placeholder=''  />
        <span class='ie-placeholders'>:نام و نام خانوادگی</span><div id="login_repeat" class="equal"></div><input type='text' name='name' placeholder='' id='ipt-login' />
        
        <span class='ie-placeholders'>عنوان پیام*
        <div id="equal" class="equal"></div><div id="equal2" class="equal"></div></span><input type='text' name='title' placeholder='' id='ipt-password' />
        <span class='ie-placeholders'>پیام *</span>
        <div id="equal1" class="equal"></div><textarea name="matn" cols="" rows=""></textarea><br />
        <br/>
        
        <input type='submit' class='btn-register btn-orange'  name="register" value='ثبت نام' />
        <input type="hidden" name="MM_insert" value="registration-form" />
      </form>
      
      <!-- ERROR STATE -->
     <div class='sign-link'>
        email:a@yahoo.com</br>
        tel:02532917601</br>
        fax:b@yahoo.com</br>
      </div>
      
    </div>
</div>