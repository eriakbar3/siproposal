<?php
include '../config/connection.php';
mysql_select_db("siproposal",mysql_connect("localhost", "root", ""));
$getid = $_GET['id'];
$sql = mysql_query("SELECT * FROM file_proposal WHERE id_proposal='$getid'");
$file_data = mysql_fetch_assoc($sql);
$filepath = $base_url.'/file/'.$file_data['file'];
				header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        if (readfile($filepath)) {
        	// code...
					$sql = mysql_query("UPDATE proposal SET status_proposal='di Download' WHERE id_proposal='$getid'");
        }
        exit;

 ?>
