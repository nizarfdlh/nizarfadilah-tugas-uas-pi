<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjam</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Daftar Peminjam</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tambah.php">Tambah Buku</a></li>
                <li><a href="peminjam.php">Daftar Peminjam</a></li>
                <li><a href="peminjaman.php">Daftar Peminjaman</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <!-- Formulir Pencarian -->
        <form action="peminjam.php" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" id="search" name="search" placeholder="Nama Peminjam" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

            </div>
            <button type="submit">Cari</button>
        </form>
        <a href="tambah_peminjam.php"><button>Tambah Peminjam</button></a>
        <!-- Tabel Daftar Buku -->
        <table class="responsive-table">
            <tr>
                <th>Peminjam ID</th>
                <th>Nama Peminjam</th>
                <th>Alamat Peminjam</th>
                <th>No Telepon</th>
            </tr>
            <?php
            include('./connection/koneksi.php');
            // Logika Pencarian
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $query = "SELECT * FROM peminjam WHERE NamaPeminjam LIKE '%$search%'";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['PeminjamID'] . "</td>";
                echo "<td>" . $row['NamaPeminjam'] . "</td>";
                echo "<td>" . $row['Alamat'] . "</td>";
                echo "<td>" . $row['NoTelepon'] . "</td>";
                echo "<td>";
                echo "<a href='edit_peminjam.php?id=" . $row['PeminjamID'] . "'>Edit</a> | ";

                echo "<a href='#' onclick='hapusPeminjam(" . $row['PeminjamID'] . ")'>Hapus</a>";

                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <script src="./script/script.js"></script>
    <script>
        function hapusPeminjam(PeminjamID) {
            var konfirmasi = confirm("Apakah Anda yakin ingin menghapus peminjam ini ? ");

            if (konfirmasi) {
                window.location.href = 'hapus_peminjam.php?id=' + PeminjamID;
            }
        }
    </script>
</body>

</html>