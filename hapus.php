<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_pegawai");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangkap data yang dikirim melalui POST
$id_pegawai = mysqli_real_escape_string($conn, $_POST['id_pegawai']);

// Perintah DELETE pada database
$sql1 = "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'";

if (mysqli_query($conn, $sql1)) {
    // Jika query berhasil dijalankan, tampilkan pesan berhasil dan redirect ke halaman sebelumnya
    echo "Data berhasil dihapus";
    echo "<script>window.location.href='tugas3(program).php'</script>";
} else {
    // Jika terjadi kesalahan pada query, tampilkan pesan error
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
