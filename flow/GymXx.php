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
             <a href="../../index.php"><input type="button" name="button" class="bottun" value="返回"></a>
             <h1>运动房基本信息</h1>
              
     </div>
     <div class="d22">
        <?php
         include("../connect/connect.php");
         if(isset($_GET['GID'])&&$_GET['GID']!=""){
            $ID=$_GET['GID'];
            $sql1="select * from g_gym where GID='$ID'";
            $rs1=$link->query($sql1); 
            $row1=$rs1->fetch_assoc()
            ?>
           <a href="GymXx.php"><input type="button" name="button"  class="bottun" value="全部"></a>
            <table width="800" >
                <tr>
                    <td height="414" colspan="2"><img src="<?=$row1['img']?>" alt="" width="600px" heigth="410px"></td>
                </tr>
                <tr>
                    <td width="300" height="150" class="bcolor"><span class="TBtext">房间号：</span><?=$ID?>
                                                              <br><br><span class="TBtext">房名：</span><?=$row1['Gname']?>
                                                              <br><br><span class="TBtext">具体地址：</span><?=$row1['Jaddress']?></td>
                    <td  rowspan=3 class="bcolor"><span class="TBtext">介绍：</span><br><?=$row1['Gcomten']?></td> 
                </tr>
               
                
             </table>
             
            


        <?php

         }else{
             $sql="select * from g_gym ";
             $rs=$link->query($sql); 
            while($row=$rs->fetch_assoc()){
                            ?>
          <div class='gymk'><a href="GymXx.php?GID=<?=$row['GID']?>"><div class="gym"><center><img src="<?=$row['img']?>" alt="" width="220px" heigth="200px"><br><hr><?=$row['Gname']?></center></div></a></div>

       <?php
            }   
        }            
        ?>         
      </div>
  </div>


  <div class="d3">
  资讯热线电话</br><span style="color:red">0874-8693-453</span>
  <p><br></p>
  上一篇——> 
   <a href="staXx.php" >员工信息</a><br>
  
  下一篇——>
 <a href="ActiveXx.php" >活动信息</a><br>
     
  </div>
 </div>
</body>
</html>