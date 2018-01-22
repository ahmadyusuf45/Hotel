<?php
	include "../konek/class.php";
	$hapus= $proses->hapus("pemesan","id_pemesan = '$_GET[id_pemesan]'");
	echo "berhasil";
?>