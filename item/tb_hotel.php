<?php
	include "../konek/class.php";
	session_start();
	$cekin = $_SESSION['checkin'];
	$cekout = $_SESSION['checkout'];
	$durasi = $_SESSION['durasi'];
	$nama_hotel =  $_SESSION['serch'];
?>
<table class="table table-bordered">
		<thead>
			<th style="width: 5px;">No</th>
			<th style="width: auto;">Kamar</th>
			<th>Hotel</th>
			<th>Nomor Kamar</th>
			<th>Type Kamar</th>
			<th>Harga Kamar</th>
			<th>Pesan</th>
		</thead>
		<?php
		$qy = $proses->tampil("kamar.id_kamar,kamar.foto_kamar,hotel.nama_hotel,kamar.no_kamar,type_kamar.nama_kamar,kamar.harga,kamar.status","type_kamar,kamar,hotel","WHERE type_kamar.id_type_kamar=kamar.id_type_kamar AND kamar.id_hotel=hotel.id_hotel AND hotel.nama_hotel = '$nama_hotel' AND kamar.status = 'Belum Tersewa'");
		$x = 0;
		foreach ($qy as $data) { $x++;
		?>
		<tbody>
			<tr>
				<td><?php echo $x; ?></td>
				<td><img src="admin/kamar/<?php echo $data[1]; ?>" width="80px" hight="80px"></td>
				<td><?php echo $data[2]; ?></td>
				<td><?php echo $data[3]; ?></td>
				<td><?php echo $data[4]; ?></td>
				<td><?php echo $data[5]; ?></td>
				<td><button class="btn btn-lg btn-primary" onclick="pesan_kamar('<?php echo $data[0]; ?>')">
					<span class="glyphicon glyphicon-briefcase"></span> Pesan
				</button></td>
			</tr>
		</tbody>
		<?php
	}
		?>
	</table>