<?php
	session_start();
	if($_POST['status'] == "cari_hotel"){
		$_SESSION['serch'] = $_POST['nama_hotel'];
		$_SESSION['checkin'] = $_POST['tgl_checkin'];
		$_SESSION['checkout'] = $_POST['tgl_checkout'];
		$_SESSION['durasi'] = $_POST['durasi'];
		echo $_SESSION['serch'];
	}
?>