<?php
session_start();
include "../../../config/koneksi.php";

$module=@$_GET['module'];
$act=@$_GET['act'];

// Hapus bobot

if ($module=='bobot' AND $act=='hapus') {
	mysql_query("DELETE FROM bobot WHERE id='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input bobot
elseif ($module=='bobot' AND $act=='input') {
	
mysql_query("INSERT INTO bobot(b_jenis,b_berat,b_usia,b_jk,b_penyakit)
	VALUES
	('$_POST[b_jenis]','$_POST[b_berat]','$_POST[b_usia]','$_POST[b_jk]','$_POST[b_penyakit]')");

	header('location:../../../adminweb/index.php?module='.$module);
}
?>

