<?php $this->pageTitle = '招聘信息'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(5).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="javascript:;">招聘信息</a></div>
    <div class="wrap">
        <div class="sec-menu">
            <a href="<?php echo Yii::app()->createUrl('site/about'); ?>">关于我们</a>
            <a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">联系我们</a>
            <a href="<?php echo Yii::app()->createUrl('site/job'); ?>" class="curr">招聘信息</a>
        </div>
        <div class="job-banner"></div>
        <div class="sp30"></div>
        <div class="job-list">
			<?php if($jobs){ foreach($jobs as $one){ ?>
            <div class="job-item">
                <div class="tab flexbox animate"><span><?php echo $one->position; ?></span> <i class="iconfont icon-right fr"></i></div>
                <div class="intro animate">
                    <div class="con">
                       <?php echo $one->content; ?>
                   </div>
                </div>
            </div>
			<?php }} ?>
            
        </div>
    </div>
</div>
