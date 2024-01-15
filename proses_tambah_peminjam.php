<?php
include('./connection/koneksi.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai dari formulir tambah.php
    $NamaPeminjam = $_POST['NamaPeminjam'];
    $AlamatPeminjam = $_POST['AlamatPeminjam'];
    $NoTelepon = $_POST['NoTelepon'];
    // Query untuk menambahkan data ke dalam tabel buku
    $queryTambah = "INSERT INTO peminjam (NamaPeminjam, AlamatPeminjam, NoTelepon)
VALUES ('$NamaPeminjam', '$AlamatPeminjam', '$NoTelepon')";
    // Eksekusi query
    if (mysqli_query($koneksi, $queryTambah)) {
        // Jika berhasil, redirect ke halaman index.php
        header("Location: peminjam.php");
        exit();
    } else {
        // Jika terjadi error, tampilkan pesan error
        echo "Error: " . $queryTambah . "<br>" .
            mysqli_error($koneksi);
    }
} else {
    // Jika bukan metode POST, redirect ke halaman tambah_peminjam.php
    header("Location: tambah_peminjam.php");
    exit();
}
