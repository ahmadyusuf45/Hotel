<?php
	include "../konek/class.php";
	$tm = $proses->tampil("*","pemesan","WHERE nama_pemesan = '$_POST[nama_pemesan]'");
	$hsl = $tm->fetch();
	$ar = array("alamat"=>$hsl['alamat'],"no_hp"=>$hsl['no_hp'],"email"=>$hsl['email']);
	echo json_encode($ar);
?>