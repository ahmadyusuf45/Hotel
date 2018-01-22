<?php 
	include "../konek/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Daftar Type Kamar <button id="kiri" onclick="modal('thickbox/type_kamar.php','tampil');" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Input Data</button></h1>
<div class="table-responive">
<table class="table table-bordered" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Type Kamar</th>
			<th style="width: 20%">Action</th>
		</tr>
	</thead>
	<?php
	$tmp = $proses->tampil("*","type_kamar","");
	$no= 0;
	foreach ($tmp as $data) {$no++;
	?>
	<tbody>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data[1]; ?></td>
			<td>
				<button class="btn btn-info" onclick="edit_Type_kamar('<?php echo $data[0]; ?>')"><span class="glyphicon glyphicon-edit"></span> Edit</button>
				<button class="btn btn-danger" onclick="hapus_type_kamar('<?php echo $data[0]; ?>')"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
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