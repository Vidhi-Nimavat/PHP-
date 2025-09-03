<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = trim($_POST['email'] ?? '');
    $timestemp = time();
    $data = $email . $timestemp;
    $token = md5($data);
    echo "<h2>Password Reset Token</h2>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Generated Token: " . $token . "<br><br>";

    echo "<b>Usage:</b> This token can be included in a password reset URL sent to the user, for example:<br>";
    echo "<code>https://example.com/reset_password.php?token=" . $token . "</code><br><br>";
    echo "When the user clicks this link, the server verifies the token before allowing a password reset.";
} else {
    echo "Please submit the form.";
}
?>