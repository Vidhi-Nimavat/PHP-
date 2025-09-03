<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $input = trim($_POST['csv_data'] ?? '');

    if ($input === '') {
        echo "Please enter some data.";
        exit;
    }

    
    $lines = explode("\n", $input);

    echo "<h2>Student Averages</h2>";

    foreach ($lines as $line) {
        $line = trim($line); 
        if ($line === '') continue; 

        
        $data = explode(',', $line);

        if (count($data) < 2) {
            echo "Invalid line: $line<br>";
            continue;
        }

        $name = array_shift($data); 
        $scores = array_map('floatval', $data); 
        $average = array_sum($scores) / count($scores); 

        
        $summary = $name . " - Avg: " . number_format($average, 2);
        echo $summary . "<br>";
    }
} else {
    echo "Please submit the form.";
}
?>
