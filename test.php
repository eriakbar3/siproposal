<?php
mysql_select_db("siproposal",mysql_connect("localhost", "root", ""));
$sql = mysql_query('SELECT * FROM proposal ORDER BY id_proposal DESC LIMIT 1');
$sql1 = mysql_fetch_assoc($sql);
if ($sql1['id_proposal'] == null) {
  // code...
  $id = '1';
}else {
  $id = substr($sql1['id_proposal'],7)+1;
}
$kode = 'PRO'.date('Y').$id;
echo $kode;
mysql_error();
?>
