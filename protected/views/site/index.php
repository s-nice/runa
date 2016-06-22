<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>未来制造官方网站</title>
<meta name="keywords" content="未来制造官方网站,未来制造中国,Future Make,Future-Make,Future Make China,百川科技,百川行远,3D打印笔,3D创意笔,3D打印机,光固化,激光,3D教育,3D课程,创客教育,STEM,3D专业打印解决方案。"/>
<meta name="description" content="未来制造中国官方网站产品天地,涵盖个人用户、办公及解决方案、工业及解决方案等不同类别,针对不同需求提供丰富的系列产品及相应的解决方案。" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/font/iconfont.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/common.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/main.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/swiper.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/main.js"></script>
</head>
<body class="no-head-foot">
<div class="loadingCls"><div class="loader">Loading...</div></div>
<div class="index-logo"></div>
<div class="menu animate iconfont icon-menu"></div>
<div class="animate panel panel-menu">
    <a href="javascript:;" class="close iconfont icon-close"></a>
    <ul class="menu-list">
        <li><a href="<?php echo Yii::app()->createUrl('pro/index'); ?>">3D产品</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('edu/index'); ?>">创客教育</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('news/index'); ?>">资讯信息</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('support/view'); ?>">服务支持</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('site/about'); ?>">关于我们</a></li>
    </ul>
</div>
<!-- Swiper -->
<div class="swiper-container index-play">
    <div class="swiper-wrapper">
        <div class="swiper-slide layer0">
            <div class="layer text">
                <p><span>白雪公主与她的骑士</span><br>每个女孩儿心中都有一个公主梦。</p>
                <a href="<?php echo Yii::app()->createUrl('site/snow'); ?>" class="btn-style-o btn-style-white-o cd-headline letters rotate-3"><span class="cd-words-wrapper"><b class="is-visible">探索更多</b><b>探索更多</b></span></a>
            </div>
            <div class="layer pic0"></div>
            <div class="layer pic3"></div>
            <div class="layer pic1"></div>
            <div class="layer pic2"></div>
            <div class="layer pic4"></div>
            <div class="layer pic5"></div>
        </div>
        <div class="swiper-slide layer1">
            <div class="layer text">
                <p><span>孩子的异想世界</span><br>创意无限，梦想无边，在孩子的世界里一切都有可能发生</p>
                <a href="<?php echo Yii::app()->createUrl('site/dream'); ?>" class="btn-style-o btn-style-white-o cd-headline letters rotate-3"><span class="cd-words-wrapper"><b class="is-visible">探索更多</b><b>探索更多</b></span></a>
            </div>
            <div class="layer pic0"></div>
            <div class="layer pic1"></div>
            <div class="layer pic2"></div>
            <div class="layer pic3"></div>
            <div class="layer pic4"></div>
        </div>
        <div class="swiper-slide layer2">
            <div class="layer text">
                <p><span>疯狂动物城</span><br>在这个现代化的动物都市里，所有的动物都和平共处着</p>
                <a href="<?php echo Yii::app()->createUrl('site/animal'); ?>" class="btn-style-o btn-style-white-o cd-headline letters rotate-3"><span class="cd-words-wrapper"><b class="is-visible">探索更多</b><b>探索更多</b></span></a>
            </div>
            <div class="layer pic0"></div>
            <div class="layer pic1"></div>
        </div>
        <div class="swiper-slide layer3">
            <div class="layer text">
                <p><span>超级英雄</span><br>你们都是我的超级英雄，让我无所畏惧去追梦</p>
                <a href="<?php echo Yii::app()->createUrl('site/super'); ?>" class="btn-style-o btn-style-white-o cd-headline letters rotate-3"><span class="cd-words-wrapper"><b class="is-visible">探索更多</b><b>探索更多</b></span></a>
            </div>
            <div class="layer pic0"></div>
            <div class="layer pic1"></div>
            <div class="layer pic3"></div>
            <div class="layer pic2"></div>
            <div class="layer pic5"></div>
            <div class="layer pic4"></div>
            <div class="layer pic6"></div>
        </div>
		<div class="swiper-slide layer4">
		<img src="/upload/img/1463476610333.jpg">
		</div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<script>
function init(){init_all();}
function init_layer0(){
    $(".layer0 .pic0").css({opacity:0});
    $(".layer0 .pic1").css({opacity:0,x:-50});
    $('.layer0 .pic2').css({opacity:0});
    $('.layer0 .pic3').css({opacity:0});
    $('.layer0 .pic4').css({opacity:0,x:100});
    $('.layer0 .pic5').css({opacity:0});
    $('.layer0 .text').css({opacity:0,y:-50});
}
function layer0_in(){
    $(".layer0 .pic0").delay(900).transition({opacity:1,scale:1},600);
    $(".layer0 .pic1").delay(2800).transition({opacity:1,x:0},800);
    $(".layer0 .pic2").delay(300).transition({opacity:1},600);
    $(".layer0 .pic3").delay(600).transition({opacity:1},600);
    $(".layer0 .pic4").delay(2000).transition({opacity:1,x:0},800);
    $(".layer0 .pic5").delay(1200).transition({opacity:1,scale:1},600);
    $(".layer0 .text").delay(3600).transition({opacity:1,y:0},600);
};
function init_layer1(){
    var mw = $('.layer1 .pic1').height()
    $('.layer1 .pic0').css({opacity:0});
    $('.layer1 .pic1').css({opacity:0,y:100});
    $('.layer1 .pic2').css({opacity:0,x:-50,marginLeft:-mw-mw/3});
    $('.layer1 .pic3').css({opacity:0,scale:.5});
    $('.layer1 .pic4').css({opacity:0,x:50,marginLeft:mw*2/3});
    $(".layer1 .text").css({opacity:0,x:-50});
}
function layer1_in(){
    $('.layer1 .pic0').animate({opacity:1},600);
    $('.layer1 .pic1').delay(600).transition({opacity:1,y:0},600);
    $('.layer1 .pic2').delay(1200).transition({opacity:1,x:0},600);
    $('.layer1 .pic3').delay(2400).transition({opacity:1,scale:1},600);
    $('.layer1 .pic4').delay(1800).transition({opacity:1,x:0},600);
    $(".layer1 .text").delay(3000).transition({opacity:1,x:0},600);
}
function init_layer2(){
    $('.layer2 .pic0').css({opacity:0});
    $('.layer2 .pic1').css({opacity:0,x:-50});
    $(".layer2 .text").css({opacity:0,y:50});
}
function layer2_in(){
    $('.layer2 .pic0').animate({opacity:1},600);
    $('.layer2 .pic1').delay(600).transition({opacity:1,x:0},600);
    $(".layer2 .text").delay(1200).transition({opacity:1,y:0},600);
}

function init_layer3(){
    $(".layer3 .pic0").css({opacity:0});
    $(".layer3 .pic1").css({opacity:0,x:"-50"});
    $(".layer3 .pic2").css({opacity:0,x:"-50"});
    $(".layer3 .pic3").css({opacity:0,y:"-50"});
    $(".layer3 .pic4").css({opacity:0,x:"50"});
    $(".layer3 .pic5").css({opacity:0,x:"50"});
    $(".layer3 .pic6").css({opacity:0,y:"50"});
    $(".layer3 .text").css({opacity:0,x:"50"});
}
function layer3_in(){
    $(".layer3 .pic0").transition({opacity:1},600);
    $(".layer3 .pic1").delay(600).transition({opacity:1,x:0},600);
    $(".layer3 .pic2").delay(600).transition({opacity:1,x:0},600);
    $(".layer3 .pic3").delay(1200).transition({opacity:1,y:0},600);
    $(".layer3 .pic4").delay(600).transition({opacity:1,x:0},600);
    $(".layer3 .pic5").delay(600).transition({opacity:1,x:0},600);
    $(".layer3 .pic6").delay(1800).transition({opacity:1,y:0},600);
    $(".layer3 .text").delay(2400).transition({opacity:1,x:0},600);
}
function init_layer4(){}
function layer4_in(){}
function init_layer5(){}
function layer5_in(){}
function init_layer6(){}
function layer6_in(){}
function init_layer7(){}
function layer7_in(){}
function init_layer8(){}
function layer8_in(){}
function init_layer9(){}
function layer9_in(){}
function init_layer10(){}
function layer10_in(){}

function init_all(index){
    if(typeof index != "undefined"){
        for(var i=0;i<=3;i++){
            if(i == index+1 || i == index-1){
                eval("init_layer"+i+"();");
            }
        }
    }else{
        if( typeof init_layer0 == "function")init_layer0();
        if( typeof init_layer1 == "function")init_layer1();
    }
}
var images = [
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/1.jpg",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/1-1.png",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/1-2.png",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/1-3.png",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/1-4.png",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/1-5.png",
    ];
var images2 = [
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/2-1.png",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/3-0.jpg",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/3-1.png",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/4.jpg",
        "<?php echo Yii::app()->request->baseUrl; ?>/static/images/index/4-0.png",
    ];

$(document).ready(function() {
    PreLoadImg(images,function(){
        $(".loadingCls").hide();
        var indexPlay = $('.index-play').swiper({
            autoplay:10000,
            autoplayDisableOnInteraction:false,
            speed:1000,
            loop: true,
            slidesPerView:1,
            loopedSlides :4,
            simulateTouch: false,
            pagination: '.swiper-pagination',
            mousewheelControl : true,
            keyboardControl : true,
            onSlideChangeStart:function(swiper){
                $('.index-play .layer').stop(true,true)
                eval("init_layer"+(swiper.activeIndex%4)+"()");
            },
            onSlideChangeEnd:function(swiper){
                eval("layer"+(swiper.activeIndex%4)+"_in()");
                swiper.startAutoplay()
            },
        });
        init_all();
        PreLoadImg(images2,function(){console.log(1)});
    });

    $('.menu').click(function(event) {
        $('.panel-menu').addClass('open');
        $('.panel-overlay').show().click(function(){
            $(this).hide();
            $('.panel-menu').removeClass('open');
        })
    });
    $('.panel-menu .close').click(function(){
        $('.panel-overlay').hide();
        $('.panel-menu').removeClass('open');
    })

});
</script>
<script>
jQuery(document).ready(function(c){var a=2500,b=3800,r=b-3000,n=50,k=150,s=500,d=s+800,j=600,o=1500;g();function g(){m(c(".cd-headline.letters").find("b"));h(c(".cd-headline"))}function m(v){v.each(function(){var y=c(this),z=y.text().split(""),x=y.hasClass("is-visible");for(i in z){if(y.parents(".rotate-2").length>0){z[i]="<em>"+z[i]+"</em>"}z[i]=(x)?'<i class="in">'+z[i]+"</i>":"<i>"+z[i]+"</i>"}var w=z.join("");y.html(w)})}function h(w){var v=a;w.each(function(){var y=c(this);if(y.hasClass("loading-bar")){v=b;setTimeout(function(){y.find(".cd-words-wrapper").addClass("is-loading")},r)}else{if(y.hasClass("clip")){var x=y.find(".cd-words-wrapper"),A=x.width()+10;x.css("width",A)}else{if(!y.hasClass("type")){var B=y.find(".cd-words-wrapper b"),z=0;B.each(function(){var C=c(this).width();if(C>z){z=C}});y.find(".cd-words-wrapper").css("width",z)}}}setTimeout(function(){q(y.find(".is-visible").eq(0))},v)})}function q(x){var w=u(x);if(x.parents(".cd-headline").hasClass("type")){var y=x.parent(".cd-words-wrapper");y.addClass("selected").removeClass("waiting");setTimeout(function(){y.removeClass("selected");x.removeClass("is-visible").addClass("is-hidden").children("i").removeClass("in").addClass("out")},s);setTimeout(function(){e(w,k)},d)}else{if(x.parents(".cd-headline").hasClass("letters")){var v=(x.children("i").length>=w.children("i").length)?true:false;f(x.find("i").eq(0),x,v,n);p(w.find("i").eq(0),w,v,n)}else{if(x.parents(".cd-headline").hasClass("clip")){x.parents(".cd-words-wrapper").animate({width:"2px"},j,function(){l(x,w);e(w)})}else{if(x.parents(".cd-headline").hasClass("loading-bar")){x.parents(".cd-words-wrapper").removeClass("is-loading");l(x,w);setTimeout(function(){q(w)},b);setTimeout(function(){x.parents(".cd-words-wrapper").addClass("is-loading")},r)}else{l(x,w);setTimeout(function(){q(w)},a)}}}}}function e(w,v){if(w.parents(".cd-headline").hasClass("type")){p(w.find("i").eq(0),w,false,v);w.addClass("is-visible").removeClass("is-hidden")}else{if(w.parents(".cd-headline").hasClass("clip")){w.parents(".cd-words-wrapper").animate({width:w.width()+10},j,function(){setTimeout(function(){q(w)},o)})}}}function f(z,x,y,w){z.removeClass("in").addClass("out");if(!z.is(":last-child")){setTimeout(function(){f(z.next(),x,y,w)},w)}else{if(y){setTimeout(function(){q(u(x))},a)}}if(z.is(":last-child")&&c("html").hasClass("no-csstransitions")){var v=u(x);l(x,v)}}function p(y,w,x,v){y.addClass("in").removeClass("out");if(!y.is(":last-child")){setTimeout(function(){p(y.next(),w,x,v)},v)}else{if(w.parents(".cd-headline").hasClass("type")){setTimeout(function(){w.parents(".cd-words-wrapper").addClass("waiting")},200)}if(!x){setTimeout(function(){q(w)},a)}}}function u(v){return(!v.is(":last-child"))?v.next():v.parent().children().eq(0)}function t(v){return(!v.is(":first-child"))?v.prev():v.parent().children().last()}function l(w,v){w.removeClass("is-visible").addClass("is-hidden");v.removeClass("is-hidden").addClass("is-visible")}});
</script>
</body>
</html>