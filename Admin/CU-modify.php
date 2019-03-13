<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
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
	       <div class="drr" >栏目管理</div></td>
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
  $id=$_GET['ID'];
  $sql1="select * from column1 where ID=$id";
  $rs=$link->query($sql1);
?>
<center>
   <table width="499" style=" text-align:center">
   <caption >修改栏目名称</caption>
   <tr class="tr1">
     <td width="103" height="34">序号</td>
     <td width="266">栏目名称</td>
   </tr>
 <form action="dispose/CUModify.php?ID=<?=$row['ID']?>" method="post">
  	 <?php
        while($row=$rs->fetch_assoc()){
     ?>
    <tr class="linear">
       <td height="40"><?=$row['ID']?></td>
       <td><input type="text" name="name" value="<?=$row['CUname']?>"></td>
    </tr>
     <?php } ?>
    </table>
    <input name="tj" type="submit" value="提交">&nbsp;&nbsp;<input name="cz" type="reset" value="重置">
 </from>
</center>
</div>
</div>


</body>


</html>
