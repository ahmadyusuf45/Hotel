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
$backup_file  = "/xampp/htdocs/hotel/admin/db_hotel.sql";
$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
 
mysql_select_db('db_hotel');
$backup = mysql_query( $sql, $koneksi );
if(! $backup )
{
  die('Gagal Backup: ' . mysql_error());
}
echo "<script>document.location='../index.php'</script>";
mysql_close($koneksi );
?>