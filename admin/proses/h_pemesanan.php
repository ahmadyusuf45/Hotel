<?php
	include "../konek/class.php";
	$h_pemesanan = $proses->hapus("pemesanan","id_pemesanan = '$_GET[id_pemesanan]'");
	$h_detail_pemesanan = $proses->hapus("detail_pemesanan"," id_pemesanan = '$_GET[id_pemesanan]' ");
	echo "berhasil";
?>