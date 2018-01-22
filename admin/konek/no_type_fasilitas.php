<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_hotel");

	$qr = "SELECT max(id_fasilitas) as maxKode FROM type_fasilitas";
	$hs = mysql_query($qr);
	$dt = mysql_fetch_array($hs);
	$kb = $dt['maxKode'];

	$nu = (int) substr ($kb, 3, 3);
	$nu++;

	$char = "TYF";
	$newid = $char . sprintf("%03s",$nu);
?>