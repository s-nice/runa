<?php $this->pageTitle = $story->name; ?>
<div class="main i-page">
    <div class="location"><a href="/">首页</a> > <a href=""><?php echo $story->name; ?></a></div>
    
    <?php echo $story->content; ?>
	
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
