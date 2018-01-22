<?php
	include "../konek/class.php";
	$tm = $proses->tampil("*","pemesan,pemesanan","WHERE pemesan.id_pemesan = pemesanan.id_pemesan AND pemesanan.id_pemesanan = '$_POST[id_pemesanan]'");
	$hsl = $tm->fetch();
	$ar = array("nama_pemesan"=>$hsl['nama_pemesan'],"total"=>$hsl['total']);
	echo json_encode($ar);
?>