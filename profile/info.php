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

if(isset($_POST['info']))
{
	$u=$_POST['user'];
	$e=$_POST['email'];
	$p=GetSQLValueString($_POST['pass'],"text");
	$q="select * from user_qom where username_qom='".$_SESSION['user_qom']."'";
	$res=mysql_query($q);
	$f=mysql_fetch_array($res);
	if(mysql_num_rows($res)==1 and $f['password_qom']==md5($p))
	{
$q1="update user_qom set email='$e',username_qom='$u' where username_qom='".$_SESSION['user_qom']."'";
		$res1=mysql_query($q1);
		$_SESSION['user_qom']=$u;
		header("location:index.php?page=info&em=1");
	}
	else
	$fail="پسورد فعلی معتبر نیست";
}
	$q="select * from user_qom where username_qom='".$_SESSION['user_qom']."'";
	$res=mysql_query($q);
	$f=mysql_fetch_array($res);
?>
<div class='form'>
      <h1>ویرایش اطلاعات کاربری</h1>
      <h2><?php if(isset($fail)) echo $fail;?></h2>
    <?php if(isset($_GET['em'])) echo '<h4 dir="rtl" style="text-align:center;border:#900 1px dashed;border-radius:">ویرایش اطلاعات با موفقیت انجام شد.</h4><br/>';
	?>
      <div class='line'></div>
      <form name="registration-form" class='input-form' id='registration-form' method='POST' action=''>
        <span class='ie-placeholders'>نام کاربری:</span><input type='text' name='user' placeholder='' id='ipt-login' value="<?php echo $f['username_qom'];?>" onblur="check_login_parametr(this.value)" />
        <span class='ie-placeholders'> رمز فعلی : </span><input type='password' name='pass' placeholder='' id='ipt-pass' />
        <span class='ie-placeholders'>ایمیل  :</span><input type='text' name='email' placeholder='' id='ipt-email' value="<?php echo $f['email'];?>" />
        <br />
        <input type='submit' class='btn-register btn-orange' onclick="return check_f_all();" name="info" value='ویرایش' />
        
      </form>
      
      <!-- ERROR STATE -->

      
    </div>
    