<?php
session_start();
include "../../../config/koneksi.php";
$module1=@$_GET['module1'];
$act1=@$_GET['act1'];
$id=$_POST['id'];


	$tampil = mysql_query("SELECT * FROM bobot WHERE id=1");
	$read=mysql_fetch_array($tampil);
	$a=$read['id'];
	$b=$read['b_jenis'];
	$d=$read['b_usia'];
	$e=$read['b_jk'];
	$f=$read['b_mata_buta'];
	$g=$read['b_mata_sayu'];
	$h=$read['b_mata_belekan'];
	$i=$read['b_terlihat_sakit'];
	$j=$read['b_terlihat_kurus'];
	$k=$read['b_terlihat_gila'];
	$o=$read['b_pincang'];
	$p=$read['b_kuping'];
	$q=$read['b_tanduk'];
	$r=$read['b_gigi'];
	$s=$read['b_ekor'];
	$t=$read['b_keluar_darah'];
	$u=$read['b_bulu'];
	$v=$read['b_kuku'];
	$w=$read['b_hidung'];
	$x=$read['b_kotoran'];

	$max = mysql_query("SELECT * FROM kedekatan WHERE id_data =$id");
	$baca_max=mysql_num_rows($max);
	for($i=1; $i<=$baca_max;$i++){

		$baca = mysql_query("SELECT * FROM kedekatan WHERE id_pemilik =$i AND id_data=$id");
		$rd=mysql_fetch_array($baca);
		$b1=$rd['jenis'];
		$c1=$rd['berat'];
		$d1=$rd['usia'];
		$e1=$rd['jk'];
		$f1=$rd['mata_buta'];
		$g1=$rd['mata_sayu'];
		$h1=$rd['mata_belekan'];
		$i1=$rd['terlihat_sakit'];
		$j1=$rd['terlihat_kurus'];
		$k1=$rd['terlihat_gila'];
		$o1=$rd['pincang'];
		$p1=$rd['kuping'];
		$q1=$rd['tanduk'];
		$r1=$rd['gigi'];
		$s1=$rd['ekor'];
		$t1=$rd['keluar_darah'];
		$u1=$rd['bulu'];
		$v1=$rd['kuku'];
		$w1=$rd['hidung'];
		$x1=$rd['kotoran'];

		$j1=(($b*$b1)+($d*$d1)+($e*$e1)+($f*$f1)+($g*$g1)+($h*$h1)+($i*$i1)+($j*$j1)+($k*$k1)+($o*$o1)+($p*$p1)+($q*$q1)+($r*$r1)+($s*$s1)+($t*$t1)+($u*$u1)+($v*$v1)+($w*$w1)+($x*$x1))/($b+$d+$e+$f+$g+$h+$i+$j+$k+$o+$p+$q+$r+$s+$t+$u+$v+$w+$x);

		$cari_data = mysql_query("SELECT * FROM hasil WHERE id_data = $id AND id_pemilik = $i");
		$baca_data=mysql_num_rows($cari_data);

		if ($module1=='hasil' AND $act1=='add') {
			if($baca_data < 1){
				mysql_query("INSERT INTO hasil(id_data,id_pemilik,jarak) VALUES ('$id','$i','$j1')");
				}
				?>
				<script language="JavaScript">
					alert('Data Berhasil Disimpan Silahkan Lanjut Ke Lihat Nilai Kasus Di Bawah Ini !');
					document.location='../../../adminweb/index.php?module=hasil';
				</script>
				<?php
		}
}
?>