<?php
	include "../konek/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Daftar Pemesan</h1>
<div class="table-responsive">
	<table class="table table-bordered" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemesan</th>
				<th>Alamat</th>
				<th>Nomor Hp</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php 
		$tmp = $proses->tampil("*","pemesan","");
		$no = 0;
		foreach ($tmp as $data) {$no++;
		 ?>
		 <tbody>
		 	<tr>
		 		<td><?php echo $no; ?></td>
		 		<td><?php echo $data[1]; ?></td>
		 		<td><?php echo $data[2]; ?></td>
		 		<td><?php echo $data[3]; ?></td>
		 		<td><?php echo $data[4]; ?></td>
		 		<td>
		 			<button class="btn btn-danger" onclick="hapus_pemesan('<?php echo $data[0]; ?>')">
		 				<span class="glyphicon glyphicon-trash"></span> Hapus
		 			</button>
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