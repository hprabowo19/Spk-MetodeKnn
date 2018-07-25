<?php
include "../config/koneksi.php";

if (@$_SESSION['level']=='admin') {
	$sql = mysql_query("SELECT * FROM modul WHERE aktif='Y' order BY urutan");
}
else {
	$sql = mysql_query("SELECT * FROM modul WHERE status='user' and aktif='Y' order by urutan");
}
echo "<li><a href='?module=bobot'><i class='fa fa-laptop'></i>Bobot</a></li>";
echo "<li><a href='?module=sampel'><i class='fa fa-database'></i>Data Sampel</a></li>";
echo "<li><a href='?module=data'><i class='fa fa-table'></i>Data Kasus</a></li>";
echo "<li><a href='?module=nilai_kedekatan'><i class='fa fa-check-square-o'></i>Nilai Kedekatan</a></li>";
echo "<li><a href='?module=hasil'><i class='fa fa-calculator'></i>Hasil Perhitungan</a></li>";
?>
	