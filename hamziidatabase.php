<?php
$host = "your_host"; // e.g., "localhost"
$username = "your_username";
$password = "your_password";
$database = "new_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Error handling
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':message', $message);

try{
    $stmt->execute();
    echo "Data inserted successfully!";
 }
 catch(PDOException $e){
    echo "Error inserting data: " . $e->getMessage();
 }

?>
