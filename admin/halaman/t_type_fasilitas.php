<?php
	include "../konek/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Daftar Type Fasilitas<button class="btn btn-primary" id="kiri" onclick="modal('thickbox/type_fasilitas.php','tampil')"><span class="glyphicon glyphicon-plus"></span> Input Data</button></h1>
<div class="table-responsive">
	<table class="table table-bordered" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Type Fasilitas</th>
				<th style="width: 20%;">Action</th>
			</tr>
		</thead>
		<?php
		$tmp = $proses->tampil("*","type_fasilitas","");
		$no = 0;
		foreach ($tmp as $data) { $no++;
		?>
		<tbody>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td>
					<button class="btn btn-info" onclick="edit_fasilitas('<?php echo $data[0]; ?>')"><span class="glyphicon glyphicon-edit"></span>
					Edit</button>
					<button class="btn btn-danger" onclick="hapus_fasilitas('<?php echo $data[0]; ?>')"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
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