<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD - PHP</title>
</head>

<body>
    <div class="container mt-3">
        <h3 class="text-center">
            
        </h3>
        <div class="card mt-3">
            <div class="card-header bg-primary text-white text-center">
                Data Siswa
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data Siswa
                </button>
                <table class="table table-bordered taple-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>


                    <?php
                    // Menampilkan Data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC");
                    while ($data = mysqli_fetch_array($tampil)) :


                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['prodi'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                            </td>
                        </tr>

                        <!-- Ubah Data -->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Formulir Data Siswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="aksi_crud.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">NIM</label>
                                                <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" value="<?= $data['nim'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">NAMA</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" value="<?= $data['nama'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">ALAMAT</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?= $data['alamat'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">PRODI</label>
                                                <select name="prodi" class="form-select" required>
                                                    <option value="<?= $data['prodi'] ?>">Pilih Prodi</option>
                                                    <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                                    <option value="S1 - Teknik Industri">S1 - Teknik Insdustri</option>
                                                    <option value="S1 - Teknik Mesin">S1 - Teknik Mesin</option>
                                                    <option value="S1 - Teknik Elektro">S1 - Teknik Elektro</option>
                                                    <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Ubah Data -->

                        <!-- Hapus Data -->
                        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="aksi_crud.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Yakin Ingin Menghapus Data?<br>
                                                <span class="text-danger"><?= $data['nim'] ?> - <?= $data['nama'] ?></span>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Hapus Data -->
                    <?php endwhile; ?>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Formulir Data Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksi_crud.php" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">NIM</label>
                                        <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NAMA</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ALAMAT</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">PRODI</label>
                                        <select name="prodi" class="form-select" required>
                                            <option value="">Pilih Prodi</option>
                                            <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                            <option value="S1 - Teknik Industri">S1 - Teknik Insdustri</option>
                                            <option value="S1 - Teknik Mesin">S1 - Teknik Mesin</option>
                                            <option value="S1 - Teknik Elektro">S1 - Teknik Elektro</option>
                                            <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="simpan">Simpan Data</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>