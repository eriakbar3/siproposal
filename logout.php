<?php 
require_once("config/function.php");
$general = new General_Default;
session_start();
unset($_SESSION['level']);
unset($_SESSION['id_user']);
session_destroy();
$general->redirect("index.php");
 ?>