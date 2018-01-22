<div id="slide" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>		
			</ol>
 
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="img/slide2.jpg">
					<div class="carousel-caption">
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="img/slide3.jpg" >
					<div class="carousel-caption">
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="img/slide4.jpg">
					<div class="carousel-caption">
						<p></p>
					</div>
				</div>				
			</div>
 
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

<div class="form-serch">
	
			<div class="content-serch">
				<input type="text" id="search" onkeyup="cari_nama_hotel()" name="term" class="search-input" placeholder="Cari Hotel">
		
	
	
			
				<input type="text" name="" id="tgl_checkin"  placeholder="Tanggal Cekin">
			
	
	
			
				<input type="text" name="" placeholder="Tanggal Cekout" id="tgl_checkout"  onchange="durasi_tgl()">
				<input type="text" id="durasi" name="" hidden>
			<button class="btn btn-warning " onclick="cari_hotel('cari_hotel','')">
				<span class="glyphicon glyphicon-search"></span> Cari
			</button>
			</div>
</div>
<img src="img/item_beranda.png" class="img-responsive">