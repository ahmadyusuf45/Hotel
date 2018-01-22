<?php
	include "../konek/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Beranda</h1>
<?php
	$qs = $proses->tampil("*","hotel","");
	$qu = $proses->tampil("*","kamar","");
	$qi = $proses->tampil("*","pemesanan","");
	$qp = $proses->tampil("*","pembayaran","");
	$hotel = $qs->rowCount();
	$kamar = $qu->rowCount();
	$pemesanan = $qi->rowCount();
	$pembayaran = $qp->rowCount();
?>
<div class="box" id="merah">
	<div class="icon-box" id="merah">
		<img src="img/hotel.png">
	</div>
	<div class="box-disk">
		<h3><?php echo $hotel; ?></h3>
	</div>
</div>

<div class="box" id="biru">
	<div class="icon-box" id="biru">
		<img src="img/bed.png">
	</div>
	<div class="box-disk">
		<h3><?php echo $kamar ?></h3>
	</div>
</div>

<div class="box" id="unggu">
	<div class="icon-box" id="unggu">
		<img src="img/koper.png">
	</div>
	<div class="box-disk">
		<h3><?php echo $pemesanan; ?></h3>
	</div>
</div>

<div class="box" id="kuning">
	<div class="icon-box" id="kuning">
		<img src="img/pembayaran.png">
	</div>
	<div class="box-disk">
		<h3><?php echo $pembayaran; ?></h3>
	</div>
</div>

<div class="container-fluid">
<div class="col-md-8">
<div id="grafik"></div>
</div>
<div class="col-md-4">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#backup">Backup Database</a></li>
		<li><a data-toggle="tab" href="#restore">Restore Database</a></li>
	</ul>
	<div class="tab-content">
		<div id="backup" class="tab-pane fade in active">
				<h4>Lakukan Backup Database Hotel</h4>
				<button class="btn btn-danger" onclick="backup_database()"><span class="glyphicon glyphicon-open-file"></span>  Backup</button>
		</div>
		<div id="restore" class="tab-pane fade">
				<h4>Lakukan Restore Database Hotel</h4>
				<button class="btn btn-primary" onclick="restore_database()"><span class=" glyphicon glyphicon-save-file"></span> Restore</button>
		</div>
	</div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	var chart = new Highcharts.Chart({
		chart:{
			renderTo: 'grafik',
			type:'column'
		}, title:{
			text:'Grafik Hotel'
		}, xAxis:{
			categories:['Jumlah Kamar']
		}, yAxis:{
			title:{
				text:'Jumlah Kamar'
			}
		},
		series:
		[<?php
		$qw = $proses->tampil("hotel.id_hotel,hotel.nama_hotel","hotel","");
		while ($item_hotel = $qw->fetch()) {
			$id_hotel = $item_hotel['id_hotel'];
			$nama_hotel =$item_hotel['nama_hotel'];
			$qs = $proses->tampil("kamar.id_hotel","kamar","WHERE id_hotel = '$id_hotel'");
			$row = $qs->rowCount();
		?>
		{
			name:'<?php echo $nama_hotel; ?>',
			data:[<?php echo $row; ?>]
		},
		<?php } ?>
		]
	})
})
</script>