<?php
$aksi="modul/mod_modul/aksi_modul.php";
$act=@$_GET['act'];
switch($act) {
// Tampil Modul
default:
echo "<h2>Modul</h2>
<input type=button value='Tambah Modul' onclick=\"window.location.href='?module=modul&act=tambahmodul';\">
<table class='table-bordered responsive'>
<thead><th>No.</th><th>Nama Modul</th><th>Link</th><th>Aksi</th></tr></thead>";
$tampil=mysql_query("SELECT * FROM modul ORDER BY urutan");
while($r=mysql_fetch_array($tampil)) {	
	echo "<tr><td>$r[urutan]</td>
			<td>$r[nama_modul]</td>
			<td><a href=$r[link]>$r[link]</a></td>
			<td><a href=?module=modul&act=editmodul&id=$r[id_modul]><img src='images/edit-icon.gif' alt='edit' /></a> &nbsp; 
			<a onclick='return hapus()' href=$aksi?module=modul&act=hapus&id=$r[id_modul]><img src='images/hapus-icon.gif' alt='hapus' /></a></td>
			</tr>";
}

echo "</table>";
break;
case "tambahmodul":
echo "<h2>Tambah Modul</h2>
<form method=POST action='$aksi?module=modul&act=input' id='frm'>
<table>
	<tr><td>Nama Modul</td><td> : <input type=text name='nama_modul' required></td></tr>
	<tr><td>Link</td><td> : <input type=text name='link' size=30 required></td></tr>
	<tr><td>Publish</td><td> : <input type=radio name='publish' value='Y' checked>Y
	<input type=radio name='publish' value='N'>N</td></tr>
	<tr><td>Aktif</td><td> : <input type=radio name='aktif' value='Y' checked>Y
	<input type=radio name='aktif' value='N'>N </td></tr>
	<tr><td>Status</td><td> : <input type=radio name='status' value='user' checked>user
	<input type=radio name='status' value='admin'>admin</td></tr>
	<tr><td colspan=2><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
break;

case "editmodul":
$edit=mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Modul</h2>
	<form method=POST action='$aksi?module=modul&act=update' id='frm'>
	<input type=hidden name=id value='$r[id_modul]'>
	<table>
		<tr>
			<td>Nama Modul</td>
			<td> : <input type=text name='nama_modul' value='$r[nama_modul]' required></td>
		</tr>
		<tr>
			<td>Link</td>
			<td> : <input type=text name='link' size=30 value='$r[link]' required></td>
		</tr>";
		
		if ($r['publish']=='Y') {
			echo "<tr><td>Publish</td><td> :
				<input type=radio name='publish' value='Y' checked>Y
				<input type=radio name='publish' value='N'>N
				</td></tr>";
		}
		else {
			echo "<tr><td>Publish</td><td> :
				<input type=radio name='publish' value='Y'>Y
				<input type=radio name='publish' value='N' checked>N
				</td></tr>";
		}
		
		if ($r['aktif']=='Y') {
			echo "<tr><td>Aktif</td><td> :
				<input type=radio name='aktif' value='Y' checked>Y
				<input type=radio name='aktif' value='N'>N
				</td></tr>";
		}
		else {
			echo "<tr><td>Aktif</td><td> :
				<input type=radio name='aktif' value='Y'>Y
				<input type=radio name='aktif' value='N' checked>N
				</td></tr>";
		}
		
		if ($r['status']=='user') {
			echo "<tr><td>Status</td><td> :
				<input type=radio name='status' value='user' checked>user
				<input type=radio name='status' value='admin'>admin
				</td></tr>";
		}
		else {
			echo "<tr><td>Satus</td><td> :
				<input type=radio name='status' value='user'>user
				<input type=radio name='status' value='admin' checked>admin
				</td></tr>";
		}
		
		echo "<tr><td>Urutan</td><td> : 
			<input type=text name='urutan' size=1 value='$r[urutan]'></td></tr>
			<tr>
				<td colspan=2><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td>
			</tr>
		</table>
	</form>";
break;
}
?>