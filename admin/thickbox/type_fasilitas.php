<?php
	include "../konek/class.php";
	include "../konek/no_type_fasilitas.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$judul = "Edit";
		$value = "Edit";
		$onclick = "edit_type_fasilitas('$id')";
	}else{
		$id = "";
		$judul = "Input";
		$value = "Input";
		$onclick = "simpan_type_fasilitas()";
	}
	$qw = $proses->tampil("*","type_fasilitas","WHERE id_fasilitas =  '$id'");
	$data = $qw->fetch();
	if(empty($data[0])){
		$id_fasilitas = "$newid";
	}else{
		$id_fasilitas = "$data[0]";
	}
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup');"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo $judul; ?> Type Fasilitas</h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<p>Id Type Fasilitas</p>
				<input type="text" readonly id="id_type_fasilitas" class="form-control" name="" value="<?php echo $id_fasilitas; ?>">
			</div>
			<div class="form-group">
				<p>Deskripsi Fasilitas</p>
				<textarea id="nama_fasilitas" class="form-control"><?php echo $data[1]; ?> </textarea>
			</div>
			<button class="btn btn-primary" onclick="<?php echo $onclick; ?>"><?php echo $value; ?></button>
		</div>
	</div>
</div>