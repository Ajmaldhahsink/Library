<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK ISSUED DETAILS</title>
    <link rel="stylesheet" href="issued.css">
    <style>
    .content{
        width: 1000px;
        margin: auto;
        height: 65vh;
        overflow-y: auto;
        position: relative;
    }
    tr:first-child{
        background-color: palegoldenrod;
        color: black;
        height: 50px;
        position: sticky;
        top: 0;
    }
    td{
        font-size: 1.2rem;
        width: 250px;
    }
    h2{
        position: absolute;
        top:100px;
        left: 340px;
        font-size: 2rem;
        
    }
    </style>
</head>
<body>
    <div class="nav">
        <p id="dept">DEPARTMENT OF CSE</p>
        <div><a href="../../home.php">Home</a></div>
    </div>
    <div class="head">
        <p>DETAILS OF BOOKS ISSUED</p>
    </div>
    <div class="content">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>BOOK</td>
                <td>ISSUED TIME</td>
            </tr>
            <?php
                $conn = mysqli_connect("localhost:4306", "root", "abcd", "library");

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }
                $query = "SELECT * from `issue_book`";
                $res = mysqli_query($conn,$query);
                if(mysqli_num_rows($res) > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php 

                            $access = $row['access'];
                            $query = "SELECT * from `book_details` where access_no = $access";
                            $result = mysqli_query($conn,$query);
                            $new = mysqli_fetch_assoc($result);
                            echo $new['title'] ?></td>
                            
                            <td><?php echo $row['datetime'] ?></td>
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

</body>
</html>