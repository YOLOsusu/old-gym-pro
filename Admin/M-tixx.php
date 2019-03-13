<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>会员体检信息</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
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
	   <a href="A-cxx.php"> <div  class="dli">教练列表</div></a></td>
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
    <td height="45"> <div  class="drr">体检信息</div>
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
include('../connect/connect.php');
$sql="select * from amedical ";
mysqli_query($link,$sql);
$coun=mysqli_affected_rows($link);
$n=4;
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
$sql1="select * from amedical limit $m,$n";
$rs=$link->query($sql1);



?>

    
   
<center>
   <table width="1013"  style=" text-align:center" >
   <caption >会员体检信息列表</caption>
  <tbody>
    <tr class="tr1">
      <td width="75" height="31">序号</td>
      <td width="75">会员号</td>
      <td width="51">时间</td>
      <td width="104">操作</td>
    </tr>
	
	 <?php
   while($row=$rs->fetch_assoc()){
  
    ?>
    <tr  class="linear">
      <td height="38"><?=$row['ID']?></td>
      <td><?=$row['MID']?></td>
      <td><?=$row['SJ']?></td>
      <td><a href="TJ-Modify.php?ID=<?=$row['ID']?>">详情</a>|<a href="M-tixx.php?ID=<?=$row['ID']?>" style="text-decoration:none" onClick="return confirm('真的要删除么')">删除</a></td>
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
    <div class="botum" style="background-color:#FF9999;"><a href="MTJtan.php">添加</a></div>
	</td>
  </tr>
	
  </tbody>
</table> 
   </center>
  </div>
</div>
</body>

</html>
