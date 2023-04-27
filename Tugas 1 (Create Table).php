<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_Database";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$cekTable = "SHOW TABLES LIKE 'buku_tamu'";

$result = mysqli_query($conn, $cekTable);

if (mysqli_num_rows($result) > 0) {
    $hapusTable = "DROP TABLE buku_tamu";
    if (mysqli_query($conn, $hapusTable)) {
        echo "Tabel buku_tamu berhasil dihapus";
    } else {
        echo "Error deleting table: " . mysqli_error($conn);
    }
}

$sql = "CREATE TABLE buku_tamu (
    ID_BT int(10) PRIMARY KEY AUTO_INCREMENT,
    NAMA varchar(200),
    EMAIL varchar(50),
    ISI text
  )";

if (mysqli_query($conn, $sql)) {
    echo "Tabel buku_tamu berhasil dibuat";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// menutup koneksi ke database
mysqli_close($conn);
?>
