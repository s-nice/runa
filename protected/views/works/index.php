<?php $this->pageTitle = '3D创学院'; ?>
<script type="text/javascript">$(function (){ $('.header-nav a').eq(1).addClass('curr')});</script>
<div class="main">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a> > <a href="<?php echo Yii::app()->createUrl('works/index'); ?>">作品展示</a></div>
    <div class="title-list">作品展示</div>
    <div class="list-col3 w-list">
        <ul class="cf">
			<?php foreach($ws as $one){ ?>
            <li><a href="<?php echo Yii::app()->createUrl('works/view',array('id'=>$one->id)); ?>" class="hover-st"><img src="<?php echo $one->img; ?>"></a></li>
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
