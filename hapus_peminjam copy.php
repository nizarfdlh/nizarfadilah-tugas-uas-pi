<!-- masalah pada ketika menghapus peminjam yang sedang meminjam buku -->

<?php
include('./connection/koneksi.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Mendapatkan ID Peminjam dari parameter URL
    $PeminjamID = $_GET['id'];
    // Query untuk memeriksa apakah peminjam sedang meminjam buku
    // $queryCekPeminjaman = "SELECT COUNT(*) as count FROM detailpeminjaman WHERE BukuID = $BukuID";
    $queryCekPeminjaman = "SELECT peminjam.PeminjamID, peminjam.NamaPeminjam, buku.Judul, peminjaman.TanggalPinjam, peminjaman.TanggalKembali FROM Peminjaman peminjaman JOIN Peminjam peminjam ON peminjaman.PeminjamID = peminjam.PeminjamID JOIN detailpeminjaman detailpeminjam ON peminjaman.PeminjamanID = detailpeminjam.PeminjamanID JOIN buku buku ON detailpeminjam.BukuID = buku.BukuID WHERE peminjam.PeminjamID = $PeminjamID AND peminjaman.TanggalKembali IS NULL";
    $resultCekPeminjaman = mysqli_query($koneksi, $queryCekPeminjaman);
    $rowCekPeminjaman = mysqli_fetch_assoc($resultCekPeminjaman);
    $jumlahPeminjaman = $rowCekPeminjaman['count'];
    if ($jumlahPeminjaman > 0) {
        // Jika buku sedang dipinjam, tampilkan pesan dan redirect ke halaman index.php
        echo "Peminjam sedang dalam meminjam buku. Tidak dapat dihapus.";
        header("refresh:3;url=peminjam.php"); // Redirect ke halaman index.php setelah 3 detik
        exit();
    } else {
        // Jika buku tidak sedang dipinjam, lanjutkan proses penghapusan
        $queryHapus = "DELETE FROM peminjam WHERE PeminjamID = $PeminjamID";
        // Eksekusi query
        if (mysqli_query($koneksi, $queryHapus)) {
            // Jika berhasil, redirect ke halaman index.php
            header("Location: peminjam.php");
            exit();
        } else {
            // Jika terjadi error, tampilkan pesan error
            echo "Error: " . $queryHapus . "<br>" .

                mysqli_error($koneksi);
        }
    }
} else {
    // Jika bukan metode GET, redirect ke halaman index.php
    header("Location: peminjam.php");
    exit();
}
