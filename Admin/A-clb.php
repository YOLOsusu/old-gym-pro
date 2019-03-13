<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <td width="227" height="45"><div class="dl2"><a href="member-fee.php">收益详情</a></div>
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
    <td height="45"> <div  class="drr">课表</div>
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
    

   
   <div class="right" >
 <?php

$sql="select * from f_cla ";
mysqli_query($link,$sql);
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
$sql1="select * from f_cla LIMIT $m,$n";
$rs=$link->query($sql1);



?>

    
   
<center>
   <table width="1000"  style=" text-align:center" >
   <caption >课程列表</caption>
  <tbody>
    <tr class="tr1">
      <td width="74" height="31">课程编号</td>
      <td width="86">课名</td>
      <td width="179">上课时间</td>
      <td width="215">上课地点</td>
      <td width="74">课时</td>
      <td width="70">人数</td>
      <td width="65">学费</td>
      <td width="110">操作</td>
      <td width="87">其它</td>
    </tr>
	 <?php
  while($row=$rs->fetch_assoc()){
  
		$GID=$row['GID'];
		$sql2="select * from g_gym where GID=$GID";
		$rs2=$link->query($sql2);
		$row2=$rs2->fetch_assoc();
  ?>
  

    <tr  class="linear">
      <td height="38"><?=$row['FID']?></td>
      <td><?=$row['Fname']?></td>
      <td><?=$row['Ftime']?></td>
      <td><?=$row2['GID']?>号|<?=$row2['Gname']?></td>
      <td><?=$row['Fdate']?></td>
      <td><?=$row['Mcoute']?></td>
      <td><?=$row['Fmoney']?></td>
      <td><a href="F-modify.php?ID=<?=$row['FID']?>">修改</a>|<a href="dispose/Famputate.php?ID=<?=$row['FID']?>" onClick="return confirm('真的要删除么')">删除</a></td>
	  <td><a href="Fclass-xq.php?ID=<?=$row['FID']?>">详情</a></td>
    </tr>
	<?php
   }
    ?>
	  <tr>
    <td height="39" colspan="9">
	<div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page ?></span>页</div>
	<div class="botum">第<span style="color:#FFFFFF"><?php echo $page?></span>页</div> 
	<div class="botum"><a href="?page=<?=$coun_page?>"> 尾页</a></div> 
	<div class="botum"><a href="?page=<?=$page+1?>"> 下一页</a></div>	
	<div class="botum"> <a href="?page=<?=$page-1?>">上一页</a></div>
	<div class="botum"><a href="?page=1">首页</a></div>	</td>
  </tr>
  </tbody>
</table> 
   </center>
</div>
	    
   
   
   
   </div>
</div>

</body>



</html>
