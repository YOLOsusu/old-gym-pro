<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<script>
function fromID(id) {
return document.getElementById(id);
}

function show_alert(msg, type, time) {
var layer_obj = fromID("alert_layer");
var layer_text= fromID("alert_text");
var line_height = (document.documentElement.scrollTop == 0) ? document.body.scrollTop : document.documentElement.scrollTop;

layer_text.innerHTML = msg;
with(layer_obj.style) {
zIndex = 999;
top = line_height-40;
left = document.body.clientWidth/3;
display = "block";
position = "absolute";
if(type == "error") {
background = "url(http://"+style_domain+"/snake/index/msgbox_right_bg2.jpg)";
}
}

layer_obj.filters[0].opacity = "0.8"; //透明度为 80%

if(time == undefined) time = 3000;
else time = time*1000;

var top = line_height-40;
var speed = 1.5;
time-= 1000;
//控制窗口向下移动至页面边缘
move_down = function MoveFplogo() {
top+= speed;
layer_obj.style.top = top;
if(top < line_height) setTimeout("move_down()", 1);
else setTimeout("close_alert_win()", time);
}

move_down();
}

function close_alert_win() {
var layer_obj = fromID("alert_layer");
//控制窗口渐渐消失
if(layer_obj.filters[0].opacity < 0.02) {
layer_obj.style.display = "none";
return true;
}
layer_obj.filters[0].opacity-= 0.02;
setTimeout("close_alert_win()", 1);
}
document.writeln(" filter:progid:DXImageTransform.Microsoft.BasicImage();">");
document.writeln(" ");
document.writeln(" ");
document.writeln(""); 
</script>

<head>
<body>
<input type="button" value="1" class="CL" id="1" onclick="fromID()">

</body>
<html>