<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_hotel");

	$qr = "SELECT max(id_hotel) as maxKode FROM hotel";
	$hs = mysql_query($qr);
	$dt = mysql_fetch_array($hs);
	$kb = $dt['maxKode'];

	$nu = (int) substr ($kb, 2, 3);
	$nu++;

	$char = "HL";
	$newid = $char . sprintf("%03s",$nu);
?>