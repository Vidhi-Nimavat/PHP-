<?php

$banned_words = ["spam", "hack", "scam", "phish"];


function moderate_comment($comment, $banned_words) {
    
    $clean_comment = trim($comment);

    
    $lower_comment = strtolower($clean_comment);

    
    $flagged = false;
    foreach ($banned_words as $word) {
        if (strpos($lower_comment, $word) !== false) {
            $flagged = true;
            break;
        }
    }

    
    $safe_comment = htmlspecialchars($clean_comment);

    
    return [
        "comment" => $safe_comment,
        "flagged" => $flagged
    ];
}


$user_comment = "   This is a SPAM comment!   ";

$result = moderate_comment($user_comment, $banned_words);

echo "Comment: " . $result['comment'] . "<br>";

if ($result['flagged']) {
    echo "<strong>Warning:</strong> This comment contains banned words!";
} else {
    echo "Comment is clean.";
}
?>
