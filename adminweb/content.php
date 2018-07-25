<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Home
if ($_SESSION['level']=='admin' OR $_SESSION['level']=='user') {
if ($_GET['module']=='home') {
	echo "<section class='content'>
      <div class='row'>
        <!-- left column -->
        <div class='col-md-12'>
	<div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Administrator</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role='form'>
              <div class='box-body'>
                <div class='form-group'>
                 <h2>Selamat Datang</h2>
			<p>Hai <b>Administrator</b>, Selamat datang di halaman Aplikasi Penentuan Kelayakan Hewan Qurban.<br>
			 Silahkan klik menu pilihan yang berada di sebelah kiri untuk data yang diinginkan.</p>
			 <p>Untuk Mengecek hewan anda silahkan menuju ke menu : </p>
			 <p>-><b>Data Kasus</b> Untuk memasukan data baru.<br>
			 	-><b>Nilai kedekatan</b> Untuk menghitung hasil kedekatan dengan data sampel.<br>
			 	-><b>Hasil Perhitungan</b> Untuk melihat kelayakan dan hasil dari perhitungan.<br>
			 </p>
			 <p>&nbsp;</p>
			 <p>&nbsp;</p>
                </div>
            </form>
          </div>
          </div>
          </div>
          </section>";
}

// Bagian User
 /*elseif ($_GET[module]=='user') {
	include "modul/mod_user/user.php";
}

// Bagian Modul
elseif ($_GET[module]=='modul') {
	include "modul/mod_modul/modul.php";
}*/

// Bagian Fakultas
elseif ($_GET['module']=='berat') {
	include "modul/mod_berat/berat.php";
}

// Bagian bobot
elseif ($_GET['module']=='bobot') {
	include "modul/mod_bobot/bobot.php";
}

// Bagian Mahasiswa
elseif ($_GET['module']=='mahasiswa') {
	include "modul/mod_siswa/mahasiswa.php";
}

// Bagian Dosen
elseif ($_GET['module']=='jenis') {
	include "modul/mod_jenis/jenis.php";
}

// Bagian Kategori
elseif ($_GET['module']=='kategori') {
	include "modul/mod_kategori/kategori.php";
}
// Bagian Berita
elseif ($_GET['module']=='berita') {
	include "modul/mod_berita/berita.php";
}
// Bagian Banner
elseif ($_GET['module']=='banner') {
	include "modul/mod_banner/banner.php";
}

// Bagian Agenda
elseif ($_GET['module']=='usia') {
	include "modul/mod_usia/usia.php";
}

elseif ($_GET['module']=='nilai_kedekatan') {
	include "modul/mod_nilai_kedekatan/nilai_kedekatan.php";
}

elseif ($_GET['module']=='pass') {
	include "modul/mod_nilai_kedekatan/pass.php";
}

elseif ($_GET['module']=='pass2') {
	include "modul/mod_hasil/pass.php";
}



// Bagian Mata Kuliah
elseif ($_GET['module']=='jk') {
	include "modul/mod_jk/jk.php";
}

// Bagian penyakit
elseif ($_GET['module']=='penyakit') {
	include "modul/mod_penyakit/penyakit.php";
}

// Bagian Materi Ajar Baru
elseif ($_GET['module']=='materibaru') {
	include "modul/mod_materibaru/materibaru.php";
}

// Bagian Materi Ajar Baru
elseif ($_GET['module']=='krs') {
	include "modul/mod_krs/krs.php";
}

// Bagian Dosen Mengajar
elseif ($_GET['module']=='sampel') {
	include "modul/mod_sampel/sampel.php";
}

// Bagian data Kuliah
elseif ($_GET['module']=='data') {
	include "modul/mod_data/data.php";
}

// Bagian Nilai
elseif ($_GET['module']=='nilai') {
	include "modul/mod_nilai/nilai.php";
}

// Bagian hasil
elseif ($_GET['module']=='hasil') {
	include "modul/mod_hasil/hasil.php";
}

// Bagian Cetak KRS
elseif ($_GET['module']=='knn') {
	include "modul/mod_knn/knn.php";
}

// Bagian Cetak Nilai
elseif ($_GET['module']=='cetaknilai') {
	include "modul/mod_cetaknilai/cetak_nilai.php";
}
// Bagian Kartu Hasil Studi (Nilai Per Semester)
elseif ($_GET['module']=='cetakkhs') {
	include "modul/mod_khs/cetak_khs.php";
}
	// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis') {
	include "modul/mod_halamanstatis/halamanstatis.php";
}
elseif ($_GET['module']=='menu') {
	include "modul/mod_menu/menu.php";
}
}

if ($_SESSION['level']=='admin'){
	// Bagian User
	if ($_GET['module']=='user') {
		include "modul/mod_user/user.php";
}
// Bagian Modul
	elseif ($_GET['module']=='modul') {
		include "modul/mod_modul/modul.php";
}
}

?>