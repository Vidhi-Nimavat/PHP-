<!--2.7 Write a PHP code to use mysql string manipulation functions as given bellow:
Length(),concat(),concat_ws(),trim(),rtrim(),ltrim(),lpad(),rpad(),locate(),strstr(),subst
r(),lcase(),ucase(),repeat(),replace().-->
<?php
$sample_string="Hello, I am student.";
//length()
echo "Length:".strlen($sample_string)."<br>";
//concat()
echo "CONCAT:"."I".","."amstudent!"."<br>";
//concat_ws
echo "CONCAT_WS:".implode('-',['2025','October','10'])."<br>";
//trim()
echo "TRIM:'".trim($sample_string)."'<br>";
//rtrim()
echo "RTRIM:'".rtrim($sample_string)."'<br>";
//ltrim()
echo "LTRIM:'".ltrim($sample_string)."'<br>";
//lpad()
echo "LPAD:'".str_pad($sample_string,50,'-', STR_PAD_LEFT)."'<br>";
//rpad()
echo "RPAD:'".str_pad($sample_string,50,'-', STR_PAD_RIGHT)."'<br>";
//locate()
echo "LOCATE:".strpos($sample_string,'student')."<br>";
//strstr()
echo "STRSTR:".strstr($sample_string,'student')."<br>";
//substr()
echo "SUBSTR:".substr($sample_string,8,5)."<br>";
//lcase()
echo "LCASE:".strtolower($sample_string)."<br>";
//ucase()
echo "UCASE:".strtoupper($sample_string)."<br>";
//repeat
echo "REPEAT:".str_repeat($sample_string,2)."<br>";
//replace()
echo "REPLACE:".str_replace('I am','We are',$sample_string)."<br>";
?>

<!--
Output:
Length:20
CONCAT:I,amstudent!
CONCAT_WS:2025-October-10
TRIM:'Hello, I am student.'
RTRIM:'Hello, I am student.'
LTRIM:'Hello, I am student.'
LPAD:'------------------------------Hello, I am student.'
RPAD:'Hello, I am student.------------------------------'
LOCATE:12
STRSTR:student.
SUBSTR: am s
LCASE:hello, i am student.
UCASE:HELLO, I AM STUDENT.
REPEAT:Hello, I am student.Hello, I am student.
REPLACE:Hello, We are student.-->