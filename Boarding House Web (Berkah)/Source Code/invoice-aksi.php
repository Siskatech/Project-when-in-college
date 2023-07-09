<?php 
// koneksi database
require 'connection.php';
 
// menangkap data yang di kirim dari form
$a = $_POST['invoiceID'];
$b = $_POST['Tenant_name'];
$c = $_POST['company'];
$d = $_POST['Tenant_address'];
$e = $_POST['Zip_code'];
$f = $_POST['Tenant_phone'];
$g = $_POST['date'];
$h = $_POST['itemname'];
$i = $_POST['month'];
$j = $_POST['price'];
$k = $_POST['other'];
 
// menginput data ke database
mysqli_query($koneksi,"INSERT INTO invoice VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");  

// mengalihkan halaman kembali ke index.php
header("location:invoice-result.php");

?>