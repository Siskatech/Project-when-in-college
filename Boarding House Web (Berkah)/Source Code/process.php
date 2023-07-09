<?php
require_once('connection.php');
?>
<?php
if(isset($_POST)){
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $phonenumber    = $_POST['phonenumber'];
    $password       = $_POST['password'];

    $sql= mysqli_query($koneksi,"INSERT INTO users values('$firstname','$lastname','$email','$phonenumber','$password')");
    
    if($sql){
        echo 'Successfully saved';
        
    }else{
        echo 'There were errors while saving the data';
    }
}else{
    echo "No data";
}
?>
