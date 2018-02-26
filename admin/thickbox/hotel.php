<?php
  include "../konek/class.php";
  include "../konek/no_hotel.php";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $judul = "Edit";
    $form = "edit_hotel";
    $value = "Edit";
    $map_hotel = "display : none";
  }else{
    $id = "";
    $judul ="Input";
    $form = "simpan_hotel";
    $value = "Simpan";
    $map_hotel = "display : block";
  }
  $qw = $proses->tampil("*","hotel"," WHERE id_hotel = '$id' ");
  $data = $qw->fetch();
  if(empty($data[0])){
    $id_hotel = "$newid";
  }else{
    $id_hotel = "$data[0]";
  }
?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modal('','tutup')"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $judul ?> Hotel</h4>
      </div>
      <div class="modal-body">
      <form role="form" id="<?php echo $form; ?>">
        <div class="form-group" hidden>
          <p>Id Hotel</p>
          <input type="text" class="form-control" value="<?php echo $id_hotel ?>" name="id_hotel">
        </div>
        <div class="form-group">
          <p>Nama Hotel</p>
          <input type="text" class="form-control" value="<?php echo $data[1]; ?>" name="nama_hotel">
        </div>
        <div class="form-group">
          <p>Alamat Hotel</p>
          <input type="text" class="form-control" value="<?php echo $data[2]; ?>" name="alamat_hotel">
        </div>
        <div class="form-inline">
        <div class="form-group">
          <p>Ranting Hotel</p>
          <input type="file"  name="bintang">
        </div>
        <div class="form-group">
          <p>Foto Hotel</p>
          <input type="file"  name="foto_hotel">
        </div>
        </div>
        <div class="form-group">
          <p>Fasilitas Hotel</p>
          <select name="id_fasilitas" class="form-control">
          <option value="">pilih</option>
    <?php
    $tmp = $proses->tampil("id_fasilitas,nama_fasilitas","type_fasilitas","ORDER BY id_fasilitas ASC");
    foreach ($tmp as $datam) {
      if($datam[0] == $data[5]){
        $selectedes = "selected";
      }else{
        $selectedes = "";
      }
    ?>
          <option <?php echo $selectedes; ?> value="<?php echo $datam[0]; ?>">
          <?php echo $datam[1] ;?>
          </option>
          <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <p>Deskripsi Hotel</p>
          <textarea name="deskripsi_hotel" class="form-control"><?php echo $data[6]; ?></textarea>
        </div>
        <div class="form-group" style="<?php echo $map_hotel; ?>">
          <p>Map Hotel</p>
          <textarea name="map_hotel" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="<?php echo $value; ?>" name="">
      </form>
      </div>
    </div>
  </div>
<script type="text/javascript">
  $("#simpan_hotel").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
          url: "proses/s_hotel.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {
          if(data == "berhasil"){
            $(".content").load('halaman/t_hotel.php');
            swal("God Job","Data Berhasil di Simpan","success");
            modal("","tutup");
          }
        }           
     });
  }));
  $("#edit_hotel").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
      url:"proses/e_hotel.php",
      type:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        if(data == "berhasil"){
            $(".content").load('halaman/t_hotel.php');
            swal("God Job","Data Berhasil di Edit","success");
            modal("","tutup");
          }
      }
    })
  }));

</script>