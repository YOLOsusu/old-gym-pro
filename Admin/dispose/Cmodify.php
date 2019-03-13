<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID']; 
    $ID=$_GET['ID'];
    $int=1;
    $Jg=$ap->apover("$AD","$int");//查询权限
    //判断权限
    if($Jg==1){
       
        if($_POST['Cname']!=""&&isset($_POST['Csex'])&&$_POST['Csex']!=""&&$_POST['date2']!=""&&$_POST['phone']!=""&&$_POST['Caddress']!=""&&$_POST['cnice']!=""&&isset($_FILES["file"])&&$_FILES["file"]["name"]!=""){
            $name=$_POST['Cname'];
            @$sex=$_POST['Csex'];
            $bir=$_POST['date2'];
            $pho=$_POST['phone'];
            $address=$_POST['Caddress'];
            $cnice=$_POST['cnice'];
            //获取图片信息
            if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png") && $_FILES["file"]["size"]<1024000)
            {
                //找到文件存放的位置
                $filename = $_FILES["file"]["name"];
                
                //转换编码格式
                $filename = iconv("UTF-8","gb2312",$filename);
                $url="../image/".$filename;
            }
        //修改教练信息
            $sql="update c_coach set Cname='$name',Csex='$sex',Cbir='$bir',phone='$pho',Caddress='$address',Cnice='$cnice',img='$url' where CID='$ID'";
            $rs=$link->query($sql);
            $aff=$link->affected_rows;
            if($aff>0){
                $fc->alrt('修改成功','../A-cxx.php');

            }else{
                $fc->alrt('修改失败,请认真填写信息','../C-modify.php?ID='.$ID);
            }
        }else{
            $fc->alrt('请将信息填写完整','../C-modify.php?ID='.$ID);  
        }
    }else{
        $fc->alrt('不好意思您没有使用该功能的权限!','../A-cxx.php');
    }
}else{ 
$fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}
?>