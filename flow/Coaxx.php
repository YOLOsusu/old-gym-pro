<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css-php/flow.css"  rel="stylesheet" type="text/css"/>
<link href="../css-php/bili.css"  rel="stylesheet" type="text/css"/> 
<script type="text/javascript" src="../jquery-2.1.1/jquery-2.1.1.js"></script>  
<script type="text/javascript"  src="../jquery-2.1.1/jquery-2.1.1.min.js"></script>  
<script> 
    $(function(){  
        //初始化  
        var bl = parseInt($('.yuan_text').html());  
        var du=parseInt((bl/100)*360);
        var rotatenum = du;  
        if(du > 180){  
            var blhtml = '';  
            rotatenum = du - 180;  
            blhtml += '<div class="yuan_bl2">';  
            blhtml += '<div class="yuan_bl4" style="-webkit-transform:rotate(' + rotatenum + 'deg);transform:rotate(' + rotatenum + 'deg);"></div>';  
            blhtml += '</div>';  
            //$('.yuan_bl1').remove($('.yuan_bl3'));  
            $('.yuan_bl1').after(blhtml);  
        }else{  
            var blhtml = '';  
            blhtml += '<div class="yuan_bl3" style="-webkit-transform:rotate(' + rotatenum + 'deg);transform:rotate(' + rotatenum + 'deg);"></div>';  
            $('.yuan_bl1').append(blhtml);  
        }  
    })  
    </script> 

</head>

<body>

 <div class="d1">
  <div class="D2"> 
     <div class="d21">
             <a href="../../index.php"><input type="button" name="button" class="bottun" value="返回"></a>
             <h1>本中心教练信息</h1>
              
     </div>
     <div class="d22">
     <table width="800" height="200" >
           <tbody >
              <tr>
              <td width="300"> <?php
                        include("../connect/connect.php");
                        $sql2="select count(*) from c_coach where Csex='男'";
                        $rs2=$link->query($sql2); 
                        $row2=$rs2->fetch_assoc();
                        $sql3="select count(*) from c_coach where Csex='女'";
                        $rs3=$link->query($sql3); 
                        $row3=$rs3->fetch_assoc();
                       $count=$row2['count(*)']+$row3['count(*)'];
                       echo "性别（人数）";
                       $bili=sprintf("%.2f",$row3['count(*)']/$count*100);
                      
      
                   ?>
                       <h3>本中心男教练为：<?=$row2['count(*)']?>人</br> </h3>
                       <h3>本中心女教练为：<?=$row3['count(*)']?>人</br> </h3>
                        <h3>本中心教练人数为：<?=$count?>人<br>教练均为25岁-45岁人士</h3>
                        
                 </td>
              <td> 
                 <div class="yuan">  
                    <div class="yuan_bl1"></div>  
                    <div class="yuan_text"><?php echo  $bili."%女教练"?></span></div>  
                 </div>  
             </td>
             <td>
                 <ul>
                   <li style="color:#FF7F4C">女教练占 <?=$bili?>%</li>
                   <li style="color:#6699FF">男教练占 <?=100-$bili?>%</li>
                 </ul>
             </td>
              </tr>
          </tbody>  
       </table>
    
                     
            
                  
      </div>
  </div>


  <div class="d3">
  资讯热线电话</br><span style="color:red">0874-8693-453</span>

  <p><br></p>
  上一篇——>
  <a href="MemXx.php" >会员信息</a><br>
  下一篇——>
  <a href="staXx.php" >员工信息</a><br>
  <p><br></p>
  <a href="CoaLe.php" class="a1">教练具体类别</a>
     
  </div>
 </div>
</body>
</html>