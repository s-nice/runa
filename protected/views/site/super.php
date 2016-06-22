<?php $this->pageTitle = '超级英雄'; ?>
<div class="main i-page i-super">
    <div class="location"><a href="/">首页</a> > <a href="/super.html">超级英雄</a></div>
    <div class="pr block1"></div>
    <div class="pr block2">
        <a class="btn-style btn-style-black btn0" href="/work-37.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
    </div>
    <div class="pr block3">
        <a class="btn-style btn-style-black btn1" href="/work-36.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
    </div>
    <div class="pr block4">
        <a class="btn-style btn-style-black btn2" href="/work-38.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
        <a class="btn-style btn-style-black btn3" href="/work-39.html" target="_blank"><i class="iconfont icon-down1"></i>查看作品</a>
    </div>
    <div class="pr block5"></div>
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
