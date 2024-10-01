<?php
session_start();
require_once('./lib/db_login.php');

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
  header('Location: ./login.php');
  exit;
}

// Ambil ID dari URL dan validasi
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $db->real_escape_string($_GET['id']); // Sanitasi input untuk keamanan

  // Query untuk mengambil data customer berdasarkan ID
  $query = 'SELECT * FROM customers WHERE customerid="' . $id . '"';
  $result = $db->query($query);

  if (!$result) {
    die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
  } else {
    // Jika data ditemukan, simpan detailnya ke variabel
    if ($row = $result->fetch_object()) {
      $name = $row->name;
      $address = $row->address;
      $city = $row->city;
    } else {
      // Jika tidak ada data yang ditemukan, kembalikan ke halaman utama
      header('Location: view_customer.php');
      exit;
    }
  }
} else {
  // Jika ID tidak valid, kembalikan ke halaman utama
  header('Location: view_customer.php');
  exit;
}
?>

<?php include('./header.php'); ?>
<br>
<div class="card mt-4">
  <div class="card-header">Delete User Confirmation</div>
  <div class="card-body">
    <div>
      <h5>Are you sure you want to delete this user?</h5>
      <label>Name: <?= htmlspecialchars($name); ?></label><br>
      <label>Address: <?= htmlspecialchars($address); ?></label><br>
      <label>City: <?= htmlspecialchars($city); ?></label><br>
    </div>
    <div class="mt-3">
      <!-- Tombol konfirmasi hapus -->
      <a class="btn btn-danger mb-4" href="delete_customer.php?id=<?= $id ?>">Yes</a>
      <!-- Tombol kembali -->
      <a class="btn btn-primary mb-4" href="view_customer.php">Back</a>
    </div>
  </div>
</div>
<?php include('./foother.php'); ?>

<?php
// Tutup koneksi database
$db->close();
?>
