<?php
	include "../konek/class.php";
	$edit = $proses->edit("type_kamar","nama_kamar = '$_POST[nama_kamar]'","id_type_kamar = '$_POST[id_type_kamar]'");
?>