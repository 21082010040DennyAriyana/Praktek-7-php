<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_pegawai");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id_pegawai = mysqli_real_escape_string($conn, $_POST['id_pegawai']);
$nama_pegawai = mysqli_real_escape_string($conn, $_POST['nama_pegawai']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$departemen = mysqli_real_escape_string($conn, $_POST['departemen']);
$jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
$gaji = mysqli_real_escape_string($conn, $_POST['nominal_gaji']);

$sql1 = "UPDATE pegawai SET nama='$nama_pegawai', alamat='$alamat', gaji=$gaji WHERE id_pegawai=$id_pegawai";
$sql2 = "UPDATE pegawai_departemen SET id_departemen=$departemen WHERE id_pegawai=$id_pegawai";
$sql3 = "UPDATE pegawai_jabatan SET id_jabatan=$jabatan WHERE id_pegawai=$id_pegawai";

if (mysqli_query($conn, $sql1) ) {
    if (mysqli_query($conn, $sql2) ) {
        if (mysqli_query($conn, $sql3) ) {
            echo "Data berhasil diubah $nama_pegawai, $alamat, $departemen, $jabatan, $gaji";
            // tambahkan kode untuk kembali ke halaman sebelumnya
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
