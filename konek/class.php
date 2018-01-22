<?php
class proses{
	function __construct(){
		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "db_hotel";
		$this->con=new PDO("mysql:host=$server;dbname=$db",$user,$pass);
	}
	function simpan($tabel,$val){
		$qw = "INSERT INTO $tabel VALUES ($val)";
		$ex = $this->con->query($qw);
	}
	function edit($tabel,$val,$porperty){
		$qw = "UPDATE $tabel SET $val WHERE $porperty";
		$ex = $this->con->query($qw);
	}
	function hapus($tabel,$porperty){
		$qw = "DELETE FROM $tabel WHERE $porperty";
		$ex = $this->con->query($qw);
	}
	function tampil($select,$tabel,$porperty){
		$qw = "SELECT $select FROM $tabel $porperty";
		$tam = $this->con->query($qw);
		return $tam;
	}
}
class input{
	function input($type=null , $nama=null, $val=null, $porperty=null){
		$input="<input type='$type' name='$nama' value='$val' $porperty>";
		return $input;
	}
	function textarea($nama=null, $val=null, $porperty=null){
		$input = "<textarea name='$nama' $porperty> $val</textarea>";
		return $input;
	}
	function select ($nama=null , $jml=null, $val=null, $mesum=null, $porperty=null, $check=null){
		$op="";
		for($x=1; $x<=$jml; $x++){
			$xxx="";
			if($mesum[$x] == $check){
				$xxx = "selected";
			}else{
				$xxx = "";
			}
			$kl = "<option $xxx value='$mesum[$x]'>$val[$x]</option>";
			$op=$op.$kl;
		}
		$input="<select name='$nama' $porperty>$op</select>";
		return $input;
	}
	function hentai ($nama=null, $jml=null, $val=null, $porperty=null, $check=null){
		$op="";
		for($x=1; $x <=$jml ; $x++){
			$xxx="";
			if($val[$x] == $check){
				$xxx="selected";
			}else{
				$xxx="";
			}
			$kl = "<option $xxx>$val[$x]</option>";
			$op=$op.$kl;
		}
		$input="<select name='$nama' $porperty>$op</select>";
		return $input;
	}
	function form ($sts=null, $action=null){
		if($sts == "open"){
			$form = "<form action='$action' method='POST' enctype = 'multipart/form-data'>";
			return $form;
		}elseif ($sts == "close"){
			$form = "</form>";
			return $form;
		}
	}
	function base_url($folder){
		$url = "http://localhost/hotel".$folder;
		echo $url;
	}
}
	$proses = new proses;
	$form = new input;
?>