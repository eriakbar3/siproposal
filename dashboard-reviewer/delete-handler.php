<?php 
session_start();
require_once ("../config/connection.php");
require_once ("../config/function.php");
$general    = new General_Default;
$boots    = new General_Bootstrap;

if (isset($_SESSION['id_user']) && isset($_SESSION['level']) && $_SESSION['level'] == 'admin' ) {

		if (isset($_GET['type']) && $_GET['type'] == 'delete-rppi-penelitian' ) {
			$get_id = $_GET['id'];
			$sql = $link->prepare("DELETE FROM rppi_penelitian WHERE id_rppi_penelitian = '$get_id' ");
			if ($sql->execute()) {
				$general->redirect("index.php?act=data-rppi-penelitian");
			}else{
				echo "Error system oncurred";
			}
		}elseif (isset($_GET['type']) && $_GET['type'] == 'delete-rppi-pengembangan' ) {
			$get_id = $_GET['id'];
			$sql = $link->prepare("DELETE FROM rppi_pengembangan WHERE id_rppi_pengembangan = '$get_id' ");
			if ($sql->execute()) {
				$general->redirect("index.php?act=data-rppi-pengembangan");
			}else{
				echo "Error system oncurred";
			}
		}elseif (isset($_GET['type']) && $_GET['type'] == 'delete-kepakaran' ) {
			$get_id = $_GET['id'];
			$sql = $link->prepare("DELETE FROM kepakaran WHERE id_kepakaran = '$get_id' ");
			if ($sql->execute()) {
				$general->redirect("index.php?act=data-kepakaran");
			}else{
				echo "Error system oncurred";
			}
		}elseif (isset($_GET['type']) && $_GET['type'] == 'delete-satker' ) {
			$get_id = $_GET['id'];
			$sql = $link->prepare("DELETE FROM user WHERE id_user = '$get_id' ");
			$sql_satker = $link->prepare("DELETE FROM satker WHERE id_user = '$get_id' ");
			if ($sql->execute()) {
				$general->redirect("index.php?act=data-satker");
			}else{
				echo "Error system oncurred";
			}
		}elseif (isset($_GET['type']) && $_GET['type'] == 'delete-reviewer' ) {
			$get_id = $_GET['id'];
			$sql = $link->prepare("DELETE FROM user WHERE id_user = '$get_id' ");
			$sql_reviewer = $link->prepare("DELETE FROM reviewer WHERE id_user = '$get_id' ");
			if ($sql->execute()) {
				$general->redirect("index.php?act=data-reviewer");
			}else{
				echo "Error system oncurred";
			}
		}else{
			echo "Access denied";
		}

}else{
	$general->redirect("../index.php");
}
	
 ?>