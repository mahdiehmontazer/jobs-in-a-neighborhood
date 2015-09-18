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


if(isset($_POST['change']))
{
	$m=0;
	$old=GetSQLValueString($_POST['oldpass'],"text");
	$new=GetSQLValueString($_POST['newpass'],"text");
	$renew=GetSQLValueString($_POST['renewpass'],"text");
	if($new!=$renew or (!$_POST['newpass'] or !$_POST['renewpass']))
	$fail="تکرار رمز عبور جدید بارمز جدید برابر نیست ";
	else
	{
	$q="select * from user_qom where username_qom='".$_SESSION['user_qom']."'";
	$res=mysql_query($q);
	$f=mysql_fetch_array($res);
	$pass1=md5($new);
	if($f['password_qom']==md5($old) and mysql_num_rows($res)==1)
	{
$q1="update user_qom set password_qom='$pass1' where username_qom='".$_SESSION['user_qom']."'";
		$res1=mysql_query($q1);
		header("location:index.php?page=change&cm=1");
		
	}
	
	else
	$fail="پسورد فعلی معتبر نیست";
}}


	?><div class='form'>
      <h1>تغییر رمز عبور</h1>
      </br>
      <h2><?php if(isset($fail)) echo $fail;?></h2>
      <?php if(isset($_GET['cm'])) echo '<h4 dir="rtl" style="text-align:center;border:#900 1px dashed;border-radius:">تغییر رمز عبور با موفقیت انجام شد</h4>';?>
      <div class='line'></div>
      <!-- Span class ie-placeholder is there for IE browser. IE doesn't support placeholder attribute -->
      <form class='input-form' id='sign-in-form' method='POST' action='index.php?page=change'>
        <span class='ie-placeholders'>رمزعبورفعلی:</span><input type='password' id='ipt-login' name='oldpass' placeholder='' />
        <span class='ie-placeholders'>رمزعبورجدید:</span><input type='password' id='ipt-password' name='newpass' placeholder='' />
        <span class='ie-placeholders'>تکراررمزعبورجدید:</span><input type='password' id='ipt-password' name='renewpass' placeholder='' />
        <br />  <br />
        <input type='submit' name="change" class='btn-orange' value='ویرایش' />
         <br /> <br />
</form>
    
    </div>


