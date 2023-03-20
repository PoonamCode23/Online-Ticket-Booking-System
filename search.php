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
    <style>
        table{
            width:100%;
            color:#fff;
        }
        table th
        {
            color:#fff;
        }
    </style>
</head>
<body>
<?php require 'header.php';?>
<div class="booking">
	<div class="content" style="width:60%;">
	<h2>Available Tickets</h2>
    <?php
    echo <<< token1
    <table border="1px #fff">
        <tr>
        <th>Source City</th>
        <th>Destination City</th>
        <th>Bus_Id</th>
        <th>No of seats Available</th>
        <th>Date</th>
        <th>Time</th>
        <th>Price</th>
        <th>No of seats</th>
        <th>Booking?</th>
        </tr>
    
    token1;
    if(isset($_POST['source1'])){
        $source=$_POST['source1'];
        $destination=$_POST['destination1'];
        $day=$_POST['day1'];
    $sql="Select * from route_info, bus_info, Time_Info where Source='$source' and Destination='$destination' and Date='$day' ";
    $query=mysqli_query($connect,$sql);
    if(!$query)
    {
        die("Query couldnt be processed ".mysqli_error($connect));
    }
    $rows=mysqli_num_rows($query);
    if($rows>0)
    {
        
        while($result=mysqli_fetch_assoc($query))
        {
            $_SESSION['source']=$result['Source'];
            echo <<<token4
            <tr>
            <td>$result[Source]</td>
            <td>$result[Destination]</td>
            <td>$result[Bus_Id]</td>
            <td>$result[No_of_seats]</td>
            <td>$result[Date]</td>
            <td>$result[Time]</td>
            <td>$result[Price]</td>
            <form action="$_SERVER[PHP_SELF]" method="post">
            <td><input type="text" name="Seats"></td>
            <td><button type="submit">Book Ticket</button></td>
            </form>
            </tr>
            token4;
            echo "Source:$result[Source] Destination:$result[Destination] Price:$result[Price] BusId:$result[Bus_Id] Date:$result[Date]
            Time:$result[Time] No. of seats:$result[No_of_seats]<br/>";
           if(isset($_POST['No_of_seats'])){
                
                    $_SESSION['source']=$result['Source'];
                    echo "Session is $_SESSION[source]";
}
    }}}
    ?>
    </table>
    </div>
    </div>
    </body>
</html>