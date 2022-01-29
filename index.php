<?php
include 'koneksi.php';
$lakukan = mysqli_query($sambung, "SELECT * FROM karyawan ORDER BY id ASC");

?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
    <title></title>
  </head>
  <body>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
 <button type="button"onclick="bukatab(event, 'lihatdata')" class="btn btn-primary">LIHAT DATA</button>
    <button type="button"onclick="bukatab(event, 'tambahdata')" class="btn btn-primary">TAMBAH DATA</button>

      </div>
      <div class="modal-body">


<div id="lihatdata" class="tab"style="display:block;" >
<table class="table table-primary table-striped">
  <thead >
    <tr>
        <th class="bg-primary text-light">No</th> <th class="bg-primary text-light">NAMA LENGKAP</th> <th class="bg-primary text-light">JABATAN</th> <th class="bg-primary text-light">GAJI</th> <th class="bg-primary text-light">UBAH DATA</th>
    </tr>
  </thead>
  <tbody>
      <?php  
      $no =1;
    while($lihat = mysqli_fetch_array($lakukan)) {         
        echo "<tr>";
         echo "<td>$no</td>";
         
        echo "<td>".$lihat['nama']."</td>";
        echo "<td>".$lihat['jabatan']."</td>";
        echo "<td> Rp ".number_format($lihat['gaji'])."</td>";    
        echo "<td><div class='btn-group' role='group' aria-label='Basic example'>
<a type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal$lihat[id]'>Edit</a>
<a type='button' class='btn btn-danger' href='aksi.php?del=$lihat[id]'>Hapus</a></td></tr></div>"; ?>
<div class="modal fade" id="exampleModal<?php echo $lihat["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT DATA <?php echo $lihat["nama"];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="aksi.php">
  <div class="row g-3 align-items-center">
  <div class="col-md-6">
        <input type="hidden" name="id" value="<?php echo $lihat["id"];?>">
    <label for="inputCity" class="form-label" > NAMA</label>
    <input type="text" name="nama" class="form-control" id="inputCity" value="<?php echo$lihat["nama"];?>">
    <label for="inputState" class="form-label">JABATAN</label>
    <select value="<?php echo $lihat["nama"];?>" name="jabatan" id="inputState" class="form-select">
      <option selected>Pilih Jabatan</option>
      <option>Pengawas</option>
       <option>Staff</option>
        <option>Cleaning</option>
    </select>
  
    <label for="inputZip" class="form-label">Hari Kehadiran</label>
    <input type="number" name="hari" class="form-control" id="inputZip">
  </div>
</div>
<br>
  <button type="submit" name="edit"  class="btn btn-primary">UBAH</button>
</form>
      </div>
     
    </div>
  </div>
</div>
<?php        
   $no++; }
    ?>
  </tbody>
</table>
  

</div>

<div id="tambahdata" style=" display: none;" class="tab">
<center><h5 class="modal-title" >TAMBAH DATA</h5>
</center>
 <form method="post" action="aksi.php">
  <div class="row g-3 align-items-center">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">NAMA</label>
    <input type="text" name="nama" class="form-control" id="inputCity">
    <label for="inputState" class="form-label">JABATAN</label>
    <select name="jabatan" id="inputState" class="form-select">
      <option selected>Pilih Jabatan</option>
      <option>Pengawas</option>
       <option>Staff</option>
        <option>Cleaning</option>
    </select>
  
    <label for="inputZip" class="form-label">Hari Kehadiran</label>
    <input type="number" name="hari" class="form-control" id="inputZip">
  </div>
</div>
<br>
  <button type="submit" name="tambah"  class="btn btn-primary">SUBMIT</button>
</form>


</div>


<script>
function bukatab(evt, namatab) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(namatab).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>