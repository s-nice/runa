<?php
/* @var $this VideocatController */
/* @var $model Videocat */

$this->breadcrumbs=array(
	'视频分类'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 视频分类：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pid',
		'orderid',
		'create_uid',
		'create_time',
	),
)); ?>
