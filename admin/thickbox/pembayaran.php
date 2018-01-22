<?php
	include '../konek/class.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$judul = "Konfirmasi Pembayaran";
		$onclick = "edit_konfirmasi('$id')";
	}else{

	}
	$qw = $proses->tampil("*","pembayaran","WHERE id_pembayaran = '$id'");
	$data = $qw->fetch();
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss = "modal" aria-label="Close" onclick="modal('','tutup');"><span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title"><?php echo $judul; ?></h4>
		</div>
		<div class="modal-body">
				<div class="form-group">
					<p>Id Pembayar</p>
					<input type="text" readonly value="<?php echo $data[1]; ?>" class="form-control" name="">
				</div>
				<div class="form-group">
					<p>Nama</p>
					<input type="text" readonly class="form-control" value="<?php echo $data[2]; ?>" name="">
				</div>
				<div class="form-group">
					<p>Status Pembayaran</p>
					<select id="status_pembayaran" class="form-control">
						<option <?php if($data[3]==""){
							echo "selected";
							} ?>>Belum Terkonfirmasi</option>
						<option value="Terbayar">Konfirmasi</option>
					</select>
				</div>
				<div class="form-group">
					<img src="../bukti_img/<?php echo $data[4]; ?>" width="90px" hight="90px">
				</div>
				<button class="btn btn-primary" onclick="<?php echo $onclick; ?>">
					 SIMPAN KONFIRMASI
				</button>
		</div>
	</div>
</div>