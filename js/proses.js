function durasi_tgl(){
	mulai = $("#tgl_checkin").datepicker('getDate');
	akhir = $("#tgl_checkout").datepicker('getDate');
	hasil = (akhir-mulai)/1000/60/60/24;
	$("#durasi").val(hasil);
}
function cari_nama_hotel(){
	$("#search").autocomplete({
			source:"proses/p_cari_hotel.php"
		});
}
function cari_hotel(tampilA,tampilB){	
	if(tampilA == "cari_hotel"){
		search = $("#search").val();
		tgl_checkin = $("#tgl_checkin").val();
		tgl_checkout = $("#tgl_checkout").val();
		durasi = $("#durasi").val();
		$.ajax({
			url:"proses/p_cari_nama_hotel.php",
			type:"POST",
			data:{
				status:tampilA,
				nama_hotel:search,
				tgl_checkin :tgl_checkin,
				tgl_checkout : tgl_checkout,
				durasi:durasi
			},
			success:function(hasil){
				
				$(".content").load('halaman/t_cari_hotel.php');
			}
		});
	}
}
function modal_isi(url, method){
	if(method == "tampil"){
		$(".modal-isi").load(url);
		$(".modal-isi").fadeIn(100);
	}else{
		$(".modal-isi").fadeOut(100);
	}
};
function pesan_kamar(id){
	var url = "modal/m_pesan.php?id="+id;
	modal_isi(url,"tampil");
}
function pesan_keranjang(){
	id_hotel = $("#id_hotel").val();
	id_kamar = $("#id_kamar").val();
	type_kamar = $("#type_kamar").val();
	tgl_cekin = $("#tgl_cekin").val();
	tgl_cekout = $("#tgl_cekout").val();
	durasi = $("#durasi").val();
	harga_sewa = $("#harga_sewa").val();
	sub_total = $("#sub_total").val();
	status = $("#status").val();
	id_detail_pemesanan = $("#id_detail_pemesanan").val();
	swal({
		title:"Anda Yakin ?",
		text:"Anda Tidak Dapat Membatalkan Pesanan Ini !",
		type:"warning",
		showCancelButton:true,
		confirmButtonColor:"#DD6B55",
		confirmButtonText:"Tidak !",
		cancelButtonText:"Ya Saya Yakin !",
		closeOnConfrim:false,
		closeOnCancel:false
		},
	function(isConfirm){
		if(isConfirm){
			swal("Batal !","Silahkan Lakukan Pemesanan Lagi","error");
		}else{
			$.ajax({
		url:"proses/s_detail_pemesanan.php",
		type:"POST",
		data:{
			id_detail_pemesanan : id_detail_pemesanan,
			id_hotel : id_hotel,
			id_kamar:id_kamar,
			type_kamar:type_kamar,
			tgl_cekin:tgl_cekin,
			tgl_cekout:tgl_cekout,
			durasi:durasi,
			harga_sewa:harga_sewa,
			sub_total:sub_total,
			status:status
		},
		success:function(hasil){
				swal("Berhasil !","Anda Berhasil Memesan","success");
				modal_isi('','tutup');
				$(".tb_isi").load('item/tb_hotel.php');
				$(".item_menu").load('item/menu_atas.php');
		}
	});
		}
	});
	
}
function pesan_selesai(){
	id_hotel = $("#id_hotel").val();
	id_kamar = $("#id_kamar").val();
	type_kamar = $("#type_kamar").val();
	tgl_cekin = $("#tgl_cekin").val();
	tgl_cekout = $("#tgl_cekout").val();
	durasi = $("#durasi").val();
	harga_sewa = $("#harga_sewa").val();
	sub_total = $("#sub_total").val();
	status = $("#status").val();
	id_detail_pemesanan = $("#id_detail_pemesanan").val();
	swal({
		title:"Anda Yakin ?",
		text:"Anda Tidak Dapat Membatalkan Pesanan Ini !",
		type:"warning",
		showCancelButton:true,
		confirmButtonColor:"#DD6B55",
		confirmButtonText:"Tidak !",
		cancelButtonText:"Ya Saya Yakin !",
		closeOnConfrim:false,
		closeOnCancel:false
		},
	function(isConfirm){
		if(isConfirm){
			swal("Batal !","Silahkan Lakukan Pemesanan Lagi","error");
		}else{
	$.ajax({
		url:"proses/s_detail_pemesanan.php",
		type:"POST",
		data:{
			id_detail_pemesanan : id_detail_pemesanan,
			id_hotel : id_hotel,
			id_kamar:id_kamar,
			type_kamar:type_kamar,
			tgl_cekin:tgl_cekin,
			tgl_cekout:tgl_cekout,
			durasi:durasi,
			harga_sewa:harga_sewa,
			sub_total:sub_total,
			status:status
		},
		success:function(hasil){
				swal("Berhasil !","Anda Berhasil Memesan","success");
				modal_isi('','tutup');
				document.location.href="halaman/t_pemesanan.php";
		}
	});
		}
	});
}
function simpan_pemesan(){
	nama_pemesan = $("#nama_pemesan").val();
	id_pemesan = $("#id_pemesan").val();
	alamat = $("#alamat").val();
	no_hp = $("#no_hp").val();
	email = $("#email").val();
	$.ajax({
		url:"../proses/s_pemesan.php",
		type:"POST",
		data:{
			id_pemesan:id_pemesan,
			nama_pemesan:nama_pemesan,
			alamat:alamat,
			no_hp:no_hp,
			email:email
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				$(".item-pemesanan").load('../item/tb_pemesanan.php');
			}else if(hasil == "gagal"){
				$(".item-pemesanan").load('../item/tb_pemesanan.php');
			}
		}
	})
}
function simpan_pemesanan(){
		id_pemesanan = $("#id_pemesanan").val();
	total_pesanan = $("#total_pesanan").val();
	id_pemesan = $("#id_pemesan_orang").val();
	tgl_cekin = $("#tgl_cekin").val();
	tgl_cekout = $("#tgl_cekout").val();
	total = $("#total").val();
	if(id_pemesan == ""){
		swal("error","Silahkan Isi Dulu Pemesanan","error");
	}else{
		$.ajax({
		url:"../proses/s_pemesanan.php",
		type:"POST",
		data:{
			id_pemesanan : id_pemesanan,
			total_pesanan:total_pesanan,
			id_pemesan:id_pemesan,
			tgl_cekin:tgl_cekin,
			tgl_cekout:tgl_cekout,
			total:total
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("Terima Kasih","Silahkan Lakukan konfirmasi Pemesanan","success");
				document.location="../index.php";
			}
		}
	});	
};
	
};
function cetak_pemesanan(){
	setInterval("simpan_pemesanan()",3000);
	var x = $("#id_pemesanan").val();
				window.open("../halaman/t_cetak_pemesanan.php?id_pemesanan="+x,"_blank");
}
function info_id_pembayaran(){
		id_pemesanan = $("#id_pembayaran").val();
		$.ajax({
			url:"proses/info_pembayaran.php",
			type:"POST",
			dataType:"json",
			data:{
				id_pemesanan:id_pemesanan
			},
			success:function(hasil){
				$("#nama_pembayar").val(hasil.nama_pembayar);
				$("#tgl_pembayaran").val(hasil.tgl_pembayaran);
				$("#konfirmasi").val(hasil.konfirmasi);
			}
		})
	};
function cari_id_pemesanan(){
	id_pemesanan = $("#id_pemesanan").val();
	$.ajax({
		url:"proses/cari_id_pemesanan.php",
		type:"POST",
		dataType:"json",
		data:{
			id_pemesanan:id_pemesanan
		},
		success:function(hasil){
			$("#nama_pemesan").val(hasil.nama_pemesan);
			$("#total").val(hasil.total);
		}
	})
};
function cari_nama_pemesan(){
	nama_pemesan = $("#nama_pemesan").val();
	$.ajax({
		url:"../proses/cari_nama_pemesan.php",
		type:"POST",
		dataType:"json",
		data:{
			nama_pemesan : nama_pemesan
		},
		success:function(hasil){
			$("#alamat").val(hasil.alamat);
			$("#no_hp").val(hasil.no_hp);
			$("#email").val(hasil.email);
		}
	})
}