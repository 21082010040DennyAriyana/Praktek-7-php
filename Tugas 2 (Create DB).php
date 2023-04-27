<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pegawai";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    echo "Error creating database: " . $conn->error;
}

// Switch to the newly created database
$conn->select_db($dbname);

// Create the pegawai table
$sql = "CREATE TABLE IF NOT EXISTS pegawai (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    gaji INT(11) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Create the departemen table
$sql = "CREATE TABLE IF NOT EXISTS departemen (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_departemen VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Create the jabatan table
$sql = "CREATE TABLE IF NOT EXISTS jabatan (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_jabatan VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Create the pegawai_departemen table
$sql = "CREATE TABLE IF NOT EXISTS pegawai_departemen (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_pegawai INT(11) NOT NULL,
    id_departemen INT(11) NOT NULL,
    FOREIGN KEY (id_pegawai) REFERENCES pegawai(id),
    FOREIGN KEY (id_departemen) REFERENCES departemen(id)
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Create the pegawai_jabatan table
$sql = "CREATE TABLE IF NOT EXISTS pegawai_jabatan (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_pegawai INT(11) NOT NULL,
    id_jabatan INT(11) NOT NULL,
    FOREIGN KEY (id_pegawai) REFERENCES pegawai(id),
    FOREIGN KEY (id_jabatan) REFERENCES jabatan(id)
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}
echo "database pegawai berhasil dibuat";

$conn->close();
?>
