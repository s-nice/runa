<?php $this->pageTitle = '资讯信息'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(3).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('news/index'); ?>">资讯</a> > <span><?php echo $news->title; ?></span></div>
    <div class="wrap">
        <div class="news-list">
            <div class="news-item">
                <div class="time"><strong><?php $arr=explode('-',$news->news_date); echo $arr[2]; ?></strong><span><?php echo $arr[0].'/'.$arr[1]; ?></span></div>
                <h2 class="title"><?php echo $news->title; ?></h2>
                <?php echo $news->content; ?>
            </div>
            <div class="bdsharebuttonbox"><span class="fl">分享到</span><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a></div>
        </div>
        <div class="page-button cf">
			<?php if($last){ ?>
            <a href="<?php echo Yii::app()->controller->createUrl('view',array('id'=>$last->id)); ?>" class="page-button-prev opac100">上一篇</a>
			<?php } ?>
            <a href="javascript:history.go(-1);location.reload()" class="page-button-prev opac100">返回</a>
			<?php if($next){ ?>
            <a href="<?php echo Yii::app()->controller->createUrl('view',array('id'=>$next->id)); ?>" class="page-button-next opac100">下一篇</a>
			<?php } ?>
        </div>
    </div>
</div>
