<?php $this->pageTitle = '资讯信息'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(3).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('news/index'); ?>">资讯信息</a></div>
    <div class="wrap">
        <div class="news-list">
            <div class="sec-menu">
				<a href="<?php echo Yii::app()->createUrl('news/index'); ?>" class="<?php if($pid==0){ echo 'curr'; } ?>">所有文章</a>
				<?php if($cat){ foreach($cat as $one){ ?>
                <a href="<?php echo Yii::app()->createUrl('news/index',array('pid'=>$one->id)); ?>" class="<?php if($pid==$one->id){ echo 'curr'; } ?>"><?php echo $one->name; ?></a>
				<?php }} ?>
                
            </div>
            
			<?php $i=0; foreach($news as $one){ $imgs=News::getImgs($one->content); $count=count($imgs); $arr=explode('-',$one->news_date); ?>
            <div class="news-item">
                <div class="time"><strong><?php echo $arr[2]; ?></strong><span><?php echo $arr[0].'/'.$arr[1]; ?></span></div>
                <h2 class="title"><a href="<?php echo Yii::app()->controller->createUrl('view',array('id'=>$one->id)); ?>"><?php echo $one->title; ?></a></h2>
                <p><?php echo mb_substr(strip_tags($one->content),0,200,'utf-8'); ?><a href="<?php echo Yii::app()->controller->createUrl('view',array('id'=>$one->id)); ?>" class="fc-06c">[查看全文]</a></p>
                <?php if($imgs){ ?>
				<div class="swiper-container" data-sort="s<?php echo $i; ?>">
                    <div class="swiper-wrapper">
						<?php foreach ($imgs as $img) { ?>
                        <div class="swiper-slide">
                            <?php echo $img; ?>
                        </div>
						<?php } ?>
                        
                    </div>
                </div>
				<?php } ?>
            </div>
			<?php $i++; } ?>
            
        </div>
        <div class="page-bar">

			<?php
			$this->widget('CLinkPager', array(
				'header' => '',
				'prevPageLabel' => '上一页',
				'nextPageLabel' => '下一页',
				'pages' => $page,
				'maxButtonCount' => 10,
				)
			);
			?>
        </div>
    </div>
</div>

<script>
    $(function () {
        var sc=$('.news-item .swiper-container');
        var sw = sc.width();
        var swiperBox="<div class=\"swiper-box\">";
        swiperBox+="<div class=\"swiper-button-prev\"><i class=\"iconfont icon-left f20\"></i></div>";
        swiperBox+="<div class=\"swiper-pagination\"></div>";
//        swiperBox+="<div class=\"swiper-listbox\"><i class=\"iconfont icon-list\"></i></div>";
        swiperBox+="<div class=\"swiper-button-next\"><i class=\"iconfont icon-right1 f20\"></i></div>";
        swiperBox+="</div>";
        $(sc).each(function (i) {
            var dataSort=$(this).attr('data-sort');
            $(this).addClass('swiper-container'+dataSort);
            if($(this).find('.swiper-slide').length===1){
                $(this).addClass('swiper-no-swiping');
            }else{
                $(this).append(swiperBox);
                $(this).find('.swiper-box').addClass(dataSort);
            }
            var swd=$('.swiper-container' + dataSort);
            $(swd).swiper({
                observer:true,
                observeParents:true,
                nextButton:'.'+dataSort+' .swiper-button-next',
                prevButton:'.'+dataSort+' .swiper-button-prev',
                pagination:'.'+dataSort+' .swiper-pagination',
                paginationType: 'fraction',
                centeredSlides: true,
            });
        });
    });
</script>
