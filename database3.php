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
    $sql="insert into admin values('jack484','484jack1'),('Nancy727','727nancy8')";  
    $query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Data couldnt be inserted ".mysqli_error($connect));
    }
    mysqli_close($connect);
    ?>
</body>
</html>