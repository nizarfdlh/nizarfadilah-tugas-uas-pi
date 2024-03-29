<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-
scale=1.0">

    <title>Edit Buku</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Edit Buku</h1>
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
        $bukuID = $_GET['id'];
        // Query untuk mengambil data buku berdasarkan ID
        $queryEdit = "SELECT * FROM buku WHERE BukuID = $bukuID";
        $resultEdit = mysqli_query($koneksi, $queryEdit);
        if (mysqli_num_rows($resultEdit) == 1) {

            $rowEdit = mysqli_fetch_assoc($resultEdit);
        ?>
            <!-- Formulir Edit Data -->

            <form action="proses_edit.php" method="POST" class="edit-
form">

                <input type="hidden" name="bukuID" value="<?php echo

                                                            $rowEdit['BukuID']; ?>">

                <label for="judul">Judul Buku:</label>
                <input type="text" id="judul" name="judul" value="<?php

                                                                    echo $rowEdit['Judul']; ?>" required>

                <label for="pengarang">Pengarang:</label>
                <input type="text" id="pengarang" name="pengarang" value="<?php echo $rowEdit['Pengarang']; ?>">

                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo $rowEdit['TahunTerbit']; ?>">

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