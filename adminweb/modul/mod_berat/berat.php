<?php
$aksi="modul/mod_berat/aksi_berat.php";
$act=@$_GET['act'];
switch ($act) {
	// Tampil berat
	default:
	echo "<div class='col-md-12'>
          <div class='box'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Data Berat</h3>
            </div>
            <!-- /.box-header -->
<div class='box-body'>
<table id='example1' class='table table-bordered table-striped'>
<input type=button class='btn btn-primary' value='Tambah Berat' onclick=\"window.location.href='?module=berat&act=tambahberat';\"></br></br>
<thead>
<tr>
	<th>No.</th>
	<th>Nilai 1</th>
	<th>Nilai 2</th>
	<th>Kedekatan</th>
	<th>Aksi</th>
</tr>
</thead>";
$p=new Paging;
$batas=10;
$posisi=$p->cariposisi($batas);

$tampil = mysql_query("SELECT * FROM k_berat ORDER BY id limit $posisi,$batas");
$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)){
	echo "<tr>
			<td>$no</td>
			<td>$r[n1]</td>
			<td>$r[n2]</td>
			<td>$r[kd]</td>
			<td><a onclick='return hapus()' href=$aksi?module=berat&act=hapus&id=$r[id]><img src='images/hapus-icon.gif' alt='hapus' /></a>
			</td>
		</tr>";
		$no++;
	}
	echo "</table></div></div></div>";
	$tampil2=mysql_query("select * from berat");
	$jmldata=mysql_num_rows($tampil2);

	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman(@$_GET[halaman],$jmlhalaman);
	echo "<p>$linkHalaman</p>";
break;
case "tambahberat":
echo "<div class='col-md-12'>
<!-- Horizontal Form -->
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'>Form Tambah Kedekatan Berat</h3>
</div>
<form class='form-horizontal' name=form1 method=POST action='$aksi?module=berat&act=input' id='frm'>
<div class='form-group col-md-12 center' style='padding-left: 59px;padding-right: 694px;'>
      <label>Nilai 1</label>
      <select class='form-control' name='n1'>
      <option value=0 selected>- Pilih Berat -</option>"; 
		$sql=mysql_query("SELECT * FROM berat ORDER BY id");
		while ($data=mysql_fetch_array($sql))
		{
		echo "<option value=$data[berat]>$data[berat]</option>";
		}
      echo"</select>
      <label>Nilai 2</label>
      <select class='form-control' name='n2'>
      <option value=0 selected>- Pilih Berat -</option>"; 
		$sql=mysql_query("SELECT * FROM berat ORDER BY id");
		while ($data=mysql_fetch_array($sql))
		{
		echo "<option value=$data[berat]>$data[berat]</option>";
		}
      echo"</select>
              <label>Nilai Kedekatan</label>
              <input type='text' name='kd' class='form-control' id='inputEmail3' placeholder='Nilai Kedekatan' required>
    </div>
    <div class='box-footer'>
    <button type='submit' class='btn btn-primary'>Simpan</button>&nbsp;&nbsp;&nbsp;
    <button type='submit' class='btn btn-danger' style='padding-right: 19px;padding-left: 23px;' onclick=self.history.back()>Batal</button>
    </div>
</form>";
break;
}
?>