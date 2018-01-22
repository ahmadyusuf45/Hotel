<?php
	include "../konek/class.php";
	$simpan = $proses->simpan("type_fasilitas","
		'$_POST[id_fasilitas]',
		'$_POST[nama_fasilitas]'
		");
	echo "berhasil";
?>