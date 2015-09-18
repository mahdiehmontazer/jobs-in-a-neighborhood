<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
if ((isset($_GET['signout'])) &&($_GET['signout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['user_qom'] = NULL;
  $_SESSION['id_qom'] = NULL;
  unset($_SESSION['user_qom']);
  unset($_SESSION['id_qom']);	
    header("Location:index.php");
    exit;
  }
?>
