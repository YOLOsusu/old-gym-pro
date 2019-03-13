<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
//查看是否登录
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
      $AD=$_COOKIE['ID'];
      $int=4;//器材管理的编号
      $Jg=$ap->apover("$AD","$int");
      if($Jg==1){
            
            @$name=$_POST['name'];
            @$use=$_POST['use'];
           @$address=$_POST['address'];
            @$Ajde=$_POST['Ajde'];
            @$Udate=$_POST['Udate'];
           @$Acon=$_POST['Acon'];
            @$state=$_POST['state'];

            //判断图片文件
            if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png"|| $_FILES["file"]["type"]=="image/jpg") && $_FILES["file"]["size"]<1024000)
            {
                $filename = $_FILES["file"]["name"];
                //转换编码格式
                $filename = iconv("UTF-8","gb2312",$filename);
                $url="../image/".$filename;
            }
            //器材修改
            if(isset($_GET['ID'])&&$_GET['ID']!=""){
                  $ID=$_GET['ID'];
                  if($_POST['name']!=""&&$_POST['use']!=""&&$_POST['address']!=""&&
                  $_POST['Ajde']!=""&&$_POST['Udate']!=""&&$_POST['Acon']!=""&& $_POST['state']!=""&&$_FILES["file"]["name"]!=""){
                        $sql1="update apparatus set Aname='$name',Ajdate='$Ajde',Ayear='$Udate',GID='$address',Acon='$Acon',Astate='$state',Usew='$use',img='$url'  where AID='$ID' " ;
                        $rs1=$link->query($sql1);
                        $aff1=$link->affected_rows;
                        if($aff1>0){
                        $fc->alrt('修改器材信息成功！','../Ekit.php');
                        }else{
                        $fc->alrt('修改器材信息失败！','../A-Modify.php?ID='.$ID);
                        }
                  }else{
                        $fc->alrt('请将信息填写完整','../A-Modify.php?ID='.$ID);
                  }
            //器材添加
            }else{
                  if($_POST['name']!=""&&$_POST['use']!=""&&$_POST['address']!=""&&
                  $_POST['Ajde']!=""&&$_POST['Udate']!=""&&$_POST['Acon']!=""&& $_POST['state']!=""&&$_FILES["file"]["name"]!=""){
                        $sql="insert into apparatus(Aname,Ajdate,Ayear,GID,Acon,Astate,Usew,img) values('$name','$Ajde','$Udate','$address','$Acon','$state','$use','$url')";
                        $rs=$link->query($sql);
                        $aff=$link->affected_rows;
                        if($aff>0){
                               $fc->alrt('添加器材信息成功！','../Ekit.php');
                        }else{
                               $fc->alrt('添加器材信息失败！','E-tan.php');
                        }
                  }else{
                        $fc->alrt('请将信息填写完整','../E-tan.php');
                  }
            }
      }else{
            $fc->alrt('不好意思您没有使用该功能的权限!','../Ekit.php');
      }
}else{ 
     $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}
?>