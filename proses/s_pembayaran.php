<?php
	include "../konek/class.php";
	if(isset($_POST['simpan'])){
	$qw = $proses->tampil("*","pembayaran","WHERE id_pemesanan = '$_POST[id_pemesanan]'");
	$row = $qw->rowCount();
	if($row == 1){
		echo "<script>alert('Anda Sudah Melakukan Konfirmasi')</script>";
		echo "<script>document.location='../index.php'</script>";		
	}else{
		$nama_foto_konfir = $_FILES['foto_transfer']['name'];
	
	$alamat_foto_konfir = $_FILES['foto_transfer']['tmp_name'];
	move_uploaded_file($alamat_foto_konfir, '../bukti_img/'.$nama_foto_konfir);
	$simpan = $proses->simpan("pembayaran","
		'',
		'$_POST[id_pemesanan]',
		'$_POST[nama_pembayar]',
		'',
		'$nama_foto_konfir',
		'$_POST[no_rekening]',
		'$_POST[tgl_pembayaran]'
		");
	echo "<script>alert('Tunggu Konfirmasi Pembayaran 10 Menit')</script>";
	echo "<script>document.location='../index.php'</script>";		
	}	
}
?>
