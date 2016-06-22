<?php $this->pageTitle = '教育视频'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(1).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a> > <a href="<?php echo Yii::app()->createUrl('video/index'); ?>">教育视频</a> > <a href="javascript:;"><?php echo $cate?$cate:'所有视频'; ?></a></div>
    <div class="cv-list list-col3">
        <div class="sec-menu">
            <a href="<?php echo Yii::app()->createUrl('video/index'); ?>" class="<?php if($pid==0){ echo 'curr'; } ?>">所有视频</a>
			<?php if($cat){ foreach($cat as $one){ ?>
            <a href="<?php echo Yii::app()->createUrl('video/index',array('pid'=>$one->id)); ?>" class="<?php if($pid==$one->id){ echo 'curr'; } ?>"><?php echo $one->name; ?></a>
            <?php }} ?>
        </div>
        <div class="title-list">CREATIVE VIDEOS</div>
        <ul class="cf">
			<?php foreach($videos as $one){ ?>
            <li><a href="<?php echo Yii::app()->controller->createUrl('view',array('id'=>$one->id)); ?>" class="hover-st"><img src="<?php echo $one->img; ?>"></a></li>
			<?php } ?>
        </ul>
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
