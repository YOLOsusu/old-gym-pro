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
      

    
    <div class="right" style="background:url(../image/ghfdhxfdh.jpg)">
        <p>
        <h2 style=" text-indent:4em; font-weight:bold; color:#33CCCC;">为每一位健身爱好者而服务</h2>
    
        <h2 style=" text-indent:22em; font-weight:bold; color:#33CCCC;">把服务一步一步做得更好</h2>
        </p>
    </div>
  </div>
</body>
</html>
