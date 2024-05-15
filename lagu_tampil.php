<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Lagu Tampil</title>
    <style type="text/css">
      body{
        font-family: "Times";
        background-color: #b5a598;
      }
    table {
      margin-top: 20px;
      border: solid 1px #827265;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
      background-color: #af6e4e;
      border: solid 1px #827265;
      color: #fff;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      font-size: 15px;
    }
    table tbody td {
      background-color: #f3f0ee;
      border: solid 1px #827265;
      color: #333;
      padding: 10px;
      margin-top: 20px;
      font-size: 15px;
    }
    table tbody tr td a{
      background-color: #af6e4e;
      font-size: 15px;
    }
    a {
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
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
      font-style: italic;
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
    .tab{
      margin-top: 100px;
    }
    </style>
  </head>
  <body>
  <header>
      <center>
      <a href="#" class="logo">Daftar Lagu</a>
      </center>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="lagu_isi.php">Manage Song</a>
        <a href="lagu_tampil.php">Song List</a>
        <a href="cari_lagu.php">Find Song</a>
    </nav>
</header>
    <table class="tab">
      <thead>
        <tr>
          <th>No</th>
          <th>Artwork</th>
          <th>Judul Lagu</th>
          <th>Penyanyi</th>
          <th>Tgl Rilis</th>
          <th>proses</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM lagu ORDER BY id ASC";
      $result = mysqli_query($kon, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($kon).
           " - ".mysqli_error($kon));
      }

      //buat perulangan untuk element tabel dari data lagu
      $no = 1;
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td style="text-align: center;"><img src="pict/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo $row['penyanyi']?></td>
          <td><?php echo $row['tglrilis']?></td>
          <td>
              <a href="lagu_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++;
      }
      ?>
    </tbody>
    </table>
  </body>
</html>