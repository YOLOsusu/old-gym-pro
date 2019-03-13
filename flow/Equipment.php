<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css-php/flow.css"  rel="stylesheet" type="text/css"/>
<script>
    function getValue(val){
        alert(val+"器材");
        window.location='Equipment.php?na='+val; 
    }
</script>
</head>

<body>

 <div class="d1">
  <div class="D2"> 
     <div class="d21">
             <a href="../../index.php"><input type="button" name="button" value="返回"></a>
               <center style="font-weight:bold;color:#6699FF;">健身器材类别</center> 
               <?php
               include("../connect/connect.php");
               $sql3="select * from apparatus group by Aname";
               $rs3=$link->query($sql3);
              while( $row3=$rs3->fetch_assoc()){
               ?>
              <a href="Equipment.php?na=<?php echo $row3['Aname'];?>"><input type="button" value="<?=$row3['Aname']?>" class="CL" ></a> 
              <?php
              }
              ?>
             <a href="Equipment.php?na=<?="全部"?>"><input type="submit" value="全部" class="CL"></a> 
           
     </div>

     <div class="d22">

     <?php

            
            if(isset($_GET['na'])&&$_GET['na']!=""&&$_GET['na']!="全部"){
                $nice=$_GET['na'];
                $sql="select * from apparatus where Aname='$nice'";
                $rs=$link->query($sql);
                $aff=$link->affected_rows;
                ?>
                 <span style="font-weight:bold;font-size:20px;color:#6699CC;"><?=$nice?>器材</span>
                <?php
                if($aff>0){ 
                     while($row=$rs->fetch_assoc()){
                       $ID=$row['AID'];
                      $sql2="select * from apparatus a join g_gym g on a.GID=g.GID where a.AID=$ID";
                      $rs2=$link->query($sql2);
                      $row2=$rs2->fetch_assoc();
                      if($row['Astate']==1){
                        $con="使用中";
                      }else{
                        $con="未使用";

                      }
                
    ?>
                      
                      <table width="800" height="150" style="margin:20px 10px;">
                      <tr>
                        <td rowspan="2" width="80"><img src="<?=$row['img']?>" width="200px" height="150px" ></td>
                        <td width="230"><span class="TBtext">名称:</span><?=$row['Aname']?></td>
                        <td><span class="TBtext">使用程度：</span><?=$row['Acon']?></td>
                        <td><span class="TBtext">使用状态</span>：<?=$con?></td>
                      </tr>
                      <tr>
                        <td><span class="TBtext">投入使用时间：</span><?=$row['Ajdate']?></td>
                        <td><span class="TBtext">使用年限：</span><?=$row['Ayear']-$row['Ajdate']?>年</td>
                        <td><span class="TBtext">存放地点：</span><a href="GymXx.php?GID=<?=$row2['GID']?>"><?=$row2['Gname']?></a></td>
                     </tr>         
                    </table>
                     <hr style="box-shadow:0px 0px 4px #CCCCCC"/>

                   <?php }

            
            
                }else{
                    echo "<h3>目前尚未购买该类器材</h3>";




                }
            }else{
                
                ?>
                <span style="font-weight:bold;font-size:20px;color:#6699CC;">所有器材</span>
            
                <?php
                $sql="select * from apparatus";
                mysqli_query($link,$sql);
                $coun=mysqli_affected_rows($link);
                
                $n=8;
                if($coun%$n==0){
                  $coun_page=$coun/$n;
                  
                }else{
                $coun_page=(int)($coun/$n)+1;
                
                
                }
                
                
                //@$page=$_GET['page']
                if(isset($_GET['page'])and $_GET['page']!=0){
                
                $page=$_GET['page']; 
                }else{
                $page=1;
                
                
                }
                $m=$n*($page-1);
                $sql1="select * from apparatus LIMIT $m,$n";
                $rs=$link->query($sql1);
                
                while($row=$rs->fetch_assoc()){
                  $ID=$row['AID'];
                  $sql2="select * from apparatus a join g_gym g on a.GID=g.GID where a.AID=$ID";
                  $rs2=$link->query($sql2);
                  $row2=$rs2->fetch_assoc();
                  if($row['Astate']==1){
                    $con="使用中";
                  }else{
                    $con="未使用";

                  }
            
               ?>                
                      <table width="800" height="150" style="margin:20px 10px;">
                      <tr>
                        <td rowspan="2" width="80"><img src="<?=$row['img']?>" width="200px" height="150px" ></td>
                        <td width="230"><span class="TBtext">名称:</span><?=$row['Aname']?></td>
                        <td><span class="TBtext">使用程度：</span><?=$row['Acon']?></td>
                        <td><span class="TBtext">使用状态：</span><?=$con?></td>
                      </tr>
                      <tr>
                        <td><span class="TBtext">投入使用时间:</span><?=$row['Ajdate']?></td>
                        <td><span class="TBtext">使用年限:</span><?=$row['Ayear']-$row['Ajdate']?>年</td>
                        <td><span class="TBtext">存放地点：</span><a href="GymXx.php?GID=<?=$row2['GID']?>"><?=$row2['Gname']?></a></td>
                     </tr>         
                    </table>
                    <hr style="box-shadow:0px 0px 4px #CCCCCC"/>
             <?php
                }
                ?>
                <div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page ?></span>页</div>
                <div class="botum">第<span style="color:#FFFFFF"><?php echo $page?></span>页</div> 
                <div class="botum"><a  class="a1" href="?page=<?php echo $coun_page?>">&nbsp;&nbsp;尾页</a></div> 
                <div class="botum"><a   class="a1" href="?page=<?=$page+1?>"> 下一页</a></div>	
                <div class="botum"> <a  class="a1" href="?page=<?=$page-1?>">上一页</a></div>
                <div class="botum"><a   class="a1" href="?page=1">&nbsp;&nbsp;首页</a></div>
                <?php
            }

              ?>

   
      </div>
  </div>


  <div class="d3">
  资讯热线电话</br><span style="color:red">0874-8693-453</span>
     
  </div>
 </div>
</body>
</html>