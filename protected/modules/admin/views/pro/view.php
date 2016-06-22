<?php
/* @var $this ProController */
/* @var $model Pro */

$this->breadcrumbs=array(
	'Pros'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 产品：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
			'name' => 'img',
			'value' => CHtml::link(CHtml::image($model->img,'图片',array('width'=>'150px')),$model->img,array("target"=>"_blank")),
			'type' => 'raw',
		),
		'link',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
	),
)); ?>
