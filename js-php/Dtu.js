// JavaScript Document <script type="text/javascript">
  var curIndex = 0, //��ǰindex
      imgArr = getElementsByClassName("imgList")[0].getElementsByTagName("li"), //��ȡͼƬ��
      imgLen = imgArr.length,
      infoArr = getElementsByClassName("infoList")[0].getElementsByTagName("li"), //��ȡͼƬinfo��
      indexArr = getElementsByClassName("indexList")[0].getElementsByTagName("li"); //��ȡ����index��
     // ��ʱ���Զ��任2.5��ÿ��
  var autoChange = setInterval(function(){ 
    if(curIndex < imgLen -1){ 
      curIndex ++; 
    }else{ 
      curIndex = 0;
    }
    //���ñ任������
    changeTo(curIndex); 
  },2500);
 
  //�����ʱ��ʱ������ö�ʱ��--��װ
  function autoChangeAgain(){ 
      autoChange = setInterval(function(){ 
      if(curIndex < imgLen -1){ 
        curIndex ++;
      }else{ 
        curIndex = 0;
      }
    //���ñ任������
      changeTo(curIndex); 
    },2500);
    }
 
  //��������¼�����
  addEvent();
 
  //�����Ҽ�ͷ�����½ǵ�ͼƬindex����¼�����
 function addEvent(){
  for(var i=0;i<imgLen;i++){ 
    //�հ���ֹ�������ڻ����item��Ӱ��
    (function(_i){ 
    //��껬���������ʱ���������任����
    indexArr[_i].onmouseover = function(){ 
      clearTimeout(autoChange);
      changeTo(_i);
      curIndex = _i;
    };
    //��껬�������ö�ʱ������
    indexArr[_i].onmouseout = function(){ 
      autoChangeAgain();
    };

     })(i);
  }
 
  //�����ͷprev�����һ���¼�
  var prev = document.getElementById("prev");
  prev.onmouseover = function(){ 
    //���������ʱ��
    clearInterval(autoChange);
  };
  prev.onclick = function(){ 
    //����curIndex������һ��ͼƬ����
    curIndex = (curIndex > 0) ? (--curIndex) : (imgLen - 1);
    changeTo(curIndex);
  };
  prev.onmouseout = function(){ 
    //���������ö�ʱ��
    autoChangeAgain();
  };
 
   //���Ҽ�ͷnext�����һ���¼�
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
 
  //�����л�������
  function changeTo(num){ 
    //����image
    var imgList = getElementsByClassName("imgList")[0];
    goLeft(imgList,num*400); //����һ������
    //����image �� info
    var curInfo = getElementsByClassName("infoOn")[0];
    removeClass(curInfo,"infoOn");
    addClass(infoArr[num],"infoOn");
    //����image�Ŀ����±� index
    var _curIndex = getElementsByClassName("indexOn")[0];
    removeClass(_curIndex,"indexOn");
    addClass(indexArr[num],"indexOn");
  }
 
 
  //ͼƬ�����ԭʼ����dist px����
  function goLeft(elem,dist){ 
    if(dist == 400){ //��һ��ʱ����leftΪ0px ����ֱ��ʹ����Ƕ�� style="left:0;"
      elem.style.left = "0px";
    }
    var toLeft; //�ж�ͼƬ�ƶ������Ƿ�Ϊ��
    dist = dist + parseInt(elem.style.left); //ͼƬ����Ե�ǰ�ƶ�����
    if(dist<0){  
      toLeft = false;
      dist = Math.abs(dist);
    }else{ 
      toLeft = true;
    }
    for(var i=0;i<= dist/20;i++){ //�����趨�����ƶ���10��ÿ��40px
      (function(_i){ 
        var pos = parseInt(elem.style.left); //��ȡ��ǰleft
        setTimeout(function(){ 
          pos += (toLeft)? -(_i * 20) : (_i * 20); //����toLeftֵָ��ͼƬ��λ�øı�
          //console.log(pos);
          elem.style.left = pos + "px";
        },_i * 25); //ÿ�׼��50����
      })(i);
    }
  }
 
  //ͨ��class��ȡ�ڵ�
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
    return classArr; //����
  }
 
  // �ж�obj�Ƿ��д�class
  function hasClass(obj,cls){  //classλ�ڵ��ʱ߽�
    return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
   }
   //�� obj���class
  function addClass(obj,cls){ 
    if(!this.hasClass(obj,cls)){ 
       obj.className += cls;
    }
  }
  //�Ƴ�obj��Ӧ��class
  function removeClass(obj,cls){ 
    if(hasClass(obj,cls)){ 
      var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
         obj.className = obj.className.replace(reg,'');
    }
  }
 
