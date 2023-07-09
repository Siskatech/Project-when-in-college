<?php
session_start();
require_once('connection.php');

$email= $_POST['email'];
$password= $_POST['password'];
 
$sql= mysqli_query($koneksi,"SELECT*FROM users WHERE email = '$email'  AND password = '$password' LIMIT 1");

if($sql){
    $user = mysqli_fetch_array($sql);
    if($user > 0){
        $_SESSION['userlogin'] = $user;
        echo "Oke, thank you";
        }else{
        echo 'Username or Password has an error';
    }
}else{
    echo "There were errors while connecting to database";
}

?>

