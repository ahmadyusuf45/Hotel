<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $koneksi )
{
  die('Gagal Koneksi: ' . mysql_error());
}
$table_name = "hotel, kamar, pembayaran, detail_pemesanan, master, pemesanan,type_kamar,type_fasilitas,pemesan";
$backup_file  = "/xampp/htdocs/hotel/admin/konek/db_hotel.sql";
$sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";
 
mysql_select_db('db_hotel');
$restore = mysql_query( $sql, $koneksi );
if(! $restore  )
{
  die('Gagal load data : ' . mysql_error());
}
echo "<script>document.location='../index.php'</script>";
mysql_close($koneksi);
?>