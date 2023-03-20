<?php
session_start();
$connect=mysqli_connect("localhost","root","","phpproject");
if(!$connect)
{
    die("Connection failed ".mysqli_connect_error());
}
function registrationForm()
{
    echo <<< token2
    <div class="booking">
	<div class="content">
	<h2>Register Here</h2>
	<form action="$_SERVER[PHP_SELF]" method="post">
    <input type="hidden" name="check" value="1"/>
		<h3>Username</h3><input type="text" name="name1"/><br/><br/>
		<h3>Email</h3><input type="email" name="email1"/><br/><br/>
        <h3>Password</h3><input type="password" name="psword1"/><br/><br/>
        <h3>Confirm Password</h3><input type="password" name="psword2"/><br/><br/>
        <h3>Contact Number</h3><input type="text" name="phone1"/><br/><br/>
		<button type="submit">Register</button>
</div>
</div>
token2;
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
<?php
    if(isset($_SESSION['uname']))
    {
        echo "You are already logged in $_SESSION[uname]";
    }
    elseif(isset($_POST['check']))
    {
        $sql="insert into user values('$_POST[name1]','$_POST[email1]','$_POST[psword1]','$_POST[psword2]','$_POST[phone1]')";  
    $query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Couldnot register".mysqli_error($connect));
    }
    echo "Successfully registered";
    $_SESSION['uname']=$_POST['name1'];
    echo "You are now logged in $_SESSION[uname]";
    mysqli_close($connect);
}
    else
    {
        registrationForm();
    }
?>
<br/>
<?php require 'footer.php';?>
</body>
</html>