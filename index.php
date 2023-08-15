<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body{
            font-family: 'Roboto', sans-serif;
            color: white;
            background-image: url('bil.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
            
        }
        div{
            display: block;
            margin: auto;
            background: linear-gradient(90deg, #ce1eed, #7f00d3);
            width:400px;
            height:400px;
            margin-top: 25vh;
            box-shadow:0 0 20px #ce1eed;
            border-radius: 20px;
        }
        h1{
            padding-top:30px; 
            padding-bottom: 10px;
        }
        input{
            display: block;
            margin: .1px auto ;
            font-size: larger;
            height: 30px;
            width: 80%;
            outline: none;
            border: none;
            padding-left: 10px;
        }
        #button{
            border: 2px white solid;
            margin:auto;
            border-radius: 15px;
            background-color: rgb(240, 255, 240);
            color:rgba(0, 0, 0, 0.833);
            font-size: larger;
        }
        input:hover{box-shadow: 0 0 20px #404040c7;}
        #button:hover{
            box-shadow:0 0 20px #00ff04;
            letter-spacing: 2px;
        }
        label{
            margin-left: -50px;
            font-size: x-large;
        }
    </style>
</head>
<body>
    <div id="content"> 
        <h1 style="text-align: center;  
        text-shadow: 0 0 20px #454545; font-size: 35px; ">Login</h1>
        <form  method="get" action="index.php">
        <pre>
            <label for="name">Enter Your ID</label>
            <input type="text" name="id" >

            <label for="pass" >Enter Password</label>
            <input type="password" name="pass">
    
            <input type="submit" name="login" value="Submit" id="button"> 
            </pre>
        </form>
    </div>

</body>
</html>
<?php
if (isset($_GET['login'])) {
    $conn = mysqli_connect("localhost:4306", "root", "abcd", "library");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $id =  $_GET['id'];
    $pass =  $_GET['pass'];

    $query = "SELECT * FROM `admin` WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) { // Check if query was successful
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row["password"] == $pass) {
                $newLocation = "admin/admin.html";
                header("Location: $newLocation");
            } else {
                echo '<script>alert("Wrong Password")</script>';
            }
        } else {
            echo '<script>alert("Wrong ID. Please try again")</script>';
        }
    } else {
        echo "Query execution failed: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

