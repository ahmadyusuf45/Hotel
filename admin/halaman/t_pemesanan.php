<?php
	include "../konek/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Daftar Pemesanan</h1>
<div class="table-responsive">
	<table class="table table-bordered" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemesan</th>
				<th>Tanggal Cekin</th>
				<th>Tanggal Cekout</th>
				<th>Total Pemesanan</th>
				<th>Sub Total</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php
		$tmp =  $proses->tampil("
			pemesanan.id_pemesanan,
			pemesan.nama_pemesan,
			pemesanan.tgl_cekin,
			pemesanan.tgl_cekout,
			pemesanan.total_pemesanan,
			pemesanan.total
			","pemesanan,pemesan","WHERE pemesanan.id_pemesan = pemesan.id_pemesan");
			$no = 0;
			foreach ($tmp as $data) { $no++;
		?>
		<tbody>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><?php echo $data[2]; ?></td>
				<td><?php echo $data[3]; ?></td>
				<td><?php echo $data[4]; ?></td>
				<td>Rp.<?php echo $data[5]; ?></td>
				<td>
					<button onclick="detail_pemesanan('<?php echo $data[0]; ?>')" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Detail</button>
					<button onclick="hapus_pemesanan('<?php echo $data[0] ?>')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
				</td>
			</tr>
		</tbody>
		<?php } ?>
	</table>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#datatable").DataTable();
	})
</script>