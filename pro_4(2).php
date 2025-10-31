<!--Plugin System with Function Existence Check
Objective: To test for the existence of a function before executing it, simulating plugin-based
architecture.
Outcome: Students will learn safe coding practices and dynamic function handling.-->
<?php
// Core system function
function coreFunction() {
    return "Core system function executed.<br>";
}

// Example plugin function (you can comment/uncomment to simulate plugin availability)
function pluginHello() {
    return "Plugin 'Hello' function executed.<br>";
}

// Another plugin example
function pluginGoodbye() {
    return "Plugin 'Goodbye' function executed.<br>";
}

// Simulate loading plugins (in real scenario, you may include plugin files dynamically)
$plugins = ['pluginHello', 'pluginGoodbye', 'pluginNotExist']; // last one does not exist

// Collect outputs
$outputs = [];

// Call core function
$outputs[] = coreFunction();

// Loop through plugins and call if exists
foreach ($plugins as $pluginFunc) {
    if (function_exists($pluginFunc)) {
        $outputs[] = $pluginFunc();
    } else {
        $outputs[] = "Function <code>$pluginFunc</code> does NOT exist. Skipped.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Plugin System Demo</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f0f4f8;
    padding: 40px;
    color: #333;
  }
  h1 {
    color: #007acc;
    margin-bottom: 25px;
  }
  .output {
    background: white;
    border-radius: 8px;
    padding: 20px 30px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    max-width: 600px;
  }
  code {
    background-color: #eee;
    padding: 2px 5px;
    border-radius: 3px;
    font-family: Consolas, monospace;
  }
  .success {
    color: #28a745;
  }
  .fail {
    color: #dc3545;
  }
</style>
</head>
<body>

<h1>Plugin System with Function Existence Check</h1>

<div class="output">
<?php foreach ($outputs as $line): ?>
    <?php 
    // Simple color coding for success/fail messages
    if (strpos($line, 'does NOT exist') !== false): ?>
        <p class="fail"><?= $line ?></p>
    <?php else: ?>
        <p class="success"><?= $line ?></p>
    <?php endif; ?>
<?php endforeach; ?>
</div>

</body>
</html>
