<?php
$connection = mysqli_connect("localhost:4306", "root", "abcd", "library");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM book_details";
$result = mysqli_query($connection, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($connection);

// header('Content-Type: application/json');
// echo json_encode($data);

?>


