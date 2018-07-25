<?php
$id = $_POST['id'];
$data = mysql_query("SELECT MAX(jarak) AS mx FROM hasil WHERE id_data=$id");
$data_max = mysql_fetch_array($data);
$max = $data_max['mx'];
$hasil=mysql_query("SELECT id_pemilik FROM hasil WHERE jarak='$max'");
$data1=mysql_fetch_array($hasil);
$g=$data1['id_pemilik'];
$hasil2=mysql_query("SELECT * FROM sampel WHERE id='$g'");
$data2=mysql_fetch_array($hasil2);
$status=$data2['kelayakan'];
$hasil3=mysql_query("SELECT * FROM data WHERE id='$id'");
$data3=mysql_fetch_array($hasil3);
$berat=$data3['berat'];


if($status == 'Ya' AND $berat < 20){
	$status_akhir = 'Tidak Layak';
}elseif($status == 'Tidak' AND $berat < 20){
	$status_akhir = 'Tidak Layak';
}elseif($status == 'Ya' AND $berat > 20){
	$status_akhir = 'Layak';
}else{
	$status_akhir = 'Tidak Layak';
}
switch ($act) {
	// Tampil sampel
	default:
	echo "<div class='col-xs-12'>
  <div class='box'>
    <div class='box-header'>
    	<form class='form-horizontal' name=form1 method=POST action='../print.php' id='frm' target='_blank'>
    		<input type=hidden name=id value='$id'>
	    	<button type='submit' class='btn btn-primary pull-right'>Cetak Laporan</button>
    	</form>
      <h3 class='box-title'><b>Hasil Akhir</b></h3>
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
	<th>Kuping Lengkap</th>
	<th>Ekor Terputus</th>
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
	<th>Status Kelayakan</th>
	</tr>";
$p=new Paging;
$batas=100;
$posisi=$p->cariposisi($batas);

$tampil = mysql_query("SELECT * FROM data WHERE id=$id");
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
			<td>$status_akhir</td>
		</tr>";
		$no++;
	}
	echo "</table></div></div>";
break;
}

switch ($act) {
	// Tampil sampel
	default:
	echo "<div class='col-md-12' style='padding-left: 0px;padding-right: 0px;padding-top: 41px;'>
          <div class='box'>
            <div class='box-header with-border'>
              <h3 class='box-title'><b>Data Kasus</b></h3>
            </div>
            <!-- /.box-header -->
<div class='box-body'>
<table id='example1' class='table table-bordered table-striped'>
<thead>
<tr>
	<th>No.</th>
	<th>Id Hewan</th>
	<th>Status Kelayakan</th>
</tr>
</thead>";

$tampil = mysql_query("SELECT * FROM data WHERE id=$id");
$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)){
	echo "<tr>
			<td>$no</td>
			<td>$r[pemilik]</td>
			<td>$status_akhir</td>
			</td>
		</tr>";
		$no++;
	}
	echo "</table></div></div>";
break;
}

switch ($act) {
	// Tampil sampel
	default:
	echo "<div class='col-md-12' style='padding-left: 0px;padding-right: 0px;padding-top: 41px;'>
          <div class='box'>
            <div class='box-header with-border'>
              <h3 class='box-title'><b>Data Sampel</b></h3>
            </div>
            <!-- /.box-header -->
<div class='box-body'>
<table id='example1' class='table table-bordered table-striped'>
<thead>
<tr>
	<th>No.</th>
	<th>Id Hewan</th>
	<th>Nilai Kedekatan Akhir</th>
	<th>Status Kelayakan</th>
</tr>
</thead>";

$tampil = mysql_query("SELECT hasil.jarak,sampel.pemilik,sampel.kelayakan FROM hasil,sampel WHERE hasil.id_data=$id AND hasil.id_pemilik = sampel.id ORDER BY sampel.kelayakan DESC");
$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)){
	$nilai = floor($r['jarak'] * 100);
	echo "<tr>
			<td>$no</td>
			<td>$r[pemilik]</td>
			<td>$nilai</td>
			<td>$r[kelayakan]</td>
			</td>
		</tr>";
		$no++;
	}
	echo "</table>";
break;
}
?>