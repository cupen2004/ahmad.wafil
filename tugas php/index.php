<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Ahmad Wafil Marom</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navigasi -->
    <div class="navbar">
        <a href="#beranda">BERANDA</a>
        <a href="#tentang">Tentang Saya</a>
        <a href="#portofolio">Portofolio</a>
    </div>

    <!-- Profil -->
    <section class="profil" id="beranda">
        <img src="profil.jpeg" alt="Foto Profil 1">
        <div class="profil-text">
            Halo nama saya Ahmad Wafil Marom seorang mahasiswa teknik Informatika Unugiri Bojonegoro
        </div>
    </section>

    <!-- Tentang Saya -->
    <section class="tentang" id="tentang">
        <h2 class="button">Tentang Saya</h2>
        <p>
            Halo! Saya Ahmad Wafil Marom, seorang mahasiswa berdedikasi yang sedang menempuh pendidikan di
            program studi Teknik Informatika di Universitas Nahdlatul Ulama Giri (UNUGIRI). Saya memiliki
            ketertarikan yang besar terhadap dunia teknologi,
            khususnya dalam pengembangan perangkat lunak, kecerdasan buatan, dan solusi digital inovatif.
        </p>
    </section>

    <!-- Portofolio -->
    <section class="portofolio" id="portofolio">
        <h2 class="button">Portofolio</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Waktu Kegiatan</th>
                    <th>Bukti Kegiatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="portfolio-table">
                <!-- Data will be populated here -->
            </tbody>
        </table>

        <h3>Tambah Kegiatan</h3>
        <form id="add-form" method="POST" action="create.php">
            <input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
            <input type="text" name="waktu_kegiatan" placeholder="Waktu Kegiatan" required>
            <input type="text" name="proof" placeholder="Bukti Kegiatan (URL)">
            <button type="submit">Tambah</button>
        </form>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('fetch_portfolio.php')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('portfolio-table');
                    data.forEach((item, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${item.nama_kegiatan}</td>
                            <td>${item.waktu_kegiatan}</td>
                            <td><a href="${item.proof}" target="_blank">Lihat Bukti</a></td>
                            <td><button onclick="deleteEntry(${item.id})">Hapus</button></td>
                        `;
                        tableBody.appendChild(row);
                    });
                });
        });

        function deleteEntry(id) {
            fetch('delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(() => location.reload());
        }
    </script>

</body>

</html>
