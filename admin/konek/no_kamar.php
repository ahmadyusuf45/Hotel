<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_hotel");

	$qr = "SELECT max(id_kamar) as maxKode FROM kamar";
	$hs = mysql_query($qr);
	$dt = mysql_fetch_array($hs);
	$kb = $dt['maxKode'];

	$nu = (int) substr ($kb, 2, 3);
	$nu++;

	$char = "KR";
	$newid = $char . sprintf("%03s",$nu);
?>