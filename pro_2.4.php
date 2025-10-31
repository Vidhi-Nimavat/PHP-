<?php
// 1. strlen() - get length of a string
$str = "Hello, World!";
echo "String: \"$str\"\n";
echo "Length: " . strlen($str) . "\n\n";

// 2. strpos() - find position of a specific word or letter in a string
$needle = "World";
$pos = strpos($str, $needle);
if ($pos !== false) {
    echo "The word \"$needle\" found at position: $pos\n\n";
} else {
    echo "The word \"$needle\" not found\n\n";
}

// 3. str_word_count() - count words in a string
echo "Word count: " . str_word_count($str) . "\n\n";

// 4. strrev() - reverse a string
echo "Reversed string: " . strrev($str) . "\n\n";

// 5. str_replace() - replace all occurrences of a string with another
$search = "World";
$replace = "PHP";
echo "After replacement: " . str_replace($search, $replace, $str) . "\n\n";

// 6. strtolower() - convert string to lowercase
echo "Lowercase: " . strtolower($str) . "\n\n";

// 7. strtoupper() - convert string to uppercase
echo "Uppercase: " . strtoupper($str) . "\n\n";
?>
