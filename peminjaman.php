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
        <form action="" method="GET" id="peminjaman">

            <div class="form-group">
                <label for="">Nama Peminjam: </label>
                <select name="peminjam" id="peminjamSelect">
                    <option value="">Pilih</option>
                    <?php
                    include('./connection/koneksi.php');
                    $query = "SELECT * FROM peminjam order by NamaPeminjam";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option>" . $row['NamaPeminjam'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="TanggalPinjam">Tanggal Pinjam:</label>
                <input type="date" id="TanggalPinjam" name="TanggalPinjam">
            </div>
            <div class="form-group">
                <label for="TanggalKembali">Tanggal Kembali:</label>
                <input type="date" id="TanggalKembali" name="TanggalKembali">
            </div>
            <div class="form-group">
                <label for="buku">Buku yang dipinjam: </label>
                <select name="Buku" id="buku">
                    <option value="">Pilih</option>
                    <?php
                    include('./connection/koneksi.php');
                    $query = "SELECT * FROM buku order by Judul";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option>" . $row['Judul'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Inside the <form> element -->
        </form>

        <a href="tambah_peminjam.php"><button>Tambah Peminjam</button></a>
        <!-- Tabel Daftar Buku -->
        <table class="responsive-table" id="daftarBuku">
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Judul Buku</th>
                <th>Aksi</th>
            </tr>
        </table>
        <button type="button" onclick="pinjamBuku()">Pinjam Buku</button>

    </section>

    <script src="./script/script.js"></script>
    <script>
        function hapusPeminjam(PeminjamanID) {
            var konfirmasi = confirm("Apakah Anda yakin ingin menghapus peminjaman ini ? ");

            if (konfirmasi) {
                window.location.href = 'hapus_peminjaman.php?id=' + PeminjamanID;
            }
        }
    </script>
    <script>
        function pinjamBuku() {
            // Get the form data
            var formData = new FormData(document.getElementById('peminjaman'));

            // Send an AJAX request to pinjam_buku.php
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'pinjam_buku.php', true);
            xhr.onload = function() {
                // Reload the table on success
                if (xhr.status === 200) {
                    reloadTable();
                } else {
                    // Handle errors if needed
                    alert('Failed to add book loan.');
                }
            };
            xhr.send(formData);
        }

        function reloadTable() {
            // Reload the table by updating its content
            var table = document.getElementById('daftarBuku');
            // You may need to modify the following line based on your implementation
            table.innerHTML = '<tr><th>No</th><th>Nama Peminjam</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Judul Buku</th><th>Aksi</th></tr>';

        }
    </script>
</body>

</html>