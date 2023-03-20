<?php
session_start();
$connect=mysqli_connect("localhost","root","","phpproject");
if(!$connect)
{
    die("Connection failed ".mysqli_connect_error());
}
function showForm()
{
    echo <<< token1
    <div class="booking">
	<div class="content">
	<h2>Login Here</h2>
	<form action="$_SERVER[PHP_SELF]" method="post">
        <input type="hidden" name="check" value="1"/>
		<h3>Username</h3><input type="text" name="name1"/><br/><br/>
        <h3>Password</h3><input type="password" name="psword1"/><br/><br/>
		<button type="submit">Login</button>
</div>
token1;
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
        #footer
        {
            bottom:0;
    position:fixed;
        }
    </style>
</head>
<body>
<div class="whole">
<?php require 'header.php';?>
<?php
    if(isset($_SESSION['user']))
    {
        echo "You are already logged in $_SESSION[user]";
        echo "To redirect to admin page click <a href='admin.php' >Here</a>";
    }
    if(isset($_POST['check']))
    {
        $username=$_POST['name1'];
        $password=$_POST['psword1'];
        $sql1="select * from admin where Username='$username' AND Password='$password' ";
        $sql2="select * from user where Username='$username' AND Password='$password'";  
        $query1=mysqli_query($connect,$sql1);
        $query2=mysqli_query($connect,$sql2);
    if(!$query1 || !$query2)
    {
        die("Data couldnt be selected ".mysqli_error($connect));
    }
    $rows1=mysqli_num_rows($query1);
    $rows2=mysqli_num_rows($query2);
    if($rows1>0)
    {
        $_SESSION['user']=$username;
        echo "You are logged in $username";
        echo "<a href='admin.php'>Admin page</a>";
    }
    elseif($rows2>0)
    {
        $_SESSION['user']=$username;
        echo "You are logged in as user $username";
    }
    else
    {
        showForm();
        echo "Incorrect Name or Password";
    }
}
    else
    {
        showForm();
    }
    mysqli_close($connect);
?>
</div>
<br/>
<?php require 'footer.php';?>
</body>
</html>