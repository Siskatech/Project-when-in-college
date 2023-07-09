<?php
include 'connection.php';
// menyimpan data kedalam variabel
$id = $_POST['Room_id'];
$label = $_POST['Room_label'];
$location = $_POST['Room_location'];
$window = $_POST['Room_window'];
$monthly_price = $_POST['Room_monthly_price'];
$availability = $_POST['Room_availability'];
$description= $_POST['Room_description'];

// query SQL untuk insert data
$query="UPDATE room_data SET Room_id='$id',Room_label='$label',Room_location='$location',Room_window='$window',Room_monthly_price='$monthly_price',Room_availability='$availability',Room_description='$description' where Room_id='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index_admin.php");
?>