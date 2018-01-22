<?php
	include "../konek/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Daftar Kamar <button onclick="modal('thickbox/kamar.php','tampil')" id="kiri" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Input Kamar</button></h1>
<div class="table-responsive">
	<table class="table table-bordered data" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nomor Kamar</th>
				<th>Hotel</th>
				<th>Type Kamar</th>
				<th>Harga</th>
				<th>Foto Kamar</th>
				<th>Status</th>
				<th style="width: 24%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$tampil = $proses->tampil("kamar.id_kamar, kamar.no_kamar,hotel.nama_hotel,type_kamar.nama_kamar,kamar.harga,kamar.foto_kamar,kamar.status","kamar,hotel,type_kamar","WHERE kamar.id_hotel = hotel.id_hotel AND kamar.id_type_kamar=type_kamar.id_type_kamar");
			$no = 0;
			foreach ($tampil as $data) { $no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><?php echo $data[2]; ?></td>
				<td><?php echo $data[3]; ?></td>
				<td>Rp.<?php echo $data[4]; ?></td>
				<td><img src="kamar/<?php echo $data[5]; ?>"  width = "80px" height = "80px" ></td>
				<td><?php echo $data[6]; ?></td>
				<td>
					<button onclick="edit_kamar('<?php echo $data[0]; ?>')" class="btn btn-info">
						<span class="glyphicon glyphicon-pencil"></span> Edit
					</button>
					<button onclick="hapus_kamar('<?php echo $data[0]; ?>')" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash"></span> Hapus
					</button>
					<button onclick="rubah_status_kamar('<?php echo $data[0]; ?>')" class="btn btn-warning"><span class="glyphicon glyphicon-repeat"></span> Out</button>
				</td>
			</tr>
			<?php
		}
			?>
			<input type="text" value="Belum Tersewa" name="" id="status" hidden>
		</tbody>
	</table>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable').DataTable();
	});
</script>