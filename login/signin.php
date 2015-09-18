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


// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['user_qom']))
{
  $_SESSION['user_qom']=NULL;
  $_SESSION['id_qom']=NULL;
  unset($_SESSION['user_qom']);
  unset($_SESSION['id_qom']);
  session_destroy();
  session_start();
  }

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess ="index.php?page=insertadv&name=درج آگهی";
  $MM_redirectLoginFailed = "index.php?fail=ok&page=login#lr";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_eqom, $eqom);
  
  $LoginRS__query=sprintf("SELECT username_qom, password_qom,id_user_qom FROM user_qom WHERE username_qom=%s ",
    GetSQLValueString($loginUsername, "text")); 
  $LoginRS = mysql_query($LoginRS__query, $eqom) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
   $f=mysql_fetch_array($LoginRS);
   $pass=GetSQLValueString($_POST['password'], "text");
   $pass=md5($pass);
  if ($loginFoundUser and $f['password_qom']==$pass) {
     $loginStrGroup="";
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['user_qom'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	
	    $_SESSION['id_qom'] = $f['id_user_qom'];
    
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
  
}
?>
    <div class='form'>
      <h1>ورود اعضاء سایت</h1>
     <?php
	 if(@$_GET['fail'])
	 {
		 ?>
          <br/><h2> کاربر گرامی اطلاعات اشتباه است مجدد سعی نمایید</h2>
      <?php
	 }?>
      <div class='line'></div>
   
      <form class='input-form' id='sign-in-form' method='POST' action='<?php echo $loginFormAction."?page=login";?>'>
        <span class='ie-placeholders'>نام کاربری:</span><input type='text' id='ipt-login' name='login' placeholder='' />
        <span class='ie-placeholders'>رمز عبور:</span><input type='password' id='ipt-password' name='password' placeholder='' />
        <a class='ie-placeholders' href='#'>در صورت فراموشی اطلاعات کاربری خود با پخش پشتیبانی تماس بگیرید</a>
        <input type='submit' class='btn-sign-in btn-orange' value='ورود' /><a href='index.php?page=register#lr' class="ie-placeholders">عضویت رایگان در سایت</a>
        
      </form>
      
           
      
    </div>
    
