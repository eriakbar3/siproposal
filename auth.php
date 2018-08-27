<?php
session_start();
require_once ('config/connection.php');
require_once ('config/function.php');
$general    = new General_Default;
$boots    	= new General_Bootstrap;
if ( isset($_SESSION['id_user']) && isset($_SESSION['level']) && $_SESSION['level'] == 'admin' ) {
	$general->redirect("dashboard-admin");
}elseif ( isset($_SESSION['id_user']) && isset($_SESSION['level']) && $_SESSION['level'] == 'satker' ) {
	$general->redirect("dashboard-satker");
}elseif ( isset($_SESSION['id_user']) && isset($_SESSION['level']) && $_SESSION['level'] == 'reviewer' ) {
	$general->redirect("dashboard-reviewer");
}else{
	echo "Access denied!";
}
 ?>
