<?php
require_once 'config.php';

// Create table users
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
mysqli_query($conn, $sql);

// Insert default users
$default_users = [
    ['username' => 'admin', 'password' => password_hash('admin', PASSWORD_DEFAULT)],
    ['username' => 'user', 'password' => password_hash('password', PASSWORD_DEFAULT)]
];
foreach ($default_users as $user) {
    $username = $user['username'];
    $password = $user['password'];
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
}
?>
