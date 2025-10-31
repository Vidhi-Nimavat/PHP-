<!--2.9 Write a PHP code to use mysql date and time functions as given bellow:
HOUR(),MINUTE(),SECOND(),DATE_FORMAT(),DATE_SUB(),DATE_ADD(),CURDATE()/C
URRENT_DATE,CURTIME()/CURRENT_TIME(),UNIX_TIMESTAMP(), FROM_UNIXTIME().-->
<?php
$sample_datetime="2025-10-10 14:30:00";
$timestamp=strtotime($sample_datetime);

echo "Origial DateTime:$sample_datetime<br><br>";

//HOUR()
echo "Hour:".date('H',$timestamp)."<br>";

//MINUTE()
echo "Minute:".date('i',$timestamp)."<br>";

//SECOND()
echo "Second:".date('s',$timestamp)."<br>";

//DATE_FORMAT()
echo "DATE_FORMAT(Y-m-d H:i:s):".date('Y-m-d H:i:s',$timestamp)."<br>";
echo "DATE_FORMAT(d-M-Y):".date('d-M-Y',$timestamp)."<br>";

//DATE_SUB()
$date_sub=date('Y-m-d H:i:s',strtotime('-5 days',$timestamp));
echo "Date_sub(5 days):".$date_sub."<br>";

//DATE_ADD()
$date_add=date('Y-m-d H:i:s',strtotime('+10 days',$timestamp));
echo "Date_add(10 days):".$date_add."<br>";

//CURRENT_DATE()
echo "Current date:".date('Y-m-d')."<br>";

//CURRENT_TIME()
echo "Current time:".date('H:i:s')."<br>";

//UNIX_TIMESTAMP()
$unix_ts=strtotime($sample_datetime);
echo "UNIX_TIMESTAMP:".$unix_ts."<br>";

//FROM_UNIXTIME()
echo "FROM_UNIXTIME:".date('Y-m-d H:i:s',$unix_ts)."<br>";
?>