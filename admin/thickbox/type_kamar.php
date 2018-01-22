<?php
	include "../konek/class.php";
	include "../konek/no_type_kamar.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$judul = "Edit";
		$value = "Edit";
		$onclick="edit_type_kamar('$id')";
	}else{
		$id = "";
		$judul = "Input";
		$value = "input";
		$onclick = "simpan_type_kamar()";
	}
	$qw = $proses->tampil("*","type_kamar","WHERE id_type_kamar = '$id'");
	$data = $qw->fetch();
	if(empty($data[0])){
		$id_type_kamar = "$newid";
	}else{
		$id_type_kamar = "$data[0]";
	}
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup');">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title"><?php echo $judul; ?> Type Kamar</h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<p>Id Type Kamar</p>
				<input type="text" name="" readonly id="id_type_kamar" value="<?php echo $id_type_kamar; ?>" class="form-control">
			</div>
			<div class="form-group">
				<p>Nama Type Kamar</p>
				<input type="text" name="" class="form-control" id="nama_kamar" value="<?php echo $data[1]; ?>">
			</div>
			<button class="btn btn-primary" onclick="<?php echo $onclick; ?>"><?php echo $value; ?></button>
		</div>
	</div>
</div>