<?php
$str1 = "Hello... I am Vidhi Nimavat.";
echo $str1;

echo ("<br>");
$str2 = "I am a student.";
echo $str2;

echo ("<br><br>");
echo "Length:".strlen($str1);

echo ("<br><br>");
echo "Comparision:".strcmp($str1,$str2);

echo ("<br><br>");
echo "Trim:".trim($str1);
echo ("<br>");
$datatrimmed = trim($str1);

echo ("<br><br>");
echo "Length:".strlen($datatrimmed);

echo ("<br><br>");
echo "Strpos:".strpos("I am a student.","t");

echo ("<br><br>");
echo "Reverse string:".strrev($str1);

echo ("<br><br>");
echo "Strstr false:".strstr($str1,$str2,false);
?>

