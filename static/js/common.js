$(document).ready(function(){


	$(".lazy").lazyload({threshold:200,failure_limit:20});//<img class="lazy" src="img/grey.gif" data-original="img/example.jpg"  width="640" heigh="480" alt="">
	$(".select-style select").selectStyle();
	$(".form-dl").formZindex();
	$(".hover-st").each(function(){
		$(this).append("<b></b>");
		if($(this).find(".text").length){
			$(this).find(".text").append("<b></b>")
		}
	});
	//回到顶部
    //$("#back-top").click(function(){var hb=$("html,body");if(!hb.is(":animated"))return hb.animate({scrollTop:0},500)});
    $(window).scroll(function(){100<$(window).scrollTop()?($("#back-top").fadeIn(300),$("#back-top").click(function(){if(!$("html,body").is(":animated"))return $("html,body").animate({scrollTop:0}, 500),!1})):$("#back-top").fadeOut(300)});
    //通用切换
    $('.tab-over dt').mouseover(function(){
        var dataTab=$(this).attr("data-tab");
        $(this).addClass("curr").siblings("dt").removeClass("curr");
        if(dataTab){
            var strData = new Array();
            strData = dataTab.split(' ');
            for (var i = 0; i < strData.length; i++){
                i==0?$('#'+strData[i]).show().siblings(".tab-con").hide():$('#'+strData[i]).show();
            };
        }
    });
    $('.tab-click dt').click(function(){
        var dataTab=$(this).attr("data-tab");
        $(this).addClass("curr").siblings("dt").removeClass("curr");
        if(dataTab){
            var strData = new Array();
            strData = dataTab.split(' ');
            console.log(strData)
            for (var i = 0; i < strData.length; i++) {
                i==0?$('#'+strData[i]).show().siblings(".tab-con").hide():$('#'+strData[i]).show();
            };
        }
    });
    //通用弹层
    $(".btn-pop").click(function(){
        $("body").dialog();
        var pop = "#"+$(this).attr("data-pop");
        popShow(pop);
    });
    //$(".pop-box .btn-close,.pop-box .btn-style-close").live('click', function(){
        //$(this).parents(".pop-box").fadeOut(300);
        //$("#MaskID").fadeOut(200,function(){$(this).remove();})
    //})
    //input提示
    $(".tip-call").each(function(){
        var tip = $(this).siblings(".tip-bar");
        $(this).focus(function(){
            tip?tip.show():void 0;
        }).blur(function(){
            tip?tip.hide():void 0;
        })
    })
});
//通用层滚动定位
(function($){
    $.fn.scrollFixed=function(){
        var $pop=this;
        var popFill=this.selector.substr(1)+"-fill";
        var scrollstart = this.offset().top;
        var popH = this.height();
        window.onscroll = function(){
            var scroll_h = document.body.scrollTop+document.documentElement.scrollTop;
            if(scroll_h>scrollstart){
                if (!$("#"+popFill).length){
                    $pop.addClass("pop-fiexd").after("<div id='"+popFill+"'></div>");
                    $("#"+popFill).height(popH)
                }
            }else{
                $pop.removeClass("pop-fiexd");
                $("#"+popFill).remove();
            }
        }
    };
})(jQuery);
//通用弹层显示
function popShow(pop){
    var flag;
    var _this=$(pop);
    var aTime=Number(_this.attr("data-poptime"))*1000;
    if(!flag){
        var ph = -parseInt(_this.height()/2);
        if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style){
            _this.css({opacity:0}).show();
            var pcw = parseInt(_this.find('.content').width());
            _this.css({width:pcw,marginLeft:-pcw/2}).find('.botbar').width(pcw+60).fadeIn(300);
        }else{
            var pw = -parseInt(_this.width()/2);
            _this.css({width:-pw*2,marginTop:ph,marginLeft:pw}).fadeIn(300);
        }
    }else{
        _this.fadeIn(300);
    }
    if(aTime){
        var link=_this.attr("data-popjump");
        _this.delay(aTime).queue(function(){
            _this.stop().fadeOut(300);
            $("#MaskID").fadeOut(200,function(){$(this).remove();})
            if(link){window.location.href=link;}
        });
    }
}
//滚动插件
jQuery.fn.extend({
    Scroll:function(opt,callback){
        //参数初始化
        if(!opt) var opt={};
        var timerID;
        var _this=this.eq(0).find(".scroll-box");
        var lineH=_this.find(opt.item+":first").height(), //获取行高
            length=_this.find(opt.item).length,
            line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10),//每次滚动的行数，默认为一屏，即父容器高度
            speed=opt.speed?parseInt(opt.speed,10):500,//卷动速度，数值越大，速度越慢（毫秒）
            timer=opt.timer?parseInt(opt.timer,10):3000; //滚动的时间间隔（毫秒）
        _this.parent().height(lineH*opt.num);
        if(length>opt.num){
            if(line==0) line=1;
            var upHeight=0-line*lineH;
            //滚动函数
            var scrollUp=function(){
                _this.animate({marginTop:upHeight},speed,function(){
                    for(i=1;i<=line;i++){
                        _this.find(opt.item+":first").appendTo(_this);
                    }
                    _this.css({marginTop:0});
                });
            }
            //Shawphy:自动播放
            var autoPlay = function(){
                if(timer)timerID = window.setInterval(function(){scrollUp();},timer);
            };
            var autoStop = function(){
                if(timer)window.clearInterval(timerID);
            };
            //鼠标事件绑定
            _this.hover(autoStop,autoPlay).mouseout();
        }
    }
});
//formZindex
(function($){
    $.fn.formZindex=function(){
        $(this).each(function(){
        	var dlitem=$(this).find(".item");
        	for (var i=0;i<dlitem.length;i++){
        		dlitem.eq(i).css("zIndex",100-i);
        	}
        })
    }
})(jQuery);
// 遮罩
$.fn.dialog=function(){
    var wnd = $(window), doc = $(document),$body=$("body");
    (wnd.height()>doc.height())?wHeight = wnd.height():wHeight =doc.height();
    (wnd.width()>doc.width())?wWidth = wnd.width():wWidth =doc.width();
    $body.append("<div id='MaskID'></div>");
    $body.find("#MaskID").width(wWidth).height(wHeight).css({position:"absolute",top:"0px",left:"0px",background:"#000",filter:"Alpha(opacity=0);",opacity:"0",zIndex:"1000",display:"block"}).animate({ opacity:"0.8"},300 );
};
//select插件
(function($){
    function hideOptions(speed){
        if(speed.data){speed=speed.data}
        if($(document).data("nowselectoptions")){
            $($(document).data("nowselectoptions")).hide();
            $($(document).data("nowselectoptions")).prev("div").removeClass("tag-select-open");
            $(document).data("nowselectoptions",null);
            $(document).unbind("click",hideOptions);
            $(document).unbind("keyup",hideOptionsOnEscKey);
        }
    }
    function hideOptionsOnEscKey(e){
        var myEvent = e || window.event;
        var keyCode = myEvent.keyCode;
        if(keyCode==27)hideOptions(e.data);
    }
    function showOptions(speed){
        $(document).bind("click",speed,hideOptions);
        $(document).bind("keyup",speed,hideOptionsOnEscKey);
        $($(document).data("nowselectoptions")).slideDown(speed);
        $($(document).data("nowselectoptions")).prev("div").addClass("tag-select-open");
    }
    $.fn.selectStyle=function(_speed){
        $(this).each(function(){
            var speed=_speed||0;
            var width=this.getAttribute("data-width")?this.getAttribute("data-width"):'auto';
            if($(this).data("cssobj")){
                $($(this).data("cssobj")).remove();
            }
            $(this).hide();
            var divselect = $("<div></div>").insertAfter(this).addClass("tag-select").css("width",width);
            //divselect.innerHTML("111")
            $(this).data("cssobj",divselect);
            var divoptions = $("<ul></ul>").insertAfter(divselect).addClass("tag-options").hide();
            divselect.click(function(e){
                if($($(document).data("nowselectoptions")).get(0) != $(this).next("ul").get(0)){
                    hideOptions(speed);
                }
                if(!$(this).next("ul").is(":visible"))
                {
                    e.stopPropagation();
                    $(document).data("nowselectoptions",$(this).next("ul"));
                    showOptions(speed);
                }
            });
            divselect.hover(function(){
                    $(this).addClass("tag-select-hover");
                },function(){
                    $(this).removeClass("tag-select-hover");
                }
            );
            $(this).change(function(){
                $(this).nextAll("ul").children("li:eq("+ $(this)[0].selectedIndex +")").addClass("open-selected").siblings().removeClass("open-selected");
                $(this).next("div").html($(this).children("option:eq("+ $(this)[0].selectedIndex +")").text()+'<i class="zxk zxk-caret-down"></i>');
            });
            $(this).children("option").each(function(i){
                var lioption= $("<li></li>").html($(this).text()).attr("title",$(this).attr("title")).appendTo(divoptions);
                if($(this).attr("selected")){
                    lioption.addClass("open-selected");
                    divselect.html($(this).text()+'<i class="zxk zxk-caret-down"></i>');
                }
                lioption.data("option",this);
                lioption.click(function(){
                    lioption.data("option").selected=true;
                    $(lioption.data("option")).trigger("change",true)
                });
                lioption.hover(
                    function(){$(this).addClass("open-hover");},
                    function(){ $(this).removeClass("open-hover"); }
                );
            });
        });
    }
})(jQuery);
//轮播插件
var SlideClass = {
    hasPrototype: false,
    newClass: function(ele) {
        var ele = ele || {};
        if (!this.hasPrototype) {
            this.init.prototype = SlideClass;
            this.hasPrototype = true;
        }
        return new this.init(ele);
    },
    autoPlay: function() {
        var mythis = this;
        if (!this.slideMain.is(':animated')) {
            mythis.item++;
            if (mythis.item == mythis.length) {
                mythis.item = 0;
            }
            mythis.animationObj(mythis.item);
            mythis.curAnimation(mythis.item);
            mythis.clearSlideClass = setTimeout(function() {
                mythis.autoPlay();
            }, mythis.interval);
        }
    },
    prvePage: function() {
        if (!this.slideMain.is(':animated')) {
            this.item == 0 ? this.item = this.length - 1 : this.item--;
            this.animationObj(this.item);
            this.curAnimation(this.item);
        }
    },
    nextPage: function() {
        if (!this.slideMain.is(':animated')) {
            this.item == this.length - 1 ? this.item = 0 : this.item++;
            this.animationObj(this.item);
            this.curAnimation(this.item);
        }
    },
    clickCur: function(ele) {
        var _this = this;
        clearTimeout(_this.clearSlideClass);
        var getItem = $(ele).index();
        if(getItem!=this.aCur.parent().find(".curr").index()){
            this.aCur.removeClass('curr').eq(getItem).addClass('curr');
            this.animationObj(getItem);
            this.item = getItem;
        }
    },
    animationObj: function(getNum) {
        this.slideMain.stop(true,true).removeClass(this.addclassName).fadeOut(this.speed);
        this.slideMain.eq(getNum).stop(true,true).addClass(this.addclassName).fadeIn(this.speed)
    },
    curAnimation: function(eqNum) {
        var aCur = this.aCur;
        aCur ? aCur.removeClass('curr').eq(eqNum).addClass('curr') : void(0);
    },
    hoverWrap: function(ele) {
        var _this = this;
        ele.hoverMain.hover(function() {
            clearTimeout(_this.clearSlideClass);
        }, function() {
            _this.clearSlideClass = setTimeout(function() {
                _this.autoPlay();
            }, _this.interval);
        });
    },
    init: function(ele) {
        //clearTimeout(clearSlideClass);
        var _this = this;
        _this.clearSlideClass=null;
        _this.item = 0;
        _this.speed = ele.speed?_this.speed = ele.speed:_this.speed = 600;
        _this.interval = ele.interval?_this.interval = ele.interval:_this.interval = 5000;
        _this.hoverMain = ele.hoverMain;
        _this.slideMain = ele.hoverMain.find(ele.slideMain);
        _this.addclassName = ele.addclassName?_this.addclassName = ele.addclassName:_this.addclassName = 'curr';
        _this.length = _this.slideMain.length;
        _this.next = ele.next;
        _this.prev = ele.prev;
        _this.touchMain = ele.touchMain;
        if(ele.btnTape){
            _this.btnHtml = "<div class='btn-item'>";
            for(var i=1; i < _this.length+1; i++) {
                if(ele.btnText){
                    i==1?_this.btnHtml += "<span class='curr'>"+ ele.btnText[i-1] +"</span>":_this.btnHtml += "<span>"+ ele.btnText[i-1] +"</span>"
                }else{
                    i==1?_this.btnHtml += "<span class='curr'>"+ i +"</span>":_this.btnHtml += "<span>"+ i +"</span>"
                }
            }
            _this.btnHtml += "</div>";
            ele.hoverMain.append(_this.btnHtml);
            _this.aCur = ele.hoverMain.find(".btn-item span");
            if(ele.btnTape!="click"){
                ele.hoverMain.find(".btn-item span").mouseover(function(){_this.clickCur(this);})
            }else{
                ele.hoverMain.find(".btn-item span").click(function(){_this.clickCur(this);})
            }
        }
        _this.clearSlideClass = setTimeout(function(){
            _this.autoPlay();
        }, _this.interval);
        if(ele.next && ele.prev){
            ele.hoverMain.find(ele.prev).click(function(){_this.prvePage();});
            ele.hoverMain.find(ele.next).click(function(){_this.nextPage();});
        };
        _this.hoverWrap(ele);
    }
};
/*! tinyscrollbar - v2.4.2 - 2015-04-03*/
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){"use strict";function b(b,e){function f(){return o.update(),h(),o}function g(){t.css(y,o.thumbPosition),q.css(y,-o.contentPosition),r.css(x,o.trackSize),s.css(x,o.trackSize),t.css(x,o.thumbSize)}function h(){u?p[0].ontouchstart=function(a){1===a.touches.length&&(a.stopPropagation(),k(a.touches[0]))}:(t.bind("mousedown",function(a){a.stopPropagation(),k(a)}),s.bind("mousedown",function(a){k(a,!0)})),a(window).resize(function(){o.update("relative")}),o.options.wheel&&window.addEventListener?b[0].addEventListener(v,l,!1):o.options.wheel&&(b[0].onmousewheel=l)}function i(){return o.contentPosition>0}function j(){return o.contentPosition<=o.contentSize-o.viewportSize-5}function k(b,c){o.hasContentToSroll&&(a("body").addClass("noSelect"),z=c?t.offset()[y]:w?b.pageX:b.pageY,u?(document.ontouchmove=function(a){(o.options.touchLock||i()&&j())&&a.preventDefault(),m(a.touches[0])},document.ontouchend=n):(a(document).bind("mousemove",m),a(document).bind("mouseup",n),t.bind("mouseup",n),s.bind("mouseup",n)),m(b))}function l(c){if(o.hasContentToSroll){var d=c||window.event,e=-(d.deltaY||d.detail||-1/3*d.wheelDelta)/40,f=1===d.deltaMode?o.options.wheelSpeed:1;o.contentPosition-=e*f*o.options.wheelSpeed,o.contentPosition=Math.min(o.contentSize-o.viewportSize,Math.max(0,o.contentPosition)),o.thumbPosition=o.contentPosition/o.trackRatio,b.trigger("move"),t.css(y,o.thumbPosition),q.css(y,-o.contentPosition),(o.options.wheelLock||i()&&j())&&(d=a.event.fix(d),d.preventDefault())}}function m(a){if(o.hasContentToSroll){var c=w?a.pageX:a.pageY,d=u?z-c:c-z,e=Math.min(o.trackSize-o.thumbSize,Math.max(0,o.thumbPosition+d));o.contentPosition=e*o.trackRatio,b.trigger("move"),t.css(y,e),q.css(y,-o.contentPosition)}}function n(){o.thumbPosition=parseInt(t.css(y),10)||0,a("body").removeClass("noSelect"),a(document).unbind("mousemove",m),a(document).unbind("mouseup",n),t.unbind("mouseup",n),s.unbind("mouseup",n),document.ontouchmove=document.ontouchend=null}this.options=a.extend({},d,e),this._defaults=d,this._name=c;var o=this,p=b.find(".viewport"),q=b.find(".overview"),r=b.find(".scrollbar"),s=r.find(".track"),t=r.find(".thumb"),u="ontouchstart"in document.documentElement,v="onwheel"in document.createElement("div")?"wheel":void 0!==document.onmousewheel?"mousewheel":"DOMMouseScroll",w="x"===this.options.axis,x=w?"width":"height",y=w?"left":"top",z=0;return this.contentPosition=0,this.viewportSize=0,this.contentSize=0,this.contentRatio=0,this.trackSize=0,this.trackRatio=0,this.thumbSize=0,this.thumbPosition=0,this.hasContentToSroll=!1,this.update=function(a){var b=x.charAt(0).toUpperCase()+x.slice(1).toLowerCase();switch(this.viewportSize=p[0]["offset"+b],this.contentSize=q[0]["scroll"+b],this.contentRatio=this.viewportSize/this.contentSize,this.trackSize=this.options.trackSize||this.viewportSize,this.thumbSize=Math.min(this.trackSize,Math.max(this.options.thumbSizeMin,this.options.thumbSize||this.trackSize*this.contentRatio)),this.trackRatio=(this.contentSize-this.viewportSize)/(this.trackSize-this.thumbSize),this.hasContentToSroll=this.contentRatio<1,r.toggleClass("disable",!this.hasContentToSroll),a){case"bottom":this.contentPosition=Math.max(this.contentSize-this.viewportSize,0);break;case"relative":this.contentPosition=Math.min(Math.max(this.contentSize-this.viewportSize,0),Math.max(0,this.contentPosition));break;default:this.contentPosition=parseInt(a,10)||0}return this.thumbPosition=this.contentPosition/this.trackRatio,g(),o},f()}var c="tinyscrollbar",d={axis:"y",wheel:!0,wheelSpeed:40,wheelLock:!0,touchLock:!0,trackSize:!1,thumbSize:!1,thumbSizeMin:20};a.fn[c]=function(d){return this.each(function(){a.data(this,"plugin_"+c)||a.data(this,"plugin_"+c,new b(a(this),d))})}});
/*jQuery Mousewheel 3.1.13*/
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});
/*! Lazy Load 1.9.5 - MIT license - Copyright 2010-2015 Mika Tuupola */
!function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function g(){var b=0;i.each(function(){var c=a(this);if(!j.skip_invisible||c.is(":visible"))if(a.abovethetop(this,j)||a.leftofbegin(this,j));else if(a.belowthefold(this,j)||a.rightoffold(this,j)){if(++b>j.failure_limit)return!1}else c.trigger("appear"),b=0})}var h,i=this,j={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!1,appear:null,load:null,placeholder:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(j,f)),h=j.container===d||j.container===b?e:a(j.container),0===j.event.indexOf("scroll")&&h.bind(j.event,function(){return g()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,(c.attr("src")===d||c.attr("src")===!1)&&c.is("img")&&c.attr("src",j.placeholder),c.one("appear",function(){if(!this.loaded){if(j.appear){var d=i.length;j.appear.call(b,d,j)}a("<img />").bind("load",function(){var d=c.attr("data-"+j.data_attribute);c.hide(),c.is("img")?c.attr("src",d):c.css("background-image","url('"+d+"')"),c[j.effect](j.effect_speed),b.loaded=!0;var e=a.grep(i,function(a){return!a.loaded});if(i=a(e),j.load){var f=i.length;j.load.call(b,f,j)}}).attr("src",c.attr("data-"+j.data_attribute))}}),0!==j.event.indexOf("scroll")&&c.bind(j.event,function(){b.loaded||c.trigger("appear")})}),e.bind("resize",function(){g()}),/(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent&&b.originalEvent.persisted&&i.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){g()}),this},a.belowthefold=function(c,f){var g;return g=f.container===d||f.container===b?(b.innerHeight?b.innerHeight:e.height())+e.scrollTop():a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return g=f.container===d||f.container===b?e.width()+e.scrollLeft():a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollTop():a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollLeft():a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!(a.rightoffold(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.abovethetop(b,c))},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})}(jQuery,window,document);
/** jQuery.ScrollTo 1.4*/
;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);if(!e.length)return;case "object":if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});
/*
 * ScrollToFixed
 * https://github.com/bigspotteddog/ScrollToFixed
 */
(function(a){a.isScrollToFixed=function(b){return !!a(b).data("ScrollToFixed")};a.ScrollToFixed=function(d,i){var m=this;m.$el=a(d);m.el=d;m.$el.data("ScrollToFixed",m);var c=false;var H=m.$el;var I;var F;var k;var e;var z;var E=0;var r=0;var j=-1;var f=-1;var u=null;var A;var g;function v(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");f=-1;E=H.offset().top;r=H.offset().left;if(m.options.offsets){r+=(H.offset().left-H.position().left)}if(j==-1){j=r}I=H.css("position");c=true;if(m.options.bottom!=-1){H.trigger("preFixed.ScrollToFixed");x();H.trigger("fixed.ScrollToFixed")}}function o(){var J=m.options.limit;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function q(){return I==="fixed"}function y(){return I==="absolute"}function h(){return !(q()||y())}function x(){if(!q()){var J=H[0].getBoundingClientRect();u.css({display:H.css("display"),width:J.width,height:J.height,"float":H.css("float")});cssOptions={"z-index":m.options.zIndex,position:"fixed",top:m.options.bottom==-1?t():"",bottom:m.options.bottom==-1?"":m.options.bottom,"margin-left":"0px"};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);H.addClass(m.options.baseClassName);if(m.options.className){H.addClass(m.options.className)}I="fixed"}}function b(){var K=o();var J=r;if(m.options.removeOffsets){J="";K=K-E}cssOptions={position:"absolute",top:K,left:J,"margin-left":"0px",bottom:""};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);I="absolute"}function l(){if(!h()){f=-1;u.css("display","none");H.css({"z-index":z,width:"",position:F,left:"",top:e,"margin-left":""});H.removeClass("scroll-to-fixed-fixed");if(m.options.className){H.removeClass(m.options.className)}I=null}}function w(J){if(J!=f){H.css("left",r-J);f=J}}function t(){var J=m.options.marginTop;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function B(){if(!a.isScrollToFixed(H)||H.is(":hidden")){return}var M=c;var L=h();if(!c){v()}else{if(h()){E=H.offset().top;r=H.offset().left}}var J=a(window).scrollLeft();var N=a(window).scrollTop();var K=o();if(m.options.minWidth&&a(window).width()<m.options.minWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.maxWidth&&a(window).width()>m.options.maxWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.bottom==-1){if(K>0&&N>=K-t()){if(!L&&(!y()||!M)){p();H.trigger("preAbsolute.ScrollToFixed");b();H.trigger("unfixed.ScrollToFixed")}}else{if(N>=E-t()){if(!q()||!M){p();H.trigger("preFixed.ScrollToFixed");x();f=-1;H.trigger("fixed.ScrollToFixed")}w(J)}else{if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}}}else{if(K>0){if(N+a(window).height()-H.outerHeight(true)>=K-(t()||-n())){if(q()){p();H.trigger("preUnfixed.ScrollToFixed");if(F==="absolute"){b()}else{l()}H.trigger("unfixed.ScrollToFixed")}}else{if(!q()){p();H.trigger("preFixed.ScrollToFixed");x()}w(J);H.trigger("fixed.ScrollToFixed")}}else{w(J)}}}}}function n(){if(!m.options.bottom){return 0}return m.options.bottom}function p(){var J=H.css("position");if(J=="absolute"){H.trigger("postAbsolute.ScrollToFixed")}else{if(J=="fixed"){H.trigger("postFixed.ScrollToFixed")}else{H.trigger("postUnfixed.ScrollToFixed")}}}var D=function(J){if(H.is(":visible")){c=false;B()}};var G=function(J){(!!window.requestAnimationFrame)?requestAnimationFrame(B):B()};var C=function(){var K=document.body;if(document.createElement&&K&&K.appendChild&&K.removeChild){var M=document.createElement("div");if(!M.getBoundingClientRect){return null}M.innerHTML="x";M.style.cssText="position:fixed;top:100px;";K.appendChild(M);var N=K.style.height,O=K.scrollTop;K.style.height="3000px";K.scrollTop=500;var J=M.getBoundingClientRect().top;K.style.height=N;var L=(J===100);K.removeChild(M);K.scrollTop=O;return L}return null};var s=function(J){J=J||window.event;if(J.preventDefault){J.preventDefault()}J.returnValue=false};m.init=function(){m.options=a.extend({},a.ScrollToFixed.defaultOptions,i);z=H.css("z-index");m.$el.css("z-index",m.options.zIndex);u=a("<div />");I=H.css("position");F=H.css("position");k=H.css("float");e=H.css("top");if(h()){m.$el.after(u)}a(window).bind("resize.ScrollToFixed",D);a(window).bind("scroll.ScrollToFixed",G);if("ontouchmove" in window){a(window).bind("touchmove.ScrollToFixed",B)}if(m.options.preFixed){H.bind("preFixed.ScrollToFixed",m.options.preFixed)}if(m.options.postFixed){H.bind("postFixed.ScrollToFixed",m.options.postFixed)}if(m.options.preUnfixed){H.bind("preUnfixed.ScrollToFixed",m.options.preUnfixed)}if(m.options.postUnfixed){H.bind("postUnfixed.ScrollToFixed",m.options.postUnfixed)}if(m.options.preAbsolute){H.bind("preAbsolute.ScrollToFixed",m.options.preAbsolute)}if(m.options.postAbsolute){H.bind("postAbsolute.ScrollToFixed",m.options.postAbsolute)}if(m.options.fixed){H.bind("fixed.ScrollToFixed",m.options.fixed)}if(m.options.unfixed){H.bind("unfixed.ScrollToFixed",m.options.unfixed)}if(m.options.spacerClass){u.addClass(m.options.spacerClass)}H.bind("resize.ScrollToFixed",function(){u.height(H.height())});H.bind("scroll.ScrollToFixed",function(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");B()});H.bind("detach.ScrollToFixed",function(J){s(J);H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");a(window).unbind("resize.ScrollToFixed",D);a(window).unbind("scroll.ScrollToFixed",G);H.unbind(".ScrollToFixed");u.remove();m.$el.removeData("ScrollToFixed")});D()};m.init()};a.ScrollToFixed.defaultOptions={marginTop:0,limit:0,bottom:-1,zIndex:1000,baseClassName:"scroll-to-fixed-fixed"};a.fn.scrollToFixed=function(b){return this.each(function(){(new a.ScrollToFixed(this,b))})}})(jQuery);
