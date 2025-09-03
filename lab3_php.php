<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST['name'] ?? '';
    
    $name = strtolower(trim($name));
    
    $words = explode(' ', $name);

    foreach ($words as &$word) {
        $word = ucfirst($word);
    }

    $formattedName = implode(' ', $words);

    echo "Formatted name:" .htmlspecialchars($formattedName);
}
else
{
    echo "Enter your full name first....";
}
?>