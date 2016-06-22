<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 分类 <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		//'pid',
		array('name'=>'pid', 'value'=>Category::getName($model->pid) ),
		'orderid',
		'level',
		'path',
		//'create_uid',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
		//'update_uid',
		array('name'=>'update_uid', 'value'=>User::getName($model->update_uid) ),
		'update_time',
	),
)); ?>
