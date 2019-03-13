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
include('../connect/connect.php');
include('../fount/fount.php');

?>

  
    <?php
    include('GLpower1.php'); 
    $ap = new AllotPover();
        $AD=$_COOKIE['ID'];
        $int=7;
        $Jg=$ap->apover("$AD","$int");
        if($Jg==1){
            $ID=$_GET['ID'];
            $sql1="select * from s_staff where SID=$ID" ;
            $rs1=$link->query($sql1);
            $row1=$rs1->fetch_assoc();

            $sql="select * from power where ID=$ID" ;
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            if($aff>0){
             $row=$rs->fetch_assoc();
             ?>
             
             <div style="width:600px;height:500px;margin:0px auto">
             <form action="dispose/Apower-fp.php?ID=<?=$ID?>&ad=1" method="post" enctype="multipart/form-data">
               <table width="600" class="linear1"  style="width:400px; border-radius:50px;" >  
                    <caption>修改管理员(<?=$row1['Sname']?>)权限</caption>
                    <tr>
                        <td height="31" colspan="2"><center style="color:red"><a href="Admin-tb.php"><input type="button" value="返回"></a>填0(表示未拥有该模块权限)或1(表示拥有该模块权限)</center></td>
                    </tr>
                    <tr>
                        <td height="38" width="300" align="right">会员管理：</td>
                        <td align="left">&nbsp;<input name="hy" type="text"  value="<?=$row['Mgl']?>" size="20"/></td>
                    </tr>
                    <tr>
                        <td width="300" height="38" align="right">教练管理：</td>
                        <td width="528" align="left">&nbsp;<input name="jl" type="text"  value="<?=$row['Cgl']?>" size="20"/></td>
                    </tr>
                        <tr>
                        <td width="400" height="38" align="right">课程管理：</td>
                        <td width="528" align="left">&nbsp;<input name="cc" type="text"  value="<?=$row['Fgl']?>" size="20"/></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">房间管理：</td>
                        <td align="left">&nbsp;<input type="text" name="fj" value="<?=$row['Ggl']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">器材管理:</td>
                        <td align="left">&nbsp;<input type="text" name="qc" value="<?=$row['Egl']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">文章栏目管理:</td>
                        <td align="left">&nbsp;<input type="text" name="tm" value="<?=$row['Tgl']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">意见管理:</td>
                        <td align="left">&nbsp;<input type="text" name="yj" value="<?=$row['Sgl']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">权限管理:</td>
                        <td align="left">&nbsp;<input type="Agl" name="qx" value="<?=$row['Agl']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">体检信息管理:</td>
                        <td align="left">&nbsp;<input type="text" name="tj" value="<?=$row['TLu']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">登记信息管理:</td>
                        <td align="left">&nbsp;<input type="text" name="dj" value="<?=$row['DJgl']?>"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">员工信息管理:</td>
                        <td align="left">&nbsp;<input type="text" name="yg" value="<?=$row['SEgl']?>"></td>
                    </tr>
                    <tr>
                        <td height="80" colspan="2" align="center"><input  type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" /></td>
                        </tr>
                    </table>
                </form>
             </div>
             <?php
            }else{
            ?>   <center>
                  <form action="dispose/Apower-fp.php?ID=<?=$ID?>&ad=0" method="post" enctype="multipart/form-data">
               <table width="600" class="linear1"  style="width:300px; border-radius:50px;">  
                    <caption>添加管理员(<?=$row1['Sname']?>)权限</caption>
                        <tr>
                        <td height="31" colspan="2"><center style="color:red"><a href="Admin-tb.php"><input type="button" value="返回"></a>填0(表示未拥有该模块权限)或1(表示拥有该模块权限)</center></td>
                    </tr>
                    <tr>
                        <td height="38" width="300" align="right">会员管理：</td>
                        <td align="left">&nbsp;<input name="hy" type="text"  value="0" size="20"/></td>
                    </tr>
                    <tr>
                        <td width="200" height="38" align="right">教练管理：</td>
                        <td width="528" align="left">&nbsp;<input name="jl" type="text"  value="0" /></td>
                    </tr>
                        <tr>
                        <td width="200" height="38" align="right">课程管理：</td>
                        <td width="528" align="left">&nbsp;<input name="cc" type="text"  value="0" /></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">房间管理：</td>
                        <td align="left">&nbsp;<input type="text" name="fj" value="0"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">器材管理:</td>
                        <td align="left">&nbsp;<input type="text" name="qc" value="0"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">文章栏目管理:</td>
                        <td align="left">&nbsp;<input type="text" name="tm" value="0"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">意见管理:</td>
                        <td align="left">&nbsp;<input type="text" name="yj" value="0"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">权限管理:</td>
                        <td align="left">&nbsp;<input type="Agl" name="qx" value="0"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">体检信息管理:</td>
                        <td align="left">&nbsp;<input type="text" name="tj" value="0"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">登记信息管理:</td>
                        <td align="left">&nbsp;<input type="text" name="dj" value="0"></td>
                    </tr>
                    <tr>
                        <td height="38" align="right">员工信息管理:</td>
                        <td align="left">&nbsp;<input type="text" name="yg" value="0"></td>
                    </tr>
                    <tr>
                        <td height="80" colspan="2" align="center"><input  type="submit"  value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="重置" /></td>
                        </tr>
                    </table>
                </form>
                  </center>

           <?php
            }
    
        }else{
            $fc->alrt('不好意思您没有使用该功能的权限','Amian.php');
        }

?>
   
   </div>

</body>
</html>
