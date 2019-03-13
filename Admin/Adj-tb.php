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
        <center>
        <form action="Adj-tb.php" method="post">
            <input type="date" name="date">
            <input type="submit" value="搜索"> 格式：2017-01-01
        </from>
        <a href="Adj-tb.php"><input type="button" value="全部"></a>
        </center>
        <?php
        if(isset($_POST['date'])&&$_POST['date']!=""){
            @$date=$_POST['date'];
            $sql1="SELECT e.name, group_concat( m.Mname ) 
            FROM m_member m
            JOIN checkin c ON ( m.MID = c.MID ) 
            JOIN employee e ON ( c.ID = e.ID ) 
            WHERE c.Jdate = '$date'
            GROUP BY e.name";
            $rs1=$link->query($sql1);
            $aff1=$link->affected_rows;
            if($aff1>0){
        ?>
              <table  width="700" style="text-align:center;margin:10px auto" >
              <tbody > 
                <tr class="tr1">
                    <td  width="150" height="38">日期</td>
                    <td  width="400">会员</td>
                    <td  width="150">员工</td>
                    <td  width="80">操作</td>
                </tr>
                
                    <?php 
                    while($row1=$rs1->fetch_assoc()){
                    ?>
                    <tr class="linear">
                        <td height="38"><?=$date?></td>
                        <td><?=$row1["group_concat( m.Mname )"]?></td>
                        <td><?=$row1['name']?></td>
                        <td  width="80"><a href="dispose/Adj-delete.php?da=<?=$row1['Jdate']?>">删除</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
            }else{
                echo "<br><center>该日无登记</center>";
                die;
            }
        }else{
            $sql="select * from FROM m_member m
            JOIN checkin c ON ( m.MID = c.MID ) 
            JOIN employee e ON ( c.ID = e.ID )";
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
            $sql0="SELECT c.Jdate,e.name, group_concat( m.Mname ) 
            FROM m_member m
            JOIN checkin c ON ( m.MID = c.MID ) 
            JOIN employee e ON ( c.ID = e.ID ) 
            GROUP BY e.name,c.Jdate
            limit $m,$n";
            //$sql1="call Acpage($m,$n)";
            $rs=$link->query($sql0);
            
       
        ?>
        <table  width="700" style="text-align:center;margin:10px auto" >
            <tbody>
                <tr class="tr1">
                    <td  width="150" height="38">日期</td>
                    <td  width="400">会员</td>
                    <td  width="150">员工</td>
                    <td  width="80">操作</td>
                </tr>
                 <?php 
                    while($row=$rs->fetch_assoc()){
                    ?>
                <tr class="linear">
                     <td height="38"><?=$row['Jdate']?></td>
                    <td><?=$row["group_concat( m.Mname )"]?></td>
                    <td><?=$row['name']?></td>  
                    <td  width="80"><a href="dispose/Adj-delete.php?da=<?=$row['Jdate']?>">删除</a></td> 
                </tr>
                 <?php
                    }
                    ?>
                    <tr>
                    <td height="39" colspan="8">
                    <div class="botum">总<span style="color:#FFFFFF"><?php echo $coun_page ?></span>页</div>
                    <div class="botum">第<span style="color:#FFFFFF"><?php echo $page?></span>页</div> 
                    <div class="botum"><a href="?page=<?php echo $coun_page?>"> 尾页</a></div> 
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
    </div>
  </div>
</body>
</html>
