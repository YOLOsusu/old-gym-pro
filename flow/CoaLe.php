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
               <center style="font-weight:bold;color:#6699FF;">教练类别</center>
          <a href="CoaLe.php?na=<?="瑜伽";?>"><input type="button" value="瑜伽" class="CL" ></a>
          <a href="CoaLe.php?na=<?="杠铃"?>"><input type="button" value="杠铃" class="CL"></a>
          <a href="CoaLe.php?na=<?="健身操"?>"><input type="button" value="健身操" class="CL"></a> 
          <a href="CoaLe.php?na=<?="跑步"?>"><input type="button" value="跑步" class="CL"></a>
          <a href="CoaLe.php?na=<?="搏击"?>"><input type="button" value="搏击" class="CL" ></a>
          <a href="CoaLe.php?na=<?="健美操"?>"><input type="button" value="健美操" class="CL" ></a>
          <a href="CoaLe.php?na=<?="肚皮舞"?>"><input type="button" value="肚皮舞" class="CL" ></a>
          <a href="CoaLe.php?na=<?="拉丁舞"?>"><input type="button" value="拉丁舞" class="CL" ></a>
          <a href="CoaLe.php?na=<?="平衡板"?>"><input type="button" value="平衡板" class="CL"></a>
          <a href="CoaLe.php?na=<?="舞蹈"?>"><input type="button" value="舞蹈" class="CL" ></a>
          <a href="CoaLe.php?na=<?="其他"?>"><input type="button" value="其他" class="CL" ></a>
   
     </div>
     <div class="d22">

     <?php

            include("../connect/connect.php");
            if(isset($_GET['na'])&&$_GET['na']!=""&&$_GET['na']!="其他"){
                $nice=$_GET['na'];
                $sql="select * from c_coach where Cnice like '%%$nice%%'";
                $rs=$link->query($sql);
                $aff=$link->affected_rows;
                ?>
                 <span style="font-weight:bold;font-size:20px;color:#6699CC;"><?=$nice?>教练</span>
                <?php
                if($aff>0){ 
                     while($row=$rs->fetch_assoc()){
                       $CID=$row['CID'];
                      $sql2="select * from c_coach c join f_tcing f1 on c.CID=f1.CID
                                                     join f_cla f on f1.FID=f.FID where c.CID=$CID";
                      $rs2=$link->query($sql2);
                      $row2=$rs2->fetch_assoc()
                      
    ?>
                      
                      <table width="800" height="200" style="margin:20px 10px;">
                      <tr>
                        <td rowspan="2" width="100" height="120px"><img src="<?=$row['img']?>" width="100px" height="120px" ></td>
                        <td width="300" height="60px"><span class="TBtext">姓名:</span><?=$row['Cname']?></td>
                        <td ><span class="TBtext">性别：</span><?=$row['Csex']?></td>
                      </tr>
                      <tr>
                        <td><span class="TBtext">擅长：</span><?=$row['Cnice']?></td>
                        <td><span class="TBtext">目前上课课程：</span><a href="Flass.php?ID=<?=$row2['FID']?>"><?=$row2['Fname']?></a></td>
                      </tr>
                      <tr>
                        <td colspan='3' height="80" ><span class="TBtext">介绍：</span></td>
                        
                      </tr>
                    </table>
                    <hr style="box-shadow:0px 0px 4px #CCCCCC"/>

                   <?php }

            
            
                }else{
                    echo "<h3>目前尚未招聘该类教练</h3>";




                }
            }else{
                
                
                ?>
                <span style="font-weight:bold;font-size:20px;color:#6699CC;">所有教练</span>
                <?php
                $sql="select * from c_coach";
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
                 $sql1="select * from c_coach LIMIT $m,$n";
                 $rs=$link->query($sql1);
                 
                while($row=$rs->fetch_assoc()){
               ?>                
                      <table width="800" height="200" style="margin:20px 10px;">
                      <tr>
                        <td rowspan="2" width="100" height="120px"><img src="<?=$row['img']?>" width="100px" height="120px" ></td>
                        <td width="300" height="60px"><span class="TBtext">姓名:</span><?=$row['Cname']?></td>
                        <td><span class="TBtext">性别：</span><?=$row['Csex']?></td>
                      </tr>
                      <tr>
                        <td><span class="TBtext">擅长：</span><?=$row['Cnice']?></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan='3' height="80"><span class="TBtext">介绍：</span></td>
                        
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