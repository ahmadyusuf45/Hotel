<?php
	include "../konek/class.php";
	include "../konek/no_kamar.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$judul = "Edit";
		$form = "edit_kamar";
		$value = "Edit";
	}else{
		$id = "";
		$judul = "Input";
		$form = "simpan_kamar";
		$value = "Simpan";
	}
	$qw = $proses->tampil("*","kamar","WHERE id_kamar = '$id'");
	$data = $qw->fetch();
	if(empty($data[0])){
		$id_kamar = "$newid";
	}else{
		$id_kamar = "$data[0]";
	}
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss = "modal" aria-label="Close" onclick="modal('','tutup');"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo $judul; ?> Kamar</h4>
		</div>
		<div class="modal-body">
			<form role="form" id="<?php echo $form; ?>">
				<div class="form-group" hidden>
					<p>Id Kamar</p>
					<input type="text" name="id_kamar" class="form-control" value="<?php echo $id_kamar; ?>">
				</div>
				<div class="form-group">
					<p>Nomor Kamar</p>
					<input type="text" name="no_kamar" class="form-control" value="<?php echo $data[1]; ?>">
				</div>
				<div class="form-group">
					<p>Nama Hotel</p>
					<select name="id_hotel" class="form-control">
					<option value="">pilih</option>
		<?php
		$tmp = $proses->tampil("id_hotel,nama_hotel","hotel","ORDER BY id_hotel ASC");
		foreach ($tmp as $datam) {
			if($datam[0] == $data[2]){
				$selectedes = "selected";
			}else{
				$selectedes = "";
			}
		?>
					<option <?php echo $selectedes; ?> value="<?php echo $datam[0]; ?>">
					<?php echo $datam[1] ;?>
					</option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<p>Type Kamar</p>
					<select name="id_type_kamar" class="form-control">
					<option value="">pilih</option>
					<?php
		$tms = $proses->tampil("id_type_kamar,nama_kamar","type_kamar","ORDER BY id_type_kamar ASC");
		foreach ($tms as $datam) {
			if($datam[0] == $data[3]){
				$selectedes = "selected";
			}else{
				$selectedes = "";
			}
		?>
					<option <?php echo $selectedes; ?> value="<?php echo $datam[0]; ?>">
					<?php echo $datam[1] ;?>
					</option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<p>Harga Kamar</p>
					<input type="text" name="harga" class="form-control" value="<?php echo $data[4]; ?>">
				</div>
				<div class="form-group">
					<p>Foto Kamar</p>
					<input type="file" name="foto_kamar">
				</div>
				<div class="form-group">
					<p>Status Kamar</p>
					<select name="status" class="form-control">
					<option <?php if($data[6]=="Tersewa"){ echo "selected";}?>>Tersewa</option>
					<option <?php if($data[6]=="Belum Tersewa"){ echo "selected";}?>>Belum Tersewa</option>
					</select>
				</div>
				<input type="submit" class="btn btn-primary" value="<?php echo $value; ?>" name="">
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#simpan_kamar").on('submit',(function(e){
		e.preventDefault();
		$.ajax({
			url:"proses/s_kamar.php",
			type:"POST",
			data: new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				if(data == "berhasil"){
					swal("God Job","Berhasil Menyimpan","success");
					$(".content").load('halaman/t_kamar.php');
					modal("","tutup");
				}
			}
		});
	}));
	$("#edit_kamar").on('submit',(function(e){
		e.preventDefault();
		$.ajax({
			url:"proses/e_kamar.php",
			type:"POST",
			data : new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				if(data == "berhasil"){
					$(".content").load('halaman/t_kamar.php');
					modal("","tutup");
				}
			}
		});
	}))
</script>