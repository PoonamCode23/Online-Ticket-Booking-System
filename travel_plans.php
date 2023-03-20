<?php
session_start();
/*$connect=mysqli_connect("localhost","root","","phpproject");
if(!$connect)
{
    die("Connection failed ".mysqli_connect_error());
}
$user1=$_SESSION['user'];
$sql="select Username from user where Username='$user1'";
$query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Data couldnt be selected ".mysqli_error($connect));
    }
    $rows=mysqli_num_rows($query);
    if(!$rows)
    {
        die("Please login as an user to access the travel plans page");
    }*/
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
            width:100%;
            color:#fff;
        }
    </style>
<body>
<?php require 'header.php';?>
<div class="booking">
	<div class="content" >
	<h2>Booked Tickets</h2>
    <?php
    echo <<< token1
    <table border="1px #fff">
        <tr>
        <th>Traveller's Id</th>
        <th>Source City</th>
        <th>Destination City</th>
        <th>Bus_Id</th>
        <th>No of seats</th>
        <th>Date</th>
        <th>Time</th>
        <th>Cancel?</th>
        </tr></table>
    token1;
    ?>
    </div>
    </div>
    <?php
    echo "THis is session $_SESSION[source]";
    ?>
</body>
</html>