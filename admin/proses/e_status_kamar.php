<?php
	include "../konek/class.php";
	$edit = $proses->edit("kamar","status = '$_POST[status]'","id_kamar = '$_POST[id_kamar]'");
	echo "berhasil";
?>