<?php $this->pageTitle = '关于我们'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(5).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="javascript:;">关于我们</a></div>
    <div class="wrap">
        <div class="sec-menu">
            <a href="<?php echo Yii::app()->createUrl('site/about'); ?>" class="curr">关于我们</a>
            <a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">联系我们</a>
            <a href="<?php echo Yii::app()->createUrl('site/job'); ?>">招聘信息</a>
        </div>
        <?php echo $about->content; ?>
    </div>
</div>
