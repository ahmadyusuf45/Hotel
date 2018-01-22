<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_hotel");

	$qr = "SELECT max(id_pemesanan) as maxKode FROM pemesanan";
	$hs = mysql_query($qr);
	$dt = mysql_fetch_array($hs);
	$kb = $dt['maxKode'];

	$nu = (int) substr ($kb, 4, 5);
	$nu++;

	$char = "PMS";
	$newid = $char . sprintf("%03s",$nu);
?>