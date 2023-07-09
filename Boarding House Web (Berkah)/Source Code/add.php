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
<form method="post" action="add_aksi.php">
	<table>
	<tr><td><h2>ADD DATA OF ROOM</h2></td></tr>
	<tr><td><h3>Please add data for room!!</h3></td><tr><br>	
	<div class="container">
			<tr>			
				<th>Room_id : 
				<input type="text" name="Room_id"></th>
			</tr>
			<tr>
				<th>Room_label : 
				<input type="name" name="Room_label"></th>
			</tr>
			<tr>
				<th>Room_location : 
				<select name="Room_location">
						<option value="1st floor">1st floor</option>
						<option value="2nd floor">2nd floor</option>
					 </select>
				</th>
			</tr>
            <tr>
				<th>Room_window : 
				<select name="Room_window">
						<option value="facing swimming pool">facing swimming pool</option>
						<option value="facing hallway">facing hallway</option>
						<option value="facing garden">facing garden</option>
					 </select>
				</th>
			</tr>
            <tr>
				<th>Room_monthly_price : 
				<input type="number" name="Room_monthly_price"></th>
			</tr>
            <tr>
				<th>Room_availability : 
				<select name="Room_availability">
						<option value="Available">Available</option>
						<option value="No Available">No Available</option>
					 </select>
				</th>
			<tr>
				<th>Room_description : 
				<input type="text" name="Room_description"></th>
			</tr>
			<tr>
				<th><input type="submit" value="Submit"></button>&nbsp<button><a href="index_admin.php">BACK</a></button></th>
			</tr>		
		</table>
	</form>
</div>
</body>
</html>