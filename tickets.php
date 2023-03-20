<?php
session_start();
$connect=mysqli_connect("localhost","root","","phpproject");
if(!$connect)
{
    die("Connection failed ".mysqli_connect_error());
}
$user1=$_SESSION['user'];
$sql="select Username from admin where Username='$user1'";
$query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Data couldnt be selected ".mysqli_error($connect));
    }
    $rows=mysqli_num_rows($query);
    if(!$rows)
    {
        die("Please login as an admin to access the admin page");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table{
        color:#fff;}
        </style>
</head>
<body>
<header class="header">
	<div id="logo">Travel<span class="smart">Smart.com</span></div>
	<div class="menu">
		<ul>
			<li><a href="logout.php">Logout</a></li>
            <li><a href="routeinfo.php">route information</a></li>
            <li><a href="businfo.php">Bus information</a></li>
            <li><a href="timeinfo.php">Time information</a></li>
            <li><a href="tickets.php">See Booked Tickets</a></li>
			</ul>
	</div>
    <div class="booking">
	<div class="content">
        <h3>Booked Tickets</h3>
        <?php
        echo <<<token1
        <table border="1px #fff">
        <tr>
        <th>Travel_Id</th>
        <th>Username</th>
        <th>Source_city</th>
        <th>Destination_city</th>
        <th>No of seats</th>
        <th>Date</th>
        </tr>
        token1;
        $sql="select * from traveller_info";
        $query=mysqli_query($connect,$sql);
        if(!$query)
        {
            die("Query couldnt be processed ".mysqli_error());
        }
        $rows=mysqli_num_rows($query);
        if($rows>0)
        {
            while($result=mysqli_fetch_assoc($query))
            {
                echo <<<token3
                <tr>
                <td>$result[Travel_Id]</td>
                <td>$result[Username]</td>
                <td>$result[source]</td>
                <td>$result[destination]</td>
                <td>$result[no_of_seats]</td>
                <td>$result[date]</td>
                token3;
            }
        }
        ?>
</body>
</html>