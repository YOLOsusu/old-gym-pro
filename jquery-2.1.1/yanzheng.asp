<script type="text/javascript"  src="../../jquery-2.1.1/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e){

$("#email").blur(function(e){
var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
var email=$("#email").val();
if(email==''){
$("#spanEmail").html("���䲻��Ϊ��");
$("#spanEmail").css({"color":"#F00"});
}else if(!pattern.test(email)){
$("#spanEmail").html("�����ʽ����ȷ");
$("#spanEmail").css({"color":"#F00"});

}else{
$("#spanEmail").hide();
}  
});



$("#date").blur(function(e){
var pattern = /^(?:(?!0000)[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/;
var bir=$("#date").val();
if(bir==''){
$("#spanBir").html("���ڲ���Ϊ��");
$("#spanBir").css({"color":"#F00"});
}else if(!pattern.test(bir)){
$("#spanBir").html("���ڸ�ʽ����ȷ");
$("#spanBir").css({"color":"#F00"});
}else{
$("#spanBir").hide();
} 
});


$("#msex").blur(function(e){
var email=$("#email").val();
if(email==''){
$("#spanSex").html("�Ա���Ϊ��");
$("#spanSex").css({"color":"#F00"});
}else{
$("#spanSex").hide();
} 
});


$("#pwd1").blur(function(e){
var pwd1=$("#pwd1").val();
if(pwd1==''){
$("#spanPwd1").html("*���벻��Ϊ��");
$("#spanPwd1").css({"color":"#F00"});
}else if(pwd1.length<6){
$("#spanPwd1").html("*���벻������6λ");
$("#spanPwd1").css({"color":"#F00"});
}else if(pwd1.length>15){
$("#spanPwd1").html("*���벻�ܴ���15λ");
$("#spanPwd1").css({"color":"#F00"});
}else{
$("#spanPwd1").hide();
}
});


$("#pwd2").blur(function(e){
var pwd2=$("#pwd2").val();
if(pwd2==''){
$("#spanPwd2").html("���벻��Ϊ��");
$("#spanPwd2").css({"color":"#F00"});
}else if(pwd2!=$("#pwd1").val()){
$("#spanPwd2").html("�������벻һ��");
$("#spanPwd2").css({"color":"#F00"});
}else{
$("#spanPwd2").hide();
}
});


$("#mname").blur(function(e) {
 var name=$("#mname").val();
var reg=/^\d+$/;
if(name==''){
$("#spanName").html("��������Ϊ��");
$("#spanName").css({"color":"#F00"});
}else if(name.length!=0){
for(var i=0;i<name.length;i++){
if(name[i].match(reg)){
$("#spanName").html("�����в��ܺ�������");
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