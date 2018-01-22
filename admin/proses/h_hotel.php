<?php
	include "../konek/class.php";
	$qy = $proses->tampil("*","hotel"," WHERE id_hotel='$_GET[id_hotel]' ");
	$data = $qy->fetch();
	$qw = $proses->hapus("hotel","id_hotel = '$_GET[id_hotel]'");
	unlink('../hotel/'.$data['bintang']);
	unlink('../hotel/'.$data['foto_hotel']);
	echo  "berhasil";
?>