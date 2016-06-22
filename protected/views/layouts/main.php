<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="keywords" content="<?php echo $this->_seoKeyword; ?>"/>
<meta name="description" content="<?php echo $this->_seoDes; ?>" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/font/iconfont.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/common.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/main.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/swiper.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/main.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/3d.js"></script>
</head>
<body>
<div class="header cf">
	<a class="logo" href="<?php echo Yii::app()->createUrl('site/index'); ?>"></a>
	<div class="header-nav">
		<a href="<?php echo Yii::app()->createUrl('pro/index'); ?>">3D产品</a>
		<a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a>
		<a href="<?php echo Yii::app()->createUrl('edu/index'); ?>">创客教育</a>
		<a href="<?php echo Yii::app()->createUrl('news/index'); ?>">资讯信息</a>
		<a href="<?php echo Yii::app()->createUrl('support/view'); ?>">服务支持</a>
		<a href="<?php echo Yii::app()->createUrl('site/about'); ?>">关于我们</a>
	</div>
</div>
	<?php echo $content; ?>
<div class="footer">
	<div class="links">
		<div class="left">
			<a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">联系我们</a>
			<a href="<?php echo Yii::app()->createUrl('site/job'); ?>">招聘信息</a>
			<a href="<?php echo Yii::app()->createUrl('site/sitemap'); ?>">网站地图</a></div>
		<div class="right">
			<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=3380683120&amp;site=qq&amp;menu=yes" class=""><i class="iconfont icon-kefu pa i1"></i>在线客服</a>
			<a href="javascript:;" class=" tel"><i class="iconfont icon-dianhua pa"></i>400-617-8585</a>
		</div>
	</div><div class="share">
		<a href="http://weibo.com/FutureMake" target="_blank"><i class="iconfont icon-fx-wb"></i></a>
		<a href="javascript:;" class="share-code"><i class="iconfont icon-fx-wx"></i><span class="code-wx"></span></a>
	</div><p>Copyright @ 2015 WobbleWorks, Inc. | All Rights Reserved</p>
</div>

<div class="fixed-btn">
    <a href="javascript:;" id="fixed-cs-btn"><i class="iconfont icon-kefu"></i><span>在线客服</span></a>
    <a href="javascript:;" id="back-top" class="animate"><i class="iconfont icon-back-top"></i><span>返回顶部</span></a>
    <div id="fixed-cs" class="fixed-cs">
        <ul>
            <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=3380683120&amp;site=qq&amp;menu=yes">在线客服一</a></li>
            <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=3372174459&amp;site=qq&amp;menu=yes">在线客服二</a></li>
            <li><span>400-617-8585</span></li>
        </ul>
    </div>
</div>

<?php echo $this->_seoScode; ?>
</body>
</html>
