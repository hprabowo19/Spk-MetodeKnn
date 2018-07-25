<?php
$id = $_POST['id'];
switch ($act) {
	// Tampil sampel
	default:
	echo "<div class='col-xs-12'>
  <div class='box'>
    <div class='box-header'>
      <h3 class='box-title'>Nilai Kedekatan</h3>
    </div>
    <!-- /.box-header -->
    <div class='box-body table-responsive'>
    <table class='table table-hover'>
	<tr>
	<th>No.</th>
	<th>Id Hewan</th>
	<th>Jenis</th>
	<th>Berat Hewan</th>
	<th>Usia Hewan</th>
	<th>JK</th>
	<th>Mata Buta</th>
	<th>Sakit</th>
	<th>Pincang</th>
	<th>Kurus</th>
	<th>Kuping</th>
	<th>Ekor</th>
	<th>Gila</th>
	<th>Gigi Lengkap</th>
	<th>Tanduk Lengkap</th>
	<th>Keluar Darah</th>
	<th>Hidung Berlendir</th>
	<th>Kotoran Encer</th>
	<th>Mata Belekan</th>
	<th>Pucat</th>
	<th>Bulu Rontok</th>
	<th>Kuku Terluka</th>
	</tr>";
$p=new Paging;
$batas=100;
$posisi=$p->cariposisi($batas);

$tampil = mysql_query("SELECT sampel.pemilik,kedekatan.jenis,sampel.berat,kedekatan.usia,kedekatan.jk,kedekatan.mata_buta,kedekatan.mata_sayu,kedekatan.mata_belekan,kedekatan.terlihat_sakit,kedekatan.terlihat_kurus,kedekatan.terlihat_gila,kedekatan.pincang,kedekatan.kuping,kedekatan.tanduk,kedekatan.gigi,kedekatan.ekor,kedekatan.keluar_darah,kedekatan.bulu,kedekatan.kuku,kedekatan.hidung,kedekatan.kotoran FROM kedekatan,sampel WHERE kedekatan.id_pemilik=sampel.id AND kedekatan.id_data=$id ORDER BY kedekatan.id limit $posisi,$batas");
$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)){
	echo "<tr>
			<td>$no</td>
			<td>$r[pemilik]</td>
			<td>$r[jenis]</td>
			<td>$r[berat]</td>
			<td>$r[usia]</td>
			<td>$r[jk]</td>
			<td>$r[mata_buta]</td>
			<td>$r[terlihat_sakit]</td>
			<td>$r[pincang]</td>
			<td>$r[terlihat_kurus]</td>
			<td>$r[kuping]</td>
			<td>$r[ekor]</td>
			<td>$r[terlihat_gila]</td>
			<td>$r[gigi]</td>
			<td>$r[tanduk]</td>
			<td>$r[keluar_darah]</td>
			<td>$r[hidung]</td>
			<td>$r[kotoran]</td>
			<td>$r[mata_belekan]</td>
			<td>$r[mata_sayu]</td>
			<td>$r[bulu]</td>
			<td>$r[kuku]</td>
		</tr>";
		$no++;
	}
	echo "</table></div></div>";
	$tampil2=mysql_query("SELECT sampel.pemilik,kedekatan.jenis,sampel.berat,kedekatan.usia,kedekatan.jk,kedekatan.mata_buta,kedekatan.mata_sayu,kedekatan.mata_belekan,kedekatan.terlihat_sakit,kedekatan.terlihat_kurus,kedekatan.terlihat_gila,kedekatan.pincang,kedekatan.kuping,kedekatan.tanduk,kedekatan.gigi,kedekatan.ekor,kedekatan.keluar_darah,kedekatan.bulu,kedekatan.kuku,kedekatan.hidung,kedekatan.kotoran FROM kedekatan,sampel WHERE kedekatan.id_pemilik=sampel.id AND kedekatan.id_data=$id ORDER BY kedekatan.id");
	$jmldata=mysql_num_rows($tampil2);

	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman(@$_GET[halaman],$jmlhalaman);
	echo "<p style='padding-left: 7px;'>$linkHalaman</p>";
break;
}
?>