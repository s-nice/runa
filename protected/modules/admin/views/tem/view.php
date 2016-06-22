<?php
/* @var $this TemController */
/* @var $model Tem */

$this->breadcrumbs=array(
	'Tems'=>array('index'),
	$model->title,
);
?>

<h3 class="title">查看 模板：<?php echo $model->title; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'img',
		//'content',
		'is_show',
		'is_rec',
		'orderid',
		'create_uid',
		'create_time',
	),
)); ?>
