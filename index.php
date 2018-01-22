<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/box.css">
	<link rel="stylesheet" type="text/css" href="bootstrap_new/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap_new/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="jq_ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="jq_ui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>

<div class="kepala-atas">
	<div class="logo">
		<img src="img/logo.png">
	</div>
	<div class="item_menu">
		
	</div>	
</div>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-toggle" aria-expanded="false">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		</div>
		<div class="collapse navbar-collapse" id="nav-toggle">
		<ul class="nav navbar-nav">
			<li><a href="?page=t_beranda"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href=""><span class="glyphicon glyphicon-briefcase"></span> Hotel</a></li>
			<li><a href=""><span class="glyphicon glyphicon-bed"></span> Kamar</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="?page=t_pembayaran"><span class="glyphicon glyphicon-user"></span> Customer Care</a></li>
			<li><a href="?page=t_info_pembayaran"><span class="glyphicon glyphicon-info-sign"></span> Info Customer</a></li>
		</ul>
		</div>
	</div>
</nav>

<div class="content">
	<?php
	 			if(isset($_GET['page'])){
	 				include "halaman/".$_GET['page'].".php";
	 			}else{
	 				include "halaman/t_beranda.php";
	 			}
	 		  ?>
</div>
<div class="modal-isi">
	
</div>
<div class="item-footer">
	
</div>
</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap_new/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jq_ui/jquery-ui.js"></script>
<script type="text/javascript" src="jq_ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="js/proses.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".item_menu").load('item/menu_atas.php');
		$("#tgl_checkin").datepicker();
		$(".modal-isi").css({"display":"none"});
		$("#tgl_checkout").datepicker();
		$(".item-footer").load('item/footer_index.php');
	});
</script>