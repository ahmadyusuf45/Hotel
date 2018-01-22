<?php
	include "../konek/class.php";
	session_start();
	$cekin = $_SESSION['checkin'];
	$cekout = $_SESSION['checkout'];
	$durasi = $_SESSION['durasi'];
	$nama_hotel =  $_SESSION['serch'];
	$qw = $proses->tampil("hotel.nama_hotel,hotel.bintang,hotel.alamat_hotel,hotel.deskripsi_hotel,hotel.foto_hotel,kamar.foto_kamar,type_fasilitas.nama_fasilitas,hotel.map_hotel","hotel,kamar,type_fasilitas","WHERE type_fasilitas.id_fasilitas = hotel.id_fasilitas AND hotel.id_hotel=kamar.id_hotel AND nama_hotel = '$nama_hotel'");
	$item = $qw->fetch();
?>
<div class="container-fluid">
<div class="col-md-6">
	<h3><?php echo $item[0] ?> <span><img src="admin/hotel/<?php echo $item[1]; ?>" width="70px" hight="40px"></span></h3>
	<p><?php echo $item[2]; ?></p>
	<p>
		<?php echo $item[3]; ?>
	</p>
</div>
<div class="col-md-6">
	  <div id="WJSlider" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#WJSlider" data-slide-to="0" class="active"></li>
      <li data-target="#WJSlider" data-slide-to="1"></li>
      <li data-target="#WJSlider" data-slide-to="2"></li>
    </ol>

    
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="admin/hotel/<?php echo $item[4]; ?>" alt="slide1" width="auto" height="345px">
        <div class="carousel-caption">
          <h3><?php echo $item[0]; ?></h3>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="admin/kamar/<?php echo $item[5]; ?>" alt="slide2" width="auto" height="345px">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>

    </div>

    
    <a class="left carousel-control" href="#WJSlider" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Kembali</span>
    </a>
    <a class="right carousel-control" href="#WJSlider" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Lanjut</span>
    </a>
  </div>
</div>
</div>
<br>
<div class="container">
	<div class="col-md-6">
		<div class="btn-new" onclick="more(674)">
			<p>FASILITAS</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="btn-new" onclick="more(674)">
			<p>DESKRIPSI</p>
		</div>
	</div>
</div>
<br>
<div class="form-serch ">
	
			<div class="content-serch">
				<input type="text" id="search" onkeyup="cari_nama_hotel()" name="term" class="search-input" placeholder="cari hotel" value="<?php echo $nama_hotel?>">
		
	
	
			
				<input type="text" name="" id="tgl_checkin"  placeholder="DD/MM/YY" value="<?php echo $cekin; ?>">
			
	
	
			
				<input type="text" name="" placeholder="DD/MM/YY" id="tgl_checkout" value="<?php echo $cekout; ?>"  >
				<input type="text" id="durasi" hidden name=""  value="<?php echo $durasi; ?>">
				<button class="btn btn-warning " onclick="cari_hotel('cari_hotel','')">
				<span class="glyphicon glyphicon-search"></span> Cari
			</button>
			</div>
</div>
<div class="tb_isi">
	
</div>
<br>
<div class="app-item">
</div>

<div class="app-skin">
<div class="app-btn">
	<p>MAP LOKASI <span style="float: right;" class="glyphicon glyphicon-resize-full"></span></p>
</div>
<div class="app-content">
	<?php echo $item[7]; ?>
</div>
</div>
<div class="app-skin">
<div class="app-btn" id="app-btn-fasilitas">
	<p>FASILITAS <span style="float: right;" class="glyphicon glyphicon-resize-full"></span></p>
</div>
<div class="app-content" style="display: none;" id="app-fasilitas">
	<pre>
	<?php echo $item[6]; ?>
	</pre>
</div>
</div>
<div class="app-skin">
<div class="app-btn" id="app-btn-derkripsi">
	<p>DESKRIPSI <span style="float: right;" class="glyphicon glyphicon-resize-full"></span></p>
</div>
<div class="app-content" style="display: none;" id="app-derkripsi">
	<p><?php echo $item[3]; ?></p>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tb_isi").load('item/tb_hotel.php');
		$("#app-btn-fasilitas").click(function(){
			$("#app-fasilitas").slideToggle(800);
		});
		$("#app-btn-derkripsi").click(function(){
			$("#app-derkripsi").slideToggle(800);
		})
		$(window).scroll(function(){
				if($(this).scrollTop() > 600){
					$(".app-item").css({"transform":"scale(1,1)"});
				}else{
					$(".app-item").css({"transform":"scale(0,0)"});
				}
			});
		});
		function more(v) {
			$('html,body').animate({scrollTop:v},1500);
		}
</script>
<style type="text/css">
	.btn-new{
		color: #fff;
		text-align: center;
		cursor: pointer;
		width: 100%;
		height: 45px;
		background-color: #0066ff;
		padding: 8px;
	}
	.btn-new p {
		font-size: 140%;
	}
	.app-item{
		width: 100%;
		height: auto;
		background-color: #000;
	}
	.app-btn{
		width: 100%;
		height: 45px;
		padding: 8px;
		cursor: pointer;
		background-color: #CCCCCC;
	}
	.app-btn p{
		font-size: 140%;
		font-family: segoe UI;
	}
	.app-content{
		width: 100%;
		height: auto;
		background-color: #fff;
		padding: 8px;
	}
	.app-skin{
		margin-bottom: 10px;
		border: 1px solid #ccc;
	}
	#app-fasilitas pre{
		font-weight: normal;
		font-family: segoe UI;
		font-size: 100%;
	}
</style>