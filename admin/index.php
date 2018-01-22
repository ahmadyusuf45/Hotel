<?php
	session_start();
	if(isset($_SESSION['username'])){
		$bodylog = "top : -100%";
		$usr = $_SESSION['username'];
		$logokep = "display : show";
		if($_SESSION['level'] == "admin"){
			$logokep = "display : show";
		}else{
			$logokep = "display : show";
		}
	}else{
		$logokep;
		$bodylog;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/box.css">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="DataTables/media/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap_new/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap_new/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="jq_ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="jq_ui/jquery-ui.min.css">
</head>
<body>

<div class="kepala">
	<div class="item">
	<span class="glyphicon glyphicon-align-justify"></span>
	</div>
	<section>
	<a onclick="logout()" id="user"><span class="glyphicon glyphicon-off"></span> <?php echo $usr; ?></a>
	</section>
</div>
<div class="menu_kiri">
	<div class="profil">
		<img src="img/logo.png">
	</div>
	<section>
	<div class="isi_menu_kiri">
	<?php
	if($_SESSION['level'] == "manajer"){
		include "halaman/manajer.php";
	}else{
		include "halaman/admin.php";
	}
	?>
	</div>
	</section>
</div>
<div class="content">
</div>
<!--- thickbox !-->
<div class="modal-isi" hidden>
	
</div>
<!--- thickbox !-->
<!--- login !-->
<center>
<div class="badan-login" style="<?php echo $bodylog ?>">
	<div id="gambar">
		<img src="img/logo.png">
	</div>
	<div id="login">
		<input type="text" name="" placeholder="username" id="username">
		<input type="password" name="" placeholder="password" id="password">
		<input type="submit" onclick="login()" name="" value="login">
	</div>
</div>
</center>
<!--- login !-->
</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/proses.js"></script>
<script type="text/javascript" src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="bootstrap_new/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="jq_ui/jquery-ui.js"></script>
<script type="text/javascript" src="jq_ui/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$(".content").load('halaman/t_beranda.php');
	$("#pemesanan").click(function(){
		$("#t_pemesanan").slideToggle(500);
		$("#t_pemesan").slideToggle(500);
	});
	$("#laporan").click(function(){
		$("#lap_pemesanan").slideToggle(500);
		$("#lap_pembayaran").slideToggle(500);
	});
	$("#hotel").click(function(){
		$("#t_hotel").slideToggle(500);
		$("#t_fasilitas").slideToggle(500);
	});
	$("#kamar").click(function(){
		$("#t_kamar").slideToggle(500);
		$("#t_type_kamar").slideToggle(500);
	})
	$(".item").click(function(){
		$(".menu_kiri").slideToggle(500);
		$(".content").css({"width":"83.7%"});
		$(".content").css({"margin-left":"16%"});
		$(".kepala").css({"width":"84.5%"});
	});	
	});
	function login(){
		$.ajax({
			url:"proses/p_login.php",
			type:"POST",
			data:{
				user : $("#username").val(),
				pass : $("#password").val()
			},
			success:function(data){
				if(data == "user"){
					swal("error","data tidak ada","error");
				}else if(data == "pass"){
					swal("error","password salah","error");
				}else{
					if(data == "admin"){
						swal("success","masuk admin","success");
						$(".isi_menu_kiri").load('halaman/admin.php');
					}else{
						swal("success","masuk manajer","success");
						$(".isi_menu_kiri").load('halaman/manajer.php');
					}
					$("#login").html(data);
					
					$("#user").html(data);
					$(".badan-login").css({"top":"-100%"});
					$(".badan-login").css({"transition-property":"all"});
					$(".badan-login").css({"transition-duration":"0.5s"});
					setInterval("refresh_halaman()",500);
				}
			}
		})
	}
	function logout(){
		$.ajax({
			url:"proses/p_logout.php",
			type:"POST",
			data:{

			},
			success:function(data){
				$(".badan-login").css({"top":"0px"});
				$(".badan-login").css({"transition-property":"all"});
				$(".badan-login").css({"transition-duration":"0.5s"});
				$(".content").load('halaman/t_beranda.php');
			}
		})
	}
	function refresh_halaman(){
	window.location.reload();
}
</script>
<style type="text/css">
	.modal-isi{
		position: fixed;
		z-index: 6000;
		background-color: rgba(0,0,0,0.7);
		height: 100%;
		width: 100%;
	}
</style>