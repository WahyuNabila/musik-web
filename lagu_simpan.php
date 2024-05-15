<?php 
include ('koneksi.php');

$judul = $_POST['judul'];
$penyanyi = $_POST['penyanyi'];
$tglrilis = $_POST['tglrilis'];
$foto = $_FILES['foto']['name'];

if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];  

    if(in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
        move_uploaded_file($file_tmp, 'pict/'.$foto);
        $query = "insert into lagu(judul,penyanyi,tglrilis,foto) values 
                    ('$judul','$penyanyi','$tglrilis','$foto')";
        $result = mysqli_query($kon,$query);

    if(!$result) {
        die("query eror: ".mysqli_errno($kon)." - ".mysqli_error($kon));
    }else {
        echo "<script>alert('data berhasil ditambahkan');window.location='lagu_tampil.php'</script>";
    }
    } else {
        echo "<script>alert('ekstensi gambar hanya bisa jpg dan png!');window.location='lagu_isi.php';</script>";
    }
} else {
    $query = "INSERT INTO lagu (judul, penyanyi, tglrilis, foto) 
                VALUES ('$judul', '$penyanyi', '$tglrilis', null)";
                   $result = mysqli_query($koneksi, $query);
                   // periksa query apakah ada error
                   if(!$result){
                       die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                   } else {
                     echo "<script>alert('Data berhasil ditambah.');window.location='lagu_tampil.php';</script>";
                   }
}
?>