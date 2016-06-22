<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'资讯列表'=>array('admin'),
	$model->title,
);
?>
<div class='col-lg-12 page-title'>
<h1 class="title pull-left">查看 资讯：<?php echo $model->title; ?></h1>
<div class="pull-right">
<a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
<a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('update',array('id'=>$model->id)); ?>">编辑</a>
</div>
</div>

<div class="col-lg-12">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'pid',
		//array('name'=>'pid', 'value'=>Newscat::getName($model->pid) ),
		'title',
		//'img',
		//'brief',
		//'content',
		array(
			'name' => 'content',
			'type' => 'raw',
		),
		'news_date',
		//'source',
		//'is_show',
		array('name'=>'is_show','value'=>$model->is_show==1?"是":"否",),
		//'orderid',
		//'views',
		//'create_uid',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		//'create_time',
		array('name'=>'create_time', 'value'=>date('Y-m-d H:i:s',$model->create_time) ),
		'update_time',
	),
)); ?>

</div>