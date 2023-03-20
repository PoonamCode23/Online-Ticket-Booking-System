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
        <li><a href="admin.php">Admin</a></li>
			<li><a href="logout.php">Logout</a></li>
            <li><a href="routeinfo.php">See route information</a></li>
            <li><a href="businfo.php">See Bus information</a></li>
            <li><a href="timeinfo.php">See Time information</a></li>
			</ul>
	</div>
    <div class="booking">
	<div class="content">
        <?php
        $sql1="Select * from time_info";
        $query1=mysqli_query($connect,$sql1);
        if(!$query1)
        {
            die("Query couldnt be processed ".mysqli_error($connect));
        }
        $rows=mysqli_num_rows($query1);
    if($rows>0)
    {
        
        while($result=mysqli_fetch_assoc($query1))
        {
            echo "Time Id: $result[Time_Id] Bus Id $result[Bus_Id] Date:$result[Date] Time:$result[Time]<br/>";
        }
    }
        ?>

</body>
</html>