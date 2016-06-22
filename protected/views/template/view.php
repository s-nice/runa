<?php $this->pageTitle = '3D创学院'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(1).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a> > <a href="<?php echo Yii::app()->createUrl('template/index'); ?>">模板列表</a> > <span><?php echo $tem->title; ?></span></div>
    <div class="wrap">
        <div class="single-con cf">
            <h1><?php echo $tem->title; ?></h1>
            <div class="content">
               <?php echo $tem->content; ?>
            </div>
            <div class="bdsharebuttonbox"><span class="fl">分享到</span><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a></div>
            <!--
			<div class="page-button cf">
                <a href="javascript:;" class="page-button-prev opac100">上一篇</a>
                <a href="javascript:history.go(-1);location.reload()" class="page-button-prev opac100">返回</a>
                <a href="javascript:;" class="page-button-next opac100">下一篇</a>
            </div>
			-->
        </div>
    </div>
</div>
