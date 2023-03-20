<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $connect=mysqli_connect("localhost","root","","phpproject");
    if(!$connect)
    {
        die("Connection failed ".mysqli_connect_error());
    }
    $sql="Create table Time_info(Time_Id int primary key auto_increment, Bus_Id int, Date varchar(25), Time varchar(10), foreign key(Bus_Id)
     references bus_info(Bus_Id))";  
    $query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Table couldnt be created ".mysqli_error($connect));
    }
    mysqli_close($connect);
    ?>
</body>
</html>