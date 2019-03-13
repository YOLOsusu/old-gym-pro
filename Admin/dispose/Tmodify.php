
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php'); 
$fc = new func();
$ap = new AllotPover();
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=5;
    $Jg=$ap->apover("$AD","$int");//权限查询
    //权限查询
    if($Jg==1){
        $ID=$_GET['ID'];
        if($_POST['BT']!=""&& $_POST['writer']!=""&& $_POST['content']!=""&&$_POST['ly1']!=""&&$_POST['lm']!=""&&$_FILES["myfile"]["name"]!=""){
            //获取图片信息
            if(($_FILES["myfile"]["type"]=="image/jpeg" || $_FILES["myfile"]["type"]=="image/png"|| $_FILES["myfile"]["type"]=="image/jpg") && $_FILES["myfile"]["size"]<1024000)
            {
                //找到文件存放的位置
                $filename =$_FILES["myfile"]["name"];
                
                //转换编码格式
                $filename = iconv("UTF-8","gb2312",$filename);
                $filename="M-Fitness/image/".$filename;
            }
            //修改文章
            
            $name=$_POST['BT'];
            $writer=$_POST['writer'];
            $conten=$_POST['content'];
            $ly=$_POST['ly1'];
            $id=$_POST['lm'];
            $sql1="update article set ATCname='$name', Writer='$writer',ATCmain='$conten',ATCorigin='$ly',ID='$id',Cover='$filename'  where TID=$ID";
            $rs1=$link->query($sql1);
            $aff1=$link->affected_rows;
            if($aff1>0){
                $fc->alrt('修改文章成功','../acticle.php');
            }else{
                $fc->alrt('修改文章失败','../T-modify.php?ID='.$ID);
            }
        }else{
            $fc->alrt('请将信息填写完整','../T-modify.php?ID='.$ID);
        }
    //判断无权限时立即返回   
	}else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../acticle.php');
        }
//发现未登录时立即跳转登录页面
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}
	

?>


