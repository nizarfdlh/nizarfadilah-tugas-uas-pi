<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Daftar Buku</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <!-- <li><a href="tambah.php">Tambah Buku</a></li> -->
                <li><a href="peminjam.php">Daftar Peminjam</a></li>
                <li><a href="peminjaman.php">Daftar Peminjaman</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <!-- Formulir Pencarian -->
        <form action="index.php" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" id="search" name="search" placeholder="Judul Buku" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit" style="margin-left: 10px;">Cari</button>
            </div>
        </form>
        <a href="tambah.php"><button style="margin-bottom: 15px;">Tambah Buku</button></a>
        <!-- Tabel Daftar Buku -->
        <table class="responsive-table">
            <tr>
                <th>BukuID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            <?php
            include('./connection/koneksi.php');
            // Logika Pencarian
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $query = "SELECT * FROM buku WHERE Judul LIKE '%$search%'";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['BukuID'] . "</td>";
                echo "<td>" . $row['Judul'] . "</td>";
                echo "<td>" . $row['Pengarang'] . "</td>";
                echo "<td>" . $row['TahunTerbit'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['BukuID'] . "'><button class='btn-edit'>Edit</button></a> | ";

                echo "<a href='#' onclick='hapusBuku(" . $row['BukuID'] .

                    ")'><button class='btn-hapus'>Hapus</button></a>";

                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <script src="script.js"></script>
    <script>
        function hapusBuku(bukuID) {
            var konfirmasi = confirm("Apakah Anda yakin ingin menghapusbuku ini ? ");

            if (konfirmasi) {
                window.location.href = 'hapus.php?id=' + bukuID;
            }
        }
    </script>
</body>

</html>