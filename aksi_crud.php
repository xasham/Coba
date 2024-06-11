<?php 
    include "koneksi.php";

    if(isset($_POST['simpan'])) {
        // Simpan Data 
        $simpan = mysqli_query($koneksi, "INSERT INTO siswa (nim, nama, alamat, prodi) VALUES ('$_POST[nim]', '$_POST[nama]', '$_POST[alamat]', '$_POST[prodi]') ");

        if($simpan){
            echo "<script>alert('Berhasil Menyimpan Data');
                    document.location='index.php';
                </script>";
        }else{
            echo "<script>alert('Gagal Menyimpan Data');
                    document.location='index.php';
                </script>";
        }
    }



    if(isset($_POST['ubah'])) {
        // Update Data 
        $ubah = mysqli_query($koneksi, "UPDATE siswa SET nim = '$_POST[nim]', nama = '$_POST[nama]', alamat = '$_POST[alamat]', prodi = '$_POST[prodi]' WHERE id = '$_POST[id]' ");

        if($ubah){
            echo "<script>alert('Berhasil Merubah Data');
                    document.location='index.php';
                </script>";
        }else{
            echo "<script>alert('Gagal Merubah Data');
                    document.location='index.php';
                </script>";
        }
    }


    if(isset($_POST['hapus'])) {
        // Hapus Data 
        $hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id = '$_POST[id]' ");

        if($hapus){
            echo "<script>alert('Berhasil Menghapus Data');
                    document.location='index.php';
                </script>";
        }else{
            echo "<script>alert('Gagal Menghapus Data');
                    document.location='index.php';
                </script>";
        }
    }
?>