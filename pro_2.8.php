<!--Write a PHP code to use mysql date and time functions as given bellow:
DAYOFWEEK(),WEEKDAY(),DAYOFMONTH(),DAYOFYEAR(),DAYNAME(),MONTH(),MONT
HNAME(),WEEK(),NOW(),SYSDATE(),CURRENT_TIMESTAMP()-->
<?php
$sample_datetime="2025-10-10 14:30:00";
$timestamp=strtotime($sample_datetime);

echo "Original DateTime:$sample_datetime<br><br>";

//DAYOFWEEK()
echo "Day of week:".((date('w',$timestamp)+1))."<br>";

//WEEKDAY()
echo "Weekday:".((date('N',$timestamp)%7))."<br>";

//DAYOFMONTH()
echo "Day of month:".date('j',$timestamp)."<br>";

//DAYOFYEAR
echo "Day of year:".(date('z',$timestamp)+1)."<br>";

//DAYNAME
echo "Day name:".date('l',$timestamp)."<br>";

//MONTH()
echo "Month:".date('n',$timestamp)."<br>";

//MONTHNAME()
echo "Month Name:".date('F',$timestamp);

//WEEK()
echo "Week:".date('W',$timestamp)."<br>";

//NOW()
echo "Now:".date('Y-m-d H:i:s')."<br>";

//SYSDATE()
echo "Sys date:".date('Y-m-d H:i:S')."<br>";

//CURRENT_TIMESTAMP
echo "Current_timstamp:".date('Y-m-d H:i:s')."<br>";
?>