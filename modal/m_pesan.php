<?php
	include "../konek/class.php";
	include "../konek/no_pemesanan.php";
	session_start();
	$cekin = $_SESSION['checkin'];
	$cekout = $_SESSION['checkout'];
	$durasi = $_SESSION['durasi'];
	$nama_hotel =  $_SESSION['serch'];
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{

	}
	$qw = $proses->tampil("hotel.id_hotel,kamar.id_kamar,type_kamar.nama_kamar,kamar.harga,hotel.nama_hotel,hotel.alamat_hotel,hotel.bintang","kamar,hotel,type_kamar","WHERE hotel.id_hotel = kamar.id_hotel AND kamar.id_type_kamar = type_kamar.id_type_kamar AND kamar.id_kamar = '$id'");
	$data = $qw->fetch();
	$sub_total = $durasi*$data[3];
?>
<div class="in-modal">
	<div class="modal-title" onclick="modal_isi('','tutup');">
		<h3>Detail Pemesanan - <?php echo $data[4]; ?></h3>
	</div>
	<div class="modal-item">
	<p>Pesanan kamu sudah berhasil di tambah ke keranjang</p>

<div class="garis_border">
	<div class="item-kiri">
		<p><?php echo $data[4]; ?> <span><img src="admin/hotel/<?php echo $data[6]; ?>" width="70px" hight="40px"></span></p>
		<p><?php echo $data[5]; ?></p>
	</div>
	<div class="item-kanan">
		<p><b>Check in :</b> <input type="text" style="outline: none; border: 1px solid#fff;" readonly id="tgl_cekin" value="<?php echo $cekin; ?>" name=""></p>
			<p><b>Chcek out :</b> <input type="text" style="outline: none; border: 1px solid#fff;" readonly id="tgl_cekout" value="<?php echo $cekout; ?>" name=""></p>
	</div>
</div>
<div class="garis_border">
	<div class="item-kiri">
		<p><input type="text" name="" style="outline: none; border: 1px solid#fff;" readonly id="type_kamar" value="<?php echo $data[2]; ?>"></p>
			<p><b>Harga sewa</b> : IDR<input type="text" name="" style="outline: none; border: 1px solid#fff;" readonly id="harga_sewa" value="<?php echo $data[3]; ?>"></p>
	</div>
	<div class="item-kanan">
		<h4>Sub total : IDR <input type="text" name="" style="outline: none; border: 1px solid#fff;" readonly id="sub_total" value="<?php echo $sub_total; ?>"></h4>
	</div>
</div>

	<input type="text" hidden value="<?php echo $newid; ?>" id="id_detail_pemesanan"  name="" >
	<input type="text" id="id_hotel" hidden value="<?php echo $data[0]; ?>" name="" >
	<input type="text" hidden id="id_kamar" value="<?php echo $data[1]; ?>" name="">	
	
	<input type="text" name="" id="durasi" hidden value="<?php echo $durasi; ?>">
	
	
	<input type="text" value="Tersewa" hidden name="" id="status">
		<button class="btn btn-warning" id="btn-kiri" onclick="pesan_keranjang()">
		<span class="glyphicon glyphicon-shopping-cart"></span>
			LANJUTKAN BELANJA
		</button>
		<button class="btn btn-primary" id="btn-kanan" onclick="pesan_selesai()">
			SELESAI BELANJA
					<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="glyphicon glyphicon-chevron-right"></span>
		</button>
	</div>
</div>