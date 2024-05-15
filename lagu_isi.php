<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>isi lagu</title>
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
    .form{
      margin-top: 100px;
    }
    </style>
  </head>
  <body>
  <header>
      <center>
      <a class="logo">Add Playlist</a>
      </center>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="lagu_isi.php">Manage Song</a>
        <a href="lagu_tampil.php">Song List</a>
        <a href="cari_lagu.php">Find Song</a>
    </nav>

</header>
      <form class ="form" method="POST" action="lagu_simpan.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Judul Lagu</label>
          <input type="text" name="judul" autofocus="" required="" />
        </div>
        <div>
          <label>Penyanyi</label>
         <input type="text" name="penyanyi" />
        </div>
        <div>
          <label>Tgl Rilis</label>
         <input type="date" name="tglrilis" required="" />
        </div>
        <div>
          <label>Foto Sampul</label>
         <input type="file" name="foto" required="" />
        </div>
        <div>
         <button type="submit">Simpan Lagu</button>
        </div>
        </section>
      </form>
  </body>
</html>
