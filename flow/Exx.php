<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css-php/flow.css"  rel="stylesheet" type="text/css"/>

</head>

<body>

 <div class="d1">
  <div class="D2"> 
     <div class="d21">
             <a href="../../index.php"><input type="button" name="button" value="返回"></a>
             <h1>总体器材信息</h1>
              
     </div>
     <div class="d22">
               <?php
                   include("../connect/connect.php");
                   $sql2="select Aname ,count(*)  from apparatus group by Aname";
                   $rs2=$link->query($sql2); 
                   $aff=0;
                   $n=0;
                   echo "器材类别（数量）";
                   while($row2=$rs2->fetch_assoc()){
                       
                ?>
                      <h3> <?=$row2['Aname']?> 
                              <?=$row2['count(*)']?>个 </br>
                     </h3>
                 <?php
                   $n++;
                   $aff=$aff+$row2['count(*)'];
                   }
                 ?>
               <h3>本中心目前拥有的器材：<?=$n?>类  总共<?=$aff?>个
               </h3>
    
                     
            
                  
      </div>
  </div>


  <div class="d3">
  资讯热线电话</br><span style="color:red">0874-8693-453</span>
  <p><br></p>
  <a href="Equipment.php" class="a1">器材分类信息</a>
     
  </div>
 </div>
</body>
</html>