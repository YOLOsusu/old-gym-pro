<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>教练列表</title>
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
	    <div  class="drr">教练列表</div></td>
  </tr>
  <?php
     include("Tongji.php");
  ?>
  <tr>
    <td height="45"><div class="dli"><a href="pass.php"><?php if($coun2>0){  ?><div class='dot'><?php echo $coun2;?></div><?php } ?>审核</a></div>
    <div class="dli"><?php if($coun5>0){?><div class='dot'><?php echo $coun5;?></div><?php } ?><a href="Infor.php">意见</a></div></td>
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
 
   <div class="right" >
<center>
    <form action="A-cxx.php" method="post">
      请输入教练编号
      <input type="text" name="HD">
      <input type="submit" value="搜索">
    </form>
    <a href="A-cxx.php"><input type="button" value="全部"></a>
<?php
include('../connect/connect.php');
  if(isset($_POST['HD'])){
    $CID=$_POST['HD'];
    $chaxun="select * from c_coach where CID=$CID";
    $jieguo=$link->query($chaxun);
    $aff=$link->affected_rows;
    if($aff>0){
    ?>
 <table width="1013"   >
   <br>
   <caption>教练信息</caption>
  <tbody>
    <tr class="tr1">
      <td width="75" height="31">教练号</td>
      <td width="75">姓名</td>
      <td width="51">性别</td>
      <td width="119">手机号</td>
      <td width="127">密码</td>
      <td width="167">擅长</td>
      <td width="259">家庭住址</td>
      <td width="104">操作</td>
    </tr>
	
	 <?php
   while($row1=$jieguo->fetch_assoc()){
  
    ?>
    <tr  class="linear">
      <td height="38"><?=$row1['CID']?></td>
      <td><?=$row1['Cname']?></td>
      <td><?=$row1['Csex']?></td>
      <td><?=$row1['phone']?></td>
      <td><?=$row1['password']?></td>
      <td><?=$row1['Cnice']?></td>
      <td><?=$row1['Caddress']?></td>
      <td><a href="C-Modify.php?ID=<?=$row1['CID']?>">修改</a>|<a href="dispose/Camputate.php?ID=<?=$row1['CID']?>" style="text-decoration:none" onClick="return confirm('真的要删除么')">删除</a></td>
    </tr>
	<?php
   }
    ?>
  </tbody>
</table> 
 <?php
  }else{
  ?>
    <caption>无该教练信息</caption>
    <?php
    }
  }else{

$sql="select * from c_coach ";
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
$sql1="select * from c_coach limit $m,$n";
//$sql1="call Acpage($m,$n)";
$rs=$link->query($sql1);

?>

   <table width="1013"   >
   <caption >教练列表</caption>
  <tbody>
    <tr class="tr1">
      <td width="75" height="31">教练号</td>
      <td width="75">姓名</td>
      <td width="51">性别</td>
      <td width="119">手机号</td>
      <td width="127">密码</td>
      <td width="167">擅长</td>
      <td width="259">家庭住址</td>
      <td width="104">操作</td>
    </tr>
	
	 <?php
   while($row=$rs->fetch_assoc()){
  
    ?>
    <tr  class="linear">
      <td height="38"><?=$row['CID']?></td>
      <td><?=$row['Cname']?></td>
      <td><?=$row['Csex']?></td>
      <td><?=$row['phone']?></td>
      <td><?=$row['password']?></td>
      <td><?=$row['Cnice']?></td>
      <td><?=$row['Caddress']?></td>
      <td><a href="C-Modify.php?ID=<?=$row['CID']?>">修改</a>|<a href="dispose/Camputate.php?ID=<?=$row['CID']?>" style="text-decoration:none" onClick="return confirm('真的要删除么')">删除</a></td>
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
<?php
}
?>
   </center>
  </div>
</div>
</body>

</html>
