<?php
/* @var $this QaController */
/* @var $model Qa */

$this->breadcrumbs=array(
	'Qas'=>array('index'),
	$model->id,
);
?>

<h3 class="title">查看 问答：<?php echo $model->question; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question',
		'answer',
		'is_rec',
		'orderid',
		'is_show',
		'create_uid',
		'create_time',
	),
)); ?>
