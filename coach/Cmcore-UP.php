
<?php
include('../connect/connect.php');
include('../fount/fount.php');
if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
    $fc = new func();
    $FID=$_GET['FID'];
    $MID=$_GET['MID'];
    $score=$_POST['score'];
    $sql1="update m_study set score='$score' where MID=$MID and FID=$FID ";
    $rs1=$link->query($sql1);
    $aff=$link->affected_rows;
    if($aff>0){
        $fc->alrt1('C-Mscore.php?FID='.$FID);

    }else{
        $fc->alrt('评分失败','C-Mscore.php?FID='.$FID);
    }
}else{
    $fc->alrt('登录超时，请重新登录','../Login/Login.html');
}
?>
