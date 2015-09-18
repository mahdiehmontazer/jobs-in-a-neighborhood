<?php
session_start();
require_once("advertising/pdate.php");
require_once("Connections/eqom.php");
if(@$_GET['page']=="exit")
{
  unset($_SESSION['user_qom']);
  unset($_SESSION['id_qom']);
  session_destroy();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>شهر اینترنتی قم</title>
<link type="image/xicon" href="image/Sitemap-Icon.png" rel="shortcut icon">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="login/css/form-style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/files/jwplayer.js"></script>
<script type="text/javascript" src="js/files/jquery_004.js"></script>
<script type="text/javascript" src="js/files/jquery-migrate.js"></script>
<script type="text/javascript" src="js/files/jquery_003.js"></script>
<script type="text/javascript" src="js/files/jquery.js"></script>
<script type="text/javascript" src="js/files/slideshow.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script type='text/javascript' src='news/jquery.js?ver=1.10.2'></script>
<script type='text/javascript' src='news/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='news/tie-scripts.js'></script>
<script type='text/javascript' src='news/validation.js'></script>

<!--tooltip-->
<script type="text/javascript">
  $(function() {
    if ($.browser.msie && $.browser.version.substr(0,1)<7)
    {
        $('.tooltip').mouseover(function() {
            $(this).children('span').show();
        }).mouseout(function() {
            $(this).children('span').hide();
        })
    }
});
</script>
<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function( ) {
        $("#a_test").click(function( ){
          $( "#center_site").slideToggle( )
          });
        });
</script>
</head>
<body>
<div id="kol_qom">
  <div id="main_qom">
    <div id="top1_qom">
      <div id="center_top1">
      
      <ul>
      <li><img class="rss" title="rss" src="image/rss1.png"/></li>
      <li><a href="index.php?page=contact&name=تماس با ما"><img title="تماس با ما" class="email" src="image/email1.png"/></a></li>
      <li><a href="index.php?page=about&name=درباره ما"><img class="about" title="درباره ما" src="image/about1.png"/></a></li>
      </ul>
      <div class="date_qom"><?php echo "&nbsp;امروز".pdate("d F Y");?></div>
      
      <?php
	if(@$_SESSION['user_qom'])
	  {
		  ?>
          <div id="profile_user">
          <a href="index.php?page=exit"><div class="exit">خروج</div></a>
          <a href="index.php?page=info&name=ویرایش اطلاعات"><div class="edit_profile">ویرایش اطلاعات</div></a>
          <a href="index.php?page=change&name=تغییر رمز عبور"><div class="change">تغییر رمز عبور</div></a>
          <a href="index.php?page=last&name=آگهی های گذشته"><div class="oldadv">آگهی های گذشته</div></a>
        <a href="index.php?page=insertadv&name=درج آگهی"><div class="newadv">درج آگهی </div></a>
          <div class="welcome"> <span class="user_text"><?php echo $_SESSION['user_qom'];?> </span>گرامی , وقت بخیر  </div>
          </div>
          <?php
	  }
	 else
	  {
		  ?><div class="news_qom">
      <!--news-->
<div class="breaking-news">
		<span style="font-family:BYekan,tahoma;color:#900;float:right;
">:خدمات ما</span>
				
				<ul>
				<li>اطلاع رسانی از فروشگاه ها و مراکز خرید استان قم</li>
				<li>اطلاع رسانی از مشاغل محله های استان قم</li>
				<li>شما با عضویت در سایت می توانید آگهی مورد نظر خود را اعلام نمایید</li>
				<li>اطلاع رسانی از شماره های ضروری استان </li>
                <li>طراحی و راه اندازی سایت تخصصی و شخصی برای شما شهروندان عزیز </li>
                </ul>
					
						<script type="text/javascript">
			jQuery('#news_qom').ready(function(){
								createTicker(); 
							});
		</script>
	</div></div>
<!--news-->
<?php
	  }?>

      </div>
    </div>
    <div id="top2_qom">
      <div class="banner"></div>
    </div>
    <div id="top3_qom">
     <div id="center_top3">
        <div class="register"><a href="index.php?page=register&name=عضویت رایگان"><img src="image/register.png"/></a></div>
        <div class="login"><a href="index.php?page=login&name=ورود اعضاء"><img src="image/login.png" /></a></div>
        <form action="index.php" method="get" name="search_job"><div id="search_job"><div class="left"><input name="" type="image" src="image/Search.png" /></div><div class="right"><input name="search_job" id="search_q" onclick="search_qom()" type="text" value="جستجو..." /></div><input name="name" type="hidden" value="نتایج جستجو" /></div></form>
        <div class="main_menu">
          <a href="index.php?page=contact&name=تماس با ما"><div class="about"></div></a>
          <a href="index.php?page=insertadv&name=درج آگهی&"><div class="insert"></div></a>
          <a href="index.php?page=guide&name=راهنمای سایت"><div class="help"></div></a>
          <a href="index.php"><div class="home"></div></a>
        </div>
      </div>
    </div>
    <!--<div id="body1_qom">
      <div class="slide_qom"></div>
      <div class="marquee_qom"></div>
    </div>-->
    <div id="body2_qom">
      <div class="left_qom">
      
      <div class="top"></div>
      <div class="middle"><?php require("advertising/jobs.php");?></div>
      <div class="bottom"></div>
      <div id="link_qom">
      <div class="top"></div>
      <div class="middle">
      
      <!--<marquee direction="down" scrollamount="2" onmouseover="stop()" onmouseout="start()" height="100px" behavior="scroll">-->
	  <ul>
       <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=952&tempname=Qomtemplate"><li>تلفن های ضروری</li></a>
       <a  target="_new" href="http://qom.ir//dorsapax/Data/Sub_0/File/tak1.jpg"><li>نقشه جغرافیایی استان</li></a>
      <a target="_new" href="http://gov.ghom.ir"><li>فرمانداری</li></a>
      <a target="_new" href="http://www.ghom.ir/"><li>استانداری</li></a>
      <a target="_new" href="http://www.qom.ir/"><li>شهرداری</li></a>
      <a target="_new" href="http://www.qommiras.ir/"><li>اداره کل میراث فرهنگی</li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=23&tempname=Qomtemplate"><li>مراجع تقلید</li></a>
      <a target="_new" href="http://www.qommiras.ir/main.php?ObjShow=ShowPage&id=555"><li>بانک ها و موسسات مالی و اعتباری</li></a>
      <a target="_new" href="http://www.qommiras.ir/main.php?ObjShow=ShowPage&id=429"><li>مراکز انتظامی</li></a>
      <a target="_new" href="http://www.ghom.ir/index.aspx?siteid=1&pageid=1816"><li>دفاتر پلیس +10</li></a>
      <a href="http://www.ghom.ir/index.aspx?siteid=1&pageid=1820"><li>دفاتر پیشخوان خدمات دولت</li></a>
      <a target="_new" href="http://www.qom.post.ir/HomePage.aspx?TabID=3696&Site=qom.post&Lang=fa-IR"><li>ادراه پست</li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=31&tempname=Qomtemplate"><li> بیمارستان ها</li></a>
      <a target="_new" href="http://www.ghom.ir/index.aspx?siteid=1&pageid=1726"><li>اورژانس</li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=21&tempname=Qomtemplate"><li>داروخانه ها</li></a>
      <a target="_new" href="http://www.qommiras.ir/main.php?ObjShow=ShowPage&id=427"><li>پزشکان متخصص</li></a>
      <a target="_new" href="http://www.behzisti-qom.ir/PublicPages/ChartPage.aspx"><li>بهزیستی</li></a>
      <a target="_new"  href="http://www.qommiras.ir/main.php?ObjShow=ShowPage&id=424"><li>پارک ها و مراکز تفریحی</li></a>
      <a target="_new" href="      http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=90&codeV=1&tempname=newtemp
"><li>اماکن تاریخی</li></a>
 <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=68&codeV=1&tempname=newtemp
"><li>اماکن زیارتی</li></a>
      <a target="_new" href="http://qom.medu.ir/Portal/Home/"><li> اداره کل آموزش و پرورش</li></a>
      <a target="_new" href="http://www.qomtvtoportal.ir/"><li> اداره کل فنی و حرفه ای </li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=950&tempname=Qomtemplate"><li>  مراکز دانشگاهی   </li></a>
      <a target="_new" href="http://qomit.ir/"><li> مرکز رشد </li></a>
      <a target="_new" href="http://www.ostan-qom.ir/index.aspx?siteid=1&pageid=1767"><li> انتشارات و ناشرین </li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=47&codeV=1&tempname=newtemp"><li> کتابخانه</li></a>
      <a target="_new" href="http://www.qomstp.ir/"><li> پارک علم و فناوری </li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=951&tempname=Qomtemplate"><li> مراکز حوزوی </li></a>
      <a target="_new" href="http://www.qomfair.com/"><li> نمایشگاه دائمی </li></a>
      <a target="_new" href="http://www.sabteahval-qom.ir/Default.aspx?tabid=87"><li>اداره ثبت احوال</li></a>
     <a target="_new" href="http://www.dadgostariqom.ir"><li>اداره دادگستری </li></a>
      <a target="_new" href="http://qm.ssaa.ir/"><li>اداره ثبت اسناد</li></a>
      <a target="_new" href="http://qom.irib.ir/"><li>صدا و سیما   </li></a>
      <a target="_new" href="http://www.ostan-qom.ir/index.aspx?siteid=1&pageid=1769"><li>سینما ها  </li></a>
      <a target="_new" href="http://www.tcq.ir/web/guest/100"><li> مخابرات  </li></a>
      <a target="_new" href="http://adsl.tcq.ir/"><li> adsl خدمات  </li></a>
      
      <a target="_new" href="http://www.ostan-qom.ir/index.aspx?siteid=1&pageid=1823"><li> فروشگاه هاي زنجیره ای  </li></a>
       <a target="_new" href="http://www.ostan-qom.ir/index.aspx?siteid=1&pageid=1827"><li> مراکز خرید و پاساژ </li></a>
      <a target="_new" href="http://www.qepd.co.ir/HomePage.aspx?TabID=5032&Site=DouranPortal&Lang=fa-IR"><li> سازمان برق  </li></a>
      <a target="_new" href="http://www.abfa-qom.com/Subscribers"><li> سازمان آب و فاضلاب  </li></a>
      <a target="_new" href="http://www.nigc-qom.ir/Site.aspx"><li> اداره کل گاز  </li></a>
      <a target="_new" href=""><li> آتش نشانی  </li></a>
      <a target="_new" href=""><li> پرداخت اینترنتی قبوض  </li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=communique&lang=1&tempname=payaneha&sub=42&PageID=177&PageIDF=38"><li> ترمینال  </li></a>
      <a target="_new" href="http://www.ostan-qom.ir/index.aspx?siteid=1&pageid=1753"><li> راه آهن  </li></a>
      <a target="_new" href="http://qom.ir/ShowPage.aspx?page_=form&order=show&lang=1&sub=0&PageId=102&tempname=Qomtemplate"><li> هتل ها   </li></a>
      </ul>
      <!--</marquee>-->
	  <?php //require("advertising/jobs.php");?></div>
      <div class="bottom"></div>
      </div>
      </div>
      <div class="center_qom">
      <?php if(!$_GET and !$_POST)
	  {
		  ?>
      <div class="slide_qom">
      <div class="slideshow"><?php require("slide/slide.php");?></div>
      </div>
      <?php
	  }?>
      
      <div class="top">
	  <?php require("advertising/navigate.php");?>
      </div>
      <div id="middle"><?php
	 // echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
if(@$_GET['report']=="success") echo '</br><h4 dir="ltr" style="text-align:center;border:#900 1px dashed;border-radius:">  عزیز ,عضویت شما به ثبت رسید ' .$_SESSION['user_qom'].'</br>شما می توانید از لینک های بالا که مخصوص شما می باشد آگهی ها ی خود را درج نمایید .و درصورت تمایل ویرایش و حذف نمایید موفق باشید</h4>';
if(!$_GET and !$_POST or isset($_GET['search_job'])) require("advertising/newestadv.php");
if(@$_GET['page']=="login") require("login/signin.php");
if(@$_GET['page']=="register") require("login/registration.php");
if(@$_GET['page']=="neighbor") require("advertising/jobs_neighbor.php");
if(@$_GET['page']=="show") require("advertising/advertising.php");
if(@$_GET['page']=="details") require("advertising/details.php");
if(@$_GET['page']=="insertadv") require("advertising/insert_ad.php");
if(@$_GET['page']=="change") require("profile/changepass.php");
if(@$_GET['page']=="info") require("profile/info.php");
if(@$_GET['page']=="last") require("profile/lastadv.php");
if(@$_GET['page']=="contact") require("advertising/contact.php");
if(@$_GET['page']=="edit") require("profile/editadv.php");
if(@$_GET['page']=="guide") require("advertising/guid.php");
if(@$_GET['page']=="about") require("advertising/about.php");
if(@$_GET['page']=="order") require("advertising/order.php");

?></div>
      <div class="bottom"></div>
      </div>
      <div class="right_qom">
      <div class="top"></div>
      <div class="middle"><?php require("advertising/neighbor.php");?></div>
      <div class="bottom"></div>
      <div id="amar_qom">
      <div class="top"></div>
      <div class="middle"></div>
      <div class="bottom"></div>
      </div>
      <div id="oghat_qom">
      <div class="top"></div>
      <div class="middle">
      <div class="azan">
<script type='text/javascript' src='js/azan.js'></script>
<script language=javascript>
 function pz() {};init();document.getElementById('cities').selectedIndex=23;coord();main();</script>
                             
                           <!--start oqhat sharee cod-->
      <!--
<script src="http://blogers.ir/cod/extra-cods/oqhat-sharee/code.php?city=57" type=text/javascript></script>
<div style="display:none"></div>
<!--end oqhat sharee cod-->
</div>
</div>
      <div class="bottom"></div>
      </div>
      <div class="azan">
      <a href="index.php?page=order"><img width="150" height="150" src="image/qomweb.png"  /></a>
      </div>
      </div>
    </div>
    <div id="footer">
      <div class="img">
<ul>
<a href="index.php"><li>صفحه اصلی|</li></a>
<a href="index.php?page=about"><li>درباره ما|</li></a>
<a href="index.php?page=contact"><li>تماس با ما</li></a>
</ul>
<div class="rule">کلیه حقوق مادی و معنوی متعلق به وب سایت شهر اینترنتی قم میباشد </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>