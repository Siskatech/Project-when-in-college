<?php
include 'connection.php';
$mahasiswa  = mysqli_query($koneksi, "select * from tenant");
$d        = mysqli_fetch_array($mahasiswa);

// membuat function untuk set aktif radio button
function active_radio_button($value,$input){
    // apabilan value dari radio sama dengan yang di input
    $result =  $value==$input?'checked':'';
    return $result;
}
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
<form method="post" action="update1.php">
    <input type="hidden" value="Tenant_id" name="Tenant_id">
	<table>
	<tr><td><h2>UPDATE DATA OF TENANT</h2></td></tr>
	<tr><td><h3>Please input data if you want to update😊</h3></td><tr><br>	
	<div class="container">
			<tr>			
				<th>Tenant_id : 
				<input type="text" value="<?php echo $d['Tenant_id'];?>" name="Tenant_id"></th>
			</tr>
			<tr>
				<th>Tenant_name : 
				<input type="text" value="<?php echo $d['Tenant_name'];?>" name="Tenant_name"></th>
			</tr>
            <tr>
				<th>Tenant_address : 
				<input type="text" value="<?php echo $d['Tenant_address'];?>" name="Tenant_address"></th>
			</tr>
            <tr>
				<th>Tenant_ktp_no : 
				<input type="number" value="<?php echo $d['Tenant_ktp_no'];?>" name="Tenant_ktp_no"></th>
			</tr>
			<tr>
				<th>Tenant_phone : 
				<input type="number" value="<?php echo $d['Tenant_phone'];?>" name="Tenant_phone"></th>
			</tr>
            <tr>
				<th>Tenant_email : 
				<input type="text" value="<?php echo $d['Tenant_email'];?>" name="Tenant_email"></th>
			</tr>
            <tr>
				<th>Tenant_emergcp : 
				<input type="text" value="<?php echo $d['Tenant_emergcp'];?>" name="Tenant_emergcp"></th>
			</tr>
            <tr>
				<th>Tenant_emergcp_phone : 
				<input type="number" value="<?php echo $d['Tenant_emergcp_phone'];?>" name="Tenant_emergcp_phone"></th>
			</tr>
            <tr>
				<th>Tenant_emergcp_email : 
				<input type="text" value="<?php echo $d['Tenant_emergcp_email'];?>" name="Tenant_emergcp_email"></th>
			</tr>
            <tr>
				<th>Tenant_bankaccount : 
				<input type="text" value="<?php echo $d['Tenant_bankaccount'];?>" name="Tenant_bankaccount"></th>
			</tr>
            <tr>
				<th>Tenant_bankaccount_no : 
				<input type="number" value="<?php echo $d['Tenant_bankaccount_no'];?>" name="Tenant_bankaccount_no"></th>
			</tr>
			<tr>
				<th><input type="submit" value="Submit"></button>&nbsp<button><a href="index_admin.php">BACK</a></button></th>
			</tr>		
		</table>
	</form>
</div>
</body>
</html>



