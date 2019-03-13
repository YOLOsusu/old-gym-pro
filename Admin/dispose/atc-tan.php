<meta content="charset=utf-8" />
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
        if($_POST['BT']!=""&& $_POST['writer']!=""&& $_POST['content']!=""&&$_POST['ly']!=""&&$_POST['lm']!=""&&$_FILES["file"]["name"]!=""){
            if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png") && $_FILES["file"]["size"]<1024000)
            {
                //找到文件存放的位置
                $filename = $_FILES["file"]["name"];
                
                //转换编码格式
                $filename = iconv("UTF-8","gb2312",$filename);
                $filename="M-Fitness/image/".$filename;
            }

            $name=$_POST['BT'];
            $writer=$_POST['writer'];
            $conten=$_POST['content'];
            $ly=$_POST['ly'];
            $id=$_POST['lm'];
            $sql1="insert into article(ATCname,Writer,ATCmain,ATCorigin,ID,Cover) values('$name','$writer','$conten','$ly','$id','$filename')";
            $rs1=$link->query($sql1);
            $aff1=$link->affected_rows;
            if($aff1>0){
                $fc->alrt('添加文章成功','../acticle.php');
            }else{
                $fc->alrt('添加文章失败，请注意认真填写信息','../ATC-tan.php');
            }
        }else{
            $fc->alrt('请将信息填写完整','../ATC-tan.php');
        }
	}else{
		$fc->alrt('不好意思您没有使用该功能的权限！','../acticle.php');
		}
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}




?>