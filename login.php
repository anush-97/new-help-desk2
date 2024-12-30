<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamma_helpdesk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, name, email, role, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $name, $email, $role, $hashed_password);
        $stmt->fetch();


        if (password_verify($password, $hashed_password)) {
            $user_data = [
                "id" => $user_id,
                "name" => $name,
                "email" => $email,
                "role" => $role

            ];
            echo json_encode(["status" => "success", "message" => "Login successful!", "data" => $user_data]);
          
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$conn->close();
?>