/**
 * Created by pf.zhang on 16.5.3.
 */
$(function () {
    if($('.bdsharebuttonbox').length>0){
        window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
    }
    
    // 图片效果
    $(".hover-st").each(function(){
        $(this).append("<b></b>");
        if($(this).find(".text").length){
            $(this).find(".text").append("<b></b>")
        }
    });
    //招聘
    $('.job-item .tab').click(function(){
        var item=$(this).parent();
        var other=item.siblings('.job-item');
        other.removeClass('curr');
        item.hasClass('curr')?item.removeClass('curr'):item.addClass('curr');
    });
    // 技术问答
    $('.list-col3 .qa-list dl dt').click(function () {
        if(!$(this).hasClass('curr')){
            $(this).next('dd').addClass('open').siblings('dd').removeClass('open');
            $(this).addClass('curr').siblings('dt').removeClass('curr');
        }
        //else{
            //$(this).next('dd').removeClass('open');
            //$(this).removeClass('curr');
        //}
    }).eq(0).click();
    // 底部报名
    $(".fixed-side-bm").click(function() {
        $(".fixed-side-bm").addClass('hide')
        $('.fixed-form').removeClass('hide');
    });
    $(".fixed-form .icon-close").click(function() {
        $(".fixed-form").addClass('hide')
        $(".fixed-side-bm").removeClass('hide')
    });    // 作品详情页
    $('.cw-img .swiper-container').swiper({
        speed: 1000,
        autoplay: 5000,
        autoplayDisableOnInteraction: false,
        paginationClickable :true,
        loop: true,
        observer: true,
        centeredSlides: true,
        nextButton: '.cw-img .out-next',
        prevButton: '.cw-img .out-prev',
        pagination: '.cw-img .out-pagination',
    });

});

