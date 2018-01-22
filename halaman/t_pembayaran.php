
<div class="container form-konfirmasi">
<h1>KONFIRMASI PEMBAYARAN</h1>
<form method="POST" action="proses/s_pembayaran.php" enctype="multipart/form-data">
<div class="form-group">
	<p>Kode Pesanan Contoh :<span><i> PMS001</i></span></p>
	<input type="text" name="id_pemesanan" id="id_pemesanan" class="form-control" onkeyup="cari_id_pemesanan()">
</div>
<div class="form-group">
	<p>Nama Pemesan</p>
	<input type="text" name="nama_pembayar" readonly class="form-control" id="nama_pemesan">
</div>
<div class="form-group">
	<p>Sub Total Pemesanan</p>
	<input type="text" name="" readonly id="total" class="form-control">
</div>
<div class="form-group">
	<p>Tanggal Pembayaran</p>
	<input type="text" name="tgl_pembayaran"  class="form-control" readonly value="<?php $tgl = date('m/d/Y'); echo $tgl; ?>">
</div>
<div class="form-group">
	<p>Nomor Rekening</p>
	<input type="text" maxlength="6"  name="no_rekening" class="form-control">
</div>
<div class="form-group">
	<p>Bukti Transfer</p>
	<input type="file" class="form-control" name="foto_transfer" >
</div>
<input type="submit" name="simpan" class="btn tombol_bayar btn-primary" value="KONFIRMASI">
</form>
</div>
<style type="text/css">
	.form-konfirmasi{
		height: 590px;
	}
</style>
