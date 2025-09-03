<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    
    $name = trim($name);                      
    $email = strtolower(trim($email));        
    $message = htmlspecialchars(trim($message)); 

    
    echo "<h2>Sanitized Input:</h2>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Message: <pre>" . $message . "</pre>";
} else {
    echo "Invalid request.";
}
?>
