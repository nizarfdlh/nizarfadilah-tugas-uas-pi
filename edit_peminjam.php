<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-
scale=1.0">

    <title>Edit Peminjam</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Edit Peminjam</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <?php
        include('./connection/koneksi.php');
        // Mendapatkan ID buku dari parameter URL
        $PeminjamID = $_GET['id'];
        // Query untuk mengambil data buku berdasarkan ID
        $queryEdit = "SELECT * FROM peminjam WHERE PeminjamID = $PeminjamID";
        $resultEdit = mysqli_query($koneksi, $queryEdit);
        if (mysqli_num_rows($resultEdit) == 1) {

            $rowEdit = mysqli_fetch_assoc($resultEdit);
        ?>
            <!-- Formulir Edit Data -->

            <form action="proses_edit_peminjam.php" method="POST" class="edit-
form">

                <input type="hidden" name="PeminjamID" value="<?php echo

                                                                $rowEdit['PeminjamID']; ?>">

                <label for="NamaPeminjam">Nama Peminjam:</label>
                <input type="text" id="NamaPeminjam" name="NamaPeminjam" value="<?php

                                                                                echo $rowEdit['NamaPeminjam']; ?>" required>

                <label for="AlamatPeminjam">Alamat:</label>
                <input type="text" id="AlamatPeminjam" name="AlamatPeminjam" value="<?php echo $rowEdit['AlamatPeminjam']; ?>">

                <label for="NoTelepon">No Telepon:</label>
                <input type="text" id="NoTelepon" name="NoTelepon" value="<?php echo $rowEdit['NoTelepon']; ?>">

                <div><br></div>
                <div>
                    <button type="submit">Simpan Perubahan</button>
                </div>
            </form>
        <?php
        } else {
            echo "Data buku tidak ditemukan.";
        }
        ?>
    </section>
    <script src="script.js"></script>
</body>

</html>