<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">

</head>
<body>
    <div class="main">
        <h1><span id="g">ADD</span> BOOKS</h1>

        <form action="add.php" method="get">
        <div class="acces">
                <input type="text" placeholder="Enter Access number" name="access" id="acc">
                </label><br>
            </div>
            <div class="tit">
                <input type="text" placeholder="Enter Title" name="title" id="tit">
                </label><br>
            </div>
            <div class="aut">
                <input type="text" placeholder="Enter Author name" name="author" id="auth">
                </label><br>
            </div>
            <div class="but">
                <input type="submit" value="Add Book" name="submit" id="sub">
            </div>

        </form>
    </div>
<?php
    if(isset($_GET["submit"])){
        try{
        $conn = mysqli_connect("localhost:4306", "root", "abcd", "library");
        $access=$_GET["access"];
        $title=$_GET["title"];
        $author=$_GET["author"];


        $query = "insert into book_details(access_no,title,author) values($access,'$title','$author')";
        mysqli_query($conn, $query);
        echo "<p style='color:green;'>ADDED SUCCESSFULLY</p>";
        }
         catch(Exception $e){
            echo "<p style='color:red;'>ERROR HAS OOCURED</p>";
         }
         mysqli_close($conn);
    }
?>
</body>
</html>
