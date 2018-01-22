<?php
	include "../konek/class.php";
	$tm = $proses->tampil("*","pembayaran","WHERE id_pemesanan = '$_POST[id_pemesanan]'");
	$hsl = $tm->fetch();
	$ar = array("nama_pembayar"=>$hsl['nama_pembayar'],"konfirmasi"=>$hsl['konfirmasi'],"tgl_pembayaran"=>$hsl['tgl_pembayaran']);
	echo json_encode($ar);
?>