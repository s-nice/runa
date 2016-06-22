<?php $this->pageTitle = '3D创学院'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(1).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a> > <a href="<?php echo Yii::app()->createUrl('works/index'); ?>">作品展示</a> > <span><?php echo $work->name; ?></span></div>
    <div class="cw-details cf">
        <div class="cw-img">
            <div class="swiper-container">
                <div class="swiper-wrapper">
					<?php foreach($imgs as $img){ ?>
                    <div class="swiper-slide"><img src="<?php echo $img; ?>"></div>
					<?php } ?>
                    
                </div>
            </div>
            <div class="out-prev"><i class="iconfont icon-left"></i></div>
            <div class="out-next"><i class="iconfont icon-right1"></i></div>
            <div class="out-pagination"></div>
        </div>
        <div class="cw-share fr">
			<?php if($work->video){ ?>
            <div class="txt">此作品教程</div>
            <a href="<?php echo Yii::app()->createUrl('video/view',array('id'=>$work->video)); ?>" class="cw-video hover-st"><img src="/static/images/video.jpg"></a>
            <?php } ?>
			<?php if($tem){ ?>
			<div class="txt">作品模版</div>
            <a href="<?php echo Yii::app()->createUrl('template/view',array('id'=>$work->tid)); ?>" class="cw-model hover-st"><img src="<?php echo $tem->img ?>"></a>
			<?php } ?>
            <div class="txt">分享到</div>
            <div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a></div>
        </div>
    </div>
    <div class="page-button cf">
		<?php if($flag!=2){ ?>
        <a href="<?php echo Yii::app()->controller->createUrl('view',array('id'=>$last->id)); ?>" class="page-button-prev opac100">上一篇</a>
        <?php } ?>
		<a href="javascript:history.go(-1);location.reload()" class="page-button-prev opac100">返回</a>
		<?php if($flag!=1){ ?>
        <a href="<?php echo Yii::app()->controller->createUrl('view',array('id'=>$next->id)); ?>" class="page-button-next opac100">下一篇</a>
		<?php } ?>
    </div>
</div>
