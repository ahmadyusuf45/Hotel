<?php
	include "../konek/class.php";
	$qy = $proses->tampil("*","pembayaran","WHERE id_pembayaran = '$_GET[id_pembayaran]'");
	$data = $qy->fetch();
	$qw = $proses->hapus("pembayaran","id_pembayaran = '$_GET[id_pembayaran]'");
	unlink('../../bukti_img/'.$data['foto_transfer']);
	echo "berhasil";
?>