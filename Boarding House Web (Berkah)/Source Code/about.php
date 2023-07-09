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
    <title>BOARDING HOUSE BERKAH</title>
</head>
<body>
    
    <!-- header -->
    <div class="medsos">
        <div class="container">
        <ul>
            <li><a href="">Cheap and Comfortable Room !!</a></li>
        </ul>
        </div>
    </div>
    
    <header>
        <div class="container">
        <h1><a href="index_tenant.php">BERKAH BOARDING HOUSE</a></h1>
        <ul>
            <li ><a href="index_tenant.php">HOME</a></li>
            <li class="active"><a href="about.php">ABOUT</a></li>
            <li><a href="info_index.php">INFORMATION ROOM</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="index_tenant.php?logout=true">Logout</a></li>
        </ul>
        </div>
    </header>

    <!-- Label -->
    <section class="label">
        <div class="container">
            <p>Home/About</p>
        </div>
    </section>

    <!-- About -->
    <div class="container">
        <section class="about">
            <img src="kost.PNG">
            <h2>ABOUT</h2>
            <p>&nbsp &nbsp Berkah boarding house is a boarding house that provides male and female rooms with separate locations. For women it is located on Jln. Gurinda No. 12B West Jakarta and Men is located on Jln. Gurinda No. 15C West Jakarta. This boarding house has been around since 2020 and is well known for its safety, comfort, and low prices.</p><br><br>

    </div>
    <div class="container">
    <div class="vimi">
    <h2>VISION & MISSION</h2>
            <p><b>Vision :</b> <br>
                To become the best boarding house provider, which prioritizes satisfying service and comfort for boarding house residents.</p><br>
                    
            <p><b>Mission :</b><br>
                    1. Implement strategic promotion measures to introduce the company to residents/consumers<br>
                    2. Provide a comfortable and safe boarding house.<br>
                    3. Provide the best service to boarding house residents<br>
                    4. Always committed to maintaining the trust of the boarding house residents.</p> 
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