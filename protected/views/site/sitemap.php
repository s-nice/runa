<?php $this->pageTitle = '网站地图'; ?>
<div class="main about">
    <div class="location"><a href="/">首页</a> > <a href="">网站地图</a></div>
	<div class="wrap">
	<div class="single-con cf">
	    <h1>网站地图</h1>
	    <div class="content">
		<div class="siteClass cf">
			<h3><a href="index.html">首页</a></h3>
			<div class="body cf">
				<span class="arrow"><span></span></span>
				<a href="<?php echo Yii::app()->createUrl('site/snow'); ?>">白雪公主</a>
				<a href="<?php echo Yii::app()->createUrl('site/dream'); ?>">我的梦想</a>
				<a href="<?php echo Yii::app()->createUrl('site/animal'); ?>">疯狂动物城</a>
				<a href="<?php echo Yii::app()->createUrl('site/super'); ?>">超级英雄</a>
			</div>
		</div>
		<div class="siteClass cf">
			<h3><a href="<?php echo Yii::app()->createUrl('pro/index'); ?>">3D产品</a></h3>
			<div class="body cf">
				<span class="arrow"><span></span></span>
				<a href="<?php echo Yii::app()->createUrl('pro/pen'); ?>">3D打印笔 Future Make Q1</a>
				<a href="<?php echo Yii::app()->createUrl('pro/pen'); ?>">3D打印雪豹二代</a>
			</div>
		</div>
		<div class="siteClass cf">
			<h3><a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a></h3>
			<div class="body cf">
				<span class="arrow"><span></span></span>
				<a href="<?php echo Yii::app()->createUrl('works/index'); ?>">作品展示</a>
				<a href="<?php echo Yii::app()->createUrl('template/index'); ?>">模板支持</a>
				<a href="<?php echo Yii::app()->createUrl('video/index'); ?>">教育视频</a>
			</div>
		</div>
		<div class="siteClass cf">
			<h3><a href="<?php echo Yii::app()->createUrl('edu/index'); ?>">创客教育</a></h3>
		</div>
		<div class="siteClass cf">
			<h3><a href="<?php echo Yii::app()->createUrl('news/index'); ?>">资讯信息</a></h3>
			<div class="body cf">
				<span class="arrow"><span></span></span>
				<?php if($cat){ foreach($cat as $one){ ?>
				<a href="<?php echo Yii::app()->createUrl('news/index',array('pid'=>$one->id)); ?>"><?php echo $one->name; ?></a>
				<?php }} ?>
			</div>
		</div>
		<div class="siteClass cf">
			<h3><a href="support.html">服务支持</a></h3>
			<div class="body cf">
				<span class="arrow"><span></span></span>
				<?php foreach($sups as $one){ ?>
				<a href="<?php echo Yii::app()->createUrl('support/view',array('id'=>$one->id)); ?>"><?php echo $one->name; ?></a>
				<?php } ?>
			</div>
		</div>
		<div class="siteClass cf">
			<h3><a href="<?php echo Yii::app()->createUrl('site/about'); ?>">关于我们</a></h3>
			<div class="body cf">
				<span class="arrow"><span></span></span>
				<a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">联系我们</a>
				<a href="<?php echo Yii::app()->createUrl('site/job'); ?>">招聘信息</a>
			</div>
		</div>
	</div>



	    </div>
	</div>
</div>
