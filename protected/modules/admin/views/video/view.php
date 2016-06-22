<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->id,
);
?>

<h3 class="title">查看 视频：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pid',
		'img',
		'video',
		'is_rec',
		'orderid',
		'is_show',
		'create_uid',
		'create_time',
	),
)); ?>
