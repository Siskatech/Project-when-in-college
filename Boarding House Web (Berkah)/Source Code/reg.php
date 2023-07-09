<?php
require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> User Registration</title>
    <style>
        body{
            margin:0;
            padding:0;
            height: 100%;
            background-image: url(house2.png);
            background-size: 100% 110%;
            background-repeat: no-repeat;
            background-attachment: fixed;  

        }
        .container{
            font-family:Footlight MT Light;
        }
        input{
            font-family:Footlight MT Light; 
            font-size: 18px;
        }
        .regform{
            width:600px;
            background-color: #008B8B;
            margin:auto;
            color:#FFFFFF;
            padding:10px 0px 10px 0px;
            border-radius: 15px 15px 0px 0px;
            margin-top:170px; 
        }
        .regform h1{
            font-size: 25px;
            font-family:Footlight MT Light;
            text-align:center;
        }
        .main{
            background-color: #b8d9e1a3;
            width:600px;
            margin:auto;
        }
        form{
            padding:10px;
        }
        h4{
            font-family:Footlight MT Light;
            text-align: left;
            font-size: 20px;
            margin-left: 60px;
            
        }
        h5{
            font-family:Footlight MT Light;
            text-align: left;
            font-size: 18px;
            margin-left: 60px;
        }
        .edit{
            position:relative;
            left:58px;
            top:3px;
            line-height:30px;
            width:90px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
            color:rgb(5, 6, 6);
            border: none;
        }
        .edit1{
            position:relative;
            left:90px;
            top:2px;
            line-height:30px;
            width:200px;
            border-radius:6px;
            padding:0 10px;
            font-size:16px;
            color:#555;
        }
        .edit2{
            position:relative;
            left:95px;
            top:2px;
            line-height:30px;
            width:200px;
            border-radius:6px;
            padding:0 10px;
            font-size:16px;
            color:#555;
        }
        .edit3{
            position:relative;
            left:130px;
            top:2px;
            line-height:30px;
            width:200px;
            border-radius:6px;
            padding:0 10px;
            font-size:16px;
            color:#555;
        }
        .edit4{
            position:relative;
            left:60px;
            top:2px;
            line-height:30px;
            width:200px;
            border-radius:6px;
            padding:0 10px;
            font-size:16px;
            color:#555;
        }
        .edit5{
            position:relative;
            left:100px;
            top:2px;
            line-height:30px;
            width:200px;
            border-radius:6px;
            padding:0 10px;
            font-size:16px;
            color:#555;
        }

    </style>

</head>
<body>
        <div class="container">
                <div class="regform"><h1> Registration</h1></div>

            <div class="main">
            <form action="login.php" method="post">
                <h4>Please fill up the form with correct values.</h4>
                
                <h5 for="firstname"> First Name :
                <input class="edit1" id="firstname" type="text" name="firstname" required></h5>
                
                <h5 for="lastname">Last Name :
                <input class="edit2" id="lastname" type="text" name="lastname" required></h5>

                <h5 for="email">Email :
                <input class="edit3" id="email" type="email" name="email" required></h5>

                <h5 for="phonenumber">Phone Number :
                <input class="edit4" id="phonenumber" type="text" name="phonenumber" required></h5>

                <h5 for="password">Password :
                <input class="edit5" id="password" type="password" name="password" required></h5>
                
              
                <input class="edit" type="submit" id="register" name="create" value="Sign Up"> &nbsp <a href="login.php"><button class="edit"><a href="login.php">Back</a></button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    function myFunction(){
        location.replace("login.php");
    }
    $(function(){
      $('#register').click(function(e){
        var valid = this.form.checkValidity();
        if(valid){
            var firstname   = $('#firstname').val();
            var lastname    = $('#lastname').val();
            var email       = $('#email').val();
            var phonenumber = $('#phonenumber').val();
            var password    = $('#password').val();

            e.preventDefault();

            $.ajax({
                type:'POST',
                url: 'process.php',
                data: {firstname:firstname,lastname:lastname,email:email,phonenumber:phonenumber, password: password},
                success:function(data){
                    Swal.fire({
                    title: 'Successfully',
                    text: data,
                    type: 'success'
                    })
                },
                error:function(data){
                    Swal.fire({
                    title: 'Errors',
                    text: 'There were errors while saving the data',
                    type: 'error'  
                    })
                }
            });
        }else{
            alert('You can fill column first');
        }
 
      });

     
    });
    </script>
</body>
</html>