<?php
	include "../konek/class.php";
?>
<h1>Daftar Hotel <button onclick="modal('thickbox/hotel.php','tampil');" id="kiri" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Input Hotel</button></h1>

<center>
<div class="table-responsive">
	<table class="table  table-striped table-bordered" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama hotel</th>
				<th>Alamat hotel</th>
				<th>Ranting hotel</th>
				<th>Foto hotel</th>
				<th>Fasilitas hotel</th>
				<th>Deskripsi hotel</th>
				<th style="width: 200px;">Lokasi Hotel</th>
				<th style="width:20%;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$tampil = $proses->tampil("hotel.id_hotel,hotel.nama_hotel, hotel.alamat_hotel, hotel.bintang, hotel.foto_hotel, type_fasilitas.nama_fasilitas, hotel.deskripsi_hotel,hotel.map_hotel","hotel,type_fasilitas","WHERE hotel.id_fasilitas = type_fasilitas.id_fasilitas");
			$no = 0;
			foreach ($tampil as $data) { $no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><?php echo $data[2]; ?></td>
				<td><img src="hotel/<?php echo $data[3]; ?>"  width = "80px" height = "80px" ></td>
				<td><img src="hotel/<?php echo $data[4]; ?>"  width = "80px" height = "80px" > </td>
				<td><?php echo $data[5]; ?></td>
				<td><?php echo substr($data[6], 0,120); echo "...";?></td>
				<td><?php echo $data[7]; ?></td>
				<td>
					<button onclick="edit_hotel('<?php echo $data[0]; ?>')" class="btn btn-info">
					<span class="glyphicon glyphicon-edit"></span>
						Edit
					</button>
					<button class="btn btn-danger" onclick="hapus_hotel('<?php echo $data[0]; ?>')">
					<span class="glyphicon glyphicon-trash"></span>
						Hapus
					</button>
				</td>
			</tr>
			<?php
		}
			?>
		</tbody>
	</table>
</div>
</center>
<script type="text/javascript">
	$(document).ready(function(){	
		$('#datatable').DataTable();
	});
</script>