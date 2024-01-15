<?php
include('./connection/koneksi.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai dari formulir edit.php
    $PeminjamID = $_POST['PeminjamID'];
    $NamaPeminjam = $_POST['NamaPeminjam'];
    $AlamatPeminjam = $_POST['AlamatPeminjam'];
    $NoTelepon = $_POST['NoTelepon'];

    // Query untuk mengupdate data buku
    $queryUpdate = "UPDATE peminjam SET NamaPeminjam = '$NamaPeminjam', AlamatPeminjam =
'$AlamatPeminjam', NoTelepon = '$NoTelepon' WHERE PeminjamID = $PeminjamID";
    // Eksekusi query
    if (mysqli_query($koneksi, $queryUpdate)) {
        // Jika berhasil, redirect ke halaman peminjam.php
        header("Location: peminjam.php");
        exit();
    } else {
        // Jika terjadi error, tampilkan pesan error
        echo "Error: " . $queryUpdate . "<br>" .
            mysqli_error($koneksi);
    }
} else {
    // Jika bukan metode POST, redirect ke halaman index.php
    header("Location: index.php");
    exit();
}
