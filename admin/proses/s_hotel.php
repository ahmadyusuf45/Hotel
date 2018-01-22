<?php
	include "../konek/class.php";
	$nama_foto_bintang = $_FILES['bintang']['name'];
	$alamat_foto_bintang = $_FILES['bintang']['tmp_name'];
	$nama_foto_hotel = $_FILES['foto_hotel']['name'];
	$alamat_foto_hotel = $_FILES['foto_hotel']['tmp_name'];
	move_uploaded_file($alamat_foto_bintang, '../hotel/'.$nama_foto_bintang);
	move_uploaded_file($alamat_foto_hotel, '../hotel/'.$nama_foto_hotel);
	$simpan = $proses->simpan("hotel"," 
		'$_POST[id_hotel]',
		'$_POST[nama_hotel]',
		'$_POST[alamat_hotel]',
		'$nama_foto_bintang',
		'$nama_foto_hotel',
		'$_POST[id_fasilitas]',
		'$_POST[deskripsi_hotel]',
		'$_POST[map_hotel]'
		 ");
	echo "berhasil";
?>