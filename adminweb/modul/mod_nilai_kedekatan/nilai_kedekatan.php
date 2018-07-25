<?php
$aksi1="modul/mod_nilai_kedekatan/aksi_nilai_kedekatan.php";
$aksi2="pass";
switch ($act1) {
	// Tampil kedekatan
	default:
	echo "<div class='col-md-12'>
<!-- Horizontal Form -->
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'><b>Nilai Kedekatan</b></h3>
</div>
<form class='form-horizontal' name=form1 method=POST action='$aksi1?module1=nilai_kedekatan&act1=add' id='frm'>
<div class='form-group col-md-12 center' style='padding-left: 59px;padding-right: 694px;'>
	<label>Pilih Kasus</label>
	<select class='form-control' name='id'>
	<option value=0 selected>- Pilih Kasus-</option>"; 
		$sql=mysql_query("SELECT * FROM data  where id NOT IN 
                          (select id_data from kedekatan) ORDER BY id");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value=$data[id]>$data[pemilik]</option>";
		}
	echo"</select>
	</div>
    <div class='box-footer'>
    <button type='submit' class='btn btn-primary'>Pilih</button>&nbsp;&nbsp;&nbsp;
    </div>
</form>";
}
switch ($act2) {
	// Tampil kedekatan
	default:
	echo "<div class='col-md-12' style='padding-left: 0px;padding-right: 0px;'>
<!-- Horizontal Form -->
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'><b>Lihat Nilai Kedekatan</b></h3>
</div>
<form class='form-horizontal' name=form1 method=POST action='index.php?module=$aksi2' id='frm'>
<div class='form-group col-md-12 center' style='padding-left: 59px;padding-right: 694px;'>
	<label>Pilih Kasus</label>
	<select class='form-control' name='id'>
	<option value=0 selected>- Pilih Kasus-</option>"; 
		$sql=mysql_query("SELECT * FROM data  where id IN 
                          (select id_data from kedekatan) ORDER BY id");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value=$data[id]>$data[pemilik]</option>";
		}
	echo"</select>
	</div>
    <div class='box-footer'>
    <button type='submit' class='btn btn-primary'>Pilih</button>&nbsp;&nbsp;&nbsp;
    </div>
</form>";
}
?>