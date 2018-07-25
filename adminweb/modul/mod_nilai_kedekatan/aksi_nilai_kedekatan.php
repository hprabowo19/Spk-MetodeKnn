<?php
session_start();
include "../../../config/koneksi.php";
$module1=@$_GET['module1'];
$act1=@$_GET['act1'];
$id = $_POST['id'];
if ($module1=='nilai_kedekatan' AND $act1=='add') {
	$tampil = mysql_query("SELECT * FROM data WHERE id=$id");
	$read=mysql_fetch_array($tampil);
	$a=$read['id'];
	$b=$read['pemilik'];
	$c=$read['jenis'];
	$d=$read['berat'];
	$e=$read['usia'];
	$f=$read['jk'];
	$g=$read['mata_buta'];
	$h=$read['mata_sayu'];
	$ii=$read['mata_belekan'];
	$j=$read['terlihat_sakit'];
	$k=$read['terlihat_kurus'];
	$l=$read['terlihat_gila'];
	$p=$read['pincang'];
	$q=$read['kuping'];
	$r=$read['tanduk'];
	$s=$read['gigi'];
	$t=$read['ekor'];
	$u=$read['keluar_darah'];
	$v=$read['bulu'];
	$w=$read['kuku'];
	$x=$read['hidung'];
	$y=$read['kotoran'];

$max = mysql_query("SELECT * FROM sampel");
$baca_max=mysql_num_rows($max);
for($i=1; $i<=$baca_max;$i++){
	$data = mysql_query("SELECT * FROM sampel WHERE id=$i");
	$tampil_data=mysql_fetch_array($data);
	$jenis=$tampil_data['jenis'];
	$berat=$tampil_data['berat'];
	$usia=$tampil_data['usia'];
	$jk=$tampil_data['jk'];
	$mata_buta=$tampil_data['mata_buta'];
	$mata_sayu=$tampil_data['mata_sayu'];
	$mata_belekan=$tampil_data['mata_belekan'];
	$terlihat_sakit=$tampil_data['terlihat_sakit'];
	$terlihat_kurus=$tampil_data['terlihat_kurus'];
	$terlihat_gila=$tampil_data['terlihat_gila'];
	$pincang=$tampil_data['pincang'];
	$kuping=$tampil_data['kuping'];
	$tanduk=$tampil_data['tanduk'];
	$gigi=$tampil_data['gigi'];
	$ekor=$tampil_data['ekor'];
	$keluar_darah=$tampil_data['keluar_darah'];
	$bulu=$tampil_data['bulu'];
	$kuku=$tampil_data['kuku'];
	$hidung=$tampil_data['hidung'];
	$kotoran=$tampil_data['kotoran'];

	$cari_jenis = mysql_query("SELECT kd FROM k_jenis WHERE n1='$c' AND n2='$jenis'");
	$data_jenis=mysql_fetch_array($cari_jenis);
	$jenis_data = $data_jenis['kd'];

	$cari_usia = mysql_query("SELECT kd FROM k_usia WHERE n1='$e' AND n2='$usia'");
	$data_usia=mysql_fetch_array($cari_usia);
	$usia_data = $data_usia['kd'];

	$cari_jk = mysql_query("SELECT kd FROM k_jk WHERE n1='$f' AND n2='$jk'");
	$data_jk=mysql_fetch_array($cari_jk);
	$jk_data = $data_jk['kd'];

	$cari_mata_buta = mysql_query("SELECT kd FROM k_mata_buta WHERE n1='$g' AND n2='$mata_buta'");
	$data_mata_buta=mysql_fetch_array($cari_mata_buta);
	$mata_buta_data = $data_mata_buta['kd'];

	$cari_mata_sayu = mysql_query("SELECT kd FROM k_mata_sayu WHERE n1='$h' AND n2='$mata_sayu'");
	$data_mata_sayu=mysql_fetch_array($cari_mata_sayu);
	$mata_sayu_data = $data_mata_sayu['kd'];

	$cari_mata_belekan = mysql_query("SELECT kd FROM k_mata_belekan WHERE n1='$ii' AND n2='$mata_belekan'");
	$data_mata_belekan=mysql_fetch_array($cari_mata_belekan);
	$mata_belekan_data = $data_mata_belekan['kd'];

	$cari_terlihat_sakit = mysql_query("SELECT kd FROM k_terlihat_sakit WHERE n1='$j' AND n2='$terlihat_sakit'");
	$data_terlihat_sakit=mysql_fetch_array($cari_terlihat_sakit);
	$terlihat_sakit_data = $data_terlihat_sakit['kd'];

	$cari_terlihat_kurus = mysql_query("SELECT kd FROM k_terlihat_kurus WHERE n1='$k' AND n2='$terlihat_kurus'");
	$data_terlihat_kurus=mysql_fetch_array($cari_terlihat_kurus);
	$terlihat_kurus_data = $data_terlihat_kurus['kd'];

	$cari_terlihat_gila = mysql_query("SELECT kd FROM k_terlihat_gila WHERE n1='$l' AND n2='$terlihat_gila'");
	$data_terlihat_gila=mysql_fetch_array($cari_terlihat_gila);
	$terlihat_gila_data = $data_terlihat_gila['kd'];

	$cari_pincang = mysql_query("SELECT kd FROM k_pincang WHERE n1='$p' AND n2='$pincang'");
	$data_pincang=mysql_fetch_array($cari_pincang);
	$pincang_data = $data_pincang['kd'];

	$cari_kuping = mysql_query("SELECT kd FROM k_kuping WHERE n1='$q' AND n2='$kuping'");
	$data_kuping=mysql_fetch_array($cari_kuping);
	$kuping_data = $data_kuping['kd'];

	$cari_tanduk = mysql_query("SELECT kd FROM k_tanduk WHERE n1='$r' AND n2='$tanduk'");
	$data_tanduk=mysql_fetch_array($cari_tanduk);
	$tanduk_data = $data_tanduk['kd'];

	$cari_gigi = mysql_query("SELECT kd FROM k_gigi WHERE n1='$s' AND n2='$gigi'");
	$data_gigi=mysql_fetch_array($cari_gigi);
	$gigi_data = $data_gigi['kd'];

	$cari_ekor = mysql_query("SELECT kd FROM k_ekor WHERE n1='$t' AND n2='$ekor'");
	$data_ekor=mysql_fetch_array($cari_ekor);
	$ekor_data = $data_ekor['kd'];

	$cari_keluar_darah = mysql_query("SELECT kd FROM k_keluar_darah WHERE n1='$u' AND n2='$keluar_darah'");
	$data_keluar_darah=mysql_fetch_array($cari_keluar_darah);
	$keluar_darah_data = $data_keluar_darah['kd'];

	$cari_bulu = mysql_query("SELECT kd FROM k_bulu WHERE n1='$v' AND n2='$bulu'");
	$data_bulu=mysql_fetch_array($cari_bulu);
	$bulu_data = $data_bulu['kd'];

	$cari_kuku = mysql_query("SELECT kd FROM k_kuku WHERE n1='$w' AND n2='$kuku'");
	$data_kuku=mysql_fetch_array($cari_kuku);
	$kuku_data = $data_kuku['kd'];

	$cari_hidung = mysql_query("SELECT kd FROM k_hidung WHERE n1='$x' AND n2='$hidung'");
	$data_hidung=mysql_fetch_array($cari_hidung);
	$hidung_data = $data_hidung['kd'];

	$cari_kotoran = mysql_query("SELECT kd FROM k_kotoran WHERE n1='$y' AND n2='$kotoran'");
	$data_kotoran=mysql_fetch_array($cari_kotoran);
	$kotoran_data = $data_kotoran['kd'];

	$cari_data = mysql_query("SELECT * FROM kedekatan WHERE id_data = $a AND id_pemilik = $i");
	$baca_data=mysql_num_rows($cari_data);

	if($baca_data < 1){
		mysql_query("INSERT INTO kedekatan(id_data,id_pemilik,jenis,berat,usia,jk,mata_buta,mata_sayu,mata_belekan,terlihat_sakit,terlihat_kurus,terlihat_gila,pincang,kuping,tanduk,gigi,ekor,keluar_darah,bulu,kuku,hidung,kotoran) 
			VALUES ('$a','$i','$jenis_data','$d','$usia_data','$jk_data','$mata_buta_data','$mata_sayu_data','$mata_belekan_data','$terlihat_sakit_data','$terlihat_kurus_data','$terlihat_gila_data','$pincang_data','$kuping_data','$tanduk_data','$gigi_data','$ekor_data','$keluar_darah_data','$bulu_data','$kuku_data','$hidung_data','$kotoran_data')");
	}
	?>
	<script language="JavaScript">
		alert('Data Berhasil Disimpan Silahkan Lanjut Ke Lihat Nilai Kedekatan Di Bawah Ini !');
		document.location='../../../adminweb/index.php?module=nilai_kedekatan';
	</script>
	<?php
}
}
?>