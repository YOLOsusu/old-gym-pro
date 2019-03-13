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
          <td height="45"><div class="dl2"><a href="Admin-tb.php">管理员</a></div>
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
    $id=$_GET['ID'];
    $sql="select * from `employee` where ID=$id ";
            $rs=$link->query($sql);
            $row=$rs->fetch_assoc()
           ?>
           <center>
             <div style="width:300px;height:500px;margin:10px">
             <form action="dispose/employee-tan.php?ID=<?=$row['ID']?>" method="post" enctype="multipart/form-data">
               <table width="500" class="linear1"  style="width:400px; border-radius:50px;">  
                    <caption>修改基本员工信息</caption>
                        <tr>
                        <td height="31">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="38" width="300" align="right">员工编号：</td>
                        <td align="left">&nbsp;<?=$row['ID']?></td>
                    </tr>
                    <tr>
                        <td width="200" height="38" align="right">员工名称：</td>
                        <td width="528" align="left">&nbsp;<input name="Sname" type="text"  size="20" value="<?=$row['name']?>" /></td>
                    </tr>
                        <tr>
                        <td width="200" height="38" align="right">性别：</td>
                        <td width="528" align="left">&nbsp;<input name="sex" type="text"  size="20" value="<?=$row['Esex']?>"/></td>
                    </tr>
                    </tr>
                        <tr>
                        <td width="200" height="38" align="right">家庭住址：</td>
                        <td width="528" align="left">&nbsp;<input name="add" type="text"  size="20" value="<?=$row['address']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">手机号：</td>
                        <td align="left">&nbsp;<input type="text" name="phone" value="<?=$row['phone']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">密码:</td>
                        <td align="left">&nbsp;<input type="text" name="pw" value="<?=$row['password']?>"></td>
                    </tr>
                    <tr>
                        <td height="80" colspan="2" align="center"><input  type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" /></td>
                        </tr>
                    </table>
                </form>
             </div>
           </center>
    </div>
  </div>
</body>
</html>
