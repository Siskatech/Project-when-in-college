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
            <li ><a href="about.php">ABOUT</a></li>
            <li ><a href="info_index.php">INFORMATION ROOM</a></li>
            <li class="active"><a href="contact.php">CONTACT</a></li>
            <li><a href="index_tenant.php?logout=true">Logout</a></li>
        </ul>
        </div>
    </header>

    <!-- Label -->
    <section class="label">
        <div class="container">
            <p>Home/Contact</p>
        </div>
    </section>

    <!-- Detail Room -->
    <section class="info">
        <div class="container">
            <h2>CONTACT INFO</h2>
          <div class="box1">
              <div class="col-4">
              <h6>Address</h6>
              <p><b>Women :</b> Jl. P. Polem No.126, Kisaran Kota, Kec. West Kisaran City, Asahan Regency, North Sumatra 21215<br>
                 <b>Men :</b> Jl. P. Polem No.127, Kisaran Kota, Kec. West Kisaran City, Asahan Regency, North Sumatra 21215</p>
          </div>
            <div class="col-4">
            <h6>Email</h6>
            <p>Boarding.House.Berkah@gmail.com</p>
            </div>
            <div class="col-4">
            <h6>Handphone</h6>
            <p>082364510307</p>
            </div>
          </div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31875.47335766348!2d99.61294154576193!3d2.9769293112384934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30324b3121ba6849%3A0x8cf28cc11b3d3df!2sBerkah%20inn!5e0!3m2!1sid!2sid!4v1651335940085!5m2!1sid!2sid" width="1300" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </section>
    

     <!-- Footer -->
     <footer>
         <div class="container">
             <small>Copyright &copy; 2022. BOARDING HOUSE BERKAH, All Rights Reserved.</small>
         </div>
     </footer>
</body>
</html>