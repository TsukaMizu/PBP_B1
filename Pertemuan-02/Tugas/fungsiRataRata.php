<?php
// Fungsi Menghitung Rata-rata
function hitung_rata($array) {
    $total = array_sum($array);
    $jumlah = count($array);
    $rata_rata = $total / $jumlah;
    return $rata_rata;
}

// Fungsi untuk menampilkan data mahasiswa dan nilai rata-rata dalam format tabel
function print_mhs($array_mhs) {
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr><th>Nama Mahasiswa</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata-Rata</th></tr>';
    
    foreach($array_mhs as $nama => $nilai) {
        $rata_rata = hitung_rata($nilai);
        echo "<tr>";
        echo "<td>" . $nama . "</td>";
        echo "<td>" . $nilai[0] . "</td>";
        echo "<td>" . $nilai[1] . "</td>";
        echo "<td>" . $nilai[2] . "</td>";
        echo "<td>" . number_format($rata_rata, 4) . "</td>";
        echo "</tr>";
    }
    
    echo '</table>';
}

// Contoh array mahasiswa
$array_mhs = array(
    'Abdul' => array(89, 90, 54),
    'Budi' => array(98, 65, 74),
    'Nina' => array(67, 56, 84),
);

// Memanggil fungsi print_mhs
print_mhs($array_mhs);
?>
