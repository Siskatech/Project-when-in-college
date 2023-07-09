<?php 
// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$a = $_POST['Book_id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from booking where Book_id='$a'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_admin.php");
 
?>