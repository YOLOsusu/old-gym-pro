
<meta http-equiv="Content-Type" content="charset=utf-8">
<?php
class  AllotPover{
function apover($id,$int){
    $zd="";
    if($int==0){
        $zd="Mgl";//会员管理
        }elseif($int==1){
           $zd="Cgl";//教练
           }elseif($int==2){
              $zd="Fgl";//课程管理
             }elseif($int==3){
                 $zd="Ggl";//房间管理
                }elseif($int==4){
                     $zd="Egl";//器材管理
                    }elseif($int==5){
                         $zd="Tgl";//文章栏目管理
                        }elseif($int==6){
                            $zd="Sgl";//意见管理
                            }elseif($int==7){
                                 $zd="Agl";//管理员管理
                                 }elseif($int==8){
                                    $zd="TLu";//体检管理
                                    }elseif($int==9){
                                        $zd="SEgl";//员工管理
                                    }elseif($int==10){
                                        $zd="DJgl";//登记管理
                                        } 
    include('../../connect/connect.php');                   
    $sql="select * from power where ID='$id'";
    $rs=$link->query($sql);
    $row=$rs->fetch_assoc();
    return $row[$zd];
}

}

?>