<?php
require_once 'connection.php';

if(isset($_POST['submit'])){
  $Book_id = $_POST['Book_id'];
	$Room_label = $_POST['Room_label'];
	$Tenant_name = $_POST['Tenant_name'];
	$Book_start_date= $_POST['Book_start_date'];
	$Book_end_date= $_POST['Book_end_date'];
	$Book_tr_date = $_POST['Book_tr_date'];

	$query = mysqli_query($koneksi,"SELECT*FROM booking WHERE Room_label ='$Room_label' AND Book_end_date>'$Book_end_date'");

    $rows = mysqli_num_rows($query);
    
    if($rows>0) {
        echo "<script>alert('Sorry, this room is already booked at this date😢. You can reservation again in other room😊'); window.location.href='form_booking.php'</script>";
    }
    else {
    $q = $koneksi->query("INSERT INTO booking VALUES ('$Book_id','$Room_label','$Tenant_name','$Book_start_date','$Book_end_date','$Book_tr_date')");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Your Reservation Successfull😊'); window.location.href='invoice-form.php'</script>"; //link ke display booking
      } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Your Reservation Failed😢'); window.location.href='form_booking.php'</script>";
      }
    }
}
?>
    