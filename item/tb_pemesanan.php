<?php
	include "../konek/no_pemesanan.php";
	include "../konek/class.php";
	include "../konek/no_pemesan.php";

	$qw = $proses->tampil("
		hotel.foto_hotel,
		hotel.bintang,
		hotel.nama_hotel,
		hotel.alamat_hotel,
		detail_pemesanan.tgl_cekin,
		detail_pemesanan.tgl_cekout
		","detail_pemesanan,hotel","WHERE detail_pemesanan.id_hotel = hotel.id_hotel AND detail_pemesanan.id_pemesanan = '$newid'");
	$item_detail = $qw->fetch();
	$qs = $proses->tampil("pemesan.id_pemesan","pemesan","WHERE id_pemesan = '$neid' ");
	$id_pemesan = $qs->fetch();
?>
<div class="col-md-3">
	<img src="../admin/hotel/<?php echo $item_detail[0]; ?>" width="95px" hight="65px">
</div>
<div class="col-md-9">
	<img src="../admin/hotel/<?php echo $item_detail[1]; ?>" width="75px" hight="45px"><br>
	<p><b><?php echo $item_detail[2]; ?></b></p>
	<p><?php echo $item_detail[3]; ?></p>
</div>
<div class="col-md-6">
	<input type="text" hidden  id="id_pemesan_orang" value="<?php echo $id_pemesan[0]; ?>" name="">
	<p><b>Check in :</b> <input type="text" readonly style="outline: none; border: 1px solid#fff; width: 80px" id="tgl_cekin" name="" value="<?php echo $item_detail[4];?>"></p>
</div>
<div class="col-md-6">
	<p><b>Check out :</b><input type="text" readonly style="outline: none; border: 1px solid#fff; width: 80px" id="tgl_cekout" name="" value="<?php echo $item_detail[5]; ?>"></p>
</div>
<?php
	$qy = $proses->tampil("SUM(detail_pemesanan.sub_total)","detail_pemesanan","WHERE detail_pemesanan.id_pemesanan = '$newid'");
	$sub_total = $qy->fetch();
	$jml_total = $sub_total[0];
	$qr = $proses->tampil("*","detail_pemesanan"," WHERE detail_pemesanan.id_pemesanan = '$newid'");
	$total_pesanan = $qr->rowCount();
	$tmp = $proses->tampil("
		detail_pemesanan.id_detail_pemesanan,
		hotel.foto_hotel,
		hotel.bintang,
		hotel.alamat_hotel,
		type_kamar.nama_kamar,
		detail_pemesanan.tgl_cekin,
		detail_pemesanan.tgl_cekout,
		detail_pemesanan.durasi,
		detail_pemesanan.sub_total,
		kamar.id_type_kamar,
		kamar.id_kamar

		","detail_pemesanan,hotel,kamar,type_kamar","WHERE detail_pemesanan.id_hotel = hotel.id_hotel AND kamar.id_kamar  = detail_pemesanan.id_kamar AND kamar.id_type_kamar = type_kamar.id_type_kamar AND detail_pemesanan.id_pemesanan = '$newid'");
	foreach ($tmp as $data) {
?>
<div class="col-md-6">
	<b><?php echo $data[4]; ?></b>
</div>
<div class="col-md-6">
	<b>IDR <?php echo $data[8] ?></b>
</div>
<?php } ?>
<div class="col-md-12">
	<p><b><input type="text" readonly style="outline: none; border: 1px solid#fff;width: 60px"  id="id_pemesanan" value="<?php echo $newid; ?>" name=""></b> <span><i style="color: #FF0033;">*Simpan kode pesanan anda agar bisa melakukan pembayaran</i></span></p>
</div>
<div class="col-md-12">
	<h2 id="btn-kanan">
		<b>Total : IDR <input type="text" id="total" readonly style="outline: none; border: 1px solid#fff;width: 200px" value="<?php echo $jml_total;?>" name=""></b>
	</h2>
</div>
<input type="text" hidden id="total_pesanan" value="<?php echo $total_pesanan; ?>" name="">
<button onclick="cetak_pemesanan()" class="btn btn-primary" id="btn-kanan">
	SELESAI <span class="glyphicon glyphicon-save"></span>
</button>