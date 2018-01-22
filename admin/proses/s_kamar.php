<?php
	include "../konek/class.php";
	$nama_foto_kamar = $_FILES['foto_kamar']['name'];
	$alamat_foto_kamar = $_FILES['foto_kamar']['tmp_name'];
	move_uploaded_file($alamat_foto_kamar, '../kamar/'.$nama_foto_kamar);
	$simpan = $proses->simpan("kamar","
		'$_POST[id_kamar]',
		'$_POST[no_kamar]',
		'$_POST[id_hotel]',
		'$_POST[id_type_kamar]',
		'$_POST[harga]',
		'$nama_foto_kamar',
		'$_POST[status]'
		");
	echo "berhasil";
?>