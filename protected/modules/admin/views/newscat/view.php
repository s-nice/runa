<?php
/* @var $this NewscatController */
/* @var $model Newscat */

$this->breadcrumbs=array(
	'Newscats'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 资讯分类：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		
		'orderid',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
	),
)); ?>
