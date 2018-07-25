<?php
session_start();
include "../../../config/koneksi.php";

$module=@$_GET['module'];
$act=@$_GET['act'];

// Hapus k_jenis

if ($module=='jenis' AND $act=='hapus') {
	mysql_query("DELETE FROM k_jenis WHERE id='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input k_jenis
elseif ($module=='jenis' AND $act=='input') {
	
mysql_query("INSERT INTO k_jenis(n1,n2,kd)
	VALUES
	('$_POST[n1]','$_POST[n2]','$_POST[kd]')");

	header('location:../../../adminweb/index.php?module='.$module);
}
?>

