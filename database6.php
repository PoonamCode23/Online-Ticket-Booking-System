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
    $sql="Create table bus_info(Bus_Id int primary key auto_increment, No_of_seats int, Route_Id int, foreign key(Route_Id) references 
    route_info(Route_Id))"; 
    $query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Table couldnt be created ".mysqli_error($connect));
    }
    mysqli_close($connect);
    ?>
</body>
</html>