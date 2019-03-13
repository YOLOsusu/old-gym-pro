<meta content="charset=utf-8" />
<?php
include('../../connect/connect.php');
include('../../fount/fount.php');
include('GLpower.php');  
$fc = new func(); 
$ap = new AllotPover();
       @$name=$_POST['Sname'];
        @$sex=$_POST['sex'];
        @$ph=$_POST['phone'];
        @$pw=$_POST['pw'];
        @$add=$_POST['add'];
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $AD=$_COOKIE['ID'];
    $int=9;
    $Jg=$ap->apover("$AD","$int");
    if($Jg==1){
        if(isset($_GET['ID'])&&$_GET['ID']!==''){
            if(isset($_GET['dl'])&&$_GET['dl']==1){
                $id2=$_GET['ID'];
                $sql2="delete from employee where ID=$id2";
                $rs2=$link->query($sql2);
                $aff2=$link->affected_rows;
                if($aff2>0){
                    $fc->alrt('删除员工信息成功','../emploee.php');
                }else{
                    $fc->alrt('删除员工信息失败','../emploee.php');
                }

            }else{
                if($_POST['Sname']!=""&&$_POST['sex']!=""&&$_POST['phone']!=""&&$_POST['pw']!=""&&$_POST['add']!=""){
                    $id1=$_GET['ID'];
                    $sql1="update employee set name='$name',Esex='$sex',phone='$ph',password='$pw',address='$add' where ID=$id1";
                    $rs1=$link->query($sql1);
                    $aff1=$link->affected_rows;
                    if($aff1>0){
                        $fc->alrt('修改员工信息成功','../emploee.php');
                    }else{
                        $fc->alrt('修改员工信息失败，请注意认真填写信息','../emploee.php');
                    }
                }else{
                    $fc->alrt('请将信息填写完整','../emploee.php');
                }
            }
    
        }else{
            if($_POST['Sname']!=""&&$_POST['ID']!=""&&$_POST['sex']!=""&&$_POST['phone']!=""&&$_POST['pw']!=""&&$_POST['add']!=""){
                $id=$_POST['ID'];
                $url='7777.png';
                $sql="insert into employee(ID,name,Esex,phone,password,address,img) values('$id','$name','$sex','$ph','$pw','$add','$url')";
                $rs=$link->query($sql);
                $aff=$link->affected_rows;
                if($aff>0){
                    $fc->alrt('添加员工成功','../emploee.php');
                }else{
                    $fc->alrt('添加员工失败，请注意认真填写信息','../emploee.php');
                }
            }else{
                $fc->alrt('请将信息填写完整','../emploee.php');
            }
        }
    }else{
        $fc->alrt('不好意思您没有使用该功能的权限','../Adj-tb.php');
    }
                
}else{ 
	 $fc->alrt('登录超时，请重新登录!','../../Login/Login.html');
}

