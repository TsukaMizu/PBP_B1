<?php
  if(isset($_POST["submit"])){
      $nama = test_input($_POST["nama"]);
      // Validasi Nama
      if(empty($nama)){
          $error_nama = "Nama harus diisi";
      } elseif(!preg_match("/^[a-zA-Z ]*$/", $nama)){
          $error_nama = "Nama hanya boleh terdiri dari huruf dan spasi";
      }
      $email = test_input($_POST["email"]);
      // Validasi Email
      if($email == ''){
          $error_email = "Email harus diisi";
      } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $error_email = "Format email tidak benar";
      }
      $alamat = test_input($_POST["alamat"]);
      // Validasi Alamat
      if($alamat ==''){
          $error_alamat = "Alamat harus diisi";
      }
      $jenis_kelamin = isset($_POST["jenis_kelamin"]) ? test_input($_POST["jenis_kelamin"]) : "";
      // Validasi Jenis Kelamin
      if($jenis_kelamin == ''){
          $error_jenis_kelamin = "Jenis kelamin harus diisi";
      }
      $kota = $_POST['kota'];
      // Validasi Kota
      if($kota == ''){
          $error_kota = "Kota/Kabupaten harus diisi";
      }
      // Validasi Peminatan
      if(!isset($_POST['minat']) || empty($_POST['minat'])){
        $error_minat = "Peminatan harus diisi";
      }
  }

  function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
?>

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
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;}?>">
            <div class="error text-danger">
              <?php if(isset($error_nama)) {echo $error_nama;}?>
            </div>
          </div>
          <!-- Email -->
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)) {echo $email;}?>">
            <div class="error text-danger">
              <?php if(isset($error_email)) {echo $error_email;} ?>
            </div>
          </div>
          <!-- Alamat -->
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" class="form-control"><?php if(isset($alamat)) {echo $alamat;}?></textarea>
            <div class="error text-danger">
              <?php if(isset($error_alamat)) {echo $error_alamat;} ?>
            </div>
          </div>
          <!-- Kota/Kabupaten -->
          <div class="form-group">
            <label for="kota">Kota/Kabupate:</label>
            <select name="kota" id="kota" class="form-control">
              <option value="">-- Pilih Kota --</option>
              <option value="Jakarta" <?php if(isset($kota) && $kota == "Jakarta") {echo 'selected="true"';}?>>Jakarta</option>
              <option value="Semarang"<?php if(isset($kota) && $kota == "Semarang") {echo 'selected="true"';}?>>Semarang</option>
              <option value="Bandung"<?php if(isset($kota) && $kota == "Bandung") {echo 'selected="true"';}?>>Bandung</option>
              <option value="Surabaya"<?php if(isset($kota) && $kota == "Surabaya") {echo 'selected="true"';}?>>Surabaya</option>
            </select>
            <div class="error text-danger">
              <?php if(isset($error_kota)) {echo $error_kota;} ?>
            </div>
          </div>
          <!-- Jenis Kelamin -->
          <label>Jenis Kelamin:</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin)&& $jenis_kelamin=="pria") echo "checked"?>>Pria
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="wanita"<?php if(isset($jenis_kelamin)&& $jenis_kelamin=="wanita") echo "checked"?>>Wanita
            </label>
          </div>
          <div class="error text-danger">
            <?php if(isset($error_jenis_kelamin)) {echo $error_jenis_kelamin;} ?>
          </div>
          <!-- Peminatan -->
          <label>Peminatan:</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="Coding" <?php if(isset($_POST['minat'])&& in_array('Coding',$_POST['minat'])) echo "checked"?>>Coding
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="UX_Design"<?php if(isset($_POST['minat'])&& in_array('UX_Design',$_POST['minat'])) echo "checked"?>>UX Design
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="Data_Science" <?php if(isset($_POST['minat'])&& in_array('Data_Science',$_POST['minat'])) echo "checked"?>>Data Science
            </div>
          </label>
          <div class="error text-danger">
            <?php if(isset($error_minat)) {echo $error_minat;}?>
          </div>
          <br>
          <!-- Submit-->
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
          <button type="submit" class="btn btn-danger" name="reset" value="reset">Reset</button>
      </div>
    </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
</body>

</html>