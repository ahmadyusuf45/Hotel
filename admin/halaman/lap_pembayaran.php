<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Daftar Pembayaran <div class="form-inline" id="kiri">
	<input type="text" class="form-control" id="tgl_mulai" name="" placeholder="DD/MM/YYYY">
	<input type="text" onchange="cari_lap_pembayaran()" class="form-control" id="tgl_akhir" name="" placeholder="DD/MM/YYYY">
	<button class="btn btn-primary" onclick="cetak_laporan_pembayaran()"><span class=" glyphicon glyphicon-print"></span> Print Laporan</button>
</div></h1>
<div class="table-responsive">

</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(".table-responsive").load('item/tb_pembayaran.php');
		$("#tgl_mulai").datepicker();
		$("#tgl_akhir").datepicker();

	})
</script>