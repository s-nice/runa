<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 联系客户：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'position',
		'name',
		array('name'=>'gender','value'=>$model->gender==1?"男":"女",),
		'phone',
		//'email',
		'province',
		'city',
		'content',
		array('name'=>'source','value'=>$model->source==1?"PC端":"移动端",),
		'create_time',
	),
)); ?>
