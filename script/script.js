document.addEventListener("DOMContentLoaded", function () {
    // Ambil elemen select
    var peminjamSelect = document.getElementById('peminjamSelect');
    var daftarBukuTable = document.getElementById('daftarBuku');

    // Tambahkan event listener untuk menghandle perubahan pada select
    peminjamSelect.addEventListener('change', function () {
        // Ambil nilai NamaPeminjam yang dipilih
        var namaPeminjam = peminjamSelect.value;

        // Lakukan request AJAX untuk mendapatkan data peminjaman
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'getPeminjaman.php?namaPeminjam=' + encodeURIComponent(namaPeminjam), true);

        xhr.onload = function () {
            if (xhr.status == 200) {
                // Hapus semua baris tabel kecuali header
                while (daftarBukuTable.rows.length > 1) {
                    daftarBukuTable.deleteRow(1);
                }

                // Parse data JSON dari respons AJAX
                var data = JSON.parse(xhr.responseText);

                // ...

                // Loop melalui data dan tambahkan baris ke tabel
                for (var i = 0; i < data.length; i++) {
                    var row = daftarBukuTable.insertRow(i + 1);
                    var cellNo = row.insertCell(0);
                    var cellNamaPeminjam = row.insertCell(1);
                    var cellTanggalPinjam = row.insertCell(2);
                    var cellTanggalKembali = row.insertCell(3);
                    var cellJudulBuku = row.insertCell(4);
                    var cellAksi = row.insertCell(5);

                    cellNo.innerHTML = i + 1;
                    cellNamaPeminjam.innerHTML = data[i].NamaPeminjam;
                    cellTanggalPinjam.innerHTML = data[i].TanggalPinjam;
                    cellTanggalKembali.innerHTML = data[i].TanggalKembali;
                    cellJudulBuku.innerHTML = data[i].Judul;

                    // Tambahkan tombol hapus dengan fungsi hapusPeminjam
                    var btnHapus = document.createElement("button");
                    btnHapus.innerHTML = "Hapus";
                    btnHapus.onclick = function (id) {
                        return function () {
                            hapusPeminjam(id);
                        };
                    }(data[i].PeminjamanID); // Gunakan closure untuk menyimpan nilai PeminjamanID
                    cellAksi.appendChild(btnHapus);
                }

                // ...

            }
        };

        xhr.send();
    });
});
