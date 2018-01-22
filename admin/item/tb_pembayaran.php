<?php
	include "../konek/class.php";
?>
<table class="table table-responsive" id="datatable">
<thead>
	<tr>
		<th>No</th>
		<th>Nama Pemesan</th>
		<th>Status Pemesan</th>
		<th>Tanggal Transfer</th>
	</tr>
</thead>
<?php
	if(isset($_GET['tgl_mulai']) && ($_GET['tgl_akhir'])){
		$tgl_mulai = $_GET['tgl_mulai'];
		$tgl_akhir = $_GET['tgl_akhir'];
		$qw = $proses->tampil("pembayaran.nama_pembayar,pembayaran.konfirmasi,pembayaran.tgl_pembayaran","pembayaran","WHERE tgl_pembayaran BETWEEN '$tgl_mulai' AND '$tgl_akhir' AND konfirmasi='Terbayar'");	
	}else{
		$qw = $proses->tampil("pembayaran.nama_pembayar,pembayaran.konfirmasi,pembayaran.tgl_pembayaran","pembayaran","WHERE konfirmasi='Terbayar'");	
	}
	$x = 0;
	foreach ($qw as $data) {$x++;
?>
<tbody>
	<tr>
		<td><?php echo $x; ?></td>
		<td><?php echo $data[0]; ?></td>
		<td><?php echo $data[1]; ?></td>
		<td><?php echo $data[2]; ?></td>
	</tr>
</tbody>
<?php } ?>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$("#datatable").DataTable();
	})
</script>
<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/box.css">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="DataTables/media/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap_new/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap_new/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="jq_ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="jq_ui/jquery-ui.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/proses.js"></script>
<script type="text/javascript" src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap_new/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="jq_ui/jquery-ui.js"></script>
<script type="text/javascript" src="jq_ui/jquery-ui.min.js"></script>