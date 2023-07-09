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

    h2{
        text-align : center;
        font-family: Snap ITC;
        margin-top:50px;
        padding:10px;
        color:#FFFFF0;
    }

    .container{
        text-align : left;
        font-family:Footlight MT Light;
    }
    .font{
        font-size: 25px;
        font-weight: 600;
        margin-left: 12px;
    }

    .font1{
        margin-left: 10px;
    }
    table{
        width: 80%;
        position: left;
        margin : 3px;
        overflow-x: scroll;
    }
    tr th{
        background-color: #008B8B;
    }

    tr td{
        text-align : center;
        background-color:#fff;
    }
</style>
</head>
<body>
<div class="container">
<h2>THIS IS DISPLAY DATA OF BOARDING HOUSE BERKAH</h2>

<!-- Table Of Room -->
<p class="font">Data Of Room</p>
<div class="font1">
    <a href="add.php">+ Add Data</a>&nbsp 
    <a href='edit.php?room_data=$d[room_data]'>Update</a>&nbsp 
    <a href="delete.php">Delete</a>
</div><br>
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
<br><br>

<!-- Table Of Tenant -->
<p class="font">Data Of Tenant</p>
<div class="font1">
	<a href="add1.php">+ Add Data</a>&nbsp 
    <a href='edit1.php?tenant=$d[tenant]'>Update</a>&nbsp 
    <a href="delete1.php">Delete</a>
</div><br>
<table border="1">
    <tr><th>Tenant_id </th><th>Tenant_name</th><th>Tenant_address</th><th>Tenant_ktp_no</th><th>Tenant_phone</th><th>Tenant_email</th><th>Tenant_emergcp</th><th>Tenant_emergcp_phone</th><th>Tenant_emergcp_email</th><th>Tenant_bankaccount</th><th>Tenant_bankaccount_no</th></tr>
    <?php
    include 'connection.php';
    $data = mysqli_query($koneksi,"select * from tenant");
		while($d = mysqli_fetch_array($data)){
	?>
    <tr>
				<td><?php echo $d['Tenant_id']; ?></td>
				<td><?php echo $d['Tenant_name']; ?></td>
				<td><?php echo $d['Tenant_address']; ?></td>
                <td><?php echo $d['Tenant_ktp_no']; ?></td>
                <td><?php echo $d['Tenant_phone']; ?></td>
                <td><?php echo $d['Tenant_email']; ?></td>
                <td><?php echo $d['Tenant_emergcp']; ?></td>
                <td><?php echo $d['Tenant_emergcp_phone']; ?></td>
                <td><?php echo $d['Tenant_emergcp_email']; ?></td>
                <td><?php echo $d['Tenant_bankaccount']; ?></td>
                <td><?php echo $d['Tenant_bankaccount_no']; ?></td>
			</tr>
		<?php 
		}
		?>
</table>
<br><br>

<!-- Table Of Booking -->
<p class="font">Data Of Booking</p>
<div class="font1">
    <a href="input_data.php">+ Add</a>&nbsp
    <a href="delete2.php">Delete</a>
</div><br>
<table border="1">
    <tr><th>Book_id </th><th>Room_id</th><th>Tenant_id</th><th>Start date</th><th>End date</th><th>Today's date</th></tr>
    <?php
    include 'connection.php';
    $data = mysqli_query($koneksi,"select a.Book_id, b.Room_id, c.Tenant_id, a.Book_start_date, a.Book_end_date, a.Book_tr_date from booking a, room_data b, tenant c where a.Room_label = b.Room_label and a.Tenant_name=c.Tenant_name");
		while($d = mysqli_fetch_array($data)){
	?>
    <tr>
				<td><?php echo $d['Book_id']; ?></td>
                <td><?php echo $d['Room_id']; ?></td>
				<td><?php echo $d['Tenant_id']; ?></td>
                <td><?php echo $d['Book_start_date']; ?></td>
                <td><?php echo $d['Book_end_date']; ?></td>
                <td><?php echo $d['Book_tr_date']; ?></td>
	</tr>
		<?php 
		}
		?>
</table>
</div>
</body>
</html>