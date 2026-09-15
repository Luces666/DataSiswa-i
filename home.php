<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    include "koneksi.php";
    $result = mysqli_query($koneksi, "SELECT * FROM kelas");
    ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- MAIN CONTENT -->
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Murid</h5>
                <p class="card-text">Siswa siswi jurusan PPLG.</p>
                <a href="tambah.php" class="btn btn-primary">+ Tambah Siswa/i</a>
                <table class="table table-bordered border-primary my-3">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NIS</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['NIS'] ?></td>
                                <td><?= $row['Nama'] ?></td>
                                <td><?= $row['Kelas'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['No'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="hapus.php?id=<?= $row['No'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END OF MAIN CONTENT -->

    <!-- FOOTER -->
    <footer class="bg-primary text-center text-lg-start mt-auto">
        <div class="container p-4">
            <p>&copy; 2026 StudentAPP. All rights reserved</p>
        </div>
    </footer>
    <!-- END OF FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>