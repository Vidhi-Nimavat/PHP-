<!--Write a PHP Program to perform following operation on Array where values in array are entered by user
a) Print the values of array.
b) Reverse an array.
c) merge two arrays in sorted manner.
d) add values of all elements of an array.-->

<form method="post" action="">
  Enter your values: 
  <input type="text" name="values[]" />
  <input type="text" name="values[]" />
  <input type="text" name="values[]" />
  <input type="submit" name="Submit"; />
</form>

<?php
echo "a) Print the values of array.<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $values=$_POST['values'];

    foreach ($values as $value) 
    {
        echo htmlspecialchars($value) . "<br>";
    }

    }
    echo ("<br><br><br>");
?>

<?php
echo "b) Reverse an array.<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $values=$_POST['values'];

    foreach (array_reverse($values) as $value) 
    {
        echo htmlspecialchars($value) . "<br>";
    }

    }
    echo ("<br><br><br>");
?>

<?php
echo "c) merge two arrays in sorted manner.<br>";
$a1;
$a2;
$merge_array;
$a1=[5,6,3,4];
$a2=[1,2,5];

$merge_array = array_merge($a1,$a2);
echo ("Merge array:");
print_r ($merge_array);
echo ("<br>");
echo ("Sorted array:");
sort($merge_array);
print_r($merge_array);
echo ("<br><br><br>");
?>

<?php
echo "d) add values of all elements of an array.<br>";
$a1;
$a2;
$merge_array;
$added_array;
$a1=[5,6,3,4];
$a2=[1,2,5];

$merge_array = array_merge($a1,$a2);
echo ("Merge array:");
print_r ($merge_array);
echo ("<br>");
echo ("Added all elements of array:");
$added_array = array_sum($merge_array);
print_r($added_array)
?>

