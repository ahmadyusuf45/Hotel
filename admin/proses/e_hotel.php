<?php
	include "../konek/class.php";
	
		$nama_foto_bintang = $_FILES['bintang']['name'];
		$alamat_foto_bintang = $_FILES['bintang']['tmp_name'];
		$nama_foto_hotel = $_FILES['foto_hotel']['name'];
		$alamat_foto_hotel = $_FILES['foto_hotel']['tmp_name'];	
	if(empty($nama_foto_bintang)){
		$edit = $proses->edit("hotel"," 
		nama_hotel = '$_POST[nama_hotel]',
		alamat_hotel = '$_POST[alamat_hotel]',
		id_fasilitas = '$_POST[id_fasilitas]',
		deskripsi_hotel = '$_POST[deskripsi_hotel]',
		map_hotel = '$_POST[map_hotel]'
	 ","id_hotel = '$_POST[id_hotel]'");			
	}else{
		$qw = $proses->tampil("*","hotel","WHERE id_hotel = '$_POST[id_hotel]'");
		$data = $qw->fetch();
		unlink('../hotel/'.$data['foto_hotel']);
		unlink('../hotel/'.$data['bintang']);
		move_uploaded_file($alamat_foto_bintang, '../hotel/'.$nama_foto_bintang);
		move_uploaded_file($alamat_foto_hotel, '../hotel/'.$nama_foto_hotel);
		$edit = $proses->edit("hotel"," 
		nama_hotel = '$_POST[nama_hotel]',
		alamat_hotel = '$_POST[alamat_hotel]',
		bintang = '$nama_foto_bintang',
		foto_hotel = '$nama_foto_hotel',
		id_fasilitas = '$_POST[id_fasilitas]',
		deskripsi_hotel = '$_POST[deskripsi_hotel]'
	 ","id_hotel = '$_POST[id_hotel]'");	
	}
	
	echo "berhasil";
?>