<?php
/* @var $this CasesController */
/* @var $model Cases */

$this->breadcrumbs=array(
	'Cases'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 作品：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'video',
		'tid',
		'img',
		'is_rec',
		'orderid',
		'is_show',
		'create_uid',
		'create_time',
	),
)); ?>
