<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
    <td width="227" height="45"><div class="dl2"  ><a href="member-fee.php">收益详情</a></div>
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

$n=4;
if( $coun3%$n==0){
	$coun_page= $coun3/$n;
	
}else{
$coun_page=(int)( $coun3/$n)+1;


}


//@$page=$_GET['page'];
if(isset($_GET['page'])and $_GET['page']!=0){

$page=$_GET['page'];
}else{
$page=1;


}
$m=$n*($page-1);
$sql2="select * from enroll limit $m,$n";
$rs2=$link->query($sql2);



?>
   <center>
   <table width="1120"  style=" text-align:center" >
   <caption >会员申请列表</caption>
  <tbody>
    <tr class="tr1">
      <td width="30" height="31">序号</td>
      <td width="75">姓名</td>
      <td width="30">性别</td>
      <td width="100">出生日期</td>
      <td width="100">手机号</td>
      <td width="80">密码</td>
      <td width="100">健身爱好</td>
      <td width="150">家庭住址</td>
      <td width="120">邮箱</td>
      <td width="100">注册日期</td>
      <td width="40">卡项</td>
      <td width="80">会员编号</td>
      <td width="100">操作</td>
    </tr>
	
	 <?php
   while($row=$rs2->fetch_assoc()){
     if($row['Mtrue']==0){
       $true="无";
     }else if($row['Mtrue']==1){
       $true="月卡";
     }else if($row['Mtrue']==2){
      $true="季卡";
     }elseif($row['Mtrue']==3){
      $true="年卡";
     }
  
    ?>
    <tr  class="linear">
      <td height="38"><?=$row['ID']?></td>
      <td><?=$row['name']?></td>
      <td><?=$row['sex']?></td>
      <td><?=$row['bir']?></td>   
      <td><?=$row['phone']?></td>
      <td><?=$row['pw']?></td>
      <td><?=$row['hobby']?></td>
      <td><?=$row['address']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['Medate']?></td>
      <td><?=$true?></td>
      <form action="dispose/passOK.php?ID=<?=$row['ID']?>" method="post">
      <td><input type="text" name="MID" size="10" /></td>
      <td><input type="submit" name="pass" value="通过"><br><a href="dispose/pssign.php?ID=<?=$row['ID']?>" style="text-decoration:none" onClick="return confirm('真的要删除么')">删除</a></td>
      </form>
    </tr>
    <?php
    }
    ?>
	  <tr>
    <td height="39" colspan="8">
      <div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page ?></span>页</div>
      <div class="botum">第<span style="color:#FFFFFF"><?php echo $page?></span>页</div> 
      <div class="botum"><a href="?page=<?=$coun_page?>"> 尾页</a></div> 
      <div class="botum"><a href="?page=<?=$page+1?>"> 下一页</a></div>	
      <div class="botum"> <a href="?page=<?=$page-1?>">上一页</a></div>
      <div class="botum"><a href="?page=1">首页</a></div>
	</td>
  </tr>
     </tbody>
     </table>
	</center>
	
 <?php

$n1=4;
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
$sql3="select * from pscoach limit $m1,$n1";
$rs3=$link->query($sql3);




?>
   <center>
   <table width="1090"  style=" text-align:center" >
   <caption >教练申请列表</caption>
  <tbody>
    <tr class="tr1">
      <td width="30" height="31">序号</td>
      <td width="75">姓名</td>
      <td width="40">性别</td>
      <td width="100">出生日期</td>
      <td width="119">手机号</td>
      <td width="80">密码</td>
      <td width="100">擅长</td>
      <td width="150">家庭住址</td>
      <td width="120">邮箱</td>
      <td width="80">教练编号</td>
      <td width="120">操作</td>
    </tr>
	
	 <?php
   while($row3=$rs3->fetch_assoc()){
  
    ?>
    <tr  class="linear">
      <td height="38"><?=$row3['ID']?></td>
      <td><?=$row3['name']?></td>
      <td><?=$row3['sex']?></td>
      <td><?=$row3['bir']?></td>   
      <td><?=$row3['phone']?></td>
      <td><?=$row3['pw']?></td>
      <td><?=$row3['nice']?></td>
      <td><?=$row3['address']?></td>
      <td><?=$row3['email']?></td>
      <form action="dispose/CpassOK.php?CID=<?=$row3['ID']?>" method="post">
      <td><input type="text" name="CID" size="10" /></td>
      <td><input type="submit" name="pass" value="通过">|<a href="dispose/Cpssign.php?cID=<?=$row3['ID']?>" style="text-decoration:none" onClick="return confirm('真的要删除么')">删除</a></td>
      </form>
    </tr>
    <?php
    }
    ?>
<tr>
    <td height="39" colspan="8">
	<div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page1 ?></span>页</div>
	<div class="botum">第<span style="color:#FFFFFF"><?php echo $page1?></span>页</div> 
	<div class="botum"><a href="?page=<?=$coun_page1?>"> 尾页</a></div> 
	<div class="botum"><a href="?page=<?=$page1+1?>"> 下一页</a></div>	
	<div class="botum"> <a href="?page=<?=$page1-1?>">上一页</a></div>
	<div class="botum"><a href="?page=1">首页</a></div>
	</td>
  </tr>
     </tbody>
     </table>
	 </center>
   </div>
</div>


</body>
</html>
