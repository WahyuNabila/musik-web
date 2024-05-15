<!DOCTYPE html>
<html>
<head>
	<title>PENCARIAN</title>
	<style type="text/css">
		body {
			font-family: "Times New Roman";
			background-color: #b5a598;
		}
		table {
			border: 1px solid #ddeeee;
			border-collapse: collapse;
			border-spacing: 0;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		th{
			background-color: #af6e4e;
			border: 1px solid #827265 ;
			padding: 20px;
			text-align: center;
			font-size: 20px;
			color: whitesmoke;
		}
		td {
			background-color: whitesmoke;
			border: 1px solid #827265;
			padding: 20px;
			text-align: left;
			font-size: 18px;
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
			text-align: right;
		}
		header .navbar a:hover{
    		color:var(--brown);
		}
		.form {
			margin-left: 100px;
			margin-top: 100px;
			font-size: 3rem;
			color: black;
		}
	</style>
</head>
<body>
<header>
      <center>
      <a class="logo">Temukan Lagu</a>
      </center>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="lagu_isi.php">Manage Song</a>
        <a href="lagu_tampil.php">Song List</a>
        <a href="cari_lagu.php">Find Song</a>
    </nav>
</header>
	<form class="form">
		<label>Kata Pencarian : </label>
		<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		<button type="submit">Cari</button>
	</form>

	<table>
		<thead>
			<tr>
				<th>Judul Lagu</th>
				<th>Nama Penyanyi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			//untuk meinclude kan koneksi
			include('koneksi.php');

				//jika kita klik cari, maka yang tampil query cari ini
				if(isset($_GET['kata_cari'])) {
					//menampung variabel kata_cari dari form pencarian
					$kata_cari = $_GET['kata_cari'];

					//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
					//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
					$query = "SELECT * FROM lagu WHERE judul like '%".$kata_cari."%' ORDER BY id ASC";
				} else {
					//jika tidak ada pencarian, default yang dijalankan query ini
					$query = "SELECT * FROM lagu ORDER BY id ASC";
				}
				

				$result = mysqli_query($kon, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($kon)." - ".mysqli_error($kon));
				}
				//kalau ini melakukan foreach atau perulangan
				while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row['judul']; ?></td>
				<td><?php echo $row['penyanyi']; ?></td>
			</tr>
			<?php
			}
			?>

		</tbody>
	</table>
</body>
</html>