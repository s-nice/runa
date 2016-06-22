<?php $this->pageTitle = '联系我们'; ?>
<script type="text/javascript">$(function(){$('.header-nav a').eq(5).addClass('curr')});</script>
<div class="main about">
    <div class="location"><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">首页</a> > <a href="javascript:;">联系我们</a></div>
    <div class="wrap">
        <div class="sec-menu">
            <a href="<?php echo Yii::app()->createUrl('site/about'); ?>">关于我们</a>
            <a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" class="curr">联系我们</a>
            <a href="<?php echo Yii::app()->createUrl('site/job'); ?>">招聘信息</a>
        </div>
        <div class="contact">
            <div class="box">
                <div class="fl f12">
                    <p>Future Make Q1是全球首款光固化3D打印笔。欢迎您免费预约咨询！</p>
                    <p>
                        <strong>总部(南京)</strong><br>
                        地址：江苏省南京市栖霞区国家级新港经济开发区龙港科技园A1座5楼<br>
                        <strong>分部(北京)</strong><br>
                        地址：北京市朝阳区建国路89号华贸中心4号楼707<br>
                        服务热线：400-617-8585
                    </p>
                    <div class="app">扫一扫，有惊喜！</div>
                </div>
                <div class="contact-right fr">
                    <p>填写表格，联系我们</p>
                    <form action="javascript:;" class="formdl">
                        <div class="item">
                            <input class="input-common" type="text" name="name" id="name" placeholder="您的姓名" style="width:150px;">
                            <label class="label-input">
                                <input type="radio" name="sex" value="01"/><em><i></i></em><span>先生</span>
                            </label>
                            <label class="label-input">
                                <input type="radio" name="sex" value="02"/><em><i></i></em><span>女士</span>
                            </label>
                        </div>
                        <div class="item">
                            <input class="input-common" type="text" name="tel" id="tel" placeholder="联系电话">
                        </div>
                        <div class="item">
                            <input class="input-common" type="text" name="city" id="city" placeholder="所在城市">
                        </div>
						<div class="item">
                            <textarea class="" type="text" name="content" id="content" placeholder="留言"></textarea>
                        </div>
                    </form>
                    <p>请阅读我们的详细信息 <a href="javascript:;" class="u">隐私政策</a></p>
                    <a class="btn-style btn-style-black" onclick="contact()" href="javascript:;">发送消息</a>
                </div>
            </div>
        </div>
    </div>
</div>