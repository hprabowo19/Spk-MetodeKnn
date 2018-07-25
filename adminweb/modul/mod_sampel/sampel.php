<?php
$aksi="modul/mod_sampel/aksi_sampel.php";
$act=@$_GET['act'];
switch ($act) {
	// Tampil sampel
	default:
	echo "
<div class='col-xs-12'>
  <div class='box'>
    <div class='box-header'>
      <h3 class='box-title'><b>Data Sampel</b></h3>
      <div class='box-tools'>
        <div class='input-group input-group-sm' style='width: 150px;'>
          <input type=button class='btn btn-primary' value='Tambah Sampel' onclick=\"window.location.href='?module=sampel&act=tambahsampel';\">
        </div>
      </div>
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
	<th>Aksi</th>
	</tr>";
$p=new Paging;
$batas=10;
$posisi=$p->cariposisi($batas);

$tampil = mysql_query("SELECT * FROM sampel ORDER BY id limit $posisi,$batas");
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
			<td>$r[kelayakan]</td>
			<td><a href=?module=sampel&act=edit&id=$r[id]><img src='images/edit-icon.gif' alt='edit' /></a> &nbsp;
			<a onclick='return hapus()' href=$aksi?module=sampel&act=hapus&id=$r[id]><img src='images/hapus-icon.gif' alt='hapus' /></a>
			</td>
			</tr>";
		$no++;
	}
	echo "</table></div></div>";
	$tampil2=mysql_query("select * from sampel");
	$jmldata=mysql_num_rows($tampil2);

	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman(@$_GET[halaman],$jmlhalaman);
	echo "<p style='padding-left: 7px;'>$linkHalaman</p>";
break;
case "tambahsampel":
echo "<div class='col-md-12'>
<!-- Horizontal Form -->
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'>Form Tambah Sampel</h3>
</div>
<form class='form-horizontal' name=form1 method=POST action='$aksi?module=sampel&act=input' id='frm'>
<div class='col-md-6'>
</br>
	<label>Id Hewan</label>
	<input type='text' name='pemilik' class='form-control' id='inputEmail3' placeholder='Id Hewan' required>
	<label>Pilih Jenis Hewan</label>
	<select class='form-control' name='jenis'>
	<option value=0 selected>- Pilih Jenis Hewan -</option>"; 
		$sql=mysql_query("SELECT * FROM jenis ORDER BY id");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value=$data[jenis]>$data[jenis]</option>";
		}
	echo"</select>
	<label>Berat Hewan</label>
	<input type='number' name='berat' class='form-control' id='inputEmail3' placeholder='Berat Hewan' required> 
	<label>Usia Hewan</label>
	<select class='form-control' name='usia' required>
	<option value='< 6 Bulan'>< 6 Bulan</option>
	<option value='> = 6 Bulan dan < 12 Bulan'>> = 6 Bulan dan < 12 Bulan
	</option>
	<option value='> = 12 Bulan'>> = 12 Bulan</option>
	</select>

	<label>Jenis Kelamin Hewan</label>
	<select class='form-control' name='jk'>
	<option value=0 selected>- Pilih Jenis Kelamin -</option>"; 
		$sql=mysql_query("SELECT * FROM jk ORDER BY id");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value=$data[jk]>$data[jk]</option>";
		}
	echo"</select>
		<label>Mata Buta</label>
			<select class='form-control' name='mata_buta' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Sakit</label>
			<select class='form-control' name='terlihat_sakit' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Pincang</label>
			<select class='form-control' name='pincang' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Kurus</label>
			<select class='form-control' name='terlihat_kurus' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Kuping Lengkap</label>
			<select class='form-control' name='kuping' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Ekor Terputus</label>
			<select class='form-control' name='ekor' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
			</div>
	<div class='col-md-6'>
	</br>
		<label>Gila</label>
			<select class='form-control' name='terlihat_gila' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Gigi Lengkap</label>
			<select class='form-control' name='gigi' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Tanduk Lengkap</label>
			<select class='form-control' name='tanduk' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Keluar Darah</label>
			<select class='form-control' name='keluar_darah' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Hidung Berlendir</label>
			<select class='form-control' name='hidung' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Kotoran Encer</label>
			<select class='form-control' name='kotoran' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Mata Belekan</label>
			<select class='form-control' name='mata_belekan' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Pucat</label>
			<select class='form-control' name='mata_sayu' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Bulu Rontok</label>
			<select class='form-control' name='bulu' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Kuku Terluka</label>
			<select class='form-control' name='kuku' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
		<label>Kelayakan</label>
			<select class='form-control' name='kelayakan' required>
			<option value='Ya'>Ya</option>
			<option value='Tidak'>Tidak</option>
			</select>
	</br>
	</div>	
    <div class='box-footer'>
    <button type='submit' class='btn btn-primary pull-right'>Simpan</button>&nbsp;&nbsp;&nbsp;
    <button type='submit' class='btn btn-danger pull-right' style='padding-right: 19px;padding-left: 23px;margin-right: 10px;' onclick=self.history.back()>Batal</button>
    </div>
</form>";
break;

case "edit":
$edit=mysql_query("SELECT * FROM sampel WHERE id='$_GET[id]'");
$r=mysql_fetch_array($edit);
echo "<div class='col-md-12'>
<!-- Horizontal Form -->
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'>Form Edit Sampel</h3>
</div>
<form class='form-horizontal' name=form1 method=POST action='$aksi?module=sampel&act=edit' id='frm'>
<input type=hidden name=id value='$r[id]'>
<div class='col-md-6'>
</br>
	<label>Id Hewan</label>
	<input type='text' name='pemilik' class='form-control' id='inputEmail3' value='$r[pemilik]' placeholder='Id Hewan' required>
	<label>Pilih Jenis Hewan</label>";
	if ($r['jenis']=='domba') {
		echo "<select class='form-control' name='jenis' required>
	<option value='domba' selected>Domba</option>
	<option value='kambing'>Kambing</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='jenis' required>
	<option value='domba'>Domba</option>
	<option value='kambing' selected>Kambing</option>
	</select>";
	}
	echo"
	<label>Berat Hewan</label>
	<input type='number' name='berat' class='form-control' id='inputEmail3' value='$r[berat]' placeholder='Berat Hewan' required> 
	<label>Usia Hewan</label>";
	if ($r['usia']=='< 6 Bulan') {
		echo "<select class='form-control' name='usia' required>
	<option value='< 6 Bulan' selected>< 6 Bulan</option>
	<option value='> = 6 Bulan dan < 12 Bulan'>> = 6 Bulan dan < 12 Bulan</option>
	<option value='>= 12 Bulan'>>= 12 Bulan</option>
	</select>";
	}
	elseif($r['usia']=='> = 6 Bulan dan < 12 Bulan') {
		echo "<select class='form-control' name='usia' required>
	<option value='< 6 Bulan'>< 6 Bulan</option>
	<option value='> = 6 Bulan dan < 12 Bulan' selected>> = 6 Bulan dan < 12 Bulan</option>
	<option value='>= 12 Bulan'>>= 12 Bulan</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='usia' required>
	<option value='< 6 Bulan'>< 6 Bulan</option>
	<option value='> = 6 Bulan dan < 12 Bulan'>> = 6 Bulan dan < 12 Bulan</option>
	<option value='> = 12 Bulan' selected>>= 12 Bulan</option>
	</select>";
	}
	echo"
	<label>Jenis Kelamin Hewan</label>";
	if ($r['jk']=='jantan') {
		echo "<select class='form-control' name='jk' required>
	<option value='jantan' selected>Jantan</option>
	<option value='betina'>Betina</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='jk' required>
	<option value='jantan'>Jantan</option>
	<option value='betina' selected>Betina</option>
	</select>";
	}
	echo"<label>Mata Buta</label>";
	if ($r['mata_buta']=='Ya') {
		echo "<select class='form-control' name='mata_buta' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='mata_buta' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Sakit</label>";
	if ($r['terlihat_sakit']=='Ya') {
		echo "<select class='form-control' name='terlihat_sakit' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='terlihat_sakit' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Pincang</label>";
	if ($r['pincang']=='Ya') {
		echo "<select class='form-control' name='pincang' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='pincang' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Kurus</label>";
	if ($r['terlihat_kurus']=='Ya') {
		echo "<select class='form-control' name='terlihat_kurus' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='terlihat_kurus' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Kuping Lengkap</label>";
	if ($r['kuping']=='Ya') {
		echo "<select class='form-control' name='kuping' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='kuping' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Ekor Terputus</label>";
	if ($r['ekor']=='Ya') {
		echo "<select class='form-control' name='ekor' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='ekor' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
	</div>
	<div class='col-md-6'>
	</br>
		<label>Gila</label>";
	if ($r['terlihat_gila']=='Ya') {
		echo "<select class='form-control' name='terlihat_gila' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='terlihat_gila' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Gigi Lengkap</label>";
	if ($r['gigi']=='Ya') {
		echo "<select class='form-control' name='gigi' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='gigi' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Tanduk Lengkap</label>";
	if ($r['tanduk']=='Ya') {
		echo "<select class='form-control' name='tanduk' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='tanduk' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Keluar Darah</label>";
	if ($r['keluar_darah']=='Ya') {
		echo "<select class='form-control' name='keluar_darah' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='keluar_darah' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Hidung Berlendir</label>";
	if ($r['hidung']=='Ya') {
		echo "<select class='form-control' name='hidung' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='hidung' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Kotoran Encer</label>";
	if ($r['kotoran']=='Ya') {
		echo "<select class='form-control' name='kotoran' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='kotoran' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Mata Belekan</label>";
	if ($r['mata_belekan']=='Ya') {
		echo "<select class='form-control' name='mata_belekan' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='mata_belekan' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"<label>Pucat</label>";
	if ($r['mata_sayu']=='Ya') {
		echo "<select class='form-control' name='mata_sayu' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='mata_sayu' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Bulu Rontok</label>";
	if ($r['bulu']=='Ya') {
		echo "<select class='form-control' name='bulu' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='bulu' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Kuku Terluka</label>";
	if ($r['kuku']=='Ya') {
		echo "<select class='form-control' name='kuku' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='kuku' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
		<label>Kelayakan</label>";
	if ($r['kelayakan']=='Ya') {
		echo "<select class='form-control' name='kelayakan' required>
	<option value='Ya' selected>Ya</option>
	<option value='Tidak'>Tidak</option>
	</select>";
	}
	else {
		echo "<select class='form-control' name='kelayakan' required>
	<option value='Ya'>Ya</option>
	<option value='Tidak' selected>Tidak</option>
	</select>";
	}
	echo"
	</br>
	</div>	
    <div class='box-footer'>
    <button type='submit' class='btn btn-primary pull-right'>Simpan</button>&nbsp;&nbsp;&nbsp;
    <button type='submit' class='btn btn-danger pull-right' style='padding-right: 19px;padding-left: 23px;margin-right: 10px;' onclick=self.history.back()>Batal</button>
    </div>
</form>";
break;
}
?>