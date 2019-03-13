<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link  href="../css-php/MCcss.css" rel="stylesheet" type="text/css" />
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

</scrip>
</head>
<?php
include('../connect/connect.php');
include('../fount/fount.php');
$fc = new func();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
$CID=$_COOKIE['ID'];
$sql="select * from coach where CID='$CID'";
$rs=$link->query($sql);
$row=$rs->fetch_assoc();

$MID=$_GET['ID'];
$sql1="select * from m_member where MID='$MID'";
$rs1=$link->query($sql1);
$row1=$rs1->fetch_assoc();
?>


<body bgcolor="#CCCCCC">

    <div class="all" >
      <div class="dtop"  style="background: url(../image/11122.png)">
      <marquee>
      <span style="font-size:24px;font-weight:bold; color:#0EA8F3">欢迎教练<span style="color: #33FFFF; border-color:#000000;">(<?=$row['Cname']?>)</span>登陆</span>
      </marquee>

    </div>
    <div class="dmidou" style="background-color:#FFF;">
       <a href="coach-tj.php" style="display: inline;" ><input type="button" value="返回" ></a>
      <center> <h3 ><?=$row1['Mname']?>的体检表</h3></center>
       <div class="Tjb">
         <form action="Tjint.php?ID=<?=$MID?>" method="post">
         <center>
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

    <div  class="down">
        <center>
        <hr color="#DDD8D8"   /> 
        技术支持：河池学院计算机与信息工程学院15计技班 徐舒玲
      </center>
      </div>
    </div>

    <?php
    }else{
    
      $fc->alrt('登录超时，请重新登录','../Login/Login.html');
    }
    ?>

</body>
</html>
