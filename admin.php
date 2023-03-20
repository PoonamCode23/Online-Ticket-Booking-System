<?php require 'alladmin.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .content
        {
            color:#38B8AC;
        }
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
        <h3>Create New Routes</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
    <b>Source</b><input type="text" name="source1"/><br/><br/>
    <b>Destination</b><input type="text" name="destination1" /><br/><br/>
    <b>Price</b><input type="text" name="price1" /><br/><br/>
    <input type="submit" value="Submit"/>
        </form>
        <h3>Add New Bus</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
    <b>No. of Seats</b><input type="text" name="seats1"/><br/><br/>
    <b>Route Id</b><input type="text" name="route1" /><br/><br/>
    <input type="submit" value="Submit"/></form>
        <h3>Create Travel Plans</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
    <b>Bus Id</b><input type="text" name="busid1"/><br/><br/>
    <b>Date</b><input type="text" name="date1" /><br/><br/>
    <b>Time</b><input type="text" name="time1" /><br/><br/>
    <input type="submit" value="Submit"/></form>
</div>
</div>
<?php
if(isset($_POST['source1']))
{
    $sql1="insert into route_info(Source, Destination, Price) values('$_POST[source1]',
    '$_POST[destination1]','$_POST[price1]')";  
    $query1=mysqli_query($connect,$sql1);
    if(!$query1)
    {
        die("Couldnot register".mysqli_error($connect));
    }
    echo "Successfully added";
}
if(isset($_POST['seats1']))
{
    $sql1="insert into bus_info(No_of_seats, Route_Id) values('$_POST[seats1]','$_POST[route1]')";  
    $query1=mysqli_query($connect,$sql1);
    if(!$query1)
    {
        die("Couldnot register".mysqli_error($connect));
    }
    echo "Successfully added";
}
if(isset($_POST['busid1']))
{
    $sql1="insert into Time_info(Bus_Id, Date, Time) values('$_POST[busid1]','$_POST[date1]','$_POST[time1]')";  
    $query1=mysqli_query($connect,$sql1);
    if(!$query1)
    {
        die("Couldnot register".mysqli_error($connect));
    }
    echo "Successfully added";
}
?>
</body>
</html>