<?php $this->pageTitle = 'Future Make Q1'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(0).addClass('curr')});</script>
<div class="main pro-pen">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('pro/index'); ?>">3D产品</a> > <span>Future Make Q1</span></div>
    <div class="pro-intro">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/pen-intro.jpg" alt="">
        <div class="pro-intro-txt pa">
            <h1>Future Make Q1</h1>
            <h3>是全球第一支<br>光固化3D打印笔。</h3>
            <p class="f18">Future Make Q1是全球第一支光固化3D打印笔<br>一项可以实施素质教育的教育工具；<br>一款可以启发创意思维的创意工具；<br>一种可以实现立体创作的智能装备；</p>
            <div class="f23">
                <a href="<?php echo Yii::app()->createUrl('video/index'); ?>">观看影片<i class="iconfont icon-weibiaoti1 animate"></i></a><a href="<?php echo Yii::app()->createUrl('works/index'); ?>">查看作品<i class="iconfont icon-right animate"></i></a>
            </div>
        </div>
    </div>
    <div class="pro-angle">
        <div class="pro-point">
            <dl>
                <dt><img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/w-tec.png" alt="无毒害"></dt>
                <dd>安全环保</dd>
            </dl>
            <dl>
                <dt><img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/w-tec1.png" alt="操作简易"></dt>
                <dd>操作简易</dd>
            </dl>
            <dl>
                <dt><img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/w-tec2.png" alt="及时成型"></dt>
                <dd>及时成型</dd>
            </dl>
        </div>
        <h3 class="pro-h3" style="height:0;overflow:hidden;">安全环保</h3>
        <p class="f16 fc-71">耗材采用的是安全环保的光敏树脂<br> 树脂材料常规色有：透明、红色、黄色、蓝色、绿色、棕色；<br> 特殊色有：夜光、温变、香味等。</p>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/pen-1.jpg">
    </div>
    <div class="pro-angle">
        <h3 class="pro-h3">核心技术</h3>
        <p class="f16 fc-71">依托中科院的强大技术支持，<br> Future Make Q1已经荣获9项自主知识产权专利</p>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/pen-2.jpg">
    </div>
    <div class="pro-angle">
        <h3 class="pro-h3">安全认证</h3>
        <p class="f16 fc-71">Future Make Q1 获得CE、FCC、ROHS、SGS等<br>多个国际权威认证<br>并通过国内上海化工研究院的无毒害检测认证和<br>中国质量检测认证</p>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/pen-3.jpg">
    </div>
    <div class="pro-angle"><img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/pen-4.png"></div>
    <div class="pro-show">
        <div class="swiper-container" data-pn="ps">
            <div class="swiper-wrapper">
				<?php if($ads5){ foreach($ads5 as $one){ ?>
                <div class="swiper-slide"><img src="<?php echo $one->img; ?>" alt="1"></div>
				<?php }} ?>
            </div>
        </div>
        <div class="ps out-prev pa"><i class="iconfont icon-left"></i></div>
        <div class="ps out-next pa"><i class="iconfont icon-right1"></i></div>
        <div class="ps out-pagination pa"></div>
    </div>
    <div class="tc cl">
        <h3 class="pro-h3 tc">功能介绍</h3>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/static/pic/pen-5.jpg" alt="tec-pic" class="w-safe-pic">
    </div>
    <div class="wv-list pro-wv-list cf">
        <h3 class="pro-h3 tc">视频介绍</h3>
		<?php if($ads7){ foreach($ads7 as $one){ ?>
        <a class="video hover-st" href="<?php echo $one->link; ?>"><img src="<?php echo $one->img; ?>"></a>
        <?php }} ?>
    </div>
    <div class="pro-show2">
        <div class="swiper-container pr" data-pn="wv">
            <div class="swiper-wrapper">
				<?php if($ads6){ foreach($ads6 as $one){ ?>
                <div class="swiper-slide"><img src="<?php echo $one->img; ?>" alt="1"></div>
				<?php }} ?>
            </div>
        </div>
        <div class="wv out-prev pa"><i class="iconfont icon-left"></i></div>
        <div class="wv out-next pa"><i class="iconfont icon-right1"></i></div>
        <div class="wv out-pagination pa"></div>
    </div>
</div>
</body>
<script type="text/javascript">
$(function () {
    $(".swiper-container").each(function (i) {
        var pn = $(this).attr("data-pn");
        $(this).addClass('swiper-container-' + pn);
        $('.swiper-container-' + pn).swiper({
            speed: 1000,
            autoplay: 5000,
            autoplayDisableOnInteraction: false,
            paginationClickable :true,
            loop: true,
            observer: true,
            centeredSlides: true,
            slidesPerView: function () {
                if (pn == "wv") {
                    return 1.5
                }
            }(),
            spaceBetween: function () {
                if (pn == "wv") {
                    return 120
                }
            }(),
            nextButton: '.' + pn + '.out-next',
            prevButton: '.' + pn + '.out-prev',
            pagination: '.' + pn + '.out-pagination',
        });
    });
})
</script>
</html>