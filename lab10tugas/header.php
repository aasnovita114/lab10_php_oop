<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contoh Modularisasi</title>
  <style>
    body {
    font-family: Tahoma, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  
  .container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: grid;
    justify-content: center;
    border-radius: 20px;
  }
  
  nav {
      background: rgb(100, 149, 237);
      margin: 0;
      padding: 8px;
  }
  
  a {
      text-decoration: none;
      padding: 5px;
      color: #cef3e2;
  }
  
  table {
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  th,
  td {
    border: 1px black solid;
    padding: 7px;
  }
  
  img {
    width: 100px;
  }
  
  .about-img img {
    width: 200px;
    border-radius: 50%;
  }
  
  .tambah, .hapus, .ubah{
    text-decoration: none;
    background-color: rgb(100, 149, 237);
    margin: 2px;
    color: #fff;
    border-radius: 5px;
    padding: 5px;
    font-size: 12px;
  }
  
  a:hover {
    background-color: rgb(135, 206, 250);
    transform: scale(0.98);
    color: aliceblue;
  }
  
  nav a:hover {
    border-radius: 5px;
    padding: 10px;
  }
  
  footer {
      background: darkgray;
      margin-top: 20px;
      border-radius: 0 0 15px 15px;
  }
  
  h1 {
      background:  rgb(164, 211, 253);
      margin-bottom: 0;
      padding: 10px;
      color: #fff;
      border-radius: 15px 15px 0 0;
  }
  
  .modular-list, .modular{
    text-align: left;
  }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Modularisasi Menggunakan Require</h1>
    </header>
    <nav>
      <a href="home.php">Home</a>
      <a href="about.php">Tentang</a>
      <a href="index.php">Data barang</a>
    </nav>
    