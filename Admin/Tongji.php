<?php
       include('../connect/connect.php');
       $Shen="select * from enroll";
       mysqli_query($link,$Shen);
       $coun3=mysqli_affected_rows($link);

       $Shen1="select * from pscoach";
       mysqli_query($link,$Shen1);
       $coun1=mysqli_affected_rows($link);
       $coun2=$coun3+$coun1;

       $Shen3="select * from suggest";
       mysqli_query($link,$Shen3);
       $coun5=mysqli_affected_rows($link);

?>