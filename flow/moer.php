<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css-php/flow.css"  rel="stylesheet" type="text/css"/>

</head>
<body>
  <div class="d1">
    <div class="d2">
      <a href="../../index.php"><input type="button" name="button" value="返回"></a>
         <?php
          $me=$_GET['me'];
          if($me==0){
             $string="鉴于对本健身中心的了解，您希望增加哪些课程？";
             $string1="同时,您对本中心的课程安排有什么合理的意见合理的建议？";
           

          }else if($me==1){
            $string="鉴于对本健身中心的了解，您希望增加擅长哪些健身项目的教练？";
            $string1=" 同时,您对本中心的教练提出合理的评价？";
          
          }else{
            $string="鉴于对健身中心现有的器材，您希望再购进哪些器材？";
            $string1=" 同时,请您评价对中心器材的体验效果？";
           
          }
         ?>
      <form action="suggest.php?qb=<?=$me?>" method="post">
      <center>
           <?php echo $string;?></br> 
          <textarea  name="cla" class="tra" rows="10" cols="70"></textarea>
          <p></br></p>
          <?php echo $string1;?></br>
          <textarea name="ccap" class="tra" rows="10" cols="70" ></textarea></br></br>
          备注
          <select name="shfe" class="tra" width="100">
               <option value="0">会员</option>
               <option value="1">游客</option>
               <option value="2">教练</option>
          </select>
          <br><br>
          <input type="submit" value="提交" class="CL" style="float:none;width:100px">&nbsp;&nbsp;
          <input type="reset" value="重设" class="CL" style="float:none;width:100px">
      </certer>;
</form>
<p></br></br></p>

    </div>

    <div class="d3">
    资讯热线电话</br><span style="color:red">0874-8693-453</span>

     
  
    </div>
  </div>
</body>
</html>