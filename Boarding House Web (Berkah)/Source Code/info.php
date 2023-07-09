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
            <h1>AVAILABLE ROOM</h1>
           <b><label> Data of Available Room</label></b>
           <div class="available">
            <table border="1">
                <tr><th>Room_id </th><th>Room_label</th><th>Room_location</th><th>Room_window</th><th>Room_monthly_price</th><th>Room_availability</th><th>Room_description</th></tr>
                <?php
                include 'connection.php';
                $data = mysqli_query($koneksi,"select * from room_data");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                            <td><?php echo $d['Room_id']; ?></td>
                            <td><?php echo $d['Room_label']; ?></td>
                            <td><?php echo $d['Room_location']; ?></td>
                            <td><?php echo $d['Room_window']; ?></td>
                            <td><?php echo $d['Room_monthly_price']; ?></td>
                            <td><?php echo $d['Room_availability']; ?></td>
                            <td><?php echo $d['Room_description']; ?></td>
                        </tr>
                    <?php 
                    }
                    ?>
            </table>
            </div>
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