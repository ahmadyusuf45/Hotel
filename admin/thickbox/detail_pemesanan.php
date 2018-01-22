<?php
	include "../konek/class.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{

	}
	$qw = $proses->tampil("
		hotel.nama_hotel,
		detail_pemesanan.type_kamar,
		detail_pemesanan.tgl_cekin,
		detail_pemesanan.tgl_cekout,
		detail_pemesanan.harga_sewa
		","hotel,detail_pemesanan","WHERE hotel.id_hotel = detail_pemesanan.id_hotel AND detail_pemesanan.id_pemesanan = '$id'");
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title">Daftar Detail Pemesanan</h4>
		</div>
		<div class="modal-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Hotel</th>
						<th>Type Kamar</th>
						<th>Tanggal Cekin</th>
						<th>Tanggal Cekout</th>
						<th>Harga Sewa</th>
					</tr>
				</thead>
				<?php
				$no = 0;
				foreach ($qw as $data) {$no++;
				?>
				<tbody>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data[0]; ?></td>
						<td><?php echo $data[1]; ?></td>
						<td><?php echo $data[2]; ?></td>
						<td><?php echo $data[3]; ?></td>
						<td>Rp.<?php echo $data[4]; ?></td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
</div>