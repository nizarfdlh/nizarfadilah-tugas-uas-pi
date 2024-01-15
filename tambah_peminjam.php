<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-
scale=1.0">

    <title>Tambah Peminjam</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Tambah Peminjam</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="form-container">
            <!-- Formulir Tambah Data -->

            <form action="proses_tambah_peminjam.php" method="POST" class="add-
form">

                <div class="form-group">
                    <label for="NamaPeminjam">Nama Peminjam:</label>
                    <input type="text" id="NamaPeminjam" name="NamaPeminjam" required>

                </div>
                <div class="form-group">
                    <label for="AlamatPeminjam">Alamat:</label>
                    <input type="text" id="AlamatPeminjam" name="AlamatPeminjam">
                </div>
                <div class="form-group">
                    <label for="NoTelepon">No Telepon:</label>
                    <input type="text" id="NoTelepon" name="NoTelepon">
                </div>
                <button type="submit">Tambah</button>
            </form>
        </div>
    </section>
    <script src="./script/script.js"></script>
</body>

</html>