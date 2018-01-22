	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/box.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap_new/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap_new/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../jq_ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../jq_ui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap_new/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../jq_ui/jquery-ui.js"></script>
<script type="text/javascript" src="../jq_ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/proses.js"></script>
<script type="text/javascript" src="../dist/sweetalert.min.js"></script>
<?php
	include "../konek/no_pemesan.php";
?>
<div class="container">
<div class="col-md-12">
	<div class="note">
		<p>Hotel ini akan kami simpan selema 10 menit.</p>
	</div>
</div>
</div>
<br>
<div class="container" id="back_color">
	<div class="col-md-6">
		<div class="judul">
			<h4>Pemesan</h4>
		</div>
		<br>
		<div class="item">
			<div class="form-group">
				<p>Nama Lengkap</p>
				<input type="text" id="nama_pemesan" class="form-control" name="" onkeyup="cari_nama_pemesan()">
				<input type="text" hidden name=""  id="id_pemesan" value="<?php echo $neid; ?>">
			</div>
			<div class="form-group">
				<p>Alamat</p>
				<input type="text" id="alamat" class="form-control" name="">
			</div>
			<div class="form-group">
				<p>Nomor Hp</p>
				<input type="text" id="no_hp" maxlength="12" class="form-control" name="">
			</div>
			<div class="form-group">
				<p>Email</p>
				<input type="email" id="email" class="form-control" name="">
				
			</div>
			<div class="form-group">
				<button class="btn btn-primary" id="btn-kanan" onclick="simpan_pemesan()">
				LANJUT
				<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="glyphicon glyphicon-chevron-right"></span>
			</button>
			</div>
		</div>
	</div>

	<div class="col-md-6" id="back_color">
		<div class="judul">
			<h4>Detail Pemesanan</h4>
		</div>
		<br>
		<div class="item-pemesanan">
			
		</div>
	</div>
</div>
<div class="container" id="note-footer">
	<div class="note-footer">
		<p>all righrts reserved &reg ambyah hotel</p>
	</div>
</div>
<style type="text/css">
	.judul{
		width: 100%;
		height: 38px;
		padding: 1px;
		background-color: #FF9900;
	}
	.judul h4{
		text-align: center;
		color: #fff;
		text-transform: capitalize;
	}
	.note{
		width: 100%;
		height: 5%;
		background-color: rgba(241,196,15,1.0);
		text-align: center;
		padding: 3px;
	}
	.note p{
		color: #fff;
		text-transform: capitalize;
		font-size: 120%;
	}
	.note-footer{
		width: 100%;
		height: 5%;
		background-color: #f1c40f;
		text-align: center;
		padding: 3px;
	}
	.note-footer{
		color: #fff;
		text-transform: capitalize;
		font-size: 120%;
	}
	#note-footer{
		margin-top: 13.3%;
	}
</style>
<script type="text/javascript">
	$(".item-pemesanan").load('../item/tb_pemesanan.php');
</script>