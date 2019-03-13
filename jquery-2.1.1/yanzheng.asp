<script type="text/javascript"  src="../../jquery-2.1.1/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e){

$("#email").blur(function(e){
var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
var email=$("#email").val();
if(email==''){
$("#spanEmail").html("邮箱不能为空");
$("#spanEmail").css({"color":"#F00"});
}else if(!pattern.test(email)){
$("#spanEmail").html("邮箱格式不正确");
$("#spanEmail").css({"color":"#F00"});

}else{
$("#spanEmail").hide();
}  
});



$("#date").blur(function(e){
var pattern = /^(?:(?!0000)[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/;
var bir=$("#date").val();
if(bir==''){
$("#spanBir").html("日期不能为空");
$("#spanBir").css({"color":"#F00"});
}else if(!pattern.test(bir)){
$("#spanBir").html("日期格式不正确");
$("#spanBir").css({"color":"#F00"});
}else{
$("#spanBir").hide();
} 
});


$("#msex").blur(function(e){
var email=$("#email").val();
if(email==''){
$("#spanSex").html("性别不能为空");
$("#spanSex").css({"color":"#F00"});
}else{
$("#spanSex").hide();
} 
});


$("#pwd1").blur(function(e){
var pwd1=$("#pwd1").val();
if(pwd1==''){
$("#spanPwd1").html("*密码不能为空");
$("#spanPwd1").css({"color":"#F00"});
}else if(pwd1.length<6){
$("#spanPwd1").html("*密码不能少于6位");
$("#spanPwd1").css({"color":"#F00"});
}else if(pwd1.length>15){
$("#spanPwd1").html("*密码不能大于15位");
$("#spanPwd1").css({"color":"#F00"});
}else{
$("#spanPwd1").hide();
}
});


$("#pwd2").blur(function(e){
var pwd2=$("#pwd2").val();
if(pwd2==''){
$("#spanPwd2").html("密码不能为空");
$("#spanPwd2").css({"color":"#F00"});
}else if(pwd2!=$("#pwd1").val()){
$("#spanPwd2").html("两次密码不一致");
$("#spanPwd2").css({"color":"#F00"});
}else{
$("#spanPwd2").hide();
}
});


$("#mname").blur(function(e) {
 var name=$("#mname").val();
var reg=/^\d+$/;
if(name==''){
$("#spanName").html("姓名不能为空");
$("#spanName").css({"color":"#F00"});
}else if(name.length!=0){
for(var i=0;i<name.length;i++){
if(name[i].match(reg)){
$("#spanName").html("姓名中不能含有数字");
$("#spanName").css({"color":"#F00"});
return;
}else{
$("#spanName").hide();
}
}
}
     });


    });
</script>