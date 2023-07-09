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
<form method="post" action="add_aksi1.php">
	<table>
	<tr><td><h2>DELETE DATA OF TENANT</h2></td></tr>
	<tr><td><h3>Please add data for ternant!!</h3></td><tr><br>	
	<div class="container">
			<tr>			
				<th>Tenant_id :
				<input type="text" name="Tenant_id"></th>
			</tr>
			<tr>
				<th>Tenant_name : 
				<input type="name" name="Tenant_name"></th>
			</tr>
			<tr>
				<th>Tenant_address : 
				<input type="alamat" name="Tenant_address"></th>
			</tr>
            <tr>
				<th>Tenant_ktp_no : 
				<input type="number" name="Tenant_ktp_no"></th>
			</tr>
            <tr>
				<th>Tenant_phone : 
				<input type="number" name="Tenant_phone"></th>
			</tr>
            <tr>
				<th>Tenant_email : 
				<input type="email" name="Tenant_email"></th>
			</tr>
            <tr>
				<th>Tenant_emergcp : 
				<input type="name" name="Tenant_emergcp"></th>
			</tr>
            <tr>
				<th>Tenant_emergcp_phone : 
				<input type="number" name="Tenant_emergcp_phone"></th>
			</tr>
            <tr>
				<th>Tenant_emergcp_email : 
				<input type="email" name="Tenant_emergcp_email"></th>
			</tr>
            <tr>
				<th>Tenant_bankaccount :
				<input type="name" name="Tenant_bankaccount"></th>
			</tr>
            <tr>
				<th>Tenant_bankaccount_no :
				<input type="number" name="Tenant_bankaccount_no"></th>
			</tr>
			<tr>
				<th><input type="submit" value="Submit"></button>&nbsp<button><a href="index_admin.php">BACK</a></button></th>
			</tr>		
		</table>
	</form>
</div>
</body>
</html>

 

