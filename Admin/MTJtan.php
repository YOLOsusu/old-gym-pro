<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link  href="../css-php/Admin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
function $(id){return document.getElementById(id);}
function show(){
  var a1=parseFloat($("yww").value);
  var a2=parseFloat($("tww").value);
  if(a1>0 && a2>0 && a1!="" && a2!=""){
       var a3=a1/a2;
       var a4=a3.toFixed(2); 
      $("ytb").value=a4;

  }else{
  alert("请输入两个非0的参数");
  }

}
</script>
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
         <center> <h3>会员体检表(录入)</h3></center>
         <div class="Tjb">
                <form action="dispose/MTjinto.php" method="post">
                <center>
                姓名<input type="text" name="Mname">&nbsp;&nbsp;
                会员号<input type="text" name="MID" ><br>   
                运动史描述<br>
                <textarea rows="2" cols="60" name="ys"></textarea><br>
                运动系统伤病描述（如肌肉劳损、颈椎病、肩背痛、关节扭伤、风湿等）<br>
                <textarea rows="2" cols="60" name="yc"></textarea><br>
                体检时间<input type="text" name="sj" value="<?php echo date("Y-m-d");?>">&nbsp;&nbsp;
                身高(cm)<input type="number" name="sg"> <br>
                体重(kg)<input type="number" name="tz">&nbsp;&nbsp;
                体重指数<input type="number" name="tzzs"><br>
                脂肪率<input type="text" name="zfl">&nbsp;&nbsp;
                静心率<input type="text" name="jxl" ><br>
                上臂(左)<input type="text" name="lb">&nbsp;&nbsp;
                上臂(右)<input type="text" name="rb"><br>
                肩围<input type="text" name="jw">&nbsp;&nbsp;
                腰围<input type="text" name="yw" id="yww"><br>
                臀围<input type="text" name="tw" id="tww">&nbsp;&nbsp;
                腰臀比<input type="text" name="ytb" id="ytb" onclick="show();"><br>
                大腿(左)<input type="text" name="dtl" >&nbsp;&nbsp;
                大腿(右)<input type="text" name="dtr" ><br>
                教练签名<input type="text" name="cname" class="cname"><br>
                <input type="submit" value="提交"> &nbsp;&nbsp;<input type="reset" value="重设">
                </center>
                </form>
         </div>
    </div>
</div>


</body>


</html>
