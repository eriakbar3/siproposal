<?php 
session_start();
require_once ("../config/connection.php");
require_once ("../config/function.php");
$general    = new General_Default;
$boots    = new General_Bootstrap;

if (isset($_SESSION['id_user']) && isset($_SESSION['level']) && $_SESSION['level'] == 'admin' ) {

		date_default_timezone_set('Asia/Jakarta');

		$tgl_db_now = date('Y-m-d');
		$tgl_time_db_now = date('Y-m-d H:i:s');
		$tgl_form_now = str_replace('-', '/', $tgl_db_now);

		$id_user = $_SESSION['id_user'];
		$sql_user = $link->prepare("SELECT * FROM user WHERE id_user = '$id_user' ");
		$sql_user->execute();
		$user = 	$sql_user->fetch(PDO::FETCH_OBJ);
		$username = $user->username;
		$password = $user->password;	
		$level = $_SESSION['level'];

		if (isset($_GET['act'])) {
			$page = $_GET['act'];
		}else{
			$page = "home";
		}

		if (file_exists($page.'.php')) {
			$title = strtoupper(str_replace('-', ' ', $page));
			include('header.php');
			include($page.'.php');
			include('footer.php');
		}else{
			$title = "404 ERROR";
			include('header.php');
			include('404.php');
			include('footer.php');
		}

}else{
	$general->redirect("../index.php");
}
	
 ?>