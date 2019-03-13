
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
        if($_POST['BT']!=""&& $_POST['writer']!=""&& $_POST['content']!=""&&$_POST['ly1']!=""&&$_POST['lm']!=""&&$_FILES["myfile"]["name"]!=""){
            if(($_FILES["myfile"]["type"]=="image/jpeg" || $_FILES["myfile"]["type"]=="image/png"|| $_FILES["myfile"]["type"]=="image/jpg") && $_FILES["myfile"]["size"]<1024000)
            {
                //找到文件存放的位置
                $filename =$_FILES["myfile"]["name"];
                
                //转换编码格式
                $filename = iconv("UTF-8","gb2312",$filename);
                $filename="M-Fitness/image/".$filename;
            }
            $name=$_POST['BT'];
            $writer=$_POST['writer'];
            $conten=$_POST['content'];
            $ly=$_POST['ly1'];
            $sql1="insert into hsports(Hname,Hwriter,Hconten,Horigin,FMian) value('$name', '$writer','$conten','$ly','$filename')";
            $rs1=$link->query($sql1);
            $aff1=$link->affected_rows;
            if($aff1>0){
                $fc->alrt('添加热门课程文章成功','../acticle.php');
            }else{
                $fc->alrt('添加热门课程文章失败','../HS-tan.php');
            }
        }else{
            $fc->alrt('请将信息填写完整','../HS-tan.php');
        }
    }else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../acticle.php');
		}
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}

	

?>


