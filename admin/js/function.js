function panggil(c){
	$(".content").load(c);
}
function box(url, method){
	if(method == "tampil"){
		$(".bg-thick").load(url);
		$(".bg-thick").fadeIn(100);
	}else{
		$(".bg-thick").fadeOut(100);
	}
}
function modal(url, method){
	if(method == "tampil"){
		$(".modal-isi").load(url);
		$(".modal-isi").fadeIn(100);
	}else{
		$(".modal-isi").fadeOut(100);
	}
}