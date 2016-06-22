<?php
/* @var $this CaseimgController */
/* @var $model Caseimg */

$this->breadcrumbs=array(
	'Caseimgs'=>array('index'),
	$model->id,
);
?>

<h3 class="title">查看 Caseimg #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'img',
		'orderid',
		'is_show',
		'create_uid',
		'create_time',
	),
)); ?>
