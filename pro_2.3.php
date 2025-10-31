<?php
// 1. array_change_key_case - changes all keys in an array to lower or upper case
$monthAssoc = [
    "January" => 31,
    "February" => 28,
    "March" => 31,
];
echo "Original associative array:\n";
print_r($monthAssoc);

echo "\nKeys changed to LOWER CASE:\n";
print_r(array_change_key_case($monthAssoc, CASE_LOWER));

echo "\nKeys changed to UPPER CASE:\n";
print_r(array_change_key_case($monthAssoc, CASE_UPPER));

// 2. array_chunk - splits an array into chunks of given size
$months = ["January", "February", "March", "April", "May", "June", "July"];
echo "\nOriginal months array:\n";
print_r($months);

echo "\nArray chunked by size 3:\n";
print_r(array_chunk($months, 3));

// 3. array_count_values - counts frequency of values in an array
$values = ["apple", "banana", "apple", "orange", "banana", "apple"];
echo "\nValues array:\n";
print_r($values);

echo "\nCount values:\n";
print_r(array_count_values($values));

// 4. array_combine - creates an array by using one array for keys and another for values
$keys = ["a", "b", "c"];
$values = [1, 2, 3];
echo "\nKeys array:\n";
print_r($keys);
echo "Values array:\n";
print_r($values);

echo "\nCombined array:\n";
print_r(array_combine($keys, $values));

// 5. array_pop - removes and returns the last element of an array
$stack = ["first", "second", "third"];
echo "\nOriginal stack:\n";
print_r($stack);

$popped = array_pop($stack);
echo "Popped element: $popped\n";
echo "Stack after pop:\n";
print_r($stack);

// 6. array_push - adds one or more elements to the end of an array
array_push($stack, "fourth", "fifth");
echo "\nStack after push:\n";
print_r($stack);

// 7. array_unshift - adds one or more elements to the beginning of an array
array_unshift($stack, "zero");
echo "\nStack after unshift:\n";
print_r($stack);

// 8. array_shift - removes and returns the first element of an array
$shifted = array_shift($stack);
echo "Shifted element: $shifted\n";
echo "Stack after shift:\n";
print_r($stack);
?>
