<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $host = "localhost";
    $user = "id19051842_nabila";
    $pass = "Rizca.111002";
    $dbName = "id19051842_webmusik";
    $kon = mysqli_connect($host, $user, $pass);
    if (!$kon)
        die("Gagal Koneksi....");
    $hasil = mysqli_select_db($kon, $dbName);
    if (!$hasil) {
        $hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
        if (!$hasil)
            die("Gagal Buat Database");
        else
            $hasil = mysqli_select_db($kon, $dbName);
            if (!$hasil) die ("Gagal Konek Database");
    }
    $sqlTabelLagu = "CREATE TABLE IF NOT EXISTS lagu (
        id int auto_increment not null primary key,
        judul varchar(40) not null,
        penyanyi varchar(40) not null,
        tglrilis date,
        foto varchar(40) not null default '')"; 

mysqli_query ($kon, $sqlTabelLagu) or die ("Gagal Buat Tabel");
        
?>