<?php $this->pageTitle = '白雪公主'; ?>
<div class="main i-page i-snow">
    <div class="location"><a href="/">首页</a> > <a href="/snow.html">白雪公主</a></div>
    <div class="pr block1">
        <!-- <a class="btn-style btn-style-black btn0" href="/work-51.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a> -->
    </div>
    <div class="pr block2">
        <a class="btn-style btn-style-black btn1" href="/work-53.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
        <a class="btn-style btn-style-black btn2" href="/work-52.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
        <a class="btn-style btn-style-black btn3" href="/work-54.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block3">
        <a class="btn-style btn-style-black btn4" href="/work-51.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
        <a class="btn-style btn-style-black btn5" href="/work-55.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
        <a class="btn-style btn-style-black btn6" href="/work-56.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
    </div>
    <div class="pr block4">
        <a class="btn-style btn-style-black btn7" href="/work-57.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
    </div>

    <div class="more-list">
        <div class="title-common"><h3>更多精彩故事</h3></div>
        <ul class="cf">
        <?php if($more){ foreach($more as $one){ ?>
            <li>
                <a href="<?php echo $one->link; ?>" class="hover-st"><img src="<?php echo $one->img; ?>"></a>
                <a href="<?php echo $one->link; ?>" class="toe"><?php echo $one->name; ?></a>
            </li>
		<?php }} ?>
        </ul>
        <a href="<?php echo Yii::app()->createUrl('works/index'); ?>" class="btn-style btn-style-black">查看更多作品</a>
    </div>
</div>
