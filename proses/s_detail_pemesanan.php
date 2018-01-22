<?php
	include "../konek/class.php";
	$e_kamar = $proses->edit("kamar"," status = '$_POST[status]' ","id_kamar = '$_POST[id_kamar]'");
	$s_detail_pesan = $proses->simpan("detail_pemesanan","
		'',
		'$_POST[id_detail_pemesanan]',
		'$_POST[id_hotel]',
		'$_POST[id_kamar]',
		'$_POST[type_kamar]',
		'$_POST[tgl_cekin]',
		'$_POST[tgl_cekout]',
		'$_POST[durasi]',
		'$_POST[harga_sewa]',
		'$_POST[sub_total]'
		");
	echo "berhasil";
?>