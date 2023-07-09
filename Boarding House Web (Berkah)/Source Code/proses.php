<?php 
// koneksi database
include 'connection.php';

$a=$_POST['Tenant_id'];
$b=$_POST['Tenant_name'];
$c=$_POST['Tenant_address'];
$d=$_POST['Tenant_ktp_no'];
$e=$_POST['Tenant_phone']; 
$f=$_POST['Tenant_email'];
$g=$_POST['Tenant_emergcp']; 
$h=$_POST['Tenant_emergcp_phone']; 
$i=$_POST['Tenant_emergcp_email']; 
$j=$_POST['Tenant_bankaccount'];
$k=$_POST['Tenant_bankaccount_no'];


mysqli_query($koneksi,"insert into tenant values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");

// mengalihkan halaman kembali ke index.php
header("location:form_booking.php");