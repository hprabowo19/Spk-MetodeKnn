<?php
session_start();
include "../../../config/koneksi.php";

$module=@$_GET['module'];
$act=@$_GET['act'];

// Hapus k_sampel

if ($module=='sampel' AND $act=='hapus') {
	mysql_query("DELETE FROM sampel WHERE id='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input k_sampel
elseif ($module=='sampel' AND $act=='input') {
	
mysql_query("INSERT INTO sampel(pemilik,jenis,berat,usia,jk,mata_buta,mata_sayu,mata_belekan,terlihat_sakit,terlihat_kurus,terlihat_gila,pincang,kuping,tanduk,gigi,ekor,keluar_darah,bulu,kuku,hidung,kotoran,kelayakan)
	VALUES
	('$_POST[pemilik]','$_POST[jenis]','$_POST[berat]','$_POST[usia]','$_POST[jk]','$_POST[mata_buta]','$_POST[mata_sayu]','$_POST[mata_belekan]','$_POST[terlihat_sakit]','$_POST[terlihat_kurus]','$_POST[terlihat_gila]','$_POST[pincang]','$_POST[kuping]','$_POST[tanduk]','$_POST[gigi]','$_POST[ekor]','$_POST[keluar_darah]','$_POST[bulu]','$_POST[kuku]','$_POST[hidung]','$_POST[kotoran]','$_POST[kelayakan]')");

	header('location:../../../adminweb/index.php?module='.$module);
}

elseif ($module=='sampel' AND $act=='edit') {
	mysql_query("UPDATE sampel SET pemilik = '$_POST[pemilik]',
								jenis     = '$_POST[jenis]',
								berat  = '$_POST[berat]',
								usia    = '$_POST[usia]',
								jk   = '$_POST[jk]',
								mata_buta   = '$_POST[mata_buta]',
								mata_sayu   = '$_POST[mata_sayu]',
								mata_belekan   = '$_POST[mata_belekan]',
								terlihat_sakit   = '$_POST[terlihat_sakit]',
								terlihat_kurus   = '$_POST[terlihat_kurus]',
								terlihat_gila   = '$_POST[terlihat_gila]',
								pincang   = '$_POST[pincang]',
								kuping   = '$_POST[kuping]',
								tanduk   = '$_POST[tanduk]',
								gigi   = '$_POST[gigi]',
								ekor   = '$_POST[ekor]',
								keluar_darah   = '$_POST[keluar_darah]',
								bulu   = '$_POST[bulu]',
								kuku   = '$_POST[kuku]',
								hidung   = '$_POST[hidung]',
								kotoran   = '$_POST[kotoran]',
								kelayakan   = '$_POST[kelayakan]'
			WHERE id  = '$_POST[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}
?>

