<?php
include 'connection.php';
$mahasiswa  = mysqli_query($koneksi, "select * from room_data");
$d        = mysqli_fetch_array($mahasiswa);

// membuat function untuk set aktif radio button
function active_radio_button($value,$option){
    // apabilan value dari radio sama dengan yang di input
    $result =  $value==$option?'checked':'';
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
<form method="post" action="update.php">
 <input type="hidden" value="Room_id" name="Room_id">
	<table>
	<tr><td><h2>UPDATE DATA OF ROOM</h2></td></tr>
	<tr><td><h3>Please input data if you want to update😊</h3></td><tr><br>	
	<div class="container">
			<tr>			
				<th>Room_id : 
				<input type="text" value="<?php echo $d['Room_id'];?>" name="Room_id"></th>
			</tr>
			<tr>
				<th>Room_label : 
				<input type="text" value="<?php echo $d['Room_label'];?>" name="Room_label"></th>
			</tr>
			<tr>
				<th>Room_location :
                <select name="Room_location"> 
                        <option value="1st floor" <?php echo active_radio_button("1st floor", $d['Room_location'])?>>1st floor</option>
                        <option value="2nd floor" <?php echo active_radio_button("2nd floor", $d['Room_location'])?>>2nd floor</option>
                </select>
				</th>
			</tr>
            <tr>
				<th>Room_window : 
                <select name="Room_window">
				        <option value="facing swimming pool" <?php echo active_radio_button("facing swimming pool", $d['Room_window'])?>>facing swimming pool</option>
                        <option value="facing hallway" <?php echo active_radio_button("facing hallway", $d['Room_window'])?>>facing hallway</option>
						<option value="facing garden" <?php echo active_radio_button("facing garden", $d['Room_window'])?>>facing garden</option>
                </select>
                </th>
			</tr>
            <tr>
				<th>Room_monthly_price : 
				<input type="text" value="<?php echo $d['Room_monthly_price'];?>" name="Room_monthly_price"></th>
			</tr>
            <tr>
				<th>Room_availability :
                <select name="Room_availability"> 
				        <option value="Available" <?php echo active_radio_button("Available", $d['Room_availability'])?>>Available</option>
                        <option value="No Available" <?php echo active_radio_button("No Available", $d['Room_availability'])?>>No Available</option>
                </select>
                    </th>
			<tr>
				<th>Room_description : 
				<input type="text" value="<?php echo $d['Room_description'];?>" name="Room_description"></th>
			</tr>
			<tr>
				<th><input type="submit" value="Submit"></button>&nbsp<button><a href="index_admin.php">BACK</a></button></th>
			</tr>		
		</table>
	</form>
</div>
</body>
</html>