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
        <br>
        <center>
           <a href="A-Smodify.php?fe=1"><div class="dl2" style="float:none;	display: inline;margin: 20px;">修改头像</div></a>
           <a href="A-Smodify.php?fe=2"><div class="dl2" style="float:none;display: inline;margin: 20px ;">修改资料</div></a>
       </center>
        <?php
            if(isset($_GET["fe"])&&$_GET["fe"]==1){
        ?>
            <div class="SimgK">
                <center><h3>修改头像</h3></center>
                <h4>原头像</h4>
                <div   class="dimg1"><img src="../image/<?=$guo["img"]?>" width="90" height="90"></div>
                <h4>新头像</h4>
                <form action="A-Smodify.php?fe=1" method="post" enctype="multipart/form-data"><input type="file" name="myfile" id=""><input type="submit" value="预览"></from>
                 <?php
                 if(isset($_FILES["myfile"])&&$_FILES["myfile"]!=""){
                     if(($_FILES["myfile"]["type"]=="image/jpeg" || $_FILES["myfile"]["type"]=="image/png"|| $_FILES["myfile"]["type"]=="image/jpg") && $_FILES["myfile"]["size"]<1024000)
                    {
                        //找到文件的名称
                        $filename =$_FILES["myfile"]["name"];
                        //转换编码格式
                        $filename = iconv("UTF-8","gb2312",$filename);
                        $filename="../image/".$filename;
                        ?>
                        <div class="dimg1"> <img src="<?=$filename?>" width="90" height="90"></div><br>
                        <a href="dispose/Supimg.php?url=<?=$filename?>"><div class="dl2">提交</div></a>
            
                        <?php
                        }else{?>
                          </br><script>alert('请选择图片文件')</script>
                     <?php
                        }
                    }
                    ?> 
            </div>
        <?php
        }else if(isset($_GET["fe"])&&$_GET["fe"]==2){
        ?>
        <div class="SimgK">
            <center>
               <form action="dispose/AModify.php?ID=<?=$guo['SID']?>&qb=0" method="post" enctype="multipart/form-data">
                     <table width="500" class="linear1"  style="width:400px; border-radius:50px;">  
                        <caption>修改资料</caption>
                            <tr>
                            <td height="31">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="38" width="300" align="right">管理员编号：</td>
                            <td align="left">&nbsp;<?=$guo['SID']?></td>
                        </tr>
                        <tr>
                            <td width="200" height="38" align="right">管理员名称：</td>
                            <td width="528" align="left">&nbsp;<input name="Sname" type="text"  value="<?=$guo['Sname']?>" size="20"/></td>
                        </tr>
                            <tr>
                            <td width="200" height="38" align="right">性别：</td>
                            <td width="528" align="left">&nbsp;<input name="sex" type="text"  value="<?=$guo['Ssex']?>" size="20"/></td>
                        </tr>
                        <tr>
                            <td height="38" align="right">手机号：</td>
                            <td align="left">&nbsp;<input type="text" name="phone" value="<?=$guo['phone']?>"></td>
                        </tr>
                        <tr>
                            <td height="38" align="right">密码:</td>
                            <td align="left">&nbsp;<input type="password" name="pw" value="<?=$guo['password']?>"></td>
                        </tr>
                        <tr>
                            <td height="80" colspan="2" align="center"><input  type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" /></td>
                            </tr>
                        </table>
                    </form>
            </center>
        </div>
        <?php
        }
        ?>

    </div>
  </div>
</body>
</html>
