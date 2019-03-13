<?
   include("fount.php");
   $fc = new func();
   setcookie("ID","",time()-1,'/');
   setcookie("PW","",time()-1,'/');
   $fc->alrt1('../../index.php');
   
?>