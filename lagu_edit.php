<?php
include 'koneksi.php';

  if (isset($_GET['id'])) {
    // ambil id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM lagu WHERE id='$id'";
    $result = mysqli_query($kon, $query);
    // jika data gagal diambil maka akan tampil error
    if(!$result){
      die ("Query Error: ".mysqli_errno($kon).
         " - ".mysqli_error($kon));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='lagu_tampil.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>edit lagu</title>
    <style type="text/css">
       body{
        font-family: "Times New Roman";
        background-color: #b5a598;
      }
    button {
          background-color: #af6e4e;
          color: #fff;
          padding: 10px;
          font-size: 16px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      font-size: medium;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 5px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color:#af6e4e;
    }
    div {
      margin-top: 20px;
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 40px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    :root{
    --brown:#976a27;
    }
    html{
      font-size: 70%;
      scroll-behavior: smooth;
      scroll-padding-top: 6rem;
      overflow-x: hidden;
    }
    section{
      padding:2rem 9%;
    }
    .heading{
      text-align: center;
      font-size: 4rem;
      color:#333;
      padding:1rem;
      margin:2rem 0;
      background:rgba(255, 51, 153,.05);
    }
    header{
      position: fixed;
      top:0; left:0; right:0;
      background:whitesmoke;        
      padding:2rem 9%;
      display: flex;
      align-items: right;
      justify-content: space-between;
      z-index: 1000;
      box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
    }
    header .logo{
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 3rem;
      color:black;
      font-weight: bolder;
      font-style: italic;
    }
    header .navbar a{
      font-size: 2rem;
      padding:0 1.5rem;
      color:black;
    }
    header .navbar a:hover{
      color:var(--brown);
    }
    .base{
      margin-top: 100px;
    }
    </style>
  </head>
  <body>
  <header>
      <center>
      <a class="logo">Edit Song</a>
      </center>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="lagu_isi.php">Manage Song</a>
        <a href="lagu_tampil.php">Song List</a>
        <a href="cari_lagu.php">Find Song</a>
    </nav>
  </header>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menyimpan id lagu yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Judul Lagu</label>
          <input type="text" name="judul" value="<?php echo $data['judul']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>penyanyi</label>
         <input type="text" name="penyanyi" value="<?php echo $data['penyanyi']; ?>" />
        </div>
        <div>
          <label>Tgl Rilis</label>
         <input type="date" name="tglrilis" required=""value="<?php echo $data['tglrilis']; ?>" />
        </div>
        <div>
          <label>Foto Sampul</label>
          <img src="pict/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>