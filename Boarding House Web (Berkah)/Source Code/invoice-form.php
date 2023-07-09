<?php
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "php";

$conn = new mysqli($host, $user, $password, $database);

if($conn -> connect_error){
    die("Connection failed". $conn->connect_error);
	}

$result1 = mysqli_query($conn, "SELECT Tenant_name FROM tenant ORDER BY Tenant_name");


?>

<?php
	
	include 'connection.php';
// mengambil data barang dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(invoiceID) as kodeauto FROM invoice");
	$data1 = mysqli_fetch_array($query);
	$kodeKamar = $data1['kodeauto'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodeKamar, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
  
	$huruf = "ENV";
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
		<div class="regform"><h6>Invoice Form</h6></div>
		<div class="main">
		<form method='POST' action='invoice-aksi.php'>
			<h4>Please fill column with correct values</h4>

			<h5>Invoice ID :
            <input type="text" class="edit1" id="invoiceID" name="invoiceID" required="required" value="<?php echo $kodeKamar ?>" readonly></h5><br>
					
			<h5>Name :
			<select name="Tenant_name" class="inv2" id="Tenant_name">
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
					
			<h5>Company Name : 
			<input type='text' class="inv3" id="company" name='company'></h5><br>

			<h5>Address :
			<input type='text' class="inv4"id="Tenant_address" name='Tenant_address'></h5><br>
			
			<h5>City, ST ZIP Code : 
			<input type='text' class="inv5"id="Zip_code" name='Zip_code' /></h5><br>
			
			<h5>Phone : 
			<input type='text' class="inv6" id="Tenant_phone" name='Tenant_phone' /></h5><br>
			
			<h5>Invoice date :
			<input type='date' class="inv7" id="date" name='date' /></h5><br>

			<!-- Data of Table -->
			<h4>ITEM </h4>
			<h5>Name Rent :
			<input type='text' class="edit1" id="itemname" name='itemname' /></h5><br>
			
			<h5>Number of months : 
			<input type='number' class="inv8" id="month" name='month' /></h5><br>
			
			<h5>Price : 
			Rp. <input type='number' class="inv4" id="price" name='price' /></h5><br>
			
			<h5>Item Other : 
			Rp. <input type='number' class="inv9" id="other" name='other' /></h5><br>

			<input type="submit"  class="edit" value="Save">&nbsp<button class="edit"><a href="info_index.php">Back</a></button><br>
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