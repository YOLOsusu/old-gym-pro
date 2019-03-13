<!doctype html>
<html>
<head>
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
	        <div class="drr">文章管理</div></td>
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
      $sql1="select * from article";
      $rs=$link->query($sql1);
      ?> 
      <center>
        <table width="950" style="text-align:center" >
        <caption >侧边文章列表</caption>
        <tbody>
          <tr class="tr1">
            <td width="103" height="31">序号</td>
            <td width="250">文章标题</td>
            <td width="115">文章作者</td>
            <td width="120">文章来源</td>
            <td width="150">栏目</td>
            <td width="100">操作</td>
            <td width="70">其它</td>
          </tr>
         <?php
         while($row=$rs->fetch_assoc()){
        
            $ID=$row['ID'];
            $sql2="select * from column1 where ID=$ID";
            $rs2=$link->query($sql2);
            $row2=$rs2->fetch_assoc();
          ?>
          <tr  class="linear">
            <td height="38"><?=$row['TID']?></td>
            <td><?=$row['ATCname']?></td>
            <td><?=$row['Writer']?></td>
            <td ><?=$row['ATCorigin']?></td>
            <td ><?=$row2['CUname']?></td>
            <td><a href="T-modify.php?ID=<?=$row['TID']?>">修改</a>|<a href="dispose/Tamputate.php?ID=<?=$row['TID']?>" onClick="return confirm('真的要删除么')">删除</a></td>
            <td><a href="acticle-xq.php?ID=<?=$row['TID']?>">详情</a></td>
          </tr>
         <?php
         }
          ?>
        <tr>
          <td height="39" colspan="10">
          <div class="botum" style="background-color:#FF9999;"><a href="ATC-tan.php">添加</a></div>
        </td>
        </tr>
        </tbody>
        </table> 

            <?php
          
            $sql1="select * from hsports";
            $rs=$link->query($sql1);
            ?> 
            
              <table width="950" style="text-align:center" >
              <caption >热门课程列表</caption>
              <tbody>
                <tr class="tr1">
                  <td width="103" height="31">序号</td>
                  <td width="250">热门课程名称</td>
                  <td width="115">文章作者</td>
                  <td width="120">文章来源</td>
                  <td width="100">操作</td>
                </tr>
              <?php
              while($row=$rs->fetch_assoc()){
          
              ?>
                <tr  class="linear">
                  <td height="38"><?=$row['ID']?></td>
                  <td><?=$row['Hname']?></td>
                  <td ><?=$row['Horigin']?></td>
                  <td><?=$row['Hwriter']?></td>
                  <td><a href="HS-modify.php?ID=<?=$row['ID']?>">详情</a>|<a href="dispose/HS-delete.php?ID=<?=$row['ID']?>" onClick="return confirm('真的要删除么')">删除</a></td>
                </tr>
              <?php
              }
                ?>
              <tr>
                <td height="39" colspan="10">
                <div class="botum" style="background-color:#FF9999;"><a href="HS-tan.php">添加</a></div>
              </td>
              </tr>
              </tbody>
            </table>            
        </center>

   </div>

 </div>
</body>
</html>
