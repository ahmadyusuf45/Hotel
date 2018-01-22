<?php
	include "../konek/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Daftar Pembayaran</h1>
<div class="table-responsive">
	<table class="table table-bordered data" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Id Pemesanan</th>
				<th>Nama</th>
				<th>Status Konfirmasi</th>
				<th>Bukti Transfer</th>
				<th>Tanggal Transfer</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$tampil = $proses->tampil("*","pembayaran","");
			$no = 0;
			foreach ($tampil as $data) { $no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><?php echo $data[2]; ?></td>
				<td><?php echo $data[3]; ?></td>
				<td><img src="../bukti_img/<?php echo $data[4]; ?>" width = "80px" hight="80px"></td>
				<td><?php echo $data[6]; ?></td>
				<td>
					<button onclick="edit_pembayaran('<?php echo $data[0]; ?>')" class="btn btn-info">
						<span class="glyphicon glyphicon-pencil"></span> Konfirmasi
					</button>
					<button onclick="hapus_pembayaran('<?php echo $data[0]; ?>')" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash"></span> Hapus
					</button>
				</td>
			</tr>
			<?php
		}
			?>
		</tbody>
	</table>
</div>
</body>
</html>
<script type="text/javascript">
	$("#datatable").DataTable();
</script>