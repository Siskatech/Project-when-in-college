<?php 
// koneksi database
include 'connection.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['Room_id'];
$label = $_POST['Room_label'];
$location = $_POST['Room_location'];
$window = $_POST['Room_window'];
$monthly_price = $_POST['Room_monthly_price'];
$availability = $_POST['Room_availability'];
$description= $_POST['Room_description'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into room_data values('$id','$label','$location','$window','$monthly_price','$availability','$description')");  
 
// mengalihkan halaman kembali ke index.php
header("location:index_admin.php");
 
?>