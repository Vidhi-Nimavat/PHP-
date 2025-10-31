<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input string from user
    $input = $_POST['array_input'] ?? '';

    // Convert the input string to an array by splitting on commas
    $arr = array_map('trim', explode(',', $input));

    // Sort the array
    sort($arr);

    echo "<h3>Sorted Array:</h3>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sort User Array</title>
</head>
<body>
    <h2>Enter Array Elements (comma separated):</h2>
    <form method="post" action="">
        <input type="text" name="array_input" size="50" placeholder="e.g. 5,3,9,1,7" required>
        <button type="submit">Sort Array</button>
    </form>
</body>
</html>
