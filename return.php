<?php
        if(isset($_POST['submit'])){
        try{
            $conn = mysqli_connect("localhost:4306", "root", "abcd", "library");

            $id=$_POST['id'];
            $access=$_POST['access'];
            $query = "SELECT * from `issue_book` where id = '$id';";
            $result = mysqli_query($conn,$query);

        if ($result) { 
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $start = $row['datetime'];
                $staff_id = $row['id'];
                $name = $row['name'];

                $query = "SELECT * from `book_details` where access_no = '$access';";
                $res = mysqli_query($conn,$query);
                $row2 = mysqli_fetch_assoc($res);
                $book = $row2['title'];

                $query = "DELETE from `issue_book` where access = '$access';";
                mysqli_query($conn, $query);

                $query = "INSERT INTO return_book(staff_id,name,book,prevdate) values($id,'$name','$book','$start');";
                mysqli_query($conn, $query);

                $query = "UPDATE book_details SET Availability='NOT ISSUED' where access_no = '$access';";
                mysqli_query($conn, $query);
                echo "<script>alert('UPDATED SUCCESSFULLY')</script>";
            } 
            else {
                echo "<script>alert('You can't return \n Book is issued to someone else')</script>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <link rel="stylesheet" href="return.css">
    <style>
        .container{
            display: flex;
        }
        .return-head{
            margin-top: -10px;
            margin-left: 40px;
            width: 24%;
        }
        .return-body{
            margin-top: -5px !important;
            width: 63% !important;
            margin-left: 20px;
            margin-right: 40px;
        }
        h2{
        position: absolute;
        top:70px;
        left: 340px;
        font-size: 2rem;   
        }
        tr:first-child{
        font-weight: 500;
        position: sticky;
        top: 0;
        }
        td{
        font-size: 1.1rem;
        height: 70px !important;
        width: 250px;
        border: 1px solid black;
        }
        td:first-child{
            width: 150px !important;
        }
        td:nth-child(2){
            width: 200px !important;
        }
        .return-body::-webkit-scrollbar {
            width:10px;
        }
        .return-body::-webkit-scrollbar-thumb {
            border-radius:5px;
            box-shadow: inset 0 0 50px brown ; 
        }
    </style>
</head>
<body>
    <div class="nav">
        <p id="dept">DEPARTMENT OF CSE</p>
        <div><a href="../../home.php">Home</a></div>
    </div>
    <div class="head">
        <p>RETURN DETAILS</p>
    </div>
    <div class="retdetails">
    <form action="return.php" method="post">
    <div class="container">
        <div class="return-head">
            <div class="rb-head">
                <span>BOOK RETURN</span>
            </div>
            <div class="label1">
                <label for="id">Enter Staff id:
                <input type="text" name="id" id="id"></label>
            </div>
            <div class="label1">
                <label for="access">Enter Access number:
                <input type="text" name="access" id="access"></label>
            </div>
            <div class="btn">
                <button type="submit" name="submit">SUBMIT</button>
            </div>
        </div>
        <div class="return-body">
        <table class="table">
            <tr>
                <td>STAFF ID</td>
                <td>NAME</td>
                <td>BOOK</td>
                <td>ISSUED TIME</td>
                <td>RETURN TIME</td>
            </tr>
            <?php
                $conn = mysqli_connect("localhost:4306", "root", "abcd", "library");
                $query = "SELECT * from `return_book`";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['staff_id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['book'] ?></td>
                            <td><?php echo $row['prevdate'] ?></td>
                            <td><?php echo $row['date_time'] ?></td>
                        </tr>
                        <?php
                    }
                }
                else{
                    echo "<h2>NO RECORD FOUND<h2>";
                }
            ?>

        </table>
        </div>
    </div>

    </div>
    </form>
</body>
</html>