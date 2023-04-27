<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_pegawai");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama_pegawai = mysqli_real_escape_string($conn, $_POST['nama_pegawai']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$departemen = mysqli_real_escape_string($conn, $_POST['departemen']);
$jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
$gaji = mysqli_real_escape_string($conn, $_POST['nominal_gaji']);

$sql_id_pegawai = "SELECT id_pegawai FROM pegawai ORDER BY id_pegawai DESC LIMIT 1";

$row = mysqli_fetch_assoc(mysqli_query($conn, $sql_id_pegawai));
echo "ID Pegawai: " . $row["id_pegawai"] . "<br>";

$sql1 = "INSERT INTO pegawai (id_pegawai, nama, alamat, gaji)
VALUES ('" . ($row["id_pegawai"]+1) . "','" . $nama_pegawai . "', '" . $alamat . "', " . $gaji . ");";

$sql2 = "INSERT INTO pegawai_departemen (id_pegawai, id_departemen)
VALUES (" . ($row["id_pegawai"]+1) . ", " . $departemen . ");";

$sql3 = "INSERT INTO pegawai_jabatan (id_pegawai, id_jabatan)
VALUES (" . ($row["id_pegawai"]+1) . ", " . $jabatan . ");";


if (mysqli_query($conn, $sql1) ) {
    if (mysqli_query($conn, $sql2) ) {
        if (mysqli_query($conn, $sql3) ) {
            echo "Data berhasil ditambahkan $nama_pegawai, $alamat, $departemen, $jabatan, $gaji";
            // tambahkan kode untuk kembali ke form sebelumnya
            echo "<script>window.location.href='tugas3(program).php'</script>";
        } else {
            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
