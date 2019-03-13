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
    $(function(){  
        //初始化  
        var bl = parseInt($('.yuan_text1').html());  
        var du=parseInt((bl/100)*360);
        var rotatenum = du;  
        if(du > 180){  
            var blhtml = '';  
            rotatenum = du - 180;  
            blhtml += '<div class="yuan_bl21">';  
            blhtml += '<div class="yuan_bl41" style="-webkit-transform:rotate(' + rotatenum + 'deg);transform:rotate(' + rotatenum + 'deg);"></div>';  
            blhtml += '</div>';  
            //$('.yuan_bl1').remove($('.yuan_bl3'));  
            $('.yuan_bl11').after(blhtml);  
        }else{  
            var blhtml = '';  
            blhtml += '<div class="yuan_bl31" style="-webkit-transform:rotate(' + rotatenum + 'deg);transform:rotate(' + rotatenum + 'deg);"></div>';  
            $('.yuan_bl11').append(blhtml);  
        }  
    }) 
    </script>  

</head>

<body>

 <div class="d1">
  <div class="D2"> 
     <div class="d21">
             <a href="../../index.php"><input type="button" name="button" class="bottun" value="返回"></a>
             <h1>会员整体情况信息</h1>
              
     </div>
     <div class="d22">
        <table width="800" height="200" >
           <tbody >
              <tr>
              <td width="300"> <?php
                        include("../connect/connect.php");
                        $sql2="select count(*) from m_member where Msex='男'";
                        $rs2=$link->query($sql2); 
                        $row2=$rs2->fetch_assoc();
                        $sql3="select count(*) from m_member where Msex='女'";
                        $rs3=$link->query($sql3); 
                        $row3=$rs3->fetch_assoc();
                       $count=$row2['count(*)']+$row3['count(*)'];
                       echo "性别（人数）";
                       $bili=sprintf("%.2f",$row3['count(*)']/$count*100);
                      
      
                   ?>
                       <h3>本中心男生为：<?=$row2['count(*)']?>人</br> </h3>
                       <h3>本中心女生为：<?=$row3['count(*)']?>人</br> </h3>
                        <h3>本中心会员数为：<?=$count?>人</h3>
                 </td>
              <td> 
                 <div class="yuan">  
                    <div class="yuan_bl1"></div>  
                    <div class="yuan_text"><?php echo  $bili."%女生"?></span></div>  
                 </div>  
             </td>
             <td>
                 <ul>
                   <li style="color:#FF7F4C">女生占 <?=$bili?>%</li>
                   <li style="color:#6699FF">男生占 <?=100-$bili?>%</li>
                 </ul>
             </td>
              </tr>
          </tbody>  
       </table>   
        <?php
         $date=date('Y-m-d');
         $tj="select count(*) from m_member m join checkin c on(m.MID=c.MID) where  c.Jdate='$date' ";
         $link->query($tj); 
         $aff=$link->affected_rows;
         if($aff>0){
        ?>
         <table width="800" height="200" >
           <tbody >
              <tr>
              <td width="300">
               <?php
                        $sql4="select count(*) from m_member m join checkin c on(m.MID=c.MID) where m.Msex='男' and c.Jdate='$date' ";
                        $rs4=$link->query($sql4); 
                         $row4=$rs4->fetch_assoc();
                        $sql5="select count(*) from m_member m join checkin c on(m.MID=c.MID) where m.Msex='女' and c.Jdate='$date'";
                        $rs5=$link->query($sql5);
                        $row5=$rs5->fetch_assoc();
                        $count6=$row4['count(*)']+$row5['count(*)'];
                        if($count6>0){
                            echo "性别（人数）";
                            $bili=sprintf("%.2f",$row5['count(*)']/$count6*100);

                    ?>
                        <h3>今天健身中心男生有：<?=$row4['count(*)']?>人</br> </h3>
                        <h3>今天健身中心女生有：<?=$row5['count(*)']?>人</br> </h3>
                            <h3>今天健身中心总会员数为：<?=$count6?>人</h3>
                            <?php
                            if($count6>0&&$count6<30){
                                $str="不拥挤";
                            }elseif($count6>30&&$count6<60){
                                $str="还行";
                            }elseif($count6>60&&$count6<90){
                                $str="拥挤";
                            }elseif($count6>90){
                                $str="特拥挤";
                            }
                            ?>
                            <h3>拥挤程度：<span style="color:#FF6699"><?=$str?></span></h3>
                    </td>
                <td> 
                    <div class="yuan1">  
                        <div class="yuan_bl11"></div>  
                        <div class="yuan_text1"><?php echo  $bili."%女生"?></span></div>  
                    </div>  
                </td>
                <td>
                    <ul>
                    <li style="color:#FF7F4C">女生占 <?=$bili?>%</li>
                    <li style="color:#6699FF">男生占 <?=100-$bili?>%</li>
                    </ul>
                </td>
                <?php
                }else{
                 echo "<h3>目前还未有健身者来访</h3>";
                }
                
                ?>
                </tr>
           </tbody>  
          </table>
       
       <?php
       } 
       ?>       
      </div>
  </div>


  <div class="d3">
  资讯热线电话</br><span style="color:red">0874-8693-453</span>
  <p><br></p>
  上一篇——>
  <a href="ActiveXx.php" >活动信息</a><br>
  下一篇——>
  <a href="Coaxx.php" >教练信息</a><br>
     
  </div>
 </div>
</body>
</html>