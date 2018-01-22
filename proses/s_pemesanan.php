<?php
	include "../konek/class.php";
	$s_pemesanan = $proses->simpan("pemesanan","
		'$_POST[id_pemesanan]',
		'$_POST[total_pesanan]',
		'$_POST[id_pemesan]',
		'$_POST[tgl_cekin]',
		'$_POST[tgl_cekout]',
		'$_POST[total]'
		");
	echo "berhasil";
?>