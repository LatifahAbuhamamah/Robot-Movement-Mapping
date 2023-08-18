<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RobotMovements";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$direction = $data['direction'];

$sql = "INSERT INTO robot_movements (direction) VALUES ('$direction')";

if ($conn->query($sql) === true) {
    $response = ['success' => true];
} else {
    $response = ['success' => false, 'error' => $conn->error];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
