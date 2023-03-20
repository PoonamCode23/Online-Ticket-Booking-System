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