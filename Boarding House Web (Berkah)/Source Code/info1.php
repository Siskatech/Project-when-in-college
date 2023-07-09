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
            <li class="active"><a href="info_index.php">INFORMATION ROOM</a></li>
            <li ><a href="contact.php">CONTACT</a></li>
            <li><a href="index_tenant.php?logout=true">Logout</a></li>
        </ul>
        </div>
    </header>

    <!-- Label -->
    <section class="label">
        <div class="container">
            <p>Home/Information Room</p>
        </div>
    </section>

    <!-- Detail Room -->
    <section class="info">
        <div class="container">
            <h1>ROOM</h1>
            <div class="room">
            <div class="column">
                <div class="picture1"><img src="hall.jpg"></div>
                <h4>Room which window facing hallway</h4>
            </div>
            <div class="column">
                <div class="picture2"><img src="garden.jpg".jpg"></div>
                <h4>Room which window facing garden</h4>
            </div>
            <div class="column">
                <div class="picture3"><img src="pool.jpg"></div>
                <h4>Room which window facing Swimming Pool</h4>
            </div>
            </div>

            <p><b>Description :</b><br>
            &nbsp &nbsp Berkah boarding house is a boarding house that provides rooms for women and men with men labeled M1 to M10, and women labeled W1 to W10. Some rooms have windows facing out, some rooms have windows facing the hallway. Some rooms are located on the first floor, some are located on the second floor.</p>
            <ul>   
               Facility:
               <li>Single bed </li>
               <li>Mattress </li>
               <li>Bed sheet</li> 
               <li>Pillow</li>
               <li>A pillowcase</li>
               <li>Table</li>
               <li>Chair</li>
               <li>Cupboard</li>
               <li>1 light bulb</li>
               <li>1 air conditioner</li>
               <li>Trash can</li>
               <li>A windows</li>
               <li>Private bathroom</li>
           </ul> <br> 
               <ul>
                   Price:
                   <li>Rental fee Rp. 1.000.000/month</li>
                   <li>Deposit Rp. 1.000.000 (will be returned when the tenant
                       no longer renting a room).</li>
           </ul><br>
           <ul>  
               Rules in the boarding house:
               <li>Boarding out limit 12:00 PM</li>
               <li>Tenants who damage goods (owned by the boarding house) must pay a fine that can be deducted from the property
                   deposit:
                   <ul class="circle">
                   <li>Broken bed => Rp. 1.500.000</li>
                   <li>Broken mattress => Rp. 500.000</li>
                   <li>Damaged pillow => Rp. 100.000</li> 
                   <li>Light bulb => Rp. 30.000</li> 
                   <li>Tables/chairs/cupboards => Rp. 150.000</li> 
                   <li>AC => Rp. 1.500.000</li> 
                   <li>Trash can => Rp. 25.000</li> 
                   <li>Window => Rp. 1.000.000</li> 
                   </ul>
               </li>
           </ul> 
           <p><b>Location :</b><br>
            Women : Jl. P. Polem No.126, Kisaran Kota, Kec. West Kisaran City, Asahan Regency, North Sumatra 21215 <br>
           Men : Jl. P. Polem No.127, Kisaran Kota, Kec. West Kisaran City, Asahan Regency, North Sumatra 21215</p> 
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