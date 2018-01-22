<?php
	include "../konek/class.php";
	$hapus = $proses->hapus("type_fasilitas","id_fasilitas = '$_GET[id_fasilitas]'");
	echo "berhasil";
?>