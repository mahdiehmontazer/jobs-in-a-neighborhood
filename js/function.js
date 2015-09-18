// JavaScript Document
function check_f_all()
{
full=true;
if(document.getElementById('ipt-login').value=="")
{
document.getElementById("ipt-login").style.borderColor="#900";
document.getElementById("login_repeat").innerHTML="وارد کردن نام کاربری الزامی است";
full=false;
}
else
{
document.getElementById("ipt-login").style.borderColor="";
document.getElementById("login_repeat").innerHTML="";	
}
if(document.getElementById('ipt-password').value=="")
{
document.getElementById("ipt-password").style.borderColor="#900";
document.getElementById('equal2').innerHTML="وارد کردن رمز الزامی است";
full=false;
}
else
{
document.getElementById("ipt-password").style.borderColor="";
document.getElementById('equal2').innerHTML="";
}
if(document.getElementById('ipt-repassword').value=="")
{
document.getElementById("ipt-repassword").style.borderColor="#900";
document.getElementById('equal1').innerHTML="وارد کردن تکرار رمز الزامی است";
document.getElementById('email').focus();
full=false;
}
else
{
document.getElementById("ipt-repassword").style.borderColor="";
document.getElementById('equal1').innerHTML="";

}

/*if(!checkbox.checked)
{
document.getElementById("over_flow").style.borderColor="#900";
document.getElementById('ghavanin').innerHTML="لطفا قوانین سایت را تایید نمایید";
full=false;	
}*/
//alert(full);
if(full==false)
{
return false;
}
else
return true;
}
//insert job
function check_f_all_jobs()
{
	full=true;
if(document.getElementById('title').value=="")
{
document.getElementById("title").style.borderColor="#900";
document.getElementById('title1').innerHTML="عنوان آگهی خود را تایپ نمایید";
full=false;
}
else
{
document.getElementById("title").style.borderColor="";
document.getElementById('title1').innerHTML="";
}
if(document.getElementById('number_v').value=="")
{
document.getElementById("number_v").style.borderColor="#900";
document.getElementById('number_v1').innerHTML="شماره رسید/ارجاع بانک را تایپ نمایید";
document.getElementById('cart').style.display="block";
document.getElementById('type_pay2').checked=1;
full=false;
}
else
{
document.getElementById("number_v").style.borderColor="";
document.getElementById('number_v1').innerHTML="";
}
if(document.getElementById('matn').value=="")
{
document.getElementById("matn").style.borderColor="#900";
document.getElementById('matn1').innerHTML="متن مورد نظر را تایپ نمایید";
full=false;	
}
else
{
document.getElementById("matn").style.borderColor="";
document.getElementById('matn1').innerHTML="";
}
if(document.getElementById('job').value==9000)
{
document.getElementById("job").style.borderColor="#900";
document.getElementById("job1").innerHTML="گروه شغلی را انتخاب کنید";
full=false;	
}
else
{
document.getElementById("job").style.borderColor="";
document.getElementById("job1").innerHTML="";
}
if(document.getElementById('province').value==9000)
{
document.getElementById("province").style.borderColor="#900";
document.getElementById("province1").innerHTML="محله خود را انتخاب کنید";
full=false;	
}
else
{
document.getElementById("province").style.borderColor="";
document.getElementById("province1").innerHTML="";

}
//alert(full);
if(full==false)
{
	alert("کاربر عزیز تمامی فیلد ستاره دار را پر نمایید");
return false;
}
else
return true;
}
//end insert job
function check_login_parametr(value){
if(value.length==0){   
    return;
} 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {//alert(xmlhttp.responseText);
        document.getElementById("login_repeat").innerHTML=xmlhttp.responseText;
		if(xmlhttp.responseText)
		{
	    document.getElementById("ipt-login").value="";
		document.getElementById("ipt-login").style.borderColor="#900";
		}
		else
		{
		document.getElementById("ipt-login").style.borderColor="";
		document.getElementById("login_repeat").innerHTML="";
		}

    }
  }
xmlhttp.open("GET","login/login_repeat.php?id_user="+value,true);
xmlhttp.send(null);
}
//active agahi
function update_a(value,value1,index1){
if(value.length==0){   
    return;
} 
 var index2="active_a"+index1;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {//alert(xmlhttp.responseText);
        document.getElementById(index2).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","profile/active.php?job="+value+"&active="+value1+"&index1="+index1,true);
xmlhttp.send(null);
}
//check radio
function check()
{
	sum=0;
	if(document.getElementById('type_pay2').checked)
	{
	document.getElementById('cart').style.display="block";
	}
	else
	document.getElementById('cart').style.display="none";
   if(document.getElementById('expire').value==1)
   {
      sum='5,000';
	if(document.getElementById('slidefile').value)
	{
     sum='15,000';
	 document.getElementById('file_ch').checked=0;
	}
   }
if(document.getElementById('expire').value==3)
{
 sum='15,000';
	if(document.getElementById('slidefile').value)
     sum='25,000';
}
	 if(document.getElementById('expire').value==6)
	 {
    sum='25,000';
     if(document.getElementById('slidefile').value)
     sum='35,000';
	 }
	  if(document.getElementById('expire').value==24)
	 {
    sum='40,000';
     if(document.getElementById('slidefile').value)
     sum='45,000';
	 }
     document.getElementById('cash_v').value='تومان'+sum;
}
  
//flie_ch
function file_check()
{
 if(document.getElementById('file_ch').checked)
 document.getElementById('slidefile').value="";
 check();
}



function check_equal()
{
	if(document.getElementById('ipt-password').value!=document.getElementById('ipt-repassword').value)
	{
		document.getElementById('equal').innerHTML="رمز عبور و تکرار آن باهم برابر نیست";
	document.getElementById('ipt-password').style.borderColor="#900";
	document.getElementById('ipt-repassword').style.borderColor="#900";
		document.getElementById('ipt-password').value="";
	document.getElementById('ipt-repassword').value="";
	}
	else
	{
		document.getElementById('equal').innerHTML="";
		document.getElementById('equal1').innerHTML="";
		document.getElementById('equal2').innerHTML="";
	document.getElementById('ipt-password').style.borderColor="";
	document.getElementById('ipt-repassword').style.borderColor="";
	}
}

  
 //jquery
function delet(x)
{
	y=confirm("آیا مطمئن هستید");
	if(y==true)
	window.document.location="index.php?page=last&job="+x;
	else
	return false;
}
//like
function like_job(value){
if(value.length==0){   
    return;
} 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {//alert(xmlhttp.responseText);
        document.getElementById("like").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","advertising/like.php?id_job="+value,true);
xmlhttp.send(null);
}
//search
function search_qom()
{
  document.getElementById("search_q").value="";
}