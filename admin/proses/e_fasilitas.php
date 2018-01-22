<?php
	include "../konek/class.php";
	$edit = $proses->edit("type_fasilitas","nama_fasilitas = '$_POST[nama_fasilitas]'","id_fasilitas = '$_POST[id_fasilitas]'");
	echo "berhasil";
?>