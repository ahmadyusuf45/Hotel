	<link rel="stylesheet" type="text/css" href="../bootstrap_new/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap_new/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap_new/dist/js/bootstrap.min.js"></script>
<?php
	include "../konek/class.php";
?>
<div class="container">
	<?php
	$qu = $proses->tampiL("
		pemesan.nama_pemesan,
		pemesanan.id_pemesanan
		","pemesanan,pemesan","WHERE pemesanan.id_pemesan = pemesan.id_pemesan AND pemesanan.id_pemesanan = '$_GET[id_pemesanan]'");
	$nama = $qu->fetch();
	$qw = $proses->tampil("
		hotel.foto_hotel,
		hotel.bintang,
		hotel.nama_hotel,
		hotel.alamat_hotel,
		detail_pemesanan.tgl_cekin,
		detail_pemesanan.tgl_cekout,
		detail_pemesanan.id_pemesanan
		","detail_pemesanan,hotel","WHERE
		detail_pemesanan.id_hotel = hotel.id_hotel AND detail_pemesanan.id_pemesanan ='$_GET[id_pemesanan]'");
	$item_data = $qw->fetch();
	?>
	<div class="col-md-3">
		<img src="../admin/hotel/<?php echo $item_data[0]; ?>" width="95px" hight="65px">
	</div>
	<div class="col-md-9">
		<img src="../admin/hotel/<?php echo $item_data[1]; ?>" width="75px" hight="45px">
		<p><b><?php echo $item_data[2]; ?></b></p>
		<p><?php echo $item_data[3]; ?></p>
	</div>
	<div class="col-md-6">
		<p><b>Cekin</b> <?php echo $item_data[4]; ?></p>
	</div>
	<div class="col-md-6">
		<p><b>Cekout</b><?php echo $item_data[5]; ?></p>
	</div>
	<?php
	$qy = $proses->tampil("SUM(detail_pemesanan.sub_total)","detail_pemesanan","WHERE detail_pemesanan.id_pemesanan = '$_GET[id_pemesanan]'");
	$sub_total = $qy->fetch();
	$jml_total = $sub_total[0];
	$tmp = $proses->tampil("
		type_kamar.nama_kamar,
		detail_pemesanan.harga_sewa
		","detail_pemesanan,kamar,type_kamar","WHERE detail_pemesanan.id_kamar= kamar.id_kamar AND kamar.id_type_kamar = type_kamar.id_type_kamar AND detail_pemesanan.id_pemesanan = '$_GET[id_pemesanan]'");
	foreach ($tmp as $data) {
	?>
	<div class="col-md-6">
		<p><b><?php echo $data[0]; ?></b></p>
	</div>
	<div class="col-md-6">
		<p><b>IDR <?php echo $data[1]; ?></b></p>
	</div>
	<?php } ?>
	<div class="col-md-6">
	<p><b><?php echo $_GET['id_pemesanan']; ?></b><span><i style="color:#FF0033;">*Simpan kode pesanan anda agar bisa melakukan pembayaran</i></span></p>
	</div>
	<div class="col-md-6">
		<p>Nama Pemesan : <b><?php echo $nama[0]; ?></b></p>
	</div>
	<div class="col-md-12">
		<h2 id="btn-kanan">
			<b>Total : IDR <?php echo $jml_total; ?></b>
		</h2>
	</div>
</div>
<script type="text/javascript">
window.load=cetak_lap_pinjam();
	function cetak_lap_pinjam(){
		window.print();
	}
</script>