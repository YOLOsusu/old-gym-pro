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
   <?php
   include('../connect/connect.php');
    $TID=$_GET['ID'];
    $sql1="select * from hsports where ID=$TID";
    $rs1=$link->query($sql1);
    $row1=$rs1->fetch_assoc();
   
   ?>
  <div class="main">
       <p>修改热门课程文章</p>
       <form  action="dispose/HSm-into.php?ID=<?=$TID?>" method="post" enctype="multipart/form-data">
           &nbsp;&nbsp;名称:</br><input type="text" name="BT"style="width:480px;" value="<?=$row1['Hname']?>">&nbsp;&nbsp;作者:<input type="text" name="writer" value="<?=$row1['Hwriter']?>"></br>
           &nbsp;&nbsp;主要内容:</br><textarea  name="content"  style="width:750px;height:500px;visibility:hidden;"> <?php echo $row1['Hconten'];?></textarea>
           &nbsp;&nbsp;主要来源:<input type="text" name="ly1" value="<?=$row1['Horigin']?>" >
           &nbsp;&nbsp;封面:<input type="file" name="myfile">
        </br>
         <center>
           <input name="submit" type="submit"  value="提交" style="width:60px;"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" style="width:60px;"/>
         </center>
      </from>
        <a href="acticle.php"><input type="button" value="返回" style="width:50px;"/></a>
      
     
  </div>

</body>