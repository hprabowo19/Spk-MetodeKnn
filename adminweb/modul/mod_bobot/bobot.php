<?php
$aksi="modul/mod_bobot/aksi_bobot.php";
$act=@$_GET['act'];
switch ($act) {
	// Tampil bobot
	default:
	echo "<div class='col-xs-12'>
  <div class='box'>
    <div class='box-header'>
      <h3 class='box-title'>Bobot</h3>
    </div>
    <!-- /.box-header -->
    <div class='box-body table-responsive'>
    <table class='table table-hover'>
  <tr>
	<th>No.</th>
  <th>Bobot Jenis</th>
  <th>Bobot Usia</th>
  <th>Bobot Jenis Kelamin</th>
  <th>Bobot Mata Buta</th>
  <th>Bobot Sakit</th>
  <th>Bobot Pincang</th>
  <th>Bobot Kurus</th>
  <th>Bobot Kuping</th>
  <th>Bobot Ekor</th>
  <th>Bobot Gila</th>
  <th>Bobot Gigi Lengkap</th>
  <th>Bobot Tanduk Lengkap</th>
  <th>Bobot Keluar Darah</th>
  <th>Bobot Hidung Berlendir</th>
  <th>Bobot Kotoran Encer</th>
  <th>Bobot Mata Belekan</th>
  <th>Bobot Pucat</th>
  <th>Bobot Bulu Rontok</th>
  <th>Bobot Kuku Terluka</th>
</tr>";
$p=new Paging;
$batas=10;
$posisi=$p->cariposisi($batas);

$tampil = mysql_query("SELECT * FROM bobot ORDER BY id limit $posisi,$batas");
$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)){
	echo "<tr>
			<td>$no</td>
      <td>$r[b_jenis]</td>
      <td>$r[b_usia]</td>
      <td>$r[b_jk]</td>
      <td>$r[b_mata_buta]</td>
      <td>$r[b_terlihat_sakit]</td>
      <td>$r[b_pincang]</td>
      <td>$r[b_terlihat_kurus]</td>
      <td>$r[b_kuping]</td>
      <td>$r[b_ekor]</td>
      <td>$r[b_terlihat_gila]</td>
      <td>$r[b_gigi]</td>
      <td>$r[b_tanduk]</td>
      <td>$r[b_keluar_darah]</td>
      <td>$r[b_hidung]</td>
      <td>$r[b_kotoran]</td>
      <td>$r[b_mata_belekan]</td>
      <td>$r[b_mata_sayu]</td>
      <td>$r[b_bulu]</td>
      <td>$r[b_kuku]</td>
		</tr>";
		$no++;
	}
	echo "</table></div></div>";
break;
case "tambahbobot":
echo "
<div class='col-md-12'>
<!-- Horizontal Form -->
<div class='box box-info'>
<div class='box-header with-border'>
<h3 class='box-title'>Form Tambah Bobot</h3>
</div>
<form class='form-horizontal' name=form1 method=POST action='$aksi?module=bobot&act=input' id='frm'>
              <div class='box-body'>
                <div class='form-group'>
                  <label for='inputEmail3' class='col-sm-2 control-label'>Bobot Jenis Hewan</label>
                  <div class='col-sm-10'>
                    <input type='text' name='b_jenis' class='form-control' id='inputEmail3' placeholder='Bobot Jenis Hewan'>
                  </div>
                </div>
               </div>
               <div class='box-body'>
                <div class='form-group'>
                  <label for='inputEmail3' class='col-sm-2 control-label'>Bobot Berat Hewan</label>
                  <div class='col-sm-10'>
                    <input type='text' name='b_berat' class='form-control' id='inputEmail3' placeholder='Bobot Berat Hewan'>
                  </div>
                </div>
               </div>
               <div class='box-body'>
                <div class='form-group'>
                  <label for='inputEmail3' class='col-sm-2 control-label'>Bobot Usia Hewan</label>
                  <div class='col-sm-10'>
                    <input type='text' name='b_usia' class='form-control' id='inputEmail3' placeholder='Bobot Usia Hewan'>
                  </div>
                </div>
               </div>
               <div class='box-body'>
                <div class='form-group'>
                  <label for='inputEmail3' class='col-sm-2 control-label'>Bobot Jenis Kelamin</label>
                  <div class='col-sm-10'>
                    <input type='text' name='b_jk' class='form-control' id='inputEmail3' placeholder='Bobot Jenis Kelamin'>
                  </div>
                </div>
               </div>
               <div class='box-body'>
                <div class='form-group'>
                  <label for='inputEmail3' class='col-sm-2 control-label'>Bobot Penyakit</label>
                  <div class='col-sm-10'>
                    <input type='text' name='b_penyakit' class='form-control' id='inputEmail3' placeholder='Bobot Penyakit'>
                  </div>
                </div>
               </div>

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary pull-right'>Simpan</button>&nbsp;&nbsp;&nbsp;
                <button type='submit' class='btn btn-danger' onclick=self.history.back()>Batal</button>
              </div>
            </form>";
break;
}
?>