<?php
	include "../konek/class.php";
	$edit = $proses->edit("pembayaran","konfirmasi = '$_POST[konfirmasi]'","id_pembayaran = '$_POST[id_pembayaran]'");
	echo "berhasil";
?>