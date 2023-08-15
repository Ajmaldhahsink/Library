<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Issue</title>
    <link rel="stylesheet" href="issue.css">
</head>
<body>
<div class="main">
    <h1>ISSUE BOOK</h1>

    <form action="issue.php" method="post">
        <div class="acces">
            <input type="text" placeholder="Enter staff name" name="name" id="name">
        </div>
        <div class="tit">
            <input type="text" placeholder="Enter the staff id" name="id" id="stafid">
        </div>
        <div class="aut">
            <input type="text" placeholder="Enter Access number" name="access" id="access">
        </div>
        <div class="but">
            <input type="submit" value="ISSUE" name="submit" id="sub">
        </div>
    <?php
    if(isset($_POST['submit'])){
        try{
            $conn = mysqli_connect("localhost:4306", "root", "abcd", "library");

            $name=$_POST['name'];
            $id=$_POST['id'];
            $access=$_POST['access'];
            $query = "SELECT * FROM `book_details` WHERE access_no = '$access' and Availability='NOT ISSUED';";
            $result = mysqli_query($conn, $query);

        if ($result) { 
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $s_no=$row["sno"];
                $query = "INSERT INTO issue_book(s_no,id,name,access) values($s_no,'$id','$name',$access);";

                mysqli_query($conn, $query);
                $query = "UPDATE book_details SET Availability='ISSUED' where sno = $s_no";
                mysqli_query($conn, $query);
                echo "<script>alert('Updated Successfully')</script>";
            } 
            else {
                echo "<script>alert('Sorry! Book is not available . . .')</script>";
            }
            } 
        else{
            echo "Query execution failed: " . mysqli_error($conn);
        }

    }
    catch(Exception $e){
            
    }
    }
    ?>
    </form>
</div>
</body>
</html>