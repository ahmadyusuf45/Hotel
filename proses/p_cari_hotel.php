<?php
	include "../konek/class.php";
	$serch = strtolower($_GET['term']);
	$qy = $proses->tampil("*","hotel","WHERE nama_hotel like '%$serch%' OR alamat_hotel like '%$serch%'");
	$num = $qy->rowCount();
	if($num > 0){
		while ($row = $qy->fetch()) {
			$row_set[] = htmlentities(stripslashes($row[1]));
		}
		echo json_encode($row_set);
	}
?>