<?php
include 'connection.php';
// menyimpan data kedalam variabel
$a = $_POST['Tenant_id'];
$b = $_POST['Tenant_name'];
$c = $_POST['Tenant_address'];
$d = $_POST['Tenant_ktp_no'];
$e = $_POST['Tenant_phone'];
$f = $_POST['Tenant_email'];
$g = $_POST['Tenant_emergcp'];
$h = $_POST['Tenant_emergcp_phone'];
$i = $_POST['Tenant_emergcp_email'];
$j = $_POST['Tenant_bankaccount'];
$k = $_POST['Tenant_bankaccount_no'];

// query SQL untuk insert data
$query="UPDATE tenant SET Tenant_id='$a',Tenant_name='$b',Tenant_address='$c',Tenant_ktp_no='$d',Tenant_phone='$e',Tenant_email='$f',Tenant_emergcp='$g',Tenant_emergcp_phone='$h',Tenant_emergcp_email='$i',Tenant_bankaccount='$j',Tenant_bankaccount_no='$k' where Tenant_id='$a'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index_admin.php");
?>