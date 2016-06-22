<?php
/* @var $this JobController */
/* @var $model Job */

$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	$model->id,
);
?>

<h3 class="title">查看 招聘：<?php echo $model->position; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'position',
		array(
			'name' => 'content',
			'type' => 'raw',
		),
		'orderid',
		array('name'=>'is_show','value'=>$model->is_show==1?"是":"否",),
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
		'update_time',
	),
)); ?>
