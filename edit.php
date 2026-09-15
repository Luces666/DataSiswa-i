<?php
include("koneksi.php");

if (!isset($_GET['id'])) {
    header("Location: home.php");
    exit;
}

$id = (int) $_GET['id'];
$berhasil = false;

$result = mysqli_query($koneksi, "SELECT * FROM kelas WHERE No = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if (isset($_POST['kirim'])) {
    $nis = $_POST['NIS'];
    $nama = $_POST['Nama'];
    $kelas = $_POST['Kelas'];

    $query = mysqli_query($koneksi, "UPDATE kelas SET NIS = '$nis', Nama = '$nama', Kelas = '$kelas' WHERE No = $id");

    if ($query) {
        $berhasil = true;
    } else {
        echo "Data gagal diubah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kelas</title>
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
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1976D2;
        }

        .kembali {
            margin-left: 10px;
            text-decoration: none;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Edit Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
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
                <p class="card-text">Edit NIS, Nama, & Kelas</p>

                <div class="form-container">
                    <?php if ($berhasil): ?>
                        <p class="text-success fw-bold">Data berhasil diubah</p>
                        <a href="home.php"><button type="button">Kembali ke Home</button></a>
                    <?php else: ?>
                        <form action="" method="post">
                            <label for="NIS">NIS:</label>
                            <input type="text" name="NIS" id="NIS" value="<?php echo htmlspecialchars($data['NIS']); ?>" required>

                            <label for="Nama">Nama:</label>
                            <input type="text" name="Nama" id="Nama" value="<?php echo htmlspecialchars($data['Nama']); ?>" required>

                            <label for="Kelas">Kelas:</label>
                            <input type="text" name="Kelas" id="Kelas" value="<?php echo htmlspecialchars($data['Kelas']); ?>" required>

                            <button type="submit" name="kirim">Simpan</button>
                            <a href="home.php" class="kembali">Batal</a>
                        </form>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="bg-primary text-center text-lg-start mt-auto" style="color: white" data-bs-theme="dark">
        <div class="container p-4">
            <p>&copy; 2026 StudentAPP. All right reserved.</p>
        </div>
    </footer>
    <!-- End Of Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>