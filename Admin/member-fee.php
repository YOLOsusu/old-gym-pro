<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php
    include("Atop.php");
  ?>
  <div class="mindou">
    <div class="left">
        <table width="235">
        <tr>
          <td width="227" height="45"><div class="drr">收益详情</div>
            <div class="dl2" ><a href="Adj-tb.php">登记管理</a></div></td>
        </tr>
        <tr>
          <td height="45"><div class="dli"><a href="A-mxx.php">会员列表</a></div>  
            <div class="dli"><a href="A-cxx.php">教练列表</a></div></td>
        </tr>
        <?php
         include("Tongji.php");
        ?>
        <tr>
            <td height="45"><div class="dli"><?php if($coun2>0){  ?><div class='dot'><?php echo $coun2;?></div><?php } ?><a href='pass.php'> 审核</a></div>
            <div class="dli"><?php if($coun5>0){  ?><div class='dot'><?php echo $coun5;?></div><?php } ?><a href="Infor.php">意见</a></div></td>
        </tr>
        <tr>
          <td height="45"><div class="dl2" ><a href="Admin-tb.php">管理员</a></div>
              <div class="dl2"><a href="emploee.php">员工管理</a></div></td>
        </tr>
        <tr>
          <td height="45"><div class="dli"><a href="A-clb.php">课表</a></div>
              <div class="dli"><a href="A-gymb.php">房间列表</a></div></td>
        </tr>
        <tr>
          <td height="45"><div class="dli"><a href="A-cbtan.php">课程添加</a></div>
              <div class="dli"><a href="A-gmtan.php">房间分配</a></div></td>
        </tr>
        <tr>
          <td height="45"><div class="dl2" ><a href="M-tixx.php">体检信息</a></div>
              <div class="dl2" ><a href="column.php">栏目管理</a></div></td>
        </tr>
        <tr>
          <td height="45"><div class="dli"><a href="Ekit.php">器材详情</a></div>
                <div class="dli"><a href="acticle.php">文章管理</a></div></td>
        </tr>
        <tr>
          <td height="50"><a href="../../index.php"><div class="dl3" >首页</div></a>
          <a href="../fount/DestroyCk.php" onClick="return confirm('真的要退出么？')"><div class="dl3" >退出</div></a></td>
        </tr>
        </table>
  </div>
      

    
    <div class="right">
    <?php
    include('../connect/connect.php');
    $sum3=0;
    $sql6="select * from member_fee ";
    $rs6=$link->query($sql6);
    //$rs3=mysqli_query($link,$sql3);
    while($row6=$rs6->fetch_assoc()){
        $sum3=$sum3+$row6['Fee'];  
    }
    $coun=mysqli_affected_rows($link);
    $n=8;
    if($coun%$n==0){
        $coun_page=$coun/$n; 
    }else{
    $coun_page=(int)($coun/$n)+1;
    }
    //@$page=$_GET['page'];
    if(isset($_GET['page'])and $_GET['page']!=0){
    
    $page=$_GET['page'];
    }else{
     $page=1;
    }
    $m=$n*($page-1);
    $sql1="select * from member_fee LIMIT $m,$n";
    $rs1=$link->query($sql1);
    ?>
    
        
       
    <center>
       <table width="500" style="text-align:center;float:left" >
       <caption >会员收益表</caption>
      <tbody>
        <tr class="tr1">
          <td width="60" height="31">序号</td>
          <td width="213">会员</td>
          <td width="213">时间</td>
          <td width="115">项别</td>
          <td width="72">费用</td>
        </tr>
         <?php
          $sum=0;
      while($row=$rs1->fetch_assoc()){
          if($row['term']==0){
              $str="开通";
          }elseif($row['term']==1){
            $str="续费";

          }
          $sum=$sum+$row['Fee'];
      
            $MID=$row['MID'];
            $sql2="select * from m_member where MID=$MID";
            $rs2=$link->query($sql2);
            /*$row2=$rs2->fetch_assoc();*/
            $row2=$rs2->fetch_array();
            
      ?>
      
    
        <tr  class="linear">
          <td height="38"><?=$row['ID']?></td>
          <td><?=$row2['Mname']?>(<?=$row['MID']?>)</td>
          <td><?=$row['XFdate']?></td>
          <td><?=$str?></td>
          <td><?=$row['Fee']?></td>
        </tr>
        <?php
        
       }
        ?>
        <tr class="linear">
            <td colspan="4">当前页会员收入</td>
            <td><?=$sum?></td>
        </tr>
        <tr class="linear">
            <td colspan="4">会员总收入</td>
            <td><?=$sum3?></td>
        </tr>
          <tr>
        <td height="39" colspan="10">
        <div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page ?></span>页</div>
        <div class="botum">第<span style="color:#FFFFFF"><?php echo $page?></span>页</div> 
        <div class="botum"><a href="?page=<?php echo $coun_page?>"> 尾页</a></div> 
        <div class="botum"><a href="?page=<?=$page+1?>"> 下一页</a></div>	
        <div class="botum"> <a href="?page=<?=$page-1?>">上一页</a></div>
        <div class="botum"><a href="?page=1">首页</a></div> 
      </tr>
      </tbody>
    </table> 

       </center>
     
       <form action="member-fee.php" method="post">
       <input type="text" name="kc" id=""><input type="submit" value="请输入课程号">
       </from>
    <a href="member-fee.php"><input type="button" value="全部"></a>
       <?php
if(isset($_POST['kc'])&&$_POST['kc']!=""){
    $kc=$_POST['kc'];
    $sum7=0;
    $sql7="select * from m_member m join m_study ms on(m.MID=ms.MID)
    join f_cla f on(ms.FID=f.FID) where Fei='1' and f.FID=$kc ";
    $rs7=$link->query($sql7);
    ?>
    <center>
    <table width="500" style="text-align:center;float:left" >
    <caption >课程收益表</caption>
   <tbody>
     <tr class="tr1">
       <td width="103" height="31">会员</td>
       <td width="213">课程</td>
       <td width="100">费用</td>
     </tr>
      <?php
   while($row7=$rs7->fetch_assoc()){
       
       $sum7=$sum7+$row7['Fmoney'];  
   ?>
   
 
     <tr  class="linear">
       <td height="38"><?=$row7['Mname']?><?=$row7['MID']?></td>
       <td><?=$row7['Fname']?>(<?=$row7['FID']?>)</td>
       <td><?=$row7['Fmoney']?></td>
     </tr>
     <?php
     
    }
     ?>
     <tr class="linear">
         <td colspan="2"><?=$row7['Fname']?>课程总收入</td>
         <td><?=$sum7?></td>
     </tr>
    
   </tbody>
 </table> 
    </center>
    <?

}else{

    $sum2=0;
    $sql3="select * from m_member m join m_study ms on(m.MID=ms.MID)
    join f_cla f on(ms.FID=f.FID) where Fei='1'";
    $rs3=$link->query($sql3);
    //$rs3=mysqli_query($link,$sql3);
    while($row3=$rs3->fetch_assoc()){
        $sum2=$sum2+$row3['Fmoney'];  
    }
    $coun1=mysqli_affected_rows($link);
    $n1=8;
    if($coun1%$n1==0){
        $coun_page1=$coun1/$n1; 
    }else{
    $coun_page1=(int)($coun1/$n1)+1;
    }
    //@$page=$_GET['page'];
    if(isset($_GET['page1'])and $_GET['page1']!=0){
    
    $page1=$_GET['page1'];
    }else{
     $page1=1;
    }
    $m1=$n1*($page1-1);
    $sql4="select * from m_member m join m_study ms on(m.MID=ms.MID)
    join f_cla f on(ms.FID=f.FID) where ms.Fei='1' LIMIT $m1,$n1 ";
    $rs4=$link->query($sql4);
    ?>
    <center>
       <table width="500" style="text-align:center;float:left" >
       <caption >课程收益表</caption>
      <tbody>
        <tr class="tr1">
          <td width="103" height="31">会员</td>
          <td width="213">课程</td>
          <td width="100">费用</td>
        </tr>
         <?php
          $sum1=0;
      while($row4=$rs4->fetch_assoc()){
          
          $sum1=$sum1+$row4['Fmoney'];  
      ?>
      
    
        <tr  class="linear">
          <td height="38"><?=$row4['Mname']?><?=$row4['MID']?></td>
          <td><?=$row4['Fname']?>(<?=$row4['FID']?>)</td>
          <td><?=$row4['Fmoney']?></td>
        </tr>
        <?php
        
       }
        ?>
        <tr class="linear">
            <td colspan="2">当页收入</td>
            <td><?=$sum1?></td>
        </tr>
        <tr class="linear">
            <td colspan="2">课程总收入</td>
            <td><?=$sum2?></td>
        </tr>
          <tr>
        <td height="39" colspan="10">
        <div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page1 ?></span>页</div>
        <div class="botum">第<span style="color:#FFFFFF"><?php echo $page1?></span>页</div> 
        <div class="botum"><a href="?page1=<?php echo $coun_page1?>"> 尾页</a></div> 
        <div class="botum"><a href="?page1=<?=$page1+1?>"> 下一页</a></div>	
        <div class="botum"> <a href="?page1=<?=$page1-1?>">上一页</a></div>
        <div class="botum"><a href="?page1=1">首页</a></div> 
      </tr>
      </tbody>
    </table> 
       </center>
       <?php
        }
       ?>
    </div>
  </div>
</body>
</html>
