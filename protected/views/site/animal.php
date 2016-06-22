<?php $this->pageTitle = '疯狂动物城'; ?>
<div class="main i-page i-animal">
    <div class="location"><a href="/">首页</a> > <a href="/animal.html">疯狂动物城</a></div>
    <div class="pr block1"></div>
    <div class="pr block2">
        <a class="btn-style btn-style-black btn0" href="/work-40.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block3">
        <a class="btn-style btn-style-black btn1" href="/work-41.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block4">
        <a class="btn-style btn-style-black btn2" href="/work-42.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block5">
        <a class="btn-style btn-style-black btn3" href="/work-43.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block6">
        <a class="btn-style btn-style-black btn4" href="/work-44.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block7">
        <a class="btn-style btn-style-black btn5" href="/work-45.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block8">
        <a class="btn-style btn-style-black btn6" href="/work-46.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block9">
        <a class="btn-style btn-style-black btn7" href="/work-48.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block10">
        <a class="btn-style btn-style-black btn8" href="/work-49.html" target="_blank"><i class="iconfont icon-right"></i>查看作品</a>
    </div>
    <div class="pr block11"></div>
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
