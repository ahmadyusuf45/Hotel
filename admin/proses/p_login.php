<?php
	session_start();
	include "../konek/class.php";
	$tmp = $proses->tampil("*","master"," WHERE username = '$_POST[user]' ");
	$jml = $tmp->rowCount();
	$data = $tmp->fetch();
	if($jml == 0){
		echo "user";
	}else{
		if(md5($_POST['pass']) <> $data[2]){
			echo "pass";
		}else{
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = $data[3];
			echo $data[3];
		}
	}
?>