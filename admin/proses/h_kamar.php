<?php
	include "../konek/class.php";
	$qy = $proses->tampil("*","kamar","WHERE id_kamar='$_GET[id_kamar]'");
	$data = $qy->fetch();
	$qw = $proses->hapus("kamar","id_kamar = '$_GET[id_kamar]'");
	unlink('../kamar/'.$data['foto_kamar']);
	echo "berhasil";
?>