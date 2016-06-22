<?php $this->pageTitle = '技术问答'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(1).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="<?php echo Yii::app()->createUrl('cx/index'); ?>">3D创学院</a> > <span>技术问答</span></div>
    <div class="wrap bg-fff">
        <div class="single-con cf">
            <h1>技术问答</h1>
            <div class="content">
				<?php foreach($qas as $one){ ?>
                <div class="job-list qa-list">
                    <div class="job-item">
                        <div class="tab flexbox animate"><span>Q：<?php echo $one->question; ?></span> <i class="iconfont icon-right fr"></i></div>
                        <div class="intro animate">
                            <div class="con"><?php echo $one->answer; ?></div>
                        </div>
                    </div>
                </div>
				<?php } ?>
               

            </div>
        </div>
    </div>
</div>
