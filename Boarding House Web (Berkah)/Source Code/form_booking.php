<?php
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "php";

$conn = new mysqli($host, $user, $password, $database);

if($conn -> connect_error){
    die("Connection failed". $conn->connect_error);
}

$result = mysqli_query($conn, "SELECT Room_label FROM room_data ORDER BY Room_label");
$result1 = mysqli_query($conn, "SELECT Tenant_name FROM tenant ORDER BY Tenant_name");

?>
<?php
	
	include 'connection.php';
// mengambil data barang dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(Book_id) as kodeauto FROM booking");
	$data1 = mysqli_fetch_array($query);
	$kodeKamar = $data1['kodeauto'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodeKamar, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
  
	$huruf = "RM";
	$kodeKamar = $huruf . sprintf("%03s", $urutan);
?>

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
		<h1>Registration Form</h1>
		<div class="regform"><h6>Registration For Booking Room</h6></div>
		<div class="main">
		<form method="post" action="proses_booking.php">
			<h4>Please fill column with correct values</h4>

			<h5>Book_id : 
            <input type="text" class="booking1" id="Book_id" name="Book_id" required="required" value="<?php echo $kodeKamar ?>" readonly></h5><br>

			<h5>Today's date :
			<input type="date" class="booking2" id="Book_tr_date" name=" Book_tr_date"></h5><br>
					
			<h5>Tenant_name : 
			<select name="Tenant_name" class="booking3" id="Tenant_name">
				<?php
				$i = 0;
				while($row = mysqli_fetch_array($result1)){
					?>
					<option value="<?=$row["Tenant_name"];?>">
					<?=$row["Tenant_name"];?></option>
					<?php
					$i++;
				}
				?>
			</select></h5><br>

			<h5>Room_label :
			<select name="Room_label" class="booking4" id="Room_label">
				<?php
				$i = 0;
				while($row = mysqli_fetch_array($result)){
					?>
					<option value="<?=$row["Room_label"];?>">
					<?=$row["Room_label"];?></option>
					<?php
					$i++;
				}
				?>
			</select></h5><br>
			
			<h5> Start date :
			<input type="date" class="booking5" id="Book_start_date" name="Book_start_date"></h5><br>
			
			<h5>End date : 
			<input type="date" class="booking6" id="Book_end_date" name="Book_end_date"></h5><br>

			<input type="submit" name="submit" class="edit" value="Save">&nbsp<button class="edit"><a href="form_tenant.php">Back</a></button><br>
		</form>
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
 
<?php 
mysqli_close($conn);
?>