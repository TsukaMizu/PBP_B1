<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : [];

    // Validasi NIS (Harus 10 karakter dan hanya angka)
    if (strlen($nis) != 10 || !ctype_digit($nis)) {
        echo "NIS harus terdiri dari 10 digit angka.";
        exit;
    }

    // Validasi Nama (Tidak boleh kosong)
    if (empty($nama)) {
        echo "Nama harus diisi.";
        exit;
    }

    // Validasi Jenis Kelamin
    if (empty($jenis_kelamin)) {
        echo "Jenis kelamin harus dipilih.";
        exit;
    }

    // Validasi Kelas dan Ekstrakurikuler
    if ($kelas == "X" || $kelas == "XI") {
        if (count($ekstrakurikuler) < 1 || count($ekstrakurikuler) > 3) {
            echo "Siswa kelas X atau XI harus memilih minimal 1 dan maksimal 3 ekstrakurikuler.";
            exit;
        }
    } elseif ($kelas == "XII" && !empty($ekstrakurikuler)) {
        echo "Siswa kelas XII tidak boleh memilih ekstrakurikuler.";
        exit;
    }

    // Semua validasi lulus
    echo "Pendaftaran berhasil!";
}
?>
