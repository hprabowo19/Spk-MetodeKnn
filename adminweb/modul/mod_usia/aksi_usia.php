<?php
session_start();
include "../../../config/koneksi.php";

$module=@$_GET['module'];
$act=@$_GET['act'];

// Hapus k_usia

if ($module=='usia' AND $act=='hapus') {
	mysql_query("DELETE FROM k_usia WHERE id='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input k_usia
elseif ($module=='usia' AND $act=='input') {
	
mysql_query("INSERT INTO k_usia(n1,n2,kd)
	VALUES
	('$_POST[n1]','$_POST[n2]','$_POST[kd]')");

	header('location:../../../adminweb/index.php?module='.$module);
}
?>

