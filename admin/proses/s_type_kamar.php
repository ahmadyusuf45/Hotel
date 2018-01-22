<?php
	include "../konek/class.php";
	$simpan = $proses->simpan("type_kamar","
		'$_POST[id_type_kamar]',
		'$_POST[nama_kamar]'
		");
	echo "berhasil";
?>