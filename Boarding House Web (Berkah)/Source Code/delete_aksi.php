<?php 
// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$id = $_POST['Room_id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from room_data where Room_id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_admin.php");
 
?>