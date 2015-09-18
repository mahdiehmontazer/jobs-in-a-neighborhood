jQuery(document).ready(function(){

    var scripts = document.getElementsByTagName("script");

    var jsFolder = "";

    for (var i= 0; i< scripts.length; i++)

    {

        if( scripts[i].src && scripts[i].src.match(/initslider-1\.js/i))

            jsFolder = scripts[i].src.substr(0, scripts[i].src.lastIndexOf("/") + 1);

    }

    jQuery("#amazingslider-1").amazingslider({

        jsfolder:jsFolder,

        width:544,

        height:300,

        skinsfoldername:"",

        watermarkstyle:"text",

        loadimageondemand:false,

        watermarktext:"amazingslider.com",

        isresponsive:false,

        autoplayvideo:false,

        watermarkimage:"",

        pauseonmouseover:false,

        watermarktextcss:"font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;padding:2px 4px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#fff;opacity:0.9;filter:alpha(opacity=90);",

        addmargin:true,

        randomplay:false,

        playvideoonclickthumb:true,

        showwatermark:false,

        watermarklinkcss:"text-decoration:none;font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;",

        slideinterval:5000,

        watermarktarget:"_blank",

        watermarkpositioncss:"display:block;position:absolute;bottom:4px;right:4px;",

        watermarklink:"http://amazingslider.com?source=watermark",

        enabletouchswipe:true,

        transitiononfirstslide:false,

        loop:0,

        autoplay:true,

        navplayvideoimage:"play-32-32-0.png",

        navpreviewheight:60,

        timerheight:2,

        shownumbering:false,

        skin:"Lightbox",

        textautohide:false,

        addgooglefonts:true,

        navshowplaypause:true,

        navshowplayvideo:false,

        navshowplaypausestandalonemarginx:8,

        navshowplaypausestandalonemarginy:8,

        navbuttonradius:0,

        navthumbnavigationarrowimageheight:32,

        navpreviewarrowheight:8,

        showshadow:true,

        navfeaturedarrowimagewidth:16,

        navpreviewwidth:120,

        googlefonts:"Inder",

        textpositionmarginright:0,

        bordercolor:"#ffffff",

        navthumbnavigationarrowimagewidth:32,

        navthumbtitlehovercss:"text-decoration:underline;",

        arrowwidth:48,

        texteffecteasing:"easeOutCubic",

        texteffect:"slide",

        navspacing:8,

        navarrowimage:"navarrows-28-28-0.png",

        ribbonimage:"ribbon_topleft-0.png",

        navwidth:24,

        showribbon:false,

        arrowtop:50,

        timeropacity:0.6,

        navthumbnavigationarrowimage:"carouselarrows-32-32-0.png",

        navshowplaypausestandalone:false,

        navpreviewbordercolor:"#ffffff",

        ribbonposition:"topleft",

        navthumbdescriptioncss:"display:block;position:relative;padding:2px 4px;text-align:left;font:normal 12px Arial,Helvetica,sans-serif;color:#333;",

        navborder:4,

        navthumbtitleheight:20,

        textpositionmargintop:24,

        navswitchonmouseover:false,

        playvideoimage:"playvideo-64-64-0.png",

        arrowimage:"arrows-48-48-1.png",

        textstyle:"dynamic",

        playvideoimageheight:64,

        navfonthighlightcolor:"#666666",

        showbackgroundimage:false,

        navpreviewborder:4,

        navopacity:0.8,

        shadowcolor:"#aaaaaa",

        navbuttonshowbgimage:true,

        navbuttonbgimage:"navbuttonbgimage-28-28-0.png",

        textbgcss:"display:block; position:absolute; top:0px; left:0px; width:545px; height:100%; background-color:#fff; opacity:0.7; filter:alpha(opacity=70);",

        playvideoimagewidth:64,

        bottomshadowimagewidth:110,

        showtimer:true,

        navradius:0,

        navshowpreview:false,

        navmarginy:-32,

        navmarginx:-32,

        navfeaturedarrowimage:"featuredarrow-16-8-0.png",

        navfeaturedarrowimageheight:8,

        navstyle:"bullets",

        textpositionmarginleft:0,

        descriptioncss:"display:block; position:relative; font:14px Inder,Arial,Tahoma,Helvetica,sans-serif; color:#333;",

        navplaypauseimage:"navplaypause-28-28-0.png",

        backgroundimagetop:-10,

        arrowstyle:"always",

        timercolor:"#ffffff",

        numberingformat:"%NUM/%TOTAL ",

        navfontsize:12,

        navhighlightcolor:"#333333",

        navimage:"bullet-24-24-0.png",

        navheight:24,

        navshowplaypausestandaloneautohide:false,

        navbuttoncolor:"#999999",

        navshowarrow:true,

        navshowfeaturedarrow:false,

        titlecss:"display:block; position:relative; font: 16px Inder,Arial,Tahoma,Helvetica,sans-serif; color:#000;",

        ribbonimagey:0,

        ribbonimagex:0,

        navshowplaypausestandaloneposition:"bottomright",

        shadowsize:5,

        arrowhideonmouseleave:1000,

        navshowplaypausestandalonewidth:28,

        navshowplaypausestandaloneheight:28,

        backgroundimagewidth:120,

        navcolor:"#999999",

        navthumbtitlewidth:120,

        navpreviewposition:"top",

        arrowheight:48,

        arrowmargin:0,

        texteffectduration:1000,

        bottomshadowimage:"bottomshadow-110-95-1.png",

        border:0,

        timerposition:"bottom",

        navfontcolor:"#333333",

        navthumbnavigationstyle:"arrow",

        borderradius:0,

        navbuttonhighlightcolor:"#333333",

        textpositionstatic:"bottom",

        navthumbstyle:"imageonly",

        textcss:"display:block; padding:8px 16px; text-align:left; ",

        navbordercolor:"#ffffff",

        navpreviewarrowimage:"previewarrow-16-8-0.png",

        showbottomshadow:true,

        navdirection:"horizontal",

        textpositionmarginstatic:0,

        backgroundimage:"",

        navposition:"bottom",

        navpreviewarrowwidth:16,

        bottomshadowimagetop:95,

        textpositiondynamic:"bottomleft",

        navshowbuttons:false,

        navthumbtitlecss:"display:block;position:relative;padding:2px 4px;text-align:left;font:bold 14px Arial,Helvetica,sans-serif;color:#333;",

        textpositionmarginbottom:24,

        slice: {

            duration:1500,

            easing:"easeOutCubic",

            checked:true,

            effects:"up,down,updown",

            slicecount:10

        },

        transition:"slice"

    });

});