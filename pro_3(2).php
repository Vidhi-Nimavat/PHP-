<!--Survey Data Analysis Using Arrays and Functions
Objective: To collect survey responses in an array and compute average scores using user-
defined functions.
Outcome: Students will grasp array operations and function-based data processing.-->
<?php
// Function to calculate average from an array of numbers
function calculateAverage($scores) {
    if (count($scores) === 0) {
        return 0;
    }
    $sum = array_sum($scores);
    return $sum / count($scores);
}

// Initialize variables
$scores = [];
$averageScore = null;
$errorMessage = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect scores from POST
    $scores = [];
    for ($i = 1; $i <= 5; $i++) {
        $key = "q$i";
        if (isset($_POST[$key]) && is_numeric($_POST[$key])) {
            $score = (int)$_POST[$key];
            // Validate score range (1-10)
            if ($score < 1 || $score > 10) {
                $errorMessage = "Scores must be between 1 and 10.";
                break;
            }
            $scores[] = $score;
        } else {
            $errorMessage = "Please answer all questions.";
            break;
        }
    }

    if (empty($errorMessage)) {
        $averageScore = calculateAverage($scores);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Survey Data Analysis</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f9fafb;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 40px 0;
        margin: 0;
        min-height: 100vh;
    }
    .container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        padding: 30px 40px;
        max-width: 400px;
        width: 100%;
    }
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }
    form label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #555;
    }
    select {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 25px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background: #fff;
        cursor: pointer;
    }
    button {
        width: 100%;
        padding: 14px 0;
        background-color: #007bff;
        border: none;
        border-radius: 6px;
        color: white;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #0056b3;
    }
    .result {
        margin-top: 30px;
        padding: 20px;
        background-color: #e9f7ef;
        border-left: 6px solid #28a745;
        color: #155724;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        border-radius: 6px;
    }
    .error {
        margin-top: 30px;
        padding: 15px;
        background-color: #f8d7da;
        border-left: 6px solid #dc3545;
        color: #721c24;
        border-radius: 6px;
        font-weight: 600;
        text-align: center;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Survey Form</h1>

    <form method="POST" action="">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="q<?= $i ?>">Question <?= $i ?>: Rate from 1 to 10</label>
            <select name="q<?= $i ?>" id="q<?= $i ?>" required>
                <option value="" disabled selected>Select score</option>
                <?php
                // Keep previous selection after submission
                $selectedScore = isset($_POST["q$i"]) ? (int)$_POST["q$i"] : null;
                for ($score = 1; $score <= 10; $score++): ?>
                    <option value="<?= $score ?>" <?= $score === $selectedScore ? 'selected' : '' ?>><?= $score ?></option>
                <?php endfor; ?>
            </select>
        <?php endfor; ?>

        <button type="submit">Submit Survey</button>
    </form>

    <?php if ($averageScore !== null): ?>
        <div class="result">
            Average Score: <?= number_format($averageScore, 2) ?>
        </div>
    <?php elseif ($errorMessage): ?>
        <div class="error">
            <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>


