<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>

<link  href="../css-php/Acticle.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="../kindeditor/kindeditor-min.js"></script>   
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>   
<script>
   var editor;   
   KindEditor.ready(function(K) {   
   editor = K.create('textarea[name="content"]', {   
   allowFileManager : true   
   });   
});   
</script>
</head>
<body>
   
  <div class="main">
       <p>添加热门课程文章</p>
       <form  action="dispose/HS-taninto.php" method="post" enctype="multipart/form-data">
           &nbsp;&nbsp;标题:</br><input type="text" name="BT"style="width:480px;">&nbsp;&nbsp;作者:<input type="text" name="writer" ></br>
           
           &nbsp;&nbsp;主要内容:</br><textarea  name="content"  style="width:750px;height:400px;visibility:hidden;"> </textarea>
           &nbsp;&nbsp;主要来源:<input type="text" name="ly">
           &nbsp;&nbsp;封面：<br><input type="file" name='file' /></br>
         <center>
           <input name="submit" type="submit"  value="提交" style="width:60px;"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" style="width:60px;"/>
         </center>
      </from>
        <a href="acticle.php"><input type="button" value="返回" style="width:50px;"/></a>
      
     
  </div>

                                    

</body>
</html>