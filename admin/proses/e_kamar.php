<?php
	include "../konek/class.php";
	$nama_foto_kamar = $_FILES['foto_kamar']['name'];
	$alamat_foto_kamar = $_FILES['foto_kamar']['tmp_name'];
	if(empty($nama_foto_kamar)){
	$edit = $proses->edit("kamar","
		no_kamar = '$_POST[no_kamar]',
		id_hotel = '$_POST[id_hotel]',
		id_type_kamar = '$_POST[id_type_kamar]',
		harga = '$_POST[harga]',
		status = '$_POST[status]'
		","id_kamar = '$_POST[id_kamar]'");
	}else{
	$qw = $proses->tampil("*","kamar","WHERE id_kamar = '$_POST[id_kamar]'");
	$data = $qw->fetch();
	unlink('../kamar/'.$data['foto_kamar']);
	move_uploaded_file($alamat_foto_kamar, '../kamar/'.$nama_foto_kamar);
	$edit = $proses->edit("kamar","
		no_kamar = '$_POST[no_kamar]',
		id_hotel = '$_POST[id_hotel]',
		id_type_kamar = '$_POST[id_type_kamar]',
		harga = '$_POST[harga]',
		foto_kamar = '$nama_foto_kamar',
		status = '$_POST[status]'
		","id_kamar = '$_POST[id_kamar]'");	
	}
	
	echo "berhasil";
?>