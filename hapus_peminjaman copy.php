<?php
include './connection/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get PeminjamanID from POST data
    $peminjamanID = $_POST["PeminjamanID"];

    // Log untuk memeriksa nilai variabel
    error_log("Menghapus PeminjamanID: " . $peminjamanID);

    // Delete from detailpeminjaman table
    $queryDetail = "DELETE FROM detailpeminjaman WHERE PeminjamanID = '$peminjamanID'";
    $resultDetail = mysqli_query($koneksi, $queryDetail);

    // Log untuk memeriksa hasil query
    error_log("Query Detail: " . $queryDetail);
    error_log("Result Detail: " . var_export($resultDetail, true));

    // Check if there are no more books left for the PeminjamanID
    $queryCheckBooks = "SELECT COUNT(*) as bookCount FROM detailpeminjaman WHERE PeminjamanID = '$peminjamanID'";
    $resultCheckBooks = mysqli_query($koneksi, $queryCheckBooks);
    $rowCheckBooks = mysqli_fetch_assoc($resultCheckBooks);
    $bookCount = $rowCheckBooks['bookCount'];

    if ($bookCount == 0) {
        // Delete from peminjaman table if no more books left for the PeminjamanID
        $queryPeminjaman = "DELETE FROM peminjaman WHERE PeminjamanID = '$peminjamanID'";
        $resultPeminjaman = mysqli_query($koneksi, $queryPeminjaman);

        // Log untuk memeriksa hasil query
        error_log("Query Peminjaman: " . $queryPeminjaman);
        error_log("Result Peminjaman: " . var_export($resultPeminjaman, true));

        if ($resultPeminjaman) {
            echo "Peminjaman berhasil dihapus";
        } else {
            echo "Gagal menghapus peminjaman";
        }
    } else {
        echo "Peminjaman berhasil dihapus";
    }
}

mysqli_close($koneksi);
