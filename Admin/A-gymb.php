<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <td height="45"> <div class="dli" ><a href="A-clb.php">课表</a></div>
	       <div class="drr">房间列表</div></td>
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
include('../connect/connect.php');
$sql="select * from g_gym ";
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
$sql1="select * from g_gym LIMIT $m,$n";
$rs=$link->query($sql1);



?>

    
   
<center>
   <table width="600" style="text-align:center" >
   <caption >房间列表</caption>
  <tbody>
    <tr class="tr1">
      <td width="103" height="31">房间号</td>
      <td width="213">房间名称</td>
      <td width="115">开课门数</td>
      <td width="72">操作</td>
      <td width="73">其它</td>
    </tr>
	 <?php
  while($row=$rs->fetch_assoc()){
  
		$GID=$row['GID'];
		$sql2="select count(*) from f_cla where GID=$GID";
		$rs2=$link->query($sql2);
		/*$row2=$rs2->fetch_assoc();*/
		$row2=$rs2->fetch_array();
		
  ?>
  

    <tr  class="linear">
      <td height="38"><?=$row['GID']?></td>
      <td><?=$row['Gname']?></td>
      <td><?=$row2['count(*)']?></td>
	  
      <td><a href="G-modify.php?ID=<?=$row['GID']?>">修改</a>|<a href="dispose/Gamputate.php?ID=<?=$row['GID']?>" onClick="return confirm('真的要删除么')">删除</a></td>
      <td>详情</td>
    </tr>
	<?php
   }
    ?>
	  <tr>
    <td height="39" colspan="10">
	<div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page ?></span>页</div>
	<div class="botum">第<span style="color:#FFFFFF"><?php echo $page?></span>页</div> 
	<div class="botum"><a href=""> 尾页</a></div> 
	<div class="botum"><a href=""> 下一页</a></div>	
	<div class="botum"> <a href="">上一页</a></div>
	<div class="botum"><a href="">首页</a></div>	</td>
  </tr>
  </tbody>
</table> 
   </center>
</div>
	    
   
   
   
   </div>
</div>




</body>
</html>
