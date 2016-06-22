<?php $this->pageTitle = $sup->name; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(4).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="javascript:;">服务支持</a></div>
    <div class="wrap">
        <div class="sec-menu">
			<?php foreach($sups as $one){ ?>
			<a href="<?php echo Yii::app()->createUrl('support/view',array('id'=>$one->id)); ?>" class="<?php if($one->id==$sup->id){ echo 'curr'; } ?>"><?php echo $one->name; ?></a>
			<?php } ?>
            
        </div>
        <div class="single-con cf">
            <h1><?php echo $sup->name; ?></h1>
            <div class="content">
                <?php echo $sup->content; ?>
            </div>
        </div>

    </div>

</div>
