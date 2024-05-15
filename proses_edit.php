<?php
include 'koneksi.php';

  $id = $_POST['id'];
  $judul   = $_POST['judul'];
  $penyanyi     = $_POST['penyanyi'];
  $tglrilis    = $_POST['tglrilis'];
  $foto = $_FILES['foto']['name'];

  //jika foto diubah 
  if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'pict/'.$nama_gambar_baru);
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE lagu SET judul = '$judul', penyanyi = '$penyanyi', tglrilis = '$tglrilis',foto = '$nama_gambar_baru'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($kon, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($kon).
                             " - ".mysqli_error($kon));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='index.html';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='lagu_edit.php';</script>";
              }
    } else {
      $query  = "UPDATE lagu SET judul = '$judul', penyanyi = '$penyanyi', tglrilis = '$tglrilis'
                WHERE id = '$id'";
      $result = mysqli_query($kon, $query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($kon).
                             " - ".mysqli_error($kon));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='lagu_tampil.php';</script>";
      }
    }

 
