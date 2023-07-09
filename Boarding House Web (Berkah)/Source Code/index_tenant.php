<?php
    session_start();

    if(!isset($_SESSION['userlogin'])){
        header("location:login.php");
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href='css2.css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    
    <title>BOARDING HOUSE BERKAH</title>
</head>
<body>
    
    <!-- header -->
    <div class="medsos">
        <div class="container">
        <ul>
            <li><a href="#">Cheap and Comfortable Room !!</a></li>
        </ul>
        </div>
    </div>
    
    <header>
        <div class="container">
        <h1><a href="index_tenant.php">BERKAH BOARDING HOUSE</a></h1>
        <ul>
            <li class="active"><a href="index_tenant.html">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="info_index.php">INFORMATION ROOM</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="index_tenant.php?logout=true">Logout</a></li>
        </ul>
        </div>
    </header>

    <!-- banner -->
    <section class="banner">
        <h1>WELCOME TO BOARDING HOUSE BERKAH</h1>
    </section>

    <!-- About -->
    <div class="container">
        <section class="about">
            <h3>ABOUT</h3>
            <p class="neat">&nbsp &nbsp Berkah boarding house is a boarding house that provides male and female rooms with separate locations. For women it is located on Jln. Gurinda No. 12B West Jakarta and Putra is located on Jln. Gurinda No. 15C West Jakarta. This boarding house has been around since 2020 and is well known for its safety, comfort, and low prices.</p><br>
       
    </div>

     <!-- Detail Room -->
     <section class="info">
         <div class="container">
             <h3>INFORMATION ROOM</h3>
           <div class="box">
               <div class="col-4">
               <div class="icon"><a href="info1.php"><i class="fa-solid fa-house-laptop"></i></a></div>
               <h6><a href="info1.php">Room</a></h6>
           </div>
           <div class="col-4">
            <div class="icon"><a href="info.php"><i class="fa-solid fa-person-shelter"></i></a></div>
            <h6><a href="info.php">Available Room</a></h6>
        </div>
        <div class="col-4">
            <div class="icon"><a href="form_tenant.php"><i class="fa-solid fa-list-check"></i></a></div>
            <h6><a href="form_tenant.php">Registration Form</a></h6>
        </div>
        <div class="col-4">
            <div class="icon"><a href="invoice-form.php"><i class="fa-solid fa-file-invoice"></i></a></div>
            <h6><a href="invoice-form.php">Payment</a></h6>
        </div>
           </div>
        </div>

     <!-- Footer -->
     <footer>
         <div class="container">
             <small>Copyright &copy; 2022. BOARDING HOUSE BERKAH, All Rights Reserved.</small>
         </div>
     </footer>

</body>
</html>