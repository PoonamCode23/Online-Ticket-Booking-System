<?php
session_start();
$connect=mysqli_connect("localhost","root","","phpproject");
if(!$connect)
{
    die("Connection failed ".mysqli_connect_error());
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
</head>
<body>
<div class="whole">
<?php require 'header.php';?>
<div class="booking">
	<div class="content">
	<h2>Book Your Ticket Now?</h2>
	<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
	<h3>Source City</h3><input type="text" name="source1"/><br/><br/>
		<h3>Destination City</h3><input type="text" name="destination1"/><br/><br/>
		<h3>No of seats</h3><input type="text" name="seats1"/><br/><br/>
		<h3>Travel Date</h3>
		<select name="day1">
			<option value="10th Sept 2021">10th Sept 2021</option>
			<option value="11th Sept 2021">11th Sept 2021</option>
			<option value="12th Sept 2021">12th Sept 2021</option>
			<option value="13th Sept 2021">13th Sept 2021</option>
			<option value="14th Sept 2021">14th Sept 2021</option>
			<option value="15th Sept 2021">15th Sept 2021</option>
		</select><br/><br/>
		<button type="submit">Book Now</button>
</div>
</div>
<?php
	if(isset($_POST["source1"]))
	{
		if(isset($_SESSION['user']))
	{
		$sql="insert into traveller_info(Username, source, destination, no_of_seats, date) 
		values('$_SESSION[user]','$_POST[source1]','$_POST[destination1]','$_POST[seats1]','$_POST[day1]')";  
    $query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Couldnot register".mysqli_error($connect));
    }
		echo "Your ticket has been booked you can check your email for details";
	}
	else
	{
		echo "You need to login to book tickets";
	}
	}
?>
<br/>
<h2>Places To Travel</h2>
<div class="main">
<hr/>
<div class="main_part">
<div class="picture"><img src="images/kathmandu2.jpeg"/></div>
<div class="picture"><img src="images/Pokhara1.jpg"/></div>
<div class="picture"><img src="images/lumbini1.jfif"/></div>
<div class="info">
Kathmandu<br/>
<span class="price">$10.34<br/></span>
<div class="view"><a href="add.xhtml" target="_blank">View Details</a></div>
</div>
<div class="info">
Pokhara<br/>
<span class="price">$5.33<br/></span>
<div class="view"><a href="add.xhtml" target="_blank">View Details</a></div>
</div>
<div class="info">
Lumbini<br/>
<span class="price">$7.90<br/></span>
<div class="view"><a href="add.xhtml" target="_blank">View Details</a></div></div>
<div class="main_part">
<div class="picture"><img src="images/janakpur1.jpg"/></div>
<div class="picture"><img src="images/ilam1.jpg"/></div>
<div class="picture"><img src="images/chitwan2.jpg"/></div>
<div class="info">
Janakpur<br/>
<span class="price">$14.56<br/></span>
<div class="view"><a href="add.xhtml" target="_blank">View Details</a></div>
</div>
<div class="info">
Ilam<br/>
<span class="price">$12.66<br/></span>
<div class="view"><a href="add.xhtml" target="_blank">View Details</a></div>
</div>
<div class="info">
Chitwan<br/>
<span class="price">$10.92<br/></span>
<div class="view"><a href="add.xhtml" target="_blank">View Details</a></div>
</div>
</form>
</div>
<?php require 'footer.php';?>
</body>
</html>