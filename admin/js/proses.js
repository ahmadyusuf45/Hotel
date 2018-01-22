//*validasi*//
function validasi(c){
	var dal = $("#"+c).val();
	if(dal == ""){
		$("#"+c).css({"backgroud-color":"#fff","color":"#000"});
	}else{
		$("#"+c).css({"backgroud-color":"#fff","color":"#000"});
	}
};
//*validasi*//
function edit_hotel(id){
	var url = "thickbox/hotel.php?id="+id;
	modal(url,"tampil");
}
function hapus_hotel(id){
	$.ajax({
		url:"proses/h_hotel.php",
		type:"GET",
		data:{
			id_hotel:id
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("success","Berhasil Hapus Data","success");
				$(".content").load('halaman/t_hotel.php');
			}
		}
	})	
};
function edit_kamar(id){
	var url = "thickbox/kamar.php?id="+id;
	modal(url,"tampil");
}
function hapus_kamar(id){
	$.ajax({
		url:"proses/h_kamar.php",
		type:"GET",
		data:{
			id_kamar:id
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("success","Berhasil Hapus Data","success");
				$(".content").load('halaman/t_kamar.php');
			}
		}
	})
}
function edit_pembayaran(id){
	var url = "thickbox/pembayaran.php?id="+id;
	modal(url,"tampil");
}
function edit_konfirmasi(id){
	konfirmasi = $("#status_pembayaran").val();
	$.ajax({
		url:"proses/e_pembayaran.php",
		type:"POST",
		data:{
			id_pembayaran:id,
			konfirmasi:konfirmasi
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("success","Berhasil Konfirmasi Pembayaran","success");
				$(".content").load('halaman/t_pembayaran.php');
				modal('','tutup');
			}
		}
	})
}
function detail_pemesanan(id){
	var url = "thickbox/detail_pemesanan.php?id="+id;
	modal(url,"tampil");
}
function hapus_pemesanan(id){
	$.ajax({
		url:"proses/h_pemesanan.php",
		type:"GET",
		data:{
			id_pemesanan:id
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("success","Berhasil Hapus Data","success");
				$(".content").load('halaman/t_pemesanan.php');
			}
		}
	})
}
function rubah_status_kamar(id){
	status = $("#status").val();
	$.ajax({
		url:"proses/e_status_kamar.php",
		type:"POST",
		data:{
			id_kamar:id,
			status:status
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("success","Berhasil Merubah Status","success");
				$(".content").load('halaman/t_kamar.php');
			}
		}
	})
}
function hapus_pembayaran(id){
	$.ajax({
		url:"proses/h_pembayaran.php",
		type:"GET",
		data:{
			id_pembayaran:id
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("success","Menghapus Pembayaran","success");
				$(".content").load('halaman/t_pembayaran.php');
			}
		}
	})
}
function hapus_pemesan(id){
	$.ajax({
		url:"proses/h_pemesan.php",
		type:"GET",
		data:{
			id_pemesan:id
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				swal("success","Menghapus Pemesan","success");
				$(".content").load('halaman/t_pemesan.php');
			}
		}
	})
}
function backup_database(){
	swal("success","Berhasil Backup Database","success");
	setInterval("p_backup_database()",2000);
}
function p_backup_database(){
	document.location.href="proses/p_backup_database.php";
}
function restore_database(){
	swal("success","Berhasil Restore Database","success");
	setInterval("p_restore_database()",2000);
}
function p_restore_database(){
	document.location.href="proses/p_restore_database.php";	
}
function cari_lap_pembayaran(){
	tgl_mulai = $("#tgl_mulai").val();
	tgl_akhir = $("#tgl_akhir").val();
	$.ajax({
		url:"item/tb_pembayaran.php",
		type:"GET",
		data:{
			tgl_mulai:tgl_mulai,
			tgl_akhir:tgl_akhir
		},
		success:function(hasil){
			$(".table-responsive").html(hasil);
		}
	})
}
function cetak_laporan_pembayaran(){
	tgl_mulai = $("#tgl_mulai").val();
	tgl_akhir = $("#tgl_akhir").val();
	window.open("item/tb_pembayaran.php?tgl_mulai="+tgl_mulai+"&tgl_akhir="+tgl_akhir,'_blank');
}
function simpan_type_fasilitas(){
	id_fasilitas = $("#id_type_fasilitas").val();
	nama_fasilitas = $("#nama_fasilitas").val();
	$.ajax({
		url:"proses/s_fasilitas.php",
		type:"POST",
		data:{
			id_fasilitas:id_fasilitas,
			nama_fasilitas:nama_fasilitas
		},
		success:function(hasil){
			if(hasil == "berhasil"){
			modal('','tutup');
			$(".content").load('halaman/t_type_fasilitas.php');
			swal("success","Berhasil Menambah Fasilitas","success");
			}
		}
	})
}
function edit_fasilitas(id){
	url = "thickbox/type_fasilitas.php?id="+id;
	modal(url,'tampil');
}
function edit_type_fasilitas(id){
	nama_fasilitas = $("#nama_fasilitas").val();
	$.ajax({
		url:"proses/e_fasilitas.php",
		type:"POST",
		data:{
			id_fasilitas:id,
			nama_fasilitas:nama_fasilitas
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				modal('','tutup');
				$(".content").load('halaman/t_type_fasilitas.php');
				swal("success","Berhasil Menrubah Fasilitas","success");
			}
		}
	})
}
function hapus_fasilitas(id){
	$.ajax({
		url:"proses/h_fasilitas.php",
		type:"GET",
		data:{
			id_fasilitas:id
		},
		success:function(hasil){
			if(hasil == "berhasil"){
				$(".content").load('halaman/t_type_fasilitas.php');
				swal("success","Berhasil Menghapus Fasilitas","success");
			}
		}
	})
}
function simpan_type_kamar(){
	id_type_kamar = $("#id_type_kamar").val();
	nama_kamar = $("#nama_kamar").val();
	$.ajax({
		url:"proses/s_type_kamar.php",
		type:"POST",
		data:{
			id_type_kamar:id_type_kamar,
			nama_kamar:nama_kamar
		},
		success:function(hasil){
				modal('','tutup');
				$(".content").load('halaman/t_type_kamar.php');
				swal("success","Berhasil Menyimpan Type Kamar","success");
		}
	})
}
function edit_Type_kamar(id){
	url = "thickbox/type_kamar.php?id="+id;
	modal(url,'tampil');
}
function edit_type_kamar(id){
	nama_kamar = $("#nama_kamar").val();
	$.ajax({
		url:"proses/e_type_kamar.php",
		type:"POST",
		data:{
			id_type_kamar:id,
			nama_kamar:nama_kamar
		},
		success:function(hasil){
			modal('','tutup');
			$(".content").load('halaman/t_type_kamar.php');
			swal("success","Berhasil Merubah Type Kamar","success");
		}
	})
}
function hapus_type_kamar(id){
	$.ajax({
		url:"proses/h_type_kamar.php",
		type:"GET",
		data:{
			id_type_kamar:id
		},
		success:function(hasil){
			swal("success","Berhasil Menghapus Type Kamar","success");
			$(".content").load('halaman/t_type_kamar.php');

		}
	})
}