<?php $this->pageTitle = '3D产品'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(0).addClass('curr')});</script>
<div class="main">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('pro/index'); ?>">3D产品</a></div>
	<?php foreach($pros as $one){ ?>
    <a href="<?php echo $one->link; ?>" class="hover-st hover-b pro-link"><img src="<?php echo $one->img; ?>" alt=""></a>
	<?php } ?>
    
</div>
