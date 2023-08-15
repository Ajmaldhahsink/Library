<?php
$connection = mysqli_connect("localhost:4306", "root", "abcd", "library");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT COUNT(sno) FROM book_details";
$result = mysqli_query($connection,$query);
$val = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>    
    <div class="nav">
        <p id="dept">DEPARTMENT OF CSE</p>
        <div><a class="a1" href="#home">Home</a></div>
        <div><a class="a2" href="search.php">Search</a></div>
        <div><a class="a3" href="index.php">Admin</a></div>
    </div>

    <div class="box1">
        <p class="bimg" style="background-image: url('H_images/bbb.jpg');"></p>
    </div>
    <div  class="heading">
        <h2>Library Management System</h2>
    </div>
    <div class="show">
        <div class="books">
            <h1>No. of Books</h1>
            <p id="number1"><?php print_r($val['COUNT(sno)'])?></p>
        </div>
        <div class="avl">
            <h1>No. of Books Available</h1>
            <p id="number3">0</p>
        </div>
        <div class="iss">
            <h1>No. of Books Issued</h1>
            <p id="number4">0</p>
        </div>
    </div>
</body>
</html>