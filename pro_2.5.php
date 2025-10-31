<?php
// Initial variable as a string
$var = "123.45";

echo "Original value: $var\n";
echo "Original type: " . gettype($var) . "\n\n";

// Change type to integer
settype($var, "integer");
echo "After settype to integer:\n";
echo "Value: $var\n";
echo "Type: " . gettype($var) . "\n\n";

// Change type to float
settype($var, "float");
echo "After settype to float:\n";
echo "Value: $var\n";
echo "Type: " . gettype($var) . "\n\n";

// Change type to string
settype($var, "string");
echo "After settype to string:\n";
echo "Value: $var\n";
echo "Type: " . gettype($var) . "\n\n";

// Change type to boolean
settype($var, "boolean");
echo "After settype to boolean:\n";
echo "Value: ";
var_export($var);
echo "\nType: " . gettype($var) . "\n";
?>
