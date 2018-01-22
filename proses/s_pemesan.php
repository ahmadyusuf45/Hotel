<?php
	include "../konek/class.php";
	$tmp = $proses->tampil("*","pemesan","WHERE nama_pemesan = '$_POST[nama_pemesan]'");
	$row = $tmp->rowCount();
	if($row == 1){
		$edit = $proses->edit("pemesan","
			id_pemesan = '$_POST[id_pemesan]',
			alamat = '$_POST[alamat]',
			no_hp = '$_POST[no_hp]',
			email = '$_POST[email]'
			","nama_pemesan = '$_POST[nama_pemesan]'");
		echo "gagal";
	}else{
		$simpan = $proses->simpan("pemesan","
		'$_POST[id_pemesan]',
		'$_POST[nama_pemesan]',
		'$_POST[alamat]',
		'$_POST[no_hp]',
		'$_POST[email]'
		");
	echo "berhasil";	
	}
	
?>