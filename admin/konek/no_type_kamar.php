<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_hotel");

	$qr = "SELECT max(id_type_kamar) as maxKode FROM type_kamar";
	$hs = mysql_query($qr);
	$dt = mysql_fetch_array($hs);
	$kb = $dt['maxKode'];

	$nu = (int) substr ($kb, 3, 3);
	$nu++;

	$char = "TYK";
	$newid = $char . sprintf("%03s",$nu);
?>