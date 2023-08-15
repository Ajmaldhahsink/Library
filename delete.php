<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>
    <link rel="stylesheet" href="delete.css">
</head>
<body>
    <div class="main">
        <h1><span id="r">DELETE</span> A BOOK</h1>
        <form action="delete.php" method="get">
        <div class="acces">
                <input type="text" placeholder="Enter access no." name="access" id="acc">
            </div>
            
            <div class="but">
                <input type="submit" value="DELETE" name="submit" id="sub">

            </div>
        <!-- <label for="title">Enter title:</label>
        <input type="text" name="title" id="tit"> 
        <input type="submit" name="title" value="DELETE"> -->
        <?php
        if(isset($_GET["submit"])){
            try{
            $conn = mysqli_connect("localhost:4306", "root", "abcd", "library");
            $access=$_GET["access"]; 
            $query = "delete from book_details where access_no = '$access';";
            mysqli_query($conn, $query);
              echo "<p style='color:green;'>DELETED SUCCESSFULLY</p>";
            }
             catch(Exception $e){
                echo "<p style='color:red;'>ERROR HAS OOCURE</p>";
             }
            mysqli_close($conn);
        }
        ?>
        </form>
    </div>

</body>
</html>