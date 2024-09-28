<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>User Form</title>
  <style>
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="card">

      
      <h5 class="card-header text-center">User Form</h5>
      <div class="card-body">
        
        <form method="POST">
          <!-- Nama -->
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
          </div>
          <!-- Email -->
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <!-- Kota/Kabupaten -->
          <div class="form-group">
            <label for="kota">Kota/Kabupate:</label>
            <select name="kota" id="kota" class="form-control">
              <option value="">-- Pilih Kota --</option>
              <option value="Jakarta">Jakarta</option>
              <option value="Semarang">Semarang</option>
              <option value="Bandung">Bandung</option>
              <option value="Surabaya">Surabaya</option>
            </select>
          </div>
          <!-- Jenis Kelamin -->
          <label>Jenis Kelamin:</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="pria">Pria
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="wanita">Wanita
            </label>
          </div>
          <br>
          <!-- Peminatan -->
          <label>Peminatan:</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="Coding">Coding
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="UX Design">UX Design
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="Data Science">Data Science
            </label>
          </div>
          <br>
          <!-- Submit-->
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
          <button type="submit" class="btn btn-danger" name="reset" value="reset">Reset</button>
        </div>
      </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>

<?php
  if(isset($_POST["submit"])){
    echo "<h3>Your Input:</h3>";
    echo 'Nama = '.$_POST['nama'].'<br />';
    echo 'Email = '.$_POST['email'].'<br />';
    echo 'Kota = '.$_POST['kota'].'<br />';
    echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br />';
    $minat = $_POST['minat'];
    if(!empty($minat)){
      echo 'Peminatan yang dipilih: ';
      foreach($minat as $minat_item){
        echo '<br />'.$minat_item;
      }
    }

  }
?>