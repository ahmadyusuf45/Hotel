<?php
	include "../konek/class.php";
	include "../konek/no_pemesanan.php";
	$qw = $proses->tampil("*","detail_pemesanan"," WHERE id_pemesanan = '$newid' ");
	$jml_pesan = $qw->rowCount();
?>
<nav class="navbar menu_atas">
		<ul class="nav navbar-nav navbar-right menu_atas_kiri">
			<li><a href="halaman/t_pemesanan.php"><span class="glyphicon glyphicon-shopping-cart"></span>(<?php echo $jml_pesan; ?>) Keranjang</a></li>
			<li><a href=""><span class="glyphicon glyphicon-globe"></span> IDR</a></li>
		</ul>
	</nav>