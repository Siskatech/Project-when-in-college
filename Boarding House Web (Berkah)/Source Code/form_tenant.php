<?php
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "php";

$conn = new mysqli($host, $user, $password, $database);

if($conn -> connect_error){
    die("Connection failed". $conn->connect_error);
}
?>

<?php
	include 'connection.php';

	$query = mysqli_query($koneksi, "SELECT max(Tenant_id) as kodeauto FROM tenant");
	$data1 = mysqli_fetch_array($query);
	$kodeKamar = $data1['kodeauto'];
 
	$urutan = (int) substr($kodeKamar, 3, 3);
	$urutan++;
  
	$huruf = "00";
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
		<div class="regform"><h6>Registration Form</h6></div>
		<div class="main">
		<form method="post" action="proses.php">
			<h4>Please fill column with correct values</h4>

			<h5>Tenant_id : 
            <input type="number" class="edit1" name="Tenant_id" required="required" value="<?php echo $kodeKamar ?>" readonly></h5><br>

			<h5>ID Card :
			<input type="number" class="edit2" name="Tenant_ktp_no"></h5><br>
					
			<h5>Name : 
			<input type="text" class="edit3" name="Tenant_name"></h5><br>
					
			<h5>Gender : 
			<select name="Gender" class="edit4">
					<option value="Female">Female</option>
					<option value="Male">Male</option>
			</select></h5><br>

			<h5>Address :
			<input type="alamat" class="edit2" name="Tenant_address"></h5><br>
			
			<h5>Phone : 
			<input type="number" class="edit3" name="Tenant_phone"></h5><br>
			
			<h5>Email : 
			<input type="email" class="edit7" name="Tenant_email"></h5><br>
			
			<h5>Name Emergcp : 
			<input type="name" class="edit5" name="Tenant_emergcp"></h5><br>
			
			<h5>Emergcp_phone : 
			<input type="number" class="edit8" name="Tenant_emergcp_phone"></h5><br>
			
			<h5>Emergcp_email : 
			<input type="email" class="edit5" name="Tenant_emergcp_email"></h5><br>
			
			<h5>Name bankaccount : 
			<input type="name" class="edit6" name="Tenant_bankaccount"></h5><br>
			
			<h5>Bankaccount_no : 
			<input type="number" class="edit8" name="Tenant_bankaccount_no"></h5><br>

			<input type="submit" class="edit" value="Save">&nbsp<button class="edit"><a href="info_index.php">Back</a></button><br>
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
