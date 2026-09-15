<?php
include('koneksi.php');
$berhasil = false;

if (isset($_POST['tambah'])) {
    $nis = $_POST['NIS'];
    $nama = $_POST['Nama'];
    $kelas = $_POST['Kelas'];

    $query = mysqli_query($koneksi, "INSERT INTO kelas (NIS, Nama, Kelas) VALUES ('$nis', '$nama', '$kelas')");

    if ($query) {
        $berhasil = true;
    } else {
        echo "Data gagal ditambahkan";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .form-container {
            width: 400px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        .kembali {
            margin-left: 10px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tambah Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- Main Content -->
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Murid</h5>
                <p class="card-text">Tambah Siswa jurusan PPLG</p>

                <?php if ($berhasil): ?>
                    <div class="alert alert-success" role="alert">
                        Berhasil Menambahkan
                    </div>
                <?php endif; ?>

                <div class="form-container">
                    <form method="POST">
                        <label>NISN Siswa</label>
                        <input
                            type="text"
                            name="NIS"
                            placeholder="Masukkan NIS Siswa"
                            required>
                        <label>Nama Siswa</label>
                        <input
                            type="text"
                            name="Nama"
                            placeholder="Masukkan nama Siswa"
                            required>
                        <label>Kelas</label>
                        <input
                            type="text"
                            name="Kelas"
                            required>
                        <button type="submit" name="tambah">
                            Tambah
                        </button>
                        <a href="home.php" class="kembali">
                            Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="bg-primary text-center text-lg-start mt-auto" style="color: white" data-bs-theme="dark">
        <div class="container p-5">
            <p>&copy; 2026 StudentAPP. All right reserved.</p>
        </div>
    </footer>

    <!-- End Of Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>