<!doctype>
<html>
<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<title>健身中心会员管理系统</title>
<link  href="M-Fitness/css-php/dtu.css" rel="stylesheet" type="text/css" />
<link  href="M-Fitness/css-php/fcdms.css" rel="stylesheet" type="text/css" />


</head>
<body bgcolor="#E0E0E0">
 
<div class="all">
  <div id="wrapper"><!-- 最外层部分 -->
    <div id="banner">
      <!-- 轮播部分 -->
      <ul class="imgList">
        <!-- 图片部分 -->
        <li><a href="#"><img  src="M-Fitness/image/5713677_022824181000_2.jpg"  width="900px" height="300px" alt="puss in boots1" /></a></li>
        <li><a href="#"><img   src="M-Fitness/image/1383309414441_000.jpg" width="900px" height="300px" alt="puss in boots2" /></a></li>
        <li><a href="#"><img  src="M-Fitness/image/10211560_163804455181_2.jpg" width="900px" height="300px" alt="puss in boots3" /></a></li>
        <li><a href="#"><img  src="M-Fitness/image/1628220_184641366382_2.jpg" width="900px" height="300px" alt="puss in boots4" /></a></li>
        <li><a href="#"><img  src="M-Fitness/image/3659616_121555868000_2.jpg" width="900px" height="300px" alt="puss in boots5" /></a></li>
      </ul>
      <img  src="M-Fitness/image/tb1.jpg" width="40px" height="80px" id="prev" />
      <img   src="M-Fitness/image/tb2.jpg" width="40px" height="80px" id="next" />
      <div class="bg"></div>
      <!-- 图片底部背景层部分-->
      <ul class="infoList">
        <!-- 图片左下角文字信息部分 -->
        <li class="infoOn">puss in boots1</li>
        <li>puss in boots2</li>
        <li>puss in boots3</li>
        <li>puss in boots4</li>
        <li>puss in boots5</li>
      </ul>
      <ul class="indexList">
        <!-- 图片右下角序号部分 -->
        <li class="indexOn">1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
      </ul>
    </div>
  </div>
<div  class="dh">
   
	<ul class="nav">
        <li  class="drop-down">首页</li>



        <li class="drop-down">课程
        
            <ul class="drop-down-content" style="margin:0px">
            <?php 
            include("M-Fitness\connect\connect.php");
            $sql3="select * from f_cla f join fteaching f1 on(f.FID=f1.FID) where f1.state='0'";
            $rs3=$link->query($sql3);
            while($row3=$rs3->fetch_assoc()){
              ?>
              <li class="xa"><a href="M-Fitness/flow/Flass.php?ID=<?=$row3['FID']?>"><?=$row3['Fname']?></a></li>
              <?php
                }
              ?>
				         <li class="xa"><a href="M-fitness/flow/moer.php?me=0">更多</a></li>
           </ul>
        </li>



        <li  class="drop-down" >教练 
		       <ul class="drop-down-content">
                 <li class="xa"><a href="M-fitness/flow/Coaxx.php">教练信息</a></li>
                 <li class="xa"><a href="M-fitness/flow/CoaLe.php">教练分类</a></li>
				         <li class="xa"><a href="M-fitness/flow/moer.php?me=1">更多</a></li>
           </ul>
        </li>
		
		
        <li  class="drop-down">器材
		 	     <ul class="drop-down-content">
                <li class="xa"><a href="M-fitness/flow/Exx.php">器材信息</a></li>  
               <li class="xa"><a href="M-fitness/flow/Equipment.php">器材分类</a></li>
               <li class="xa"><a href="M-fitness/flow/moer.php?me=2">更多</a></li>
           </ul>
        </li>
		 
    
        

         <li  class="drop-down">活动
		 	      <ul class="drop-down-content">
             <?php 
                 $sql7="select * from article  where ID=1";
                $rs7=$link->query($sql7);
                while($row7=$rs7->fetch_assoc()){
              ?>
                 <li class="xa"><a  href="M-Fitness/flow/CEarticle.php?ID=<?=$row7['TID']?>"><?=$row7['ATCname']?></a></li>
               <?php
                }
               ?>
          	</ul>
         </li>
	  
         <li  class="drop-down">信息
		 	      <ul class="drop-down-content">
                 <li class="xa"><a href="M-Fitness/flow/MemXx.php">会员信息</a></li>
                 <li class="xa"><a href="M-fitness/flow/Coaxx.php">教练信息</a></li>
				         <li class="xa"><a href="M-fitness/flow/staXx.php">员工信息</a></li>
				         <li class="xa"><a href="M-fitness/flow/GymXx.php">环境信息</a></li>
				         <li class="xa"><a href="M-fitness/flow/ActiveXx.php">活动信息</a></li>
           </ul>
         </li>
		  
		
         <li class="drop-down">资讯
          <ul class="drop-down-content">
                 <li class="xa"><a href="http://news.efu.com.cn/voclist-6-1-0.html">国内运动资讯</a></li>
                 <li class="xa"><a href="http://www.egouz.com/sports/">国外运动资讯</a></li>
           </ul>
         </li>
         <?php
         if(isset($_COOKIE['ID'])&&$_COOKIE['ID']!=""){
           $id=$_COOKIE['ID'];
           $sql4="select * from m_member where MID=$id";
           $rs4=$link->query($sql4);
           $aff4=$link->affected_rows;
           $row4=$rs4->fetch_assoc();
           if($aff4>0){
          
            ?>
              <li class="drop-down"><span style="font-weight:bold; color:#6699CC;"><a href="M-Fitness/member/member.php"><?=$row4['Mname']?></a></span></li>   
          <?php 
            }else{
            $sql5="select * from c_coach where CID=$id";
            $rs5=$link->query($sql5); 
            $aff5=$link->affected_rows;
            $row5=$rs5->fetch_assoc();
            if($aff5>0){
              ?>
              <li class="drop-down"><span style="font-weight:bold; color:#6699CC;"><a href="M-Fitness/coach/coach.php"><?=$row5['Cname']?></a></span></li>   
              <?php
            }else{
              $sql6="select * from s_staff where SID=$id";
              $rs6=$link->query($sql6);
              $aff6=$link->affected_rows;
              $row6=$rs6->fetch_assoc();
              if($aff6>0){
        
              ?>
              <li class="drop-down"><span style="font-weight:bold; color:#6699CC;"><a href="M-Fitness/Admin/Amian.php"><?=$row6['Sname']?></a></span></li> 
              <?php
              }else{
                $sql8="select * from employee where ID=$id";
                $rs8=$link->query($sql8);
                $aff8=$link->affected_rows;
                $row8=$rs8->fetch_assoc();
                if($aff8>0){
                  ?>
                  <li class="drop-down"><span style="font-weight:bold; color:#6699CC;"><a href="M-Fitness/employee/employee.php"><?=$row8['name']?></a></span></li> 
                  <?php
                }else{
               ?>
                  <li class="drop-down"><span style="font-weight:bold; color:#6699CC;"><a href="M-Fitness/Login/Login.html">登录</a></span></li> 
               <?php
                }
              }
            }

          }
        
        }else{
         ?>
		     <li class="drop-down"><span style="font-weight:bold; color:#6699CC;"><a href="M-Fitness/Login/Login.html">登录</a></span></li>
         <?php
             }
         ?>
    </ul> 
	
</div>
<div class="div">
		<div  class="d1left">
    
        <div style=" background-color:#CCCCCC;border-radius:10px; height:20px; width:100px; padding:10px; margin:20px auto;font-weight:bold;text-align:center;"> 热门课程</div>
     <ul class="ul">
      <?php
      
        $sql2="SELECT * FROM hsports";
        $rs2=$link->query($sql2);
        while($row2=$rs2->fetch_assoc()){
     ?>
			<li>
			<div  class="divX" ><a class="a2" href="M-Fitness/flow/Hclass.php?ID=<?=$row2['ID']?>"><?=$row2['Hname']?></a></div>
			  <center>
        <a class="a2" href="M-Fitness/flow/Hclass.php?ID=<?=$row2['ID']?>"> <img src="<?=$row2['FMian']?>"  width="450" height="250" /></a>
			  </center>
			  <br />
			   <hr  color="#CCCCCC" size="2"/>
		  </li>
			  
       <?php
        }
      ?>
      </ul>
      <marquee behavior="" direction=""><h2 style="color:6699FF">>>凡是本中心会员，都将免费提供一月一次的体检服务，记录体检信息，提供会员了解自身身体健康状况，火速注册成为会员吧！！！</h3></marquee>
    </div>



  <?php
     $sql="select * from column1";
     $rs=$link->query($sql);
     while($row=$rs->fetch_assoc()){
  ?>
    <div class="d2lright">
      <center>
		  	<div style=" background-color:#CCCCCC;border-radius:10px; height:20px; width:100px; padding:10px; margin:0 auto;font-weight:bold;"><?=$row['CUname']?></div>
		  </center>
    <?php
    $id=$row['ID'];
    $sql1="select * from article  where ID=$id";
    $rs1=$link->query($sql1);
    while($row1=$rs1->fetch_assoc()){
    ?>
		<p ><a class="a2" href="M-Fitness/flow/CEarticle.php?ID=<?=$row1['TID']?>"><?=$row1['ATCname']?></a></p>
		<center><a  class="a2" href="M-Fitness/flow/CEarticle.php?ID=<?=$row1['TID']?>"><img src="<?=$row1['Cover']?>" width="200" height="225" /></a></center>
    <?php
      }  
    ?>
		</div>
    <?php
      }
    ?> 
</div>
    <div class="dixdum">
      <center>
      <hr color="#DDD8D8"   /> 
    技术支持：河池学院计算机与信息工程学院15计技班 徐舒玲
  </center></div>
	
</div>


















 <script type="text/javascript">
   var curIndex = 0, //当前index
      imgArr = getElementsByClassName("imgList")[0].getElementsByTagName("li"), //获取图片组
      imgLen = imgArr.length,
      infoArr = getElementsByClassName("infoList")[0].getElementsByTagName("li"), //获取图片info组
      indexArr = getElementsByClassName("indexList")[0].getElementsByTagName("li"); //获取控制index组
     // 定时器自动变换2.5秒每次
  var autoChange = setInterval(function(){ 
    if(curIndex < imgLen -1){ 
      curIndex ++; 
    }else{ 
      curIndex = 0;
    }
    //调用变换处理函数
    changeTo(curIndex); 
  },2500);
 
  //清除定时器时候的重置定时器--封装
  function autoChangeAgain(){ 
      autoChange = setInterval(function(){ 
      if(curIndex < imgLen -1){ 
        curIndex ++;
      }else{ 
        curIndex = 0;
      }
    //调用变换处理函数
      changeTo(curIndex); 
    },2500);
    }
 
  //调用添加事件处理
  addEvent();
 
  //给左右箭头和右下角的图片index添加事件处理
 function addEvent(){
  for(var i=0;i<imgLen;i++){ 
    //闭包防止作用域内活动对象item的影响
    (function(_i){ 
    //鼠标滑过则清除定时器，并作变换处理
    indexArr[_i].onmouseover = function(){ 
      clearTimeout(autoChange);
      changeTo(_i);
      curIndex = _i;
    };
    //鼠标滑出则重置定时器处理
    indexArr[_i].onmouseout = function(){ 
      autoChangeAgain();
    };

     })(i);
  }
 
  //给左箭头prev添加上一个事件
  var prev = document.getElementById("prev");
  prev.onmouseover = function(){ 
    //滑入清除定时器
    clearInterval(autoChange);
  };
  prev.onclick = function(){ 
    //根据curIndex进行上一个图片处理
    curIndex = (curIndex > 0) ? (--curIndex) : (imgLen - 1);
    changeTo(curIndex);
  };
  prev.onmouseout = function(){ 
    //滑出则重置定时器
    autoChangeAgain();
  };
 
   //给右箭头next添加下一个事件
  var next = document.getElementById("next");
  next.onmouseover = function(){ 
    clearInterval(autoChange);
  };
  next.onclick = function(){ 
    curIndex = (curIndex < imgLen - 1) ? (++curIndex) : 0;
    changeTo(curIndex);
  };
  next.onmouseout = function(){ 
    autoChangeAgain();
  };
}
 
  //左右切换处理函数
  function changeTo(num){ 
    //设置image
    var imgList = getElementsByClassName("imgList")[0];
    goLeft(imgList,num*900); //左移一定距离
    //设置image 的 info
    var curInfo = getElementsByClassName("infoOn")[0];
    removeClass(curInfo,"infoOn");
    addClass(infoArr[num],"infoOn");
    //设置image的控制下标 index
    var _curIndex = getElementsByClassName("indexOn")[0];
    removeClass(_curIndex,"indexOn");
    addClass(indexArr[num],"indexOn");
  }
 
 
  //图片组相对原始左移dist px距离
  function goLeft(elem,dist){ 
    if(dist == 900){ //第一次时设置left为0px 或者直接使用内嵌法 style="left:0;"
      elem.style.left = "0px";
    }
    var toLeft; //判断图片移动方向是否为左
    dist = dist + parseInt(elem.style.left); //图片组相对当前移动距离
    if(dist<0){  
      toLeft = false;
      dist = Math.abs(dist);
    }else{ 
      toLeft = true;
    }
    for(var i=0;i<= dist/40;i++){ //这里设定缓慢移动，10阶每阶40px
      (function(_i){ 
        var pos = parseInt(elem.style.left); //获取当前left
        setTimeout(function(){ 
          pos += (toLeft)? -(_i * 40) : (_i * 40); //根据toLeft值指定图片组位置改变
          //console.log(pos);
          elem.style.left = pos + "px";
        },_i * 50); //每阶间隔50毫秒
      })(i);
    }
  }
 
  //通过class获取节点
  function getElementsByClassName(className){ 
    var classArr = [];
    var tags = document.getElementsByTagName('*');
    for(var item in tags){ 
      if(tags[item].nodeType == 1){ 
        if(tags[item].getAttribute('class') == className){ 
          classArr.push(tags[item]);
        }
      }
    }
    return classArr; //返回
  }
 
  // 判断obj是否有此class
  function hasClass(obj,cls){  //class位于单词边界
    return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
   }
   //给 obj添加class
  function addClass(obj,cls){ 
    if(!this.hasClass(obj,cls)){ 
       obj.className += cls;
    }
  }
  //移除obj对应的class
  function removeClass(obj,cls){ 
    if(hasClass(obj,cls)){ 
      var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
         obj.className = obj.className.replace(reg,'');
    }
  }
 
  </script>


 
</body>
</html>