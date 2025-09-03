<!-- Write a PHP programto print 5 to 10 using For and ForEach.-->
 <?php
 $i;
 echo ("For loop:");
 for($i=5;$i<=10;$i++)
 {
    
    echo ($i);
    echo ("<br/>");
 }
 echo("<br/><br/><br/>");
 ?>
 <?php
 $a1 = array(5,6,7,8,9,10);
 echo ("Foreach loop:");
 foreach ($a1 as $val) 
 {
    
    echo "$val";
    echo ("<br/>");
 }
?>