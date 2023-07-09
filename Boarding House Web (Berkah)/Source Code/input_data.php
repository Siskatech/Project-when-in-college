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

<!DOCTYPE html>
<html>
<head>
	<style>
	body{
        background-color: #5F9EA0;
        margin:2px;
        padding: 10px;
        background-size: cover;
        position:relative;  
    }
	.container{
        text-align : left;
        font-family:Footlight MT Light;
    }
	h2{
		text-align : center;
        font-family:Snap ITC;
		color:#FFFFF0;
    }
	tr td h3{
		text-align : left;
        font-family:Footlight MT Light;
		margin-left: 100px:
	}
	table{
		width: 35%;
		height: 80%;
        position: relative;
        margin : auto;
		padding: 10px;
        overflow-x: scroll;
		border:10px solid;
		border-color: #2F4F4F;
	}
	tr th{
		text-align : left;
        font-family:Footlight MT Light;	
		font-size: 20px;
		padding: 10px;
	}
	input{
		font-family:Footlight MT Light;	
		font-size: 20px;
	}
	a{
		font-family:Footlight MT Light;	
		font-size: 20px;
	}
	select{
		font-family:Footlight MT Light;	
		font-size: 20px;
	}
	</style>
</head>
<body>
<form method="post" action="display_aksi.php">
	<table>
	<tr><td><h2>ADD DATA OF BOOKING</h2></td></tr>
	<tr><td><h3>Please add data for booking!!</h3></td><tr><br>	
	<div class="container">
			<tr>			
				<th>Book_id : 
				<input type="text" name="Book_id" required="required" value="<?php echo $kodeKamar ?>" readonly></th>
			</tr>
			<tr>
				<th>Today's date : : 
				<input type="date" name=" Book_tr_date"></th>
			</tr>
			<tr>
				<th>Tenant_name : : 
				<select name="Tenant_name">
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
				</select>
				</th>
			</tr>
            <tr>
				<th>Room_label : 
				<select name="Room_label">
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
				</select>
				</th>
			</tr>
            <tr>
				<th>Start date : 
				<input type="date" name="Book_start_date"></th>
			</tr>
            <tr>
				<th>End date : 
				<input type="date" name="Book_end_date">
				</th>
			</tr>			
			<tr>
				<th><input type="submit" value="Submit"></button>&nbsp<button><a href="index_admin.php">BACK</a></button></th>
			</tr>		
		</table>
	</form>
</div>
</body>
</html>

<?php 
mysqli_close($conn);
?>